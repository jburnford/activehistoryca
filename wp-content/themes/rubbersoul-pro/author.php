<?php
/**
 * The template for displaying Author Archive pages
 *
 * Used to display archive-type pages for posts by an author.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @since RubberSoul Pro 1.0
 */

get_header(); ?>

	<section id="primary" class="site-content">
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>

			<?php
				/* Queue the first post, that way we know
				 * what author we're dealing with (if that is the case).
				 *
				 * We reset this later so we can run the loop
				 * properly with a call to rewind_posts().
				 */
				the_post();
			?>

			<header class="archive-header">
				<h1 class="archive-title"><?php printf( __( 'Author Archives: %s', 'rubbersoul-pro' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
			</header><!-- .archive-header -->

			<?php
				/* Since we called the_post() above, we need to
				 * rewind the loop back to the beginning that way
				 * we can run the loop properly, in full.
				 */
				rewind_posts();
			?>

			<?php //rubbersoul_pro_content_nav( 'nav-above' ); ?>

			<?php
			// If a user has filled out their description, show a bio on their entries.
			if ( get_the_author_meta( 'description' ) ) : ?>
			<div class="author-info">
				<div class="author-avatar">
					<?php
					/**
					 * Filter the author bio avatar size.
					 *
					 * @since RubberSoul Pro 1.0
					 *
					 * @param int $size The height and width of the avatar in pixels.
					 */
					$author_bio_avatar_size = apply_filters( 'rubbersoul_pro_author_bio_avatar_size', 90 );
					echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
					?>
				</div><!-- .author-avatar -->
				<div class="author-description">
					<h2><?php printf( __( 'About %s', 'rubbersoul-pro' ), get_the_author() ); ?></h2>
					<p><?php the_author_meta( 'description' ); ?></p>
					<div class="author-social-networks">
                        <?php if ( get_the_author_meta( 'galusso_author_gplus' ) ) { ?>
						<a href="<?php esc_url(the_author_meta( 'galusso_author_gplus' )); ?>" title="Google Plus"><i class="fa fa-google-plus fa-lg"></i></a>&nbsp;&nbsp;
						<?php } ?>
                        
                        <?php if ( get_the_author_meta( 'galusso_author_twitter' ) ) { ?>
						<a href="<?php esc_url(the_author_meta( 'galusso_author_twitter' )); ?>" title="Twitter"><i class="fa fa-twitter fa-lg"></i></a>&nbsp;&nbsp;
						<?php } ?>
                        
                        <?php if ( get_the_author_meta( 'galusso_author_facebook' ) ) { ?>
						<a href="<?php esc_url(the_author_meta( 'galusso_author_facebook' )); ?>" title="Facebook"><i class="fa fa-facebook fa-lg"></i></a>&nbsp;&nbsp;
						<?php } ?>
                        
                        <?php if ( get_the_author_meta( 'galusso_author_linkedin' ) ) { ?>
						<a href="<?php esc_url(the_author_meta( 'galusso_author_linkedin' )); ?>" title="LinkedIn"><i class="fa fa-linkedin fa-lg"></i></a>
						<?php } ?>
                        
                        </div><!-- .author-social-networks -->
				</div><!-- .author-description	-->
				
			</div><!-- .author-info -->
			<?php endif; ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
			
			<?php if (get_theme_mod('rubbersoul_pro_warea_final_post_en_archive') == 1): ?>
				<div class="zg-wrapper-widget-area">
					<?php if (!dynamic_sidebar ('wt-post-end')) {}?>
				</div>
			<?php endif; ?>
			
			<?php rubbersoul_pro_paginacion(); //rubbersoul_pro_content_nav( 'nav-below' ); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>