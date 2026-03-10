<?php 
/**
 * Library of Theme options functions.
 * @package MaidenHair
 * @since MaidenHair 1.0.0
*/

// Display Breadcrumb navigation
function maidenhair_get_breadcrumb() { 
		if (get_theme_mod('maidenhair_display_breadcrumb', maidenhair_default_options('maidenhair_display_breadcrumb')) != 'Hide') { ?>
<?php if (function_exists( 'bcn_display' ) && !is_front_page()){ echo '<p class="breadcrumb-navigation">'; ?><?php bcn_display(); ?><?php echo '</p>';} ?>
<?php } 
} 

// Display featured images on single posts
function maidenhair_get_display_image_post() { 
		if (get_theme_mod('maidenhair_display_image_post', maidenhair_default_options('maidenhair_display_image_post')) == '' || get_theme_mod('maidenhair_display_image_post', maidenhair_default_options('maidenhair_display_image_post')) == 'Display') { ?>
<?php if ( has_post_thumbnail() ) : ?>
<?php the_post_thumbnail(); ?>
<?php endif; ?>
<?php } 
}

// Display featured images on pages
function maidenhair_get_display_image_page() { 
		if (get_theme_mod('maidenhair_display_image_page', maidenhair_default_options('maidenhair_display_image_page')) == '' || get_theme_mod('maidenhair_display_image_page', maidenhair_default_options('maidenhair_display_image_page')) == 'Display') { ?>
<?php if ( has_post_thumbnail() ) : ?>
<?php the_post_thumbnail(); ?>
<?php endif; ?>
<?php } 
} ?>