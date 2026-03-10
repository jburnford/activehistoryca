<?php
/**
 * Slider de entradas recientes en página principal
 * 
 * @since RubberSoul Pro 1.1
 */
?>
	<div class="slider-contenedor">
		<div id="slider-slide" class="slider-slide" >
		
		<?php
		$n_post = get_theme_mod('rubbersoul_pro_num_img_slider_front_page', 5);
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => $n_post,
			);
		
		$posts_slide = new WP_Query($args); 
		
		while ($posts_slide->have_posts()): ?>
		
			<div class="entrada">
				<?php
				$posts_slide->the_post(); ?>
				
				<a href="<?php the_permalink(); ?>">
				<?php if (has_post_thumbnail()) {
					
					the_post_thumbnail('slider-recent-posts');
					
				}else{ ?>
				
					<img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/slider-default.png" class="wp-post-image" />
					
				<?php }?>
				</a>
				
				<a href="<?php the_permalink(); ?>">
				<div class="slider-slide-post-title">
					<?php the_title(); ?>
				</div>
				</a>
			</div><!-- .entrada -->
			
		<?php endwhile ;
		
		wp_reset_postdata(); ?>
		
			<div class="slider-contenedor-nav">
				<div class="slider-nav">
				<?php
				$n = get_theme_mod('rubbersoul_pro_num_img_slider_front_page', 5);
				for ($i = 1; $i <= $n; $i++) { ?>
					<div id="slider-nav-btn-<?php echo $i-1 ;?>" class="slider-nav-btn">
						<a href="<?php echo $i-1 ;?>"><?php echo $i ;?></a>
					</div>
				<?php 
				} ?>
				</div><!-- .slider-nav -->
			</div><!-- .slider-contenedor-nav -->
		
		</div><!-- slider-slide -->
		
	</div><!-- .slider-contenedor -->