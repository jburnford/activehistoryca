<?php
/**
 * The main template file.
 * @package MaidenHair
 * @since MaidenHair 1.0.0
*/
get_header(); ?> 
<h2 class="entry-headline"><span class="entry-headline-text"><?php if(get_theme_mod('maidenhair_latest_posts_headline', maidenhair_default_options('maidenhair_latest_posts_headline')) == '') { ?><?php _e( 'Latest Posts' , 'maidenhair' ); ?><?php } else { echo esc_attr(get_theme_mod('maidenhair_latest_posts_headline', maidenhair_default_options('maidenhair_latest_posts_headline'))); } ?></span></h2> 
    <section class="home-latest-posts<?php if (get_theme_mod('maidenhair_post_entry_format', maidenhair_default_options('maidenhair_post_entry_format')) != 'One Column') { ?> js-masonry<?php } ?>">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php if (get_theme_mod('maidenhair_post_entry_format', maidenhair_default_options('maidenhair_post_entry_format')) != 'One Column') {
get_template_part( 'content', 'grid' ); } else {
get_template_part( 'content', 'archives' ); } ?>
<?php endwhile; endif; ?>
   </section>   
<?php maidenhair_content_nav( 'nav-below' ); ?>
  </div> <!-- end of content -->
<?php if (get_theme_mod('maidenhair_display_sidebar_archives', maidenhair_default_options('maidenhair_display_sidebar_archives')) == 'Display') { ?>
<?php get_sidebar(); ?>
<?php } ?>
<?php get_footer(); ?>