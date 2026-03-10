<?php
/**
 * The post template file.
 * @package MaidenHair
 * @since MaidenHair 1.0.0
*/
get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="content-headline">
      <h1 class="entry-headline"><span class="entry-headline-text"><?php the_title(); ?></span></h1>
<?php maidenhair_get_breadcrumb(); ?>
    </div>
<?php maidenhair_get_display_image_post(); ?>
<?php if ( get_theme_mod('maidenhair_display_meta_post', maidenhair_default_options('maidenhair_display_meta_post')) != 'Hide' ) { ?>
    <p class="post-meta">
      <span class="post-info-author"><?php _e( 'Author: ', 'maidenhair' ); ?><?php the_author_posts_link(); ?></span>
      <span class="post-info-date"><?php echo get_the_date(); ?></span>
<?php if ( comments_open() ) : ?>
      <span class="post-info-comments"><a href="<?php comments_link(); ?>"><?php printf( _n( '1 Comment', '%1$s Comments', get_comments_number(), 'maidenhair' ), number_format_i18n( get_comments_number() ), get_the_title() ); ?></a></span>
<?php endif; ?>
    </p>
    <div class="post-info">
      <p class="post-category"><span class="post-info-category"><?php the_category(', '); ?></span></p>
      <p class="post-tags"><?php the_tags( '<span class="post-info-tags">', ', ', '</span>' ); ?></p>
    </div>
<?php } ?>
    <div class="entry-content">
<?php the_content(); ?>
<?php wp_link_pages( array( 'before' => '<p class="page-link"><span>' . __( 'Pages:', 'maidenhair' ) . '</span>', 'after' => '</p>' ) ); ?>
<?php edit_post_link( __( 'Edit', 'maidenhair' ), '<p class="edit-link">', '</p>' ); ?>
<?php endwhile; endif; ?>
<?php if ( get_theme_mod('maidenhair_next_preview_post', maidenhair_default_options('maidenhair_next_preview_post')) != 'Hide' ) { ?>
<?php maidenhair_prev_next('maidenhair-post-nav'); ?>
<?php } ?>
<?php comments_template( '', true ); ?>
    </div>   
  </div> <!-- end of content -->
<?php if (get_theme_mod('maidenhair_display_sidebar', maidenhair_default_options('maidenhair_display_sidebar')) != 'Hide') { ?>
<?php get_sidebar(); ?>
<?php } ?>
<?php get_footer(); ?>