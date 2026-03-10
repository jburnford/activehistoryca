<?php
/**
 * The WooCommerce pages template file.
 * @package MaidenHair
 * @since MaidenHair 1.0.0
*/
get_header(); ?>
    <div class="content-headline">
      <h1 class="entry-headline"><span class="entry-headline-text"><?php if ( !is_product() ) { woocommerce_page_title(); } else { the_title(); } ?></span></h1>
<?php maidenhair_get_breadcrumb(); ?>
    </div>
    <div class="entry-content">
<?php woocommerce_content(); ?>
    </div>   
  </div> <!-- end of content -->
<?php if ( is_product() ) { ?>
<?php if (get_theme_mod('maidenhair_display_sidebar', maidenhair_default_options('maidenhair_display_sidebar')) != 'Hide') { ?>
<?php get_sidebar(); ?>
<?php }} else { ?>
<?php if (get_theme_mod('maidenhair_display_sidebar_archives', maidenhair_default_options('maidenhair_display_sidebar_archives')) == 'Display') { ?>
<?php get_sidebar(); ?>
<?php }} ?>
<?php get_footer(); ?>