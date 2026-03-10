<?php
add_action ('wp_head', 'rubbersoul_pro_personalizacion_css');
function rubbersoul_pro_personalizacion_css() {
	?>
	<style type='text/css'>
	<?php 
	$color = get_theme_mod('rubbersoul_pro_color_tema', '#0098D3');
	?>
	a {color: <?php echo $color; ?>;}
	a:hover {color: <?php echo $color; ?>;}
	.social-icon-wrapper a:hover {color: <?php echo $color; ?>;}
	.prefix-widget-title {color: <?php echo $color; ?>;}
	.term-icon {color: <?php echo $color; ?>;}
	.sub-title a:hover {color:<?php echo $color; ?>;}
	.entry-content a:visited,.comment-content a:visited {color:<?php echo $color; ?>;}
	input[type="submit"] {background-color:<?php echo $color; ?> !important;}
	input[type="reset"] {background-color:<?php echo $color; ?> !important;}
	.bypostauthor cite span {background-color:<?php echo $color; ?>;}
	.wrapper-cabecera {background-color:<?php echo $color; ?>;}
	.wrapper-search-top-bar {background-color:<?php echo $color; ?>;}
	.main-navigation {background-color:<?php echo $color; ?>;}
	.entry-header .entry-title a:hover {color:<?php echo $color; ?> ;}
	.archive-header {border-left-color:<?php echo $color; ?>;}
	.main-navigation a:hover,
	.main-navigation a:focus {
		color: <?php echo $color; ?>;
	}
	.widget-area .widget a:hover {
		color: <?php echo $color; ?> !important;
	}
	footer[role="contentinfo"] a:hover {
		color: <?php echo $color; ?>;
	}
	.entry-meta a:hover {
	color: <?php echo $color; ?>;
	}
	.format-status .entry-header header a:hover {
		color: <?php echo $color; ?>;
	}
	.comments-area article header a:hover {
		color: <?php echo $color; ?>;
	}
	a.comment-reply-link:hover,
	a.comment-edit-link:hover {
		color: <?php echo $color; ?>;
	}
	.template-front-page .widget-area .widget li a:hover {
		color: <?php echo $color; ?>;
	}
	
	.currenttext, .paginacion a:hover {background-color:<?php echo $color; ?>;}
	.aside{border-left-color:<?php echo $color; ?> !important;}
	blockquote{border-left-color:<?php echo $color; ?>;}
	ul.tabs li.t-activa a {border-top-color: <?php echo $color; ?>;} 
	.slider-current-btn a {background-color:<?php echo $color; ?> !important;}
	h2.comments-title {border-left-color:<?php echo $color; ?>;}
	
	<?php if (get_theme_mod('rubbersoul_pro_cabecera_blanca', '') == 1) { ?>
		.wrapper-cabecera {
			background-color:#fff !important;
			border-bottom:1px solid <?php echo $color; ?>;
		}
		.main-navigation {background-color:#fff !important;}
		.main-navigation li a {color:#444;}
		p.site-title, .site-header h1, .site-header a, .site-header h2, p.site-description {
			color:#444 !important;
		}
		.toggle-search {color:#444;}
	<?php } ?>
	
	<?php if (get_theme_mod('rubbersoul_pro_slider_fp_forzar_ajuste_imagenes', '') == 1){ ?>
		.slider-contenedor img {
			width:100%;
			height:360px;
			height:25.71428571428571rem;
		}
	<?php } ?>
	
	<?php if (get_theme_mod('rubbersoul_pro_titulo_descripcion_no_mayus', '') == 1) { ?>
		.titulo-descripcion {
	 		text-transform:none;
		}
	<?php } ?>
	
	<?php if (get_theme_mod('rubbersoul_pro_color_excerpt_title', '') == 1) { ?>
		.entry-title a, entry-title a:visited {color:<?php echo $color; ?>;}
	<?php } ?>
	
	<?php if (get_theme_mod('rubbersoul_pro_selected_text_bg_color', '') == 1) { ?>
		::selection {background-color:<?php echo $color; ?>; color:#ffffff;}
		::-moz-selection {background-color:<?php echo $color; ?>; color:#ffffff;}
	<?php } ?>
	
	<?php if (get_theme_mod('rubbersoul_pro_desbordar_logo', 1) == 1) { ?>
		.wrapper-cabecera {height:70px; height:5rem;}
	<?php } ?>
	
	<?php if (get_theme_mod('rubbersoul_pro_ajustar_tam_logo', 1) == '') { ?>
		.header-logo {max-width:none;}
	<?php } ?>
	
	<?php if (get_theme_mod('rubbersoul_pro_transparencia_logo', '') == 1) { ?>
		.header-logo {background-color:transparent;}
	<?php } ?>
	
	<?php if (get_theme_mod('rubbersoul_pro_logo_cuadrado', '') == 1) { ?>
		.header-logo {border-radius:0;}
		.header-logo img {border-radius:0;}
	<?php } ?>
	
	<?php if (get_theme_mod('rubbersoul_pro_thumbnail_rounded', 1) == '') { ?>
		.wrapper-excerpt-thumbnail img {
	 		border-radius:0;
		}
	<?php } ?>
	
	<?php if (get_theme_mod('rubbersoul_pro_text_justify') == 1) { ?>
		.entry-content {
			text-align:justify;
		}
	<?php } ?>
		
	<?php $fuente = get_theme_mod('rubbersoul_pro_fonts', 'Open Sans'); ?>
	body.custom-font-enabled {font-family: "<?php echo $fuente; ?>", Arial, Verdana;}
	
	<?php 
	if (get_theme_mod('rubbersoul_pro_sidebar_position', 'derecha') == 'derecha') : ?>
		@media screen and (min-width: 600px) {
			#primary {float:left;}
			#secondary {float:right;}
			.site-content {
				border-left: none;
				padding-left:0;
				padding-right: 24px;
				padding-right:1.714285714285714rem;
			}
		}
		
	<?php endif; ?>
	
	@media screen and (max-width: 599px) {
		.menu-toggle, .menu-toggle:hover {
			background:<?php echo $color; ?> !important;
			color:#ffffff !important;
			width:100%;
		}
	}
	
	/* bbPress */
	<?php if (get_theme_mod('rubbersoul_pro_integrar_bbpress') == 1) { ?>
		li.bbp-header {
			background-color:<?php echo $color; ?> !important;
			color: #fff;
		}
		li.bbp-header {
		background-color: #0098D3;
		color: #fff;
		}
		.type-forum h1 {
			padding-bottom:7px;
			border-bottom:1px solid #E0E0E0;
		}
		.bbp-login-form {
			padding: 7px;
			padding: 0.5rem;
			border: 1px solid #e0e0e0;
			border-radius: 4px;
		}
		.bbp-login-form label {
			font-size: 90%;
		}
		.bbp-search-form {
			margin-bottom: 7px;
			margin-bottom: 0.5rem;
		}
		.bbp-logged-in h4 {
			font-size: 16px;
			font-size: 1.142857142857143rem;
		}
		a.logout-link {
			font-size: 14px;
			font-size: 1rem;
		}
		#subscription-toggle a, #subscription-toggle a:visited {
			color: #fff;
		}
		#favorite-toggle a, #favorite-toggle a:visited {
			color: #fff;
		}
	<?php } ; ?>
	</style>
	
<?php
}

//Google Analytics
if (get_theme_mod('rubbersoul_pro_enable_ganalytics') == 1 && get_theme_mod('rubbersoul_pro_ganalytics_code') != '') add_action('wp_head', 'rubbersoul_pro_codigo_ganalytics');
function rubbersoul_pro_codigo_ganalytics() { ?>
	<!-- Google Analytics -->
    <?php 
	echo "\n". get_theme_mod('rubbersoul_pro_ganalytics_code')."\n"; 
    ?>
    <!-- Google Analytics -->
    <?php
}

//Favicon
if (get_theme_mod('rubbersoul_pro_favicon') != '') add_action('wp_head', 'rubbersoul_pro_favicon');
function rubbersoul_pro_favicon () {
	$favicon = esc_url(get_theme_mod('rubbersoul_pro_favicon'));
	$ext = strtolower(substr($favicon, -4));
	switch ($ext) {
		case ('.ico'):
			echo "<link rel='icon' type='image/vnd.microsoft.icon' href='" . $favicon . "' />\n";
            break;
		case ('.png'):
			echo "<link rel='icon' type='image/png' href='" . $favicon . "' />\n";
            break;
		case ('.gif'):
       		echo "<link rel='icon' type='image/gif' href='" . $favicon . "' />\n";
            break;
   }
}

/**
 * Shortcodes
 */
 
// Habilitar Shortcodes en widgets de texto
if (get_theme_mod('rubbersoul_pro_enable_sc_widget_text', '') == 1) {
	add_filter( 'widget_text', 'shortcode_unautop');
	add_filter( 'widget_text', 'do_shortcode');
}

if (get_theme_mod('rubbersoul_pro_sc_tabs', '') == 1){ 
	require_once( get_template_directory() . '/sc/sc-tabs/zg-sc-tabs.php' );
}
if (get_theme_mod('rubbersoul_pro_sc_acordeon', '') == 1){
	require_once( get_template_directory() . '/sc/sc-acordeon/zg-sc-acordeon.php' );
}
if (get_theme_mod('rubbersoul_pro_sc_botones', '') == 1){
	require_once( get_template_directory() . '/sc/sc-botones/zg-sc-botones.php' );
}
if (get_theme_mod('rubbersoul_pro_sc_mensajes', '') == 1){
	require_once( get_template_directory() . '/sc/sc-msg/zg-sc-msg.php' );
}

?>