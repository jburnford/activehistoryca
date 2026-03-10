<?php
/**
 * The category archive template file.
 * @package MaidenHair
 * @since MaidenHair 1.0.0
*/
get_header(); ?>
<?php if ( have_posts() ) : ?>   
    <div class="content-headline">
      <h1 class="entry-headline"><span class="entry-headline-text"><?php single_cat_title(); ?></span></h1>
<?php maidenhair_get_breadcrumb(); ?>
    </div>
<?php if ( category_description() ) : ?>
    <div class="archive-meta"><?php echo category_description(); ?></div>
<?php endif; ?>
    <div<?php if (get_theme_mod('maidenhair_post_entry_format', maidenhair_default_options('maidenhair_post_entry_format')) != 'One Column') { ?> class="js-masonry"<?php } ?>>
<?php while (have_posts()) : the_post(); ?>
<?php if (get_theme_mod('maidenhair_post_entry_format', maidenhair_default_options('maidenhair_post_entry_format')) != 'One Column') {
get_template_part( 'content', 'grid' ); } else {
get_template_part( 'content', 'archives' ); } ?>
<?php endwhile; endif; ?>
    </div> 
<?php maidenhair_content_nav( 'nav-below' ); ?>  
  </div> <!-- end of content -->
<?php if (get_theme_mod('maidenhair_display_sidebar_archives', maidenhair_default_options('maidenhair_display_sidebar_archives')) == 'Display') { ?>
<?php get_sidebar(); ?>
<?php } ?>
<?php get_footer(); ?>