<?php
/**
 * The search results template file.
 * @package SeaSun
 * @since SeaSun 1.0.0
*/
get_header(); ?>
<div id="wrapper-content">
<?php if ( have_posts() ) : ?>
  <div class="content-headline-wrapper">
    <div class="content-headline">
      <h1><?php printf( __( 'Search Results for: %s', 'seasun' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
<?php seasun_get_breadcrumb(); ?>
    </div>
  </div>
  <div class="container">
  <div id="main-content">
    <div id="content"> 
<p class="number-of-results"><?php _e( '<strong>Number of Results</strong>: ', 'seasun' ); ?><?php echo $wp_query->found_posts; ?></p>
      <div<?php if (get_theme_mod('seasun_post_entry_format', seasun_default_options('seasun_post_entry_format')) != 'One Column') { ?> class="js-masonry"<?php } ?>>
<?php while (have_posts()) : the_post(); ?>      
<?php if (get_theme_mod('seasun_post_entry_format', seasun_default_options('seasun_post_entry_format')) != 'One Column') {
get_template_part( 'content', 'grid' ); } else {
get_template_part( 'content', 'archives' ); } ?>
<?php endwhile; ?>
      </div>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
		<div class="navigation" role="navigation">
			<h2 class="navigation-headline section-heading"><?php _e( 'Search results navigation', 'seasun' ); ?></h2>
      <div class="nav-wrapper">
        <p class="navigation-links">
<?php $big = 999999999;
echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
  'prev_text' => __( '&larr; Previous', 'seasun' ),
	'next_text' => __( 'Next &rarr;', 'seasun' ),
	'total' => $wp_query->max_num_pages,
	'add_args' => false
) );
?>
        </p>
      </div>
		</div>
<?php endif; ?>

<?php else : ?>
  <div class="content-headline-wrapper">
    <div class="content-headline">
      <h1><?php _e( 'Nothing Found', 'seasun' ); ?></h1>
<?php seasun_get_breadcrumb(); ?>
    </div>
  </div>
  <div class="container">
  <div id="main-content">
    <div id="content">
    <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'seasun' ); ?></p><?php get_search_form(); ?>
<?php endif; ?>
    </div> <!-- end of content -->
  </div>
<?php if (get_theme_mod('seasun_display_sidebar_archives', seasun_default_options('seasun_display_sidebar_archives')) == 'Display') { ?>
<?php get_sidebar(); ?>
<?php } ?>
  </div>
</div>     <!-- end of wrapper-content -->
<?php get_footer(); ?>