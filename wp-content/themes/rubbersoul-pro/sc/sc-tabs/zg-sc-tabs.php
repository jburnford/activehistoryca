<?php
/**
 * Uso
 */

/*
[zg_tabs]
[zg_tab]

Contenido

[/zg_tab][zg_tab] => IMPORTANTE!!! para que las pestañas aparezcan en línea, su apertura tiene que ir a continuación del cierre de la anterior, no en otra línea.


[/zg_tab][zg_tab]

[/zg_tab]
[/zg_tabs]
*/
 
//Tabs
add_action('wp_enqueue_scripts', 'rubbersoul_pro_enqueue_tabs');

function rubbersoul_pro_enqueue_tabs(){
	wp_enqueue_style('tabs-style', get_template_directory_uri().'/sc/sc-tabs/zg-sc-tabs.css');
	wp_enqueue_script('tabs-query', get_template_directory_uri().'/sc/sc-tabs/zg-sc-tabs.js', array('jquery'), false, false);
}

add_shortcode('galu_tabs', 'galusso_tabs');

function galusso_tabs($atts, $content = null){

	return "<div class='contenedor_tab'>
				<ul class='tabs'>
					" . do_shortcode($content)."
				</ul>
				<div id='contenidos'></div>
			</div>";
}

add_shortcode('galu_tab', 'galusso_tab');

function galusso_tab($atts, $content = null){
	
	static $n_tabs = 0;
	$n_tabs++;
	
	$args = shortcode_atts(
	array(
		'title' => 'Tab '.$n_tabs,
		),
	$atts);
	
	$tittab = $args['title'];
	
	$aux = "<li><a href='#tab$n_tabs'>$tittab</a></li>
			<div id='tab$n_tabs' class='contenido_tab'>$content</div>";
	
	return "<li><a href='#tab$n_tabs'>$tittab</a></li>
			<div id='tab$n_tabs' class='contenido_tab'>$content</div>";	
			
}
?>