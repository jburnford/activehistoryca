<?php
/**
******************************************
				Acordeon
*******************************************
**/
add_action('wp_enqueue_scripts', 'rubbersoul_pro_enqueue_acordeon');

function rubbersoul_pro_enqueue_acordeon(){
	wp_enqueue_style('acordeon-style', get_template_directory_uri().'/sc/sc-acordeon/zg-sc-acordeon.css');
	wp_enqueue_script('acordeon-query', get_template_directory_uri().'/sc/sc-acordeon/zg-sc-acordeon.js', array('jquery'), false, false);
}

add_shortcode('galu_accordion', 'galusso_accordion');

function galusso_accordion($atts, $content = null){
	
	$args = shortcode_atts(
			array(
				'type' => 'horizontal',
				),
			$atts);
	
	return "<div class='acordeon'>
				<ul class='secciones'>"
				.do_shortcode($content).
				"</ul>
			</div>";
			
}

add_shortcode('galu_accordion_sec', 'galusso_accordion_secc');

function galusso_accordion_secc($atts, $content = null){
	
	static $n_sec;
	$n_sec++;
	
	$args = shortcode_atts(
			array(
				'title' => 'Secci&oacute;n ' . $n_sec,
				),
			$atts);
			
	$titsec = sanitize_text_field($args['title']);
		
	return "<li><div class='icon'></div><a href='#sec$n_sec'>$titsec</a></li>
			<div id='sec$n_sec' class='contenido_sec'>$content</div>";
			
}
?>