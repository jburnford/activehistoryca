<?php
/**
 * The default template for displaying content
 *
 * @since RubberSoul Pro 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<header class="entry-header">
			<?php 
			if ( is_single() ) {
				if (get_theme_mod('rubbersoul_pro_breadcrumb', 1) == 1): ?><div class="breadcrumb"><?php rubbersoul_pro_breadcrumb()?></div><?php endif;?>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php }else{ ?>
				<h2 class="entry-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h2>
			<?php }; // is_single() ?>
			
			<!-- autor, fecha y comentarios -->
            <div class='sub-title'>
				<div class="autor-fecha">
                	<?php if (get_theme_mod('rubbersoul_pro_show_autor', 1) == 1): ?>
					<i class="fa fa-user"></i> <?php rubbersoul_pro_entry_author(); endif; ?>
					
					<?php if (get_theme_mod('rubbersoul_pro_show_fecha', 1) == 1): ?>
                 	&nbsp;&nbsp;<i class="fa fa-calendar-o"></i> <?php rubbersoul_pro_entry_date(); endif; ?>
					
					<?php if (get_theme_mod('rubbersoul_pro_show_comments', 1) == 1): ?>
					&nbsp;&nbsp;<i class="fa fa-comment-o"></i> <?php comments_popup_link(); endif; ?>
               </div>
            </div><!-- .sub-title -->
			<?php if ( is_single() && get_theme_mod('rubbersoul_pro_habilitar_botones_addthis') == 1 && get_theme_mod('rubbersoul_pro_boton_addthis_bajo_titulo', 1) == 1) { ?>
				<div class="sharing-buttons-top"><?php echo get_theme_mod('rubbersoul_pro_tipo_boton', '<div class="addthis_sharing_toolbox"></div>'); ?></div>
			<?php } ;?>
				
		</header><!-- .entry-header -->
		
		<!-- Subtitle widget area -->
		<?php if (is_single()) { ?>
			<div class="zg-wrapper-widget-area">
				<?php dynamic_sidebar ('wt-sub-title'); ?>
			</div><!-- .sub-title-widget-area -->	
		<?php }?>
		

		<?php
		$donde_excerpt = get_theme_mod('rubbersoul_pro_donde_excerpt', 'home_and_archives');
		?>
		
		<?php // Extractos en home y páginas de archivo o solo en páginas de archivo
		if ( ( $donde_excerpt == 'home_and_archives' && ( is_home() || is_search() || is_category() || is_tag() || is_author() || is_archive() ) )
		|| ( ( $donde_excerpt == 'archives' && (is_search() || is_category() || is_tag() || is_author() || is_archive()) ))
		):  ?>
		
			<div class="excerpt-wrapper"><!-- Excerpt -->
				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark" >
						<div class="wrapper-excerpt-thumbnail"><?php the_post_thumbnail('excerpt-thumbnail-zg-176'); ?></div>
						</a>
				<?php endif;?>
				<?php the_excerpt(); ?>
			</div><!-- .excerpt-wrapper -->
		
		<?php // No se muestran extractos, siempre contenido completo
		else : ?>
		
			<div class="entry-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'rubbersoul-pro' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'rubbersoul-pro' ), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->
			
		<?php endif; ?>

		<footer class="entry-meta">
			<!-- Post end widget area -->
			<?php if (is_single()) : ?>
				<div class="zg-wrapper-widget-area">
					<?php if (!dynamic_sidebar ('wt-post-end')) {}?>
				</div>
				
				<?php if ( get_theme_mod('rubbersoul_pro_habilitar_botones_addthis') == 1 && get_theme_mod('rubbersoul_pro_boton_addthis_final_entrada') == 1) { ?>
				<div class="sharing-buttons-top"><?php echo get_theme_mod('rubbersoul_pro_tipo_boton', '<div class="addthis_sharing_toolbox"></div>'); ?></div>
			<?php } ;?>
			<?php endif; ?>
			
			<?php //rubbersoul_pro_entry_meta(); ?>
			<div class="entry-meta-term">
				<span class="term-icon"><i class="fa fa-folder-open"></i></span> <?php echo get_the_term_list ($post->ID,'category', '', ', ',''); ?>
				
				<?php $post_tags = get_the_term_list($post->ID,'post_tag'); 
				if ($post_tags) { ?>
				&nbsp;&nbsp;&nbsp;<span class="term-icon"><i class="fa fa-tags"></i></span> <?php echo get_the_term_list ($post->ID,'post_tag', '', ', ','');
				}?>
				
				<div style="float:right;"><?php edit_post_link( __( 'Edit', 'rubbersoul-pro' ), '<span class="edit-link">', '</span>' ); ?></div>
			</div><!-- .entry-meta-term -->
			
			<?php 
			/** Related posts */
			if ( is_single() && get_theme_mod('rubbersoul_pro_related_posts', 1) == 1) {
				get_template_part(RUBBERSOUL_PRO_TEMPLATE_PARTS. 'related-posts'); 
			} ?>
			
			<?php if ( is_singular() && get_the_author_meta( 'description' ) ) : ?>
				<div class="author-info">
					<div class="author-avatar">
						<?php
						/** This filter is documented in author.php */
						$author_bio_avatar_size = apply_filters( 'rubbersoul_pro_author_bio_avatar_size', 90 );
						echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
						?>
					</div><!-- .author-avatar -->
					<div class="author-description">
						<h2><?php printf( __( 'About %s', 'rubbersoul-pro' ), get_the_author() ); ?></h2>
						<p><?php the_author_meta( 'description' ); ?></p>
						<div class="author-link">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'rubbersoul-pro' ), get_the_author() ); ?>
							</a>
						</div><!-- .author-link	-->
						
						<div class="author-social-networks">
                        <?php if ( get_the_author_meta( 'galusso_author_gplus' ) ) { ?>
						<a href="<?php esc_url(the_author_meta( 'galusso_author_gplus' )); ?>?rel=author" title="Google Plus"><i class="fa fa-google-plus fa-lg"></i></a>&nbsp;&nbsp;
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
						
					</div><!-- .author-description -->
				</div><!-- .author-info -->
			<?php endif; ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->