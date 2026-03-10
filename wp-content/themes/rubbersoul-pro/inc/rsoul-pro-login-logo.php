<?php

if (get_theme_mod('rubbersoul_pro_login_logo') != '') {
	//Cambiar logo del login
	add_action('login_head', 'rubbersoul_pro_custom_login_logo');
	//Cambiar la url de destino de la imagen del logo del login
	add_filter('login_headerurl', 'rubbersoul_pro_new_login_url');
	//Cambiar el titulo del logo del login
	add_filter('login_headertitle', 'rubbersoul_pro_new_login_title');
}

function rubbersoul_pro_custom_login_logo() { 

	$url = get_theme_mod('rubbersoul_pro_login_logo');
	?>
	<style type='text/css'>
    	h1 a {
			background-image:url('<?php echo $url; ?>') !important;
			width:auto !important;
			background-size: auto auto !important;
		}
    </style>
    <?php
}

function rubbersoul_pro_new_login_url() {
	return home_url();
}

function rubbersoul_pro_new_login_title() {
	return "Volver a " . get_option('blogname');
}
?>