<?php 
/**
 * Library of Theme options functions.
 * @package SeaSun
 * @since SeaSun 1.0.0
*/ 

// Display Breadcrumb navigation
function seasun_get_breadcrumb() { 
		if (get_theme_mod('seasun_display_breadcrumb', seasun_default_options('seasun_display_breadcrumb')) != 'Hide') { ?>
<?php if(function_exists( 'bcn_display' ) && !is_front_page()){ _e('<p class="breadcrumb-navigation">', 'seasun'); ?><?php bcn_display(); ?><?php _e('</p>', 'seasun');} ?>
<?php } 
} 

// Display featured images on single posts
function seasun_get_display_image_post() { 
		if (get_theme_mod('seasun_display_image_post', seasun_default_options('seasun_display_image_post')) == '' || get_theme_mod('seasun_display_image_post', seasun_default_options('seasun_display_image_post')) == 'Display') { ?>
<?php if ( has_post_thumbnail() ) : ?>
<?php the_post_thumbnail(); ?>
<?php endif; ?>
<?php } 
}

// Display featured images on pages
function seasun_get_display_image_page() { 
		if (get_theme_mod('seasun_display_image_page', seasun_default_options('seasun_display_image_page')) == '' || get_theme_mod('seasun_display_image_page', seasun_default_options('seasun_display_image_page')) == 'Display') { ?>
<?php if ( has_post_thumbnail() ) : ?>
<?php the_post_thumbnail(); ?>
<?php endif; ?>
<?php } 
} ?>