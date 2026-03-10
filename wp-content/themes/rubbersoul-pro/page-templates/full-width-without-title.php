<?php
/**
 * Template Name: Full-Width Page Without Title
 *
 * @since RubberSoul Pro 1.0.1
 */

get_header(); ?>

	<div id="primary" class="site-content pagina-full-width">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
			
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<div class="entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'rubbersoul-pro' ), 'after' => '</div>' ) ); ?>
				</div><!-- .entry-content -->
				
				<footer class="entry-meta">
				<?php edit_post_link( __( 'Edit', 'rubbersoul-pro' ), '<span class="edit-link">', '</span>' ); ?>
				</footer><!-- .entry-meta -->
				
				</article><!-- #post -->
			
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>