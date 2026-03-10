<?php
/**
 * Widget para mostrar las entradas recientes con thumbnails
 *
 * @package RubberSoul Pro
 * 
 * @since RubberSoul Pro 1.0
 */
?>
<?php

add_action ('widgets_init', 'rubbersoul_pro_recent_posts_widget');

function rubbersoul_pro_recent_posts_widget () {
	register_widget ('rubbersoul_pro_recent_posts_widget');
}

class rubbersoul_pro_recent_posts_widget extends WP_Widget {
	
	function __construct(){
		
		$widget_ops = array (
			'classname' => 'rubbersoul_pro_recent_posts_widget',
			'description' => __('Displays recent posts.', 'rubbersoul-pro')
		);
		
		parent::__construct('rubbersoul_pro_recent_posts_widget', __('(RubberSoul Pro) Recent posts', 'rubbersoul-pro'), $widget_ops);
	}
	
	function form ($instance) {
		
		$defaults = array (
			'title' => __('Recent posts', 'rubbersoul-pro'),
			'n_posts' => '3',
			'img_rec_redonda' => '',
		);
		
		$instance = wp_parse_args ( (array) $instance, $defaults);
		
		$title = $instance ['title'];
		$n_posts = $instance ['n_posts'];
		$img_rec_redonda = $instance['img_rec_redonda'];
		
		?>
        
        <p><?php _e('Title', 'rubbersoul-pro'); ?><br />
        	<input class="widefat"
            name="<?php echo $this->get_field_name('title'); ?>"
            type="text" value="<?php echo esc_attr($title); ?>" size="30" /></p>
            
        <p><?php _e('Number of posts to display', 'rubbersoul-pro'); ?>: &nbsp; 
        	<input
            name="<?php echo $this->get_field_name('n_posts'); ?>"
            type="text" value="<?php echo esc_attr($n_posts); ?>" size="3" maxlength="1"  /></p>
			
		<p>
		<input name="<?php echo $this->get_field_name('img_rec_redonda'); ?>" type="checkbox" 
		<?php echo checked($img_rec_redonda, 'on', false); ?> /> <?php _e('Rounded thumbnails', 'rubbersoul-pro'); ?>
		</p>
       
       <?php
	}
	
	function update ($new_instance, $old_instance) {
		
		$instance = $old_instance;
		$instance ['n_posts'] = sanitize_text_field ($new_instance['n_posts']);
		$instance ['title'] = sanitize_text_field ($new_instance['title']);
		$instance['img_rec_redonda'] = ( ! empty( $new_instance['img_rec_redonda'] ) ) ? strip_tags( $new_instance['img_rec_redonda'] ) : '';
		
		return $instance;
	}
	
	function widget ($args, $instance) {
		
		extract ($args);
		
		echo $before_widget;
		$title = !empty($instance['title']) ? apply_filters ('widget_title', $instance['title']) : __('Recent posts', 'rubbersoul-pro');
		$n_posts = !empty($instance['n_posts']) ? $instance['n_posts'] : '3';
		$img_rec_redonda = !empty($instance['img_rec_redonda']) ? $instance['img_rec_redonda'] : '';
		
		if (!empty($title)) { 
			echo $before_title . esc_html ($title) . $after_title;
		}
		
		$arg = array (
			'posts_per_page' => $n_posts
		);
			
		$losPosts = new WP_Query ($arg);
		if ($losPosts->have_posts()) : 
			if ($img_rec_redonda == 'on') echo "<style type='text/css'>.recent-posts-img img{border-radius:50%;}</style>";
		?>
        	<div class="recent-post">
        	<ul class="recent-posts-ul"> <?php
			while ($losPosts->have_posts()) :
				$losPosts->the_post(); ?>
                 <a href='<?php the_permalink(); ?>'>
                 	<li class="recent-posts-li">
                 		  
							<div class="recent-posts-img">       
                 			<?php if (has_post_thumbnail()) : ?>
								<?php the_post_thumbnail('latest-th-60'); ?>
                 			<?php else: ?>
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/default-60.png" />
                 			<?php endif; ?>
                            </div>
							<?php the_title(); ?>
                		
                	</li>
                </a>
           <?php endwhile; ?>
           </ul>   
           </div>         
		<?php wp_reset_postdata();
		endif;
		
		echo $after_widget;
	}
        
}
?>