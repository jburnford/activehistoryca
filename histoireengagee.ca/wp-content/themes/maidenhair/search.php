<?php
/**
 * The search results template file.
 * @package MaidenHair
 * @since MaidenHair 1.0.0
*/
get_header(); ?>
<?php if ( have_posts() ) : ?>   
    <div class="content-headline">
      <h1 class="entry-headline"><span class="entry-headline-text"><?php printf( __( 'Search Results for: %s', 'maidenhair' ), '<span>' . get_search_query() . '</span>' ); ?></span></h1>
<?php maidenhair_get_breadcrumb(); ?>
    </div>
    <div class="archive-meta"><p class="number-of-results"><?php _e( 'Number of Results: ', 'maidenhair' ); ?><?php echo $wp_query->found_posts; ?></p></div>
    <div<?php if (get_theme_mod('maidenhair_post_entry_format', maidenhair_default_options('maidenhair_post_entry_format')) != 'One Column') { ?> class="js-masonry"<?php } ?>>
<?php while (have_posts()) : the_post(); ?>
<?php if (get_theme_mod('maidenhair_post_entry_format', maidenhair_default_options('maidenhair_post_entry_format')) != 'One Column') {
get_template_part( 'content', 'grid' ); } else {
get_template_part( 'content', 'archives' ); } ?>
<?php endwhile; ?>
    </div> 

<?php if ( $wp_query->max_num_pages > 1 ) : ?>
		<div class="navigation" role="navigation">
			<h2 class="navigation-headline section-heading"><?php _e( 'Search results navigation', 'maidenhair' ); ?></h2>
      <div class="nav-wrapper">
			 <p class="navigation-links">
<?php $big = 999999999;
echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
  'prev_text' => __( '&larr; Previous', 'maidenhair' ),
	'next_text' => __( 'Next &rarr;', 'maidenhair' ),
	'total' => $wp_query->max_num_pages,
	'add_args' => false
) );
?>
        </p>
      </div>
    </div>
<?php endif; ?>

<?php else : ?>
    <div class="content-headline">
      <h1 class="entry-headline"><span class="entry-headline-text"><?php _e( 'Nothing Found', 'maidenhair' ); ?></span></h1>
<?php maidenhair_get_breadcrumb(); ?>
    </div>
    <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'maidenhair' ); ?></p>
<?php endif; ?>  
  </div> <!-- end of content -->
<?php if (get_theme_mod('maidenhair_display_sidebar_archives', maidenhair_default_options('maidenhair_display_sidebar_archives')) == 'Display') { ?>
<?php get_sidebar(); ?>
<?php } ?>
<?php get_footer(); ?>