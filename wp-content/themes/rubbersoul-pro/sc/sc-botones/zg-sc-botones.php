<?php
/**

*/
add_action('wp_enqueue_scripts', 'rubbersoul_pro_sc_estilos_botones');
function rubbersoul_pro_sc_estilos_botones(){
	wp_enqueue_style('botones-style', get_template_directory_uri().'/sc/sc-botones/zg-sc-botones.css');
}

add_shortcode ('galu_button', 'galusso_boton');

function galusso_boton($atts, $content = null) {
	/*--------------
	** Parametros:
	** -------------
	** text
	** color: blue, green, orange, black.
	** size: small, medium, large.
	** 3d: yes, no.
	** link
	** icon: login, logout, mail, buy, download, monitor, settings, document
	** shadow:
	*/
	
	$args = shortcode_atts(
			array(
				'icon' => '',
				'text' => 'button',
				'color' => 'blue',
				'link' => '#',
				'size' => 'small',
				'3d' => 'no',
				'shadow' => '',
				),
			$atts);
	
	$text = sanitize_text_field($args['text']);
	$color = $args['color'];
	$d3 = $args['3d'];
	$icon = $args['icon'];
	$shadow = $args['shadow'];
	$size = $args['size'];
	$link = $args['link'];
	
	
	switch ($color) {
		case 'blue' :
			if ($d3 == 'yes') {
				$color = 'background:linear-gradient(#68CBEF, #2EA2CC);';
			}else{
				$color = 'background:#2EA2CC;';
			}
			break;
		case 'green' :
			if ($d3 == 'yes') {
				$color = 'background:linear-gradient(#1DC60B, #2A8E1F);';
			}else{
				$color = 'background:#2A8E1F;';
			}
			break;
			
		case 'orange' :
			if ($d3 == 'yes') {
				$color = 'background:linear-gradient(#FBA625, #F76B04);';
			}else{
				$color = 'background:#F76B04;';
			}
			break;	
			
		case 'black' :
			if ($d3 == 'yes') {
				$color = 'background:linear-gradient(#636363, #333333);';
			}else{
				$color = 'background:#333333;';
			}
			break;
		case 'gray' :
			if ($d3 == 'yes') {
				$color = 'background:linear-gradient(#f2f2f2, #E0E0E0); border:1px solid #ccc; color:#444; ';
			}else{
				$color = 'background:#f2f2f2; border:1px solid #ccc; color:#444; ';
			}
			break;
	}
	
	switch ($icon) {
		case 'download' :
			$text = "<i class='fa fa-download'></i>&nbsp;&nbsp;" . $text;
			break;
		case 'email' :
			$text = "<i class='fa fa-envelope'></i>&nbsp;&nbsp;" . $text;
			break;
		case 'login' :
			$text = "<i class='fa fa-sign-in'></i>&nbsp;&nbsp;" . $text;
			break;
		case 'logout' :
			$text = "<i class='fa fa-sign-out'></i>&nbsp;&nbsp;" . $text;
			break;
		case 'settings' :
			$text = "<i class='fa fa-gear'></i>&nbsp;&nbsp;" . $text;
			break;
		case 'buy' :
			$text = "<i class='fa fa-shopping-cart'></i>&nbsp;&nbsp;" . $text;
			break;
		case 'document' :
			$text = "<i class='fa fa-file'></i>&nbsp;&nbsp;" . $text;
			break;	
		case 'monitor' :
			$text = "<i class='fa fa-desktop'></i>&nbsp;&nbsp;" . $text;
			break;	
		case 'user' :
			$text = "<i class='fa fa-user'></i>&nbsp;&nbsp;" . $text;
			break;
		case 'support' :
			$text = "<i class='fa fa-support'></i>&nbsp;&nbsp;" . $text;
			break;
		default :
			$icon = '';
			break;
	}
	
	switch ($size) {
		case 'large' :
			$size = 'padding:14px 42px; font-size:1.5em; font-weight:bold';
			break;
		case 'medium' :
			$size = 'padding:10px 28px; font-size:1.3em; font-weight:bold';
			break;
	}

	$shadow = ($shadow != '') ? '2px 2px 2px #cccccc;' : '';
	
	return "<a class='boton-a' href='$link'><div class='botones' style='$color $size $shadow'>$text</div></a>";
	
}
?>