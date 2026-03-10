#!/bin/bash
# Scrape last 100 posts from Kinsta via SSH and import into local WordPress
set -e

KINSTA_SSH="ssh -i ~/.ssh/id_ed25519 activehistoryca@34.130.128.74 -p 35465"
LOCAL_WP="docker compose exec -T -w /var/www/html wordpress"
IMPORT_DIR="/home/jic823/activehistory/import_data"

mkdir -p "$IMPORT_DIR/images"

echo "=== Step 1: Export last 100 posts from Kinsta via WP-CLI ==="

# Check if wp-cli exists on Kinsta
$KINSTA_SSH "which wp 2>/dev/null || echo 'NO_WPCLI'"

echo "=== Step 1b: Use REST API instead (more reliable on managed hosting) ==="

# Fetch 100 posts (10 pages of 10) via REST API with embedded data
for PAGE in $(seq 1 10); do
    echo "Fetching page $PAGE..."
    curl -s "https://activehistory.ca/wp-json/wp/v2/posts?per_page=10&_embed&page=$PAGE" > "$IMPORT_DIR/posts_page_${PAGE}.json"
done

echo "=== Step 2: Extract and download featured images ==="

# Parse all image URLs from embedded media
python3 << 'PYEOF'
import json, os, re

import_dir = "/home/jic823/activehistory/import_data"
all_posts = []

for page in range(1, 11):
    fpath = f"{import_dir}/posts_page_{page}.json"
    if os.path.exists(fpath):
        with open(fpath) as f:
            try:
                posts = json.load(f)
                if isinstance(posts, list):
                    all_posts.extend(posts)
            except:
                pass

print(f"Total posts fetched: {len(all_posts)}")

# Extract image URLs and post data
image_urls = []
post_data = []

for p in all_posts:
    img_url = None
    if p.get("featured_media", 0) > 0:
        embedded = p.get("_embedded", {})
        media = embedded.get("wp:featuredmedia", [])
        if media and isinstance(media, list) and len(media) > 0:
            img_url = media[0].get("source_url")

    # Get author name
    author_name = "Unknown"
    embedded = p.get("_embedded", {})
    authors = embedded.get("author", [])
    if authors and len(authors) > 0:
        author_name = authors[0].get("name", "Unknown")

    # Get categories
    categories = []
    terms = embedded.get("wp:term", [])
    if terms and len(terms) > 0:
        for t in terms[0]:
            categories.append(t.get("name", ""))

    # Get tags
    tags = []
    if terms and len(terms) > 1:
        for t in terms[1]:
            tags.append(t.get("name", ""))

    post_data.append({
        "id": p["id"],
        "title": p["title"]["rendered"],
        "content": p["content"]["rendered"],
        "excerpt": p["excerpt"]["rendered"],
        "date": p["date"],
        "slug": p["slug"],
        "author": author_name,
        "categories": categories,
        "tags": tags,
        "image_url": img_url,
    })

    if img_url:
        image_urls.append((p["id"], img_url))

# Save consolidated data
with open(f"{import_dir}/all_posts.json", "w") as f:
    json.dump(post_data, f, indent=2)

# Save image download list
with open(f"{import_dir}/image_list.txt", "w") as f:
    for post_id, url in image_urls:
        ext = url.rsplit(".", 1)[-1].split("?")[0][:4]
        f.write(f"{post_id}\t{url}\t{ext}\n")

print(f"Posts with images: {len(image_urls)}")
print(f"Posts without images: {len(all_posts) - len(image_urls)}")
PYEOF

# Download images
echo "Downloading images..."
while IFS=$'\t' read -r post_id url ext; do
    outfile="$IMPORT_DIR/images/${post_id}.${ext}"
    if [ ! -f "$outfile" ]; then
        curl -sL "$url" -o "$outfile"
        echo "  Downloaded: $post_id.$ext"
    fi
done < "$IMPORT_DIR/image_list.txt"

echo "=== Step 3: Import into local WordPress ==="

# Copy images into container
docker cp "$IMPORT_DIR/images/." "$(docker compose ps -q wordpress)":/tmp/import_images/
docker cp "$IMPORT_DIR/all_posts.json" "$(docker compose ps -q wordpress)":/tmp/all_posts.json

# Import via WP-CLI inside container
$LOCAL_WP bash -c '
cd /var/www/html
mkdir -p /tmp/import_images 2>/dev/null

python3 << "INNER_PYEOF" 2>/dev/null || {
    # If python3 not available in container, use PHP
    echo "Python not in container, using wp-cli directly"
}
INNER_PYEOF

# Import posts using wp-cli
apt-get update -qq && apt-get install -y -qq python3 > /dev/null 2>&1

python3 << "INNER_PYEOF"
import json, subprocess, os, html

with open("/tmp/all_posts.json") as f:
    posts = json.load(f)

# Sort oldest first so newest end up on top
posts.sort(key=lambda p: p["date"])

for i, post in enumerate(posts):
    title = html.unescape(post["title"])
    content = post["content"]
    date = post["date"]
    slug = post["slug"]
    author = post["author"]
    categories = post["categories"]
    tags = post["tags"]
    image_url = post["image_url"]

    # Write content to temp file to avoid shell escaping issues
    with open("/tmp/post_content.html", "w") as f:
        f.write(content)

    # Create category string
    cat_str = ",".join(categories) if categories else "Uncategorized"

    # Build wp post create command
    cmd = [
        "wp", "post", "create", "/tmp/post_content.html",
        f"--post_title={title}",
        f"--post_date={date}",
        f"--post_name={slug}",
        "--post_status=publish",
        "--porcelain",
        "--allow-root",
    ]

    result = subprocess.run(cmd, capture_output=True, text=True)
    if result.returncode != 0:
        print(f"  FAILED: {title[:50]} - {result.stderr.strip()}")
        continue

    post_id = result.stdout.strip()

    # Assign categories
    for cat in categories:
        subprocess.run(
            ["wp", "post", "term", "add", post_id, "category", cat, "--allow-root"],
            capture_output=True
        )

    # Assign tags
    for tag in tags:
        subprocess.run(
            ["wp", "post", "term", "add", post_id, "post_tag", tag, "--allow-root"],
            capture_output=True
        )

    # Import featured image if exists
    if image_url:
        orig_id = post["id"]
        # Find the image file
        for ext in ["jpg", "jpeg", "png", "gif", "webp"]:
            img_path = f"/tmp/import_images/{orig_id}.{ext}"
            if os.path.exists(img_path):
                img_result = subprocess.run(
                    ["wp", "media", "import", img_path,
                     f"--post_id={post_id}", "--featured_image",
                     "--porcelain", "--allow-root"],
                    capture_output=True, text=True
                )
                if img_result.returncode == 0:
                    print(f"  [{i+1}/{len(posts)}] {title[:50]}... (with image)")
                else:
                    print(f"  [{i+1}/{len(posts)}] {title[:50]}... (image failed)")
                break
        else:
            print(f"  [{i+1}/{len(posts)}] {title[:50]}... (image not found locally)")
    else:
        print(f"  [{i+1}/{len(posts)}] {title[:50]}... (no image)")

print(f"\nDone! Imported {len(posts)} posts.")
INNER_PYEOF
' --allow-root