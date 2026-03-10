# ActiveHistory 2026 Theme

## Overview
Custom editorial WordPress theme for ActiveHistory.ca, replacing the rubbersoul-pro theme that was in use for 10+ years. Designed to be image-forward while gracefully handling legacy posts without images.

## Design Decisions
- **Typography**: Source Serif 4 (body) + Inter (headings/UI) — editorial feel
- **Color**: ActiveHistory green (#0f7b3f) retained as accent throughout
- **Layout**: Full-width, no sidebar — clean modern reading experience
- **Header**: Sticky, with ActiveHistory logo + text title, primary nav, search overlay

## Key Features

### Image Handling (posts with and without images)
- **Hero (homepage)**: Latest post as full-width banner. Falls back to green gradient if no image.
- **Post cards**: Three-tier image strategy:
  1. Featured image (if set)
  2. First image found in post content (automatic fallback)
  3. Text-forward card with green left border (no image area at all)
- Helper functions: `ah26_get_post_image_url()`, `ah26_has_image()`

### Contributor System
- Custom taxonomy `contributor` auto-parsed from post bylines
- Parses `<em>By Author Name</em>` and `<em>Author Name</em>` patterns
- Handles multiple authors, footnote markers, `&` separators
- Contributors shown on cards and single post headers, linked to archive pages
- Auto-assigns on post save; can also be manually set in WP admin
- Browsable at `/contributor/author-name/`
- **Why not WP users?** ActiveHistory uses a small number of editor/admin accounts to publish on behalf of many guest contributors. The real author is in the post content, not the WP user.

### Templates
| File | Purpose |
|------|---------|
| `index.php` | Homepage — hero + card grid |
| `single.php` | Single post — banner image, content, tags, prev/next |
| `archive.php` | Category/tag/contributor archives — header + card grid |
| `page.php` | Static pages |
| `search.php` | Search results |
| `404.php` | Error page with search |
| `comments.php` | Threaded comments |
| `template-parts/post-card.php` | Card component (image or text-forward) |
| `template-parts/content-none.php` | Empty state |

### Widget Areas
- Footer Column 1, 2, 3 (three-column footer layout)
- No sidebar

### Menus
- `primary` — Main navigation (sticky header)
- `footer` — Footer links
- `social` — Social media links (footer)

## Local Development

### Docker Setup
```bash
# Start local WordPress
docker compose up -d

# Access at http://localhost:8080
# Admin: http://localhost:8080/wp-admin

# Stop
docker compose down

# Stop and destroy data
docker compose down -v
```

The theme directory is mounted live — edits to theme files appear on refresh without restarting containers.

### Importing Content
Export XML from activehistory.ca (Tools > Export), then:
```bash
docker cp export.xml "$(docker compose ps -q wordpress)":/tmp/export.xml
docker compose exec -w /var/www/html wordpress wp import /tmp/export.xml --authors=create --allow-root
```

Images in post content reference the live site URLs and display correctly in local dev.

### Backfilling Contributors
After importing posts, run the contributor parser:
```bash
docker compose exec -w /var/www/html wordpress wp eval '
$posts = get_posts(array("post_type" => "post", "post_status" => "publish", "numberposts" => -1));
foreach ($posts as $p) {
    $authors = ah26_parse_byline($p->post_content);
    if (!empty($authors)) {
        wp_set_object_terms($p->ID, $authors, "contributor", false);
    }
}
' --allow-root
```

## Repo Cleanup (done)
Removed from the repository:
- `histoireengagee.ca/` — separate WP 4.7 install (now independent site)
- 15 zip archives (old backups, theme installers)
- Hosting artifacts (fantastico, cpanel, shtml error pages)
- Deprecated WP files (wp-feed.php, wp-rss.php, etc.)
- Unused plugins: googleanalytics, classic-editor, syntaxhighlighter, jonradio-multiple-themes, wordpress-importer, public-post-preview-configurator, vaultpress
- Unused themes: davis, hello-elementor
- `conf.php` (phpinfo security risk)

## Next Steps
- [ ] Review theme with editorial team
- [ ] Decide on hero: dynamic (latest post) vs static banner vs both
- [ ] Test with Kinsta staging environment (second site slot available)
- [ ] Add podcast-specific template or styling
- [ ] Consider Polylang compatibility for bilingual content
- [ ] Set up footer widgets (About, Recent Posts, Contact info)
- [ ] Create proper screenshot.png for theme preview
- [ ] Decide on public-post-preview plugin (keep or drop)
- [ ] Backfill contributors for posts that didn't auto-parse (10 of 54 tested)
- [ ] Push editors to use "By Author Name" in italics for reliable parsing
