<?php
/**
 * The 404 page (Not Found) template file.
 * @package MaidenHair
 * @since MaidenHair 1.0.0
*/
get_header(); ?>
    <div class="content-headline">
      <h1 class="entry-headline"><span class="entry-headline-text"><?php _e( 'Nothing Found', 'maidenhair' ); ?></span></h1>
<?php maidenhair_get_breadcrumb(); ?>
    </div>
    <div class="entry-content">
<p><?php _e( 'Apologies, but no results were found for your request. Perhaps searching will help you to find a related content.', 'maidenhair' ); ?></p>
    </div>   
  </div> <!-- end of content -->
<?php if (get_theme_mod('maidenhair_display_sidebar', maidenhair_default_options('maidenhair_display_sidebar')) != 'Hide') { ?>
<?php get_sidebar(); ?>
<?php } ?>
<?php get_footer(); ?>