<?php
/**
 * The category archive template file.
 * @package SeaSun
 * @since SeaSun 1.0.0
*/
get_header(); ?>
<div id="wrapper-content">
<?php if ( have_posts() ) : ?>
  <div class="content-headline-wrapper">
    <div class="content-headline">
      <h1><?php single_cat_title(); ?></h1>
<?php seasun_get_breadcrumb(); ?>
    </div>
  </div>
  <div class="container">
  <div id="main-content">
<?php if ( category_description() ) : ?><div class="archive-meta"><?php echo category_description(); ?></div><?php endif; ?>
    <div id="content"<?php if (get_theme_mod('seasun_post_entry_format', seasun_default_options('seasun_post_entry_format')) != 'One Column') { ?> class="js-masonry"<?php } ?>> 
<?php while (have_posts()) : the_post(); ?>      
<?php if (get_theme_mod('seasun_post_entry_format', seasun_default_options('seasun_post_entry_format')) != 'One Column') {
get_template_part( 'content', 'grid' ); } else {
get_template_part( 'content', 'archives' ); } ?>
<?php endwhile; endif; ?>
    </div> <!-- end of content -->
<?php seasun_content_nav( 'nav-below' ); ?>
  </div>
<?php if (get_theme_mod('seasun_display_sidebar_archives', seasun_default_options('seasun_display_sidebar_archives')) == 'Display') { ?>
<?php get_sidebar(); ?>
<?php } ?>
  </div>
</div>     <!-- end of wrapper-content -->
<?php get_footer(); ?>