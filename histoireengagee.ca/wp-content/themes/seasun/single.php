<?php
/**
 * The post template file.
 * @package SeaSun
 * @since SeaSun 1.0.0
*/
get_header(); ?>
<div id="wrapper-content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="content-headline-wrapper">
    <div class="content-headline">
      <h1><?php the_title(); ?></h1>
<?php seasun_get_breadcrumb(); ?>
    </div>
  </div>
  <div class="container">
  <div id="main-content">
    <article id="content">
<?php seasun_get_display_image_post(); ?>
<?php if ( get_theme_mod('seasun_display_meta_post', seasun_default_options('seasun_display_meta_post')) != 'Hide' ) { ?>
      <p class="post-meta">
        <span class="post-info-author"><?php _e( 'Author: ', 'seasun' ); ?><?php the_author_posts_link(); ?></span>
        <span class="post-info-date"><?php echo get_the_date(); ?></span>
<?php if ( comments_open() ) : ?>
        <span class="post-info-comments"><a href="<?php comments_link(); ?>"><?php printf( _n( '1 Comment', '%1$s Comments', get_comments_number(), 'seasun' ), number_format_i18n( get_comments_number() ), get_the_title() ); ?></a></span>
<?php endif; ?>
      </p> 
      <div class="post-info">
        <p class="post-category"><span class="post-info-category"><?php the_category(', '); ?></span></p>
        <p class="post-tags"><?php the_tags( '<span class="post-info-tags">', ', ', '</span>' ); ?></p>
      </div>
<?php } ?>
      <div class="entry-content">
<?php the_content(); ?>
<?php edit_post_link( __( '(Edit)', 'seasun' ), '<p>', '</p>' ); ?>
<?php wp_link_pages( array( 'before' => '<p class="page-link"><span>' . __( 'Pages:', 'seasun' ) . '</span>', 'after' => '</p>' ) ); ?>
      </div>
<?php endwhile; endif; ?>
<?php if ( get_theme_mod('seasun_next_preview_post', seasun_default_options('seasun_next_preview_post')) != 'Hide' ) { ?>
<?php seasun_prev_next('seasun-post-nav'); ?>
<?php } ?> 
<?php comments_template( '', true ); ?>
    </article> <!-- end of content -->
  </div>
<?php if (get_theme_mod('seasun_display_sidebar', seasun_default_options('seasun_display_sidebar')) != 'Hide') { ?>
<?php get_sidebar(); ?>
<?php } ?>
  </div>
</div>     <!-- end of wrapper-content -->
<?php get_footer(); ?>