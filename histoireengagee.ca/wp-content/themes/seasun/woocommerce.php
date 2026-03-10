<?php
/**
 * The WooCommerce pages template file.
 * @package SeaSun
 * @since SeaSun 1.0.0
*/
get_header(); ?>
<div id="wrapper-content">
  <div class="content-headline-wrapper">
    <div class="content-headline">
      <h1><?php if ( !is_product() ) { woocommerce_page_title(); } else { the_title(); } ?></h1>
<?php seasun_get_breadcrumb(); ?>
    </div>
  </div>
  <div class="container">
  <div id="main-content">
    <div id="content"> 
      <div class="entry-content">
<?php woocommerce_content(); ?>
      </div>
    </div> <!-- end of content -->
  </div>
<?php if (get_theme_mod('seasun_display_sidebar', seasun_default_options('seasun_display_sidebar')) != 'Hide') { ?>
<?php get_sidebar(); ?>
<?php } ?>
  </div>
</div>     <!-- end of wrapper-content -->
<?php get_footer(); ?>