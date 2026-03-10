<?php
/**
 * The archive template file.
 * @package MaidenHair
 * @since MaidenHair 1.0.0
*/
get_header(); ?>
<?php if ( have_posts() ) : ?>   
    <div class="content-headline">
      <h1 class="entry-headline"><span class="entry-headline-text"><?php if ( is_day() ) :
						printf( __( 'Daily Archive: %s', 'maidenhair' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archive: %s', 'maidenhair' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'maidenhair' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archive: %s', 'maidenhair' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'maidenhair' ) ) . '</span>' );
					else :
						_e( 'Archive', 'maidenhair' );
					endif ;?></span></h1>
<?php maidenhair_get_breadcrumb(); ?>
    </div>
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