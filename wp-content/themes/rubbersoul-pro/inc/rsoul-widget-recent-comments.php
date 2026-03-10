<?php
/**
 * Widget para mostrar las entradas populares con thumbnails
 *
 * @since Violet Pro 1.0
 */
?>
<?php

add_action ('widgets_init', 'rubbersoul_recent_comments_widget');
function rubbersoul_recent_comments_widget () {
	register_widget ('rubbersoul_widget_recent_comments');
}

class rubbersoul_widget_recent_comments extends WP_Widget {
	
	function __construct(){
		
		$widget_ops = array (
			'classname' => 'rubbersoul_widget_recent_comments',
			'description' => __('Displays the most recent comments.', 'rubbersoul-pro')
		);
		
		parent::__construct('rubbersoul_widget_recent_comments', __('(RubberSoul) Recent comments', 'rubbersoul-pro'), $widget_ops);
	}
	
	function form ($instance) {
		
		$defaults = array (
			'title' => __('Recent comments', 'rubbersoul-pro'),
			'n_comments' => '3',
			'avatar_redondo' => '',
		);
		
		$instance = wp_parse_args ( (array) $instance, $defaults);
		
		$title = $instance ['title'];
		$n_comments = $instance ['n_comments'];
		$avatar_redondo = $instance ['avatar_redondo'];
		
		?>
        
        <p><?php _e('Title', 'rubbersoul-pro'); ?><br />
        	<input class="widefat"
            name="<?php echo $this->get_field_name('title'); ?>"
            type="text" value="<?php echo esc_attr($title); ?>" size="30" /></p>
            
        <p><?php _e('Number of comments to display', 'rubbersoul-pro'); ?>: &nbsp; 
        	<input
            name="<?php echo $this->get_field_name('n_comments'); ?>"
            type="text" value="<?php echo esc_attr($n_comments); ?>" size="3" maxlength="1"  /></p>
			
		<p>
		<input name="<?php echo $this->get_field_name('avatar_redondo'); ?>" type="checkbox" 
		<?php echo checked($avatar_redondo, 'on', false); ?> /> <?php _e('Rounded avatars', 'rubbersoul-pro'); ?>
		</p>
       
       <?php
	}
	
	function update ($new_instance, $old_instance) {
		
		$instance = $old_instance;
		$instance ['n_comments'] = sanitize_text_field ($new_instance['n_comments']);
		$instance ['title'] = sanitize_text_field ($new_instance['title']);
		$instance['avatar_redondo'] = ( ! empty( $new_instance['avatar_redondo'] ) ) ? strip_tags( $new_instance['avatar_redondo'] ) : '';
		
		return $instance;
	}
	
	function widget ($args, $instance) {
		
		extract ($args);
		
		echo $before_widget;
		
		$title = !empty($instance['title']) ? apply_filters ('widget_title', $instance['title']) : __('Recent comments', 'rubbersoul-pro');
		$n_comments = !empty($instance['n_comments']) ? $instance['n_comments'] : '3';
		$avatar_redondo = !empty($instance['avatar_redondo']) ? $instance['avatar_redondo'] : '';
		
		if (!empty($title)) { 
			echo $before_title . esc_html ($title) . $after_title;
		}
		
		// Ver la función get_comments(): https://codex.wordpress.org/Function_Reference/get_comments
		$args = array (
			'status' => 'approve',
			'number' => $n_comments,
		);
			
		$comentarios = get_comments($args);
		 ?>
        	<div class="recent-comments">
				<ul class="recent-comments-ul"> 
				<?php
				
				if ($avatar_redondo == 'on') echo "<style type='text/css'>.recent-comments-img img{border-radius:50%;}</style>";
				
				foreach($comentarios as $comentario){ 
					$id_comentario = $comentario->comment_ID;
					$autor_comentario = $comentario->comment_author;
					$autor_email = $comentario->comment_author_email;
					//$extracto_comentario = substr($comentario->comment_content, 0,60).'...';
					$id_usuario = $comentario->user_id;
					$id_post = $comentario->comment_post_ID;
					$titulo_post = get_the_title($id_post);
					$enlace_post = get_the_permalink($id_post);
				?>
					 <a href='<?php echo $enlace_post; ?>#comment-<?php echo $id_comentario; ?>'>
						<li class="recent-comments-li">
						
							<div class="recent-comments-img">
								<?php   
								$author_bio_avatar_size = apply_filters( 'rubbersoul_author_bio_avatar_size', 60 );
								echo get_avatar( $autor_email, $author_bio_avatar_size );
								?>
							</div>
							<?php echo '<i>' . $autor_comentario . '</i> ' . _x("on", "Recent comments widget", "rubbersoul-pro") . ' ' . $titulo_post; ?>
							
						</li>
					</a>
					
			   <?php } ?>
			   </ul>   
           </div>         
		<?php
		echo $after_widget;
		
	} // widget()
        
} // class
?>