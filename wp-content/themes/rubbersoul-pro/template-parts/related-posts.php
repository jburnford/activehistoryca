<?php 
/**
 * @since RubberSoul 1.0
 *
 * Muestra entrandas relacionadas basadas en tags
 */

if ( is_single() ) { ?>
				
	<?php
	$tags = wp_get_post_terms(get_the_ID());
	if ($tags) { ?>
	
		<?php
		$tagcount = count($tags);
		for ($i = 0; $i < $tagcount; $i++) {
			$tagIDs[$i] = $tags[$i]->term_id;
		}
		//$n = rubbersoul_pro_opcion('num_relacionadas');
		$args = array(
			'tag__in' => $tagIDs,
			'post__not_in' => array ($post->ID),
			'posts_per_page' => 4,
			'ignore_sticky_post' => 1
		);
		
		$relacionadas = new WP_Query ($args);
		if ($relacionadas->have_posts()) : ?>
			<div class="wrapper-related-posts">
				<p class="related-posts-cabecera"><span class="prefix-widget-title"><i class="fa fa-chevron-right"></i></span> <?php echo get_theme_mod('rubbersoul_pro_related_posts_title', __('Related posts...', 'rubbersoul-pro')); ?></p>
				
				<?php
					while ($relacionadas->have_posts()) :
						$relacionadas->the_post(); ?>
						<a style="background-color:#fff;" href='<?php the_permalink(); ?>'>
						
						<div class="related-posts">
							<div class="related-posts-img">
								<?php if (  function_exists('has_post_thumbnail') && has_post_thumbnail()) {
									the_post_thumbnail('related-post-th-150');
								}else{ ;?>
									<img width="150" height="150" src="<?php echo get_stylesheet_directory_uri(); ?>/img/default-150.png" class="wp-post-image" />
								<?php }?>
							</div><!-- .related-posts-img -->
							<div class="related-posts-title">
								<?php the_title(); ?>
							</div><!-- .related-posts-title -->
						</div><!-- .related-posts -->	
						
						</a>
					    
				   <?php endwhile; ?>
			</div><!-- .wrapper-related-posts -->
			
			<?php wp_reset_postdata(); ?>
			
		<?php endif; // if ($relacionadas->have_posts())?> 
	<?php } //if ($tags)
} //if ( is_single()  && vt_opcion('relacionadas') == 'on') ?>