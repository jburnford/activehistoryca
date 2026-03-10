<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @since RubberSoul Pro 1.0
 */
?>
	</div><!-- #main .wrapper -->
	</div><!-- #page -->
	<?php
	if (get_theme_mod('rubbersoul_pro_enable_footer_widget_areas', 1) == 1): ?>
	<footer>
	<div style="background-color:#444444;">
		<div class="wrapper-widget-area-footer">
			<div class="widget-area-footer">
				<?php if (!dynamic_sidebar ('wt-pie-izquierdo')) {} ?>
			</div>
			
			<div class="widget-area-footer">
				<?php if (!dynamic_sidebar ('wt-pie-central')) {} ?>
			</div>
			
			<div class="widget-area-footer">
				<?php if (!dynamic_sidebar ('wt-pie-derecho')) {} ?>
			</div>
		</div>
	</div>
	</footer>
	<?php endif; ?>
	<hr class="hr-oscura" />
	<footer id="colophon" role="contentinfo">
	<div class="social-icon-wrapper">
			<?php if( get_theme_mod('rubbersoul_pro_twitter_url' ) !== '' ) { ?>
				<a href="<?php echo esc_url(get_theme_mod('rubbersoul_pro_twitter_url', 'https://twitter.com/' )); ?>" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a> 
			<?php } ?>
			
			<?php if( get_theme_mod('rubbersoul_pro_facebook_url' ) !== '' ) { ?>
				<a href="<?php echo esc_url(get_theme_mod('rubbersoul_pro_facebook_url', 'https://facebook.com/' )); ?>" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
			<?php } ?>
			
			<?php if( get_theme_mod('rubbersoul_pro_googleplus_url' ) !== '' ) { ?>
				<a href="<?php echo esc_url(get_theme_mod('rubbersoul_pro_googleplus_url', 'https://plus.google.com/' )); ?>" title="Google+" target="_blank"><i class="fa fa-google-plus"></i></a>
			<?php } ?>
			
			<?php if( get_theme_mod('rubbersoul_pro_linkedin_url' ) !== '' ) { ?>
		 		<a href="<?php echo esc_url(get_theme_mod('rubbersoul_pro_linkedin_url', 'https://linkedin.com/' )); ?>" title="LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a>
			<?php } ?>
			
			<?php if( get_theme_mod('rubbersoul_pro_youtube_url' ) !== '' ) { ?>
		 		<a href="<?php echo esc_url(get_theme_mod('rubbersoul_pro_youtube_url', 'https://youtube.com/' )); ?>" title="YouTube" target="_blank"><i class="fa fa-youtube"></i></a>
			<?php } ?>
			
			<?php if( get_theme_mod('rubbersoul_pro_instagram_url' ) !== '' ) { ?>
		 		<a href="<?php echo esc_url(get_theme_mod('rubbersoul_pro_instagram_url', 'http://instagram.com/' )); ?>" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
			<?php } ?>
			
			<?php if( get_theme_mod('rubbersoul_pro_pinterest_url' ) !== '' ) { ?>
		 		<a href="<?php echo esc_url(get_theme_mod('rubbersoul_pro_pinterest_url', 'https://pinterest.com/' )); ?>" title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>
			<?php } ?>
			
			<?php if( get_theme_mod('rubbersoul_pro_rss_url' ) !== '' ) { ?>
				<a class="rss" href="<?php echo esc_url(get_theme_mod('rubbersoul_pro_rss_url', 'http://wordpress.org/' )); ?>" title="Feed RSS" target="_blank"><i class="fa fa-rss"></i></a>			
			<?php } ?>
		</div><!-- .social-icon-wrapper -->
		<hr class="hr-oscura" />
		<div class="site-info">
			<div class="credits-left"><?php echo get_theme_mod('rubbersoul_pro_credits_left', 'Copyright 2015'); ?></div>
			<div class="credits-center"><?php echo get_theme_mod('rubbersoul_pro_credits_center'); ?></div>
			<div class="credits-right"><?php echo get_theme_mod('rubbersoul_pro_credits_right'); ?></div>
		</div><!-- .site-info -->
		
		<?php if (get_theme_mod('rubbersoul_pro_ocultar_creditos_tema_wp', '') == '') { ?>
			<div class="credits-blog-wp">
					Theme <a href="http://galussothemes.com/wordpress-themes/rubbersoul-pro">RubberSoul Pro</a> <?php _e('by', 'rubbersoul-pro'); ?> <a href="http://galussothemes.com">GalussoThemes</a> | 
					<?php _e('Powered by', 'rubbersoul-pro'); ?><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'rubbersoul-pro' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'rubbersoul-pro' ); ?>"> WordPress</a>
			</div><!-- .credits-blog-wp -->
		<?php } ?>
	</footer><!-- #colophon -->

	<?php
	if (get_theme_mod('rubbersoul_pro_boton_ir_arriba', 1) == 1){ ?>
		<div class="ir-arriba"><i class="fa fa-chevron-up"></i></div>
	<?php }

	wp_footer(); ?>
			
<?php if (get_theme_mod('rubbersoul_pro_enable_addthis') == 1 && get_theme_mod('rubbersoul_pro_addthis_code') != '') {
	echo get_theme_mod('rubbersoul_pro_addthis_code'); } ?>
</body>
</html>