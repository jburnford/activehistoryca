<?php
/**
 * The 404 page (Not Found) template file.
 * @package SeaSun
 * @since SeaSun 1.0.0
*/
get_header(); ?>
<div id="wrapper-content">
  <div class="content-headline-wrapper">
    <div class="content-headline">
      <h1><?php _e( 'Nothing Found', 'seasun' ); ?></h1>
<?php seasun_get_breadcrumb(); ?>
    </div>
  </div>
  <div class="container">
  <div id="main-content">
    <div id="content"> 
      <div class="entry-content">
        <p><?php _e( 'Apologies, but no results were found for your request. Perhaps searching will help you to find a related content.', 'seasun' ); ?></p><?php get_search_form(); ?>
      </div>
    </div> <!-- end of content -->
  </div>
<?php if (get_theme_mod('seasun_display_sidebar', seasun_default_options('seasun_display_sidebar')) != 'Hide') { ?>
<?php get_sidebar(); ?>
<?php } ?>
  </div>
</div>     <!-- end of wrapper-content -->
<?php get_footer(); ?>