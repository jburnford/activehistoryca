<?php
/**
 * ActiveHistory 2026 functions and definitions
 *
 * @package ActiveHistory_2026
 */

define( 'AH26_VERSION', '1.0.0' );

/**
 * Theme setup
 */
function ah26_setup() {
    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );

    // Featured images
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1200, 800, true );
    add_image_size( 'ah26-card', 600, 400, true );
    add_image_size( 'ah26-hero', 1600, 900, true );

    // Navigation menus
    register_nav_menus( array(
        'primary'  => __( 'Primary Menu', 'activehistory-2026' ),
        'footer'   => __( 'Footer Menu', 'activehistory-2026' ),
        'social'   => __( 'Social Links', 'activehistory-2026' ),
    ) );

    // HTML5 markup support
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // RSS feed links
    add_theme_support( 'automatic-feed-links' );

    // Wide and full alignment for block editor
    add_theme_support( 'align-wide' );

    // Responsive embeds
    add_theme_support( 'responsive-embeds' );

    // Editor styles
    add_editor_style( 'assets/css/editor-style.css' );

    // Content width
    if ( ! isset( $content_width ) ) {
        $GLOBALS['content_width'] = 720;
    }
}
add_action( 'after_setup_theme', 'ah26_setup' );

/**
 * Enqueue styles and scripts
 */
function ah26_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'ah26-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Source+Serif+4:ital,opsz,wght@0,8..60,400;0,8..60,600;0,8..60,700;1,8..60,400;1,8..60,600&display=swap',
        array(),
        null
    );

    // Main stylesheet
    wp_enqueue_style(
        'ah26-style',
        get_stylesheet_uri(),
        array( 'ah26-fonts' ),
        AH26_VERSION
    );

    // Navigation script
    wp_enqueue_script(
        'ah26-navigation',
        get_template_directory_uri() . '/assets/js/navigation.js',
        array(),
        AH26_VERSION,
        true
    );

    // Comment reply script
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'ah26_scripts' );

/**
 * Register widget areas
 */
function ah26_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer Column 1', 'activehistory-2026' ),
        'id'            => 'footer-1',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Column 2', 'activehistory-2026' ),
        'id'            => 'footer-2',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Column 3', 'activehistory-2026' ),
        'id'            => 'footer-3',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'ah26_widgets_init' );

/**
 * Custom excerpt length
 */
function ah26_excerpt_length( $length ) {
    return 35;
}
add_filter( 'excerpt_length', 'ah26_excerpt_length' );

/**
 * Custom excerpt more text
 */
function ah26_excerpt_more( $more ) {
    return '&hellip;';
}
add_filter( 'excerpt_more', 'ah26_excerpt_more' );

/**
 * Get the primary category for a post
 */
function ah26_get_primary_category( $post_id = null ) {
    $categories = get_the_category( $post_id );
    if ( empty( $categories ) ) {
        return null;
    }

    // Skip "Uncategorized"
    foreach ( $categories as $cat ) {
        if ( $cat->slug !== 'uncategorized' ) {
            return $cat;
        }
    }

    return $categories[0];
}

/**
 * Pagination
 */
function ah26_pagination() {
    the_posts_pagination( array(
        'mid_size'  => 2,
        'prev_text' => '&larr;',
        'next_text' => '&rarr;',
    ) );
}

/**
 * Add body classes
 */
function ah26_body_classes( $classes ) {
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }

    if ( is_singular() && has_post_thumbnail() ) {
        $classes[] = 'has-post-thumbnail';
    }

    return $classes;
}
add_filter( 'body_class', 'ah26_body_classes' );

/**
 * Get a post's display image URL.
 * Priority: featured image > first image in content > null
 */
function ah26_get_post_image_url( $post_id = null, $size = 'ah26-card' ) {
    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }

    // 1. Featured image
    if ( has_post_thumbnail( $post_id ) ) {
        $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $size );
        if ( $img ) {
            return $img[0];
        }
    }

    // 2. First image in post content
    $post = get_post( $post_id );
    if ( $post && preg_match( '/<img[^>]+src=["\']([^"\']+)["\']/', $post->post_content, $matches ) ) {
        return $matches[1];
    }

    return null;
}

/**
 * Check if a post has any image (featured or in content)
 */
function ah26_has_image( $post_id = null ) {
    return (bool) ah26_get_post_image_url( $post_id );
}

/**
 * Register "Contributor" taxonomy — hidden from admin UI, used for author browsing
 */
function ah26_register_contributor_taxonomy() {
    register_taxonomy( 'contributor', 'post', array(
        'labels' => array(
            'name'          => __( 'Contributors', 'activehistory-2026' ),
            'singular_name' => __( 'Contributor', 'activehistory-2026' ),
        ),
        'public'            => true,
        'show_in_menu'      => true,
        'show_admin_column'  => true,
        'show_in_rest'      => true,
        'hierarchical'      => false,
        'rewrite'           => array( 'slug' => 'contributor' ),
    ) );
}
add_action( 'init', 'ah26_register_contributor_taxonomy' );

/**
 * Parse author byline from post content.
 * Returns array of author names or empty array.
 *
 * Handles patterns like:
 * - <em>By Author Name</em>
 * - <em>Author Name</em>
 * - <strong>By Author Name</strong>
 * - Author Name[1] (strips footnotes)
 * - Multiple authors: "A and B", "A & B", "A, B, and C"
 */
function ah26_parse_byline( $content ) {
    $authors = array();

    // Look in first 600 chars to avoid matching random italics deep in content
    $head = substr( $content, 0, 600 );

    // Try <em> first, then <strong>
    $matched = false;
    foreach ( array( 'em', 'strong' ) as $tag ) {
        if ( preg_match( '/<' . $tag . '>\s*(By\s+|by\s+)?([^<]+)<\/' . $tag . '>/', $head, $match ) ) {
            $raw = html_entity_decode( $match[2], ENT_QUOTES, 'UTF-8' );
            $raw = trim( $raw );

            // Strip footnote markers like [1], [2]
            $raw = preg_replace( '/\[\d+\]/', '', $raw );
            // Strip trailing nbsp and whitespace
            $raw = preg_replace( '/(\x{00A0}|\s)+$/u', '', $raw );
            $raw = trim( $raw );

            // Skip if it looks like a disclaimer, sentence, or non-name text
            if ( strlen( $raw ) > 100 || str_word_count( $raw ) > 10 ) {
                continue;
            }
            // Skip if it contains sentence-like words
            if ( preg_match( '/\b(the|this|that|are|is|was|were|our|their|not|for|from|with)\b/i', $raw ) ) {
                continue;
            }

            $matched = true;
            break;
        }
    }

    if ( ! $matched ) {
        return $authors;
    }

    // Split on " and ", " & ", ", and ", or ","
    $parts = preg_split( '/\s*(?:,\s*and\s+|,\s*&\s*|\s+and\s+|\s*&\s*|,\s*)\s*/i', $raw );

    foreach ( $parts as $name ) {
        $name = trim( $name );
        // Must be at least 3 chars and start with uppercase
        if ( strlen( $name ) >= 3 && preg_match( '/^[A-Z]/', $name ) ) {
            $authors[] = $name;
        }
    }

    return $authors;
}

/**
 * Auto-assign contributor taxonomy when a post is saved
 */
function ah26_auto_assign_contributors( $post_id, $post ) {
    if ( $post->post_type !== 'post' || $post->post_status === 'auto-draft' ) {
        return;
    }

    $authors = ah26_parse_byline( $post->post_content );
    if ( ! empty( $authors ) ) {
        wp_set_object_terms( $post_id, $authors, 'contributor', false );
    }
}
add_action( 'save_post', 'ah26_auto_assign_contributors', 10, 2 );

/**
 * Get contributor names for a post
 */
function ah26_get_contributors( $post_id = null ) {
    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }

    $terms = get_the_terms( $post_id, 'contributor' );
    if ( $terms && ! is_wp_error( $terms ) ) {
        return $terms;
    }

    return array();
}

/**
 * Customize pingback URL
 */
function ah26_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}
add_action( 'wp_head', 'ah26_pingback_header' );
