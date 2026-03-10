<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, RubberSoul Pro already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @since RubberSoul Pro 1.0
 */

get_header(); ?>

	<section id="primary" class="site-content">
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php
					if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'rubbersoul-pro' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'rubbersoul-pro' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'rubbersoul-pro' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'rubbersoul-pro' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'rubbersoul-pro' ) ) . '</span>' );
					else :
						_e( 'Archives', 'rubbersoul-pro' );
					endif;
				?></h1>
			</header><!-- .archive-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/* Include the post format-specific template for the content. If you want to
				 * this in a child theme then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );

			endwhile; ?>
			
			<?php //if (rubbersoul_pro_opcion('widget_final_categoria') == 'on'): ?>
			<?php if (get_theme_mod('rubbersoul_pro_warea_final_post_en_archive') == 1): ?>
				<div class="zg-wrapper-widget-area">
					<?php if (!dynamic_sidebar ('wt-post-end')) {}?>
				</div>
			<?php endif; ?>
			
			<?php
			rubbersoul_pro_paginacion();
			//rubbersoul_pro_content_nav( 'nav-below' );
			?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>