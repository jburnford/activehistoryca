<?php
/**
 * Widget para suscribirse via mail (FeedBurner)
 *
 * @package RubberSoul Pro
 * 
 * @since RubberSoul Pro 1.0
 */
?>
<?php

add_action ('widgets_init', 'rubbersoul_pro_suscripcion_email_widget');

function rubbersoul_pro_suscripcion_email_widget () {
	register_widget ('rubbersoul_pro_suscripcion_email_widget');
}

class rubbersoul_pro_suscripcion_email_widget extends WP_Widget {
	
	function __construct(){
		
		$widget_ops = array (
			'classname' => 'rubbersoul_pro_suscripcion_email_widget',
			'description' => __('Email subscription form', 'rubbersoul-pro')
		);
		
		parent::__construct('rubbersoul_pro_suscripcion_email_widget', __('(RubberSoul Pro) Subscription by email', 'rubbersoul-pro'), $widget_ops);
	}
	
	function form ($instance) {
		
		$defaults = array (
			'title' => '',
			'feed' => '',
			'descripcion' => ''
		);
		
		$instance = wp_parse_args ( (array) $instance, $defaults);
		
		$title = $instance ['title'];
		$feed = $instance ['feed'];
		$descripcion = $instance ['descripcion'];
		
		?>
        <p><label><?php _e("Just to FeedBurner. Write only the name of the feed. By example, if url is 'http://feeds.feedburner.com/MiFeed' write only MiFeed.", "rubbersoul-pro"); ?></label></p>
        <p><?php _e('Title', 'rubbersoul-pro'); ?><br />
        	<input class="widgetfat"
            name="<?php echo $this->get_field_name('title'); ?>"
            type="text" value="<?php echo esc_attr($title); ?>" size="30" /></p>
            
        <p><?php _e('Feed name', 'rubbersoul-pro'); ?><br />
        	<input class="widgetfat"
            name="<?php echo $this->get_field_name('feed'); ?>"
            type="text" value="<?php echo esc_attr($feed); ?>" size="30"  /></p> 
            
        <p><?php _e('Description', 'rubbersoul-pro'); ?><br />
        	<input class="widgetfat"
            name="<?php echo $this->get_field_name('descripcion'); ?>"
            type="text" value="<?php echo esc_attr($descripcion); ?>" size="30"  /></p> 
       
       <?php
	}
	
	function update ($new_instance, $old_instance) {
		
		$instance = $old_instance;
		$instance ['feed'] = sanitize_text_field ($new_instance['feed']);
		$instance ['title'] = sanitize_text_field ($new_instance['title']);
		$instance ['descripcion'] = sanitize_text_field ($new_instance['descripcion']);
		
		return $instance;
	}
	
	function widget ($args, $instance) {
		
		extract ($args);
		
		echo $before_widget;
		
		$title = !empty($instance['title']) ? apply_filters ('widget_title', $instance['title']) : '';
		$feed = !empty($instance['feed']) ? $instance['feed'] : '';
		$descripcion  = !empty($instance['descripcion']) ? $instance['descripcion'] : '';
		
		$idioma = str_replace('-', '_', get_bloginfo('language'));
		
		if (!empty($title)) { 
			echo $before_title . esc_html ($title) . $after_title;
		}
		?>
		
		<div class="wrapper-email-subscription">
        <p style="margin-bottom:7px; margin-bottom:0.5rem;"><?php echo $descripcion; ?>
        
		<form id="form_suscribir" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $feed; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
        
        <input type="text" style="max-width:80%;margin-bottom:7px; margin-bottom:0.5rem;" name="email"  placeholder="<?php esc_attr_e( 'Your email....', 'rubbersoul-pro' ); ?>" />
        <input type="hidden" value="<?php echo $feed; ?>" name="uri"/>
        <input type="hidden" name="loc" value="<?php echo $idioma; ?>"/>
        <input id="btn-suscribir" type="submit" value="<?php _e('subscribe', 'rubbersoul-pro'); ?>" />
       
        <!--<div class="boton-suscribir" onclick="$this->document.getElementById("form_suscribir").submit()"><?php //esc_attr_e( 'subscribe', 'rubbersoul-pro' ); ?></div>-->
        </form>
        
    	</div>
        
       	<?php  echo $after_widget;
		
}
}