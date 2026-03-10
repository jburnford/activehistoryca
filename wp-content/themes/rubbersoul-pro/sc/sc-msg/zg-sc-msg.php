<?php
/**
 * Shortcodes de mensajes
 */
add_action('wp_enqueue_scripts', 'rubbersoul_pro_shortcode_mensajes_style');
function rubbersoul_pro_shortcode_mensajes_style(){
	wp_enqueue_style('zg-mensajes-style', get_template_directory_uri().'/sc/sc-msg/zg-sc-msg.css');
}

/****************************************
				Mensajes
****************************************/

add_shortcode('galu_msg', 'galusso_msg');
function galusso_msg($atts, $content = null) {
	/* Parametros:
	** type: info, ok, alert, error.
	** tit:
	*/
	$args = shortcode_atts(
			array(
				'type' => 'info',
				'title' => '',
				),
			$atts);
			
	$type = $args['type'];
	$tit = $args['title'];
	
	switch ($type){
		case 'info' :
			$style = "<div class='mensaje mensaje-ok'>";
			$icon = "<i class='fa fa-info'></i>&nbsp;&nbsp;";
			$border = "#DBF0E6";
			break;
		case 'ok' :
			$style = "<div class='mensaje mensaje-ok'>";
			$icon = "<i class='fa fa-check'></i>&nbsp;&nbsp;";
			$border = "#DBF0E6";
			break;
		case 'alert' :
			$style = "<div class='mensaje mensaje-alert'>";
			$icon = "<i class='fa fa-exclamation'></i>&nbsp;&nbsp;";
			$border = "#F9E8C5";
			break;
		case 'error' :
			$style = "<div class='mensaje mensaje-error'>";
			$icon = "<i class='fa fa-close'></i>&nbsp;&nbsp;";
			$border = "#F7DEE5";
			break;
	}
	
	
	if ($tit != '') {
		$tit = "<span style='display:block; padding-bottom:3px; border-bottom:1px solid $border; margin-bottom:14px; font-weight:bold;'>$icon&nbsp;$tit</span>";
	}
	
	$icon_content = ($tit == '') ? $icon : ''; 
			
	return $style . $tit . $icon_content . $content . "</div>";
}
?>