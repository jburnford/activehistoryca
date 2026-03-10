<?php
/**
 * The page template file.
 * @package MaidenHair
 * @since MaidenHair 1.0.0
*/
get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="content-headline">
      <h1 class="entry-headline"><span class="entry-headline-text"><?php the_title(); ?></span></h1>
<?php maidenhair_get_breadcrumb(); ?>
    </div>
<?php maidenhair_get_display_image_page(); ?>
    <div class="entry-content">
<?php the_content(); ?>
<?php wp_link_pages( array( 'before' => '<p class="page-link"><span>' . __( 'Pages:', 'maidenhair' ) . '</span>', 'after' => '</p>' ) ); ?>
<?php edit_post_link( __( 'Edit', 'maidenhair' ), '<p class="edit-link">', '</p>' ); ?>
<?php endwhile; endif; ?>
<?php comments_template( '', true ); ?>
    </div>   
  </div> <!-- end of content -->
<?php if (get_theme_mod('maidenhair_display_sidebar', maidenhair_default_options('maidenhair_display_sidebar')) != 'Hide') { ?>
<?php get_sidebar(); ?>
<?php } ?>
<?php get_footer(); ?>