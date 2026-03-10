<?php
/**
 * The template for displaying Category pages
 *
 * Used to display archive-type pages for posts in a category.
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
				<h1 class="archive-title"><?php printf( __( 'Category Archives: %s', 'rubbersoul-pro' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>

			<?php if ( category_description() ) : // Show an optional category description ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
			<?php endif; ?>
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
			?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>