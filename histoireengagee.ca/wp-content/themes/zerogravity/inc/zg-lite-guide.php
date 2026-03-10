<?php
//Añadir menú para la guia
add_action( 'admin_menu', 'zerogravity_menu_guia' );

function zerogravity_menu_guia() {  
  	
	add_theme_page( __('ZeroGravity Guide', 'zerogravity'), '<span style="color:#DD9933;">' . __('ZeroGravity Guide', 'zerogravity') . '</span>', 'edit_theme_options', 'zerogravity_guide', 'zerogravity_mostrar_guia'); 
  
} 

//Página de presentación
function zerogravity_mostrar_guia() { 

	//Obtenemos la url actual para volver cuando cerramos el customizer
	$return = add_query_arg( array()) ;
?>

<style type="text/css">
a{text-decoration:none !important;}
.wrapper-zg {overflow:hidden; line-height:1.5; font-size: 14px; max-width:1440px; margin:0 auto;}
.col-right{background-color:#fafafa;}
.title {margin-bottom:28px;}
.img-left {float:left;}
.dash-middle {vertical-align:midlle !important;}
.changelog{max-width:700px; margin:14px auto; max-height:300px; border:1px solid #ccc; padding:0 14px; overflow:scroll;}
.icon:before, .libro:before, .estrella:before {
	content: "\f333";
	display: inline-block;
	-webkit-font-smoothing: antialiased;
	font: normal 20px/1 'dashicons';
	vertical-align: middle;
}
.libro:before {
	content: "\f331";
	display: inline-block;
	-webkit-font-smoothing: antialiased;
	font: normal 20px/1 'dashicons';
	vertical-align: middle;
	color:#729CBA;
}
.estrella:before {
	content: "\f155";
	color:#729CBA;
}
.check-title:before {
	content: "\f147";
	display: inline-block;
	-webkit-font-smoothing: antialiased;
	font: normal 40px/1 'dashicons';
	vertical-align: middle;
	/*color:#059820;*/
	color:#ffffff;
	background-color:#729CBA;
	border:1px solid #729CBA;
	border-radius:50%;
}
.pro-title:before {
	content: "\f155";
	display: inline-block;
	-webkit-font-smoothing: antialiased;
	font: normal 50px/1 'dashicons';
	vertical-align: middle;
	color:#729CBA;
}
.check-lista:before {
	content: "\f147";
	display: inline-block;
	-webkit-font-smoothing: antialiased;
	font: normal 20px/1 'dashicons';
	vertical-align: middle;
	color:#729CBA;
}
.imagen {
	background-color:#fff;
	padding:14px 0 7px 0;
	margin-bottom:14px;
	text-align:center;
}
.imagen img {
	max-width:100%;
	max-height:auto;
}
.titulo-pro {
	padding:7px;
	background-color:#729CBA;
	color:#fff;
	text-align:center;
	font-size:18px;
	font-weight:bold;
}
.ribo_rating {font-size:14px !important;}
@media screen and (min-width: 800px) {
.col-left {float:left; width: 65%; padding: 1%;}
.col-right {float:right; width: 30%; padding:1%; border-left:1px solid #DDDDDD; }
}

</style>

<div class="wrapper-zg">
	<div class="col-left">
		<div><a href="<?php echo ZEROGRAVITY_AUTHOR_URI; ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/galussothemes-logo.png" /></a></div>
		<hr />
		<h2 style="font-weight:bold;"><span class="check-title"></span> <?php _e('Thank you for choosing ZeroGravity', 'zerogravity'); ?></h1>
		
		<?php _e('ZeroGravity is a simple and light WordPress theme with a clear and neat design. Some its features are: left sidebar or right, custom theme color (blue, green, orange, red, pink, yellow or purple), custom favicon, six different Google Fonts, thumbnails rounded or squared, two widgets areas (beginning and end of posts), customization panel, fully responsive, custom header, custom background and more. Translation Ready (English and spanish integrated). Required WordPress 4.1+.', 'zerogravity'); ?>
		
		<h2><span class="libro"></span> <?php _e('ZeroGravity Quick Start Guide', 'zerogravity'); ?></h2> 
		
		<h3><span class="icon"></span> <?php _e('Important: thumbnails', 'zerogravity'); ?></h3>
			&#9679; <?php _e('For images appear on the homepage, you must set the featured image of the posts.', 'zerogravity');?>
			<br />
			&#9679; <?php _e('If ZeroGravity is not the first theme you use, you must regenerate the thumbnails of image with some free plugin as', 'zerogravity'); ?> <a href="https://wordpress.org/plugins/regenerate-thumbnails/" target="_blank">Regenerate Thumbnails</a>.
		
		<h3><span class="icon"></span>  <?php _e('Customize ZeroGravity', 'zerogravity'); ?></h3>
		<?php _e('Go to "Appearance >> Customize >> ZeroGravity Options" and set the options in the sections "ZG: Color, Favicon and Sidebar", "ZG: Top bar and social icons", "ZG: Logo in the header", "ZG: Posts and footer text", "ZG: Fonts".', 'zerogravity'); ?> <a href="customize.php?return=<?php echo $return ;?>"><?php _e('ZeroGravity Options', 'zerogravity'); ?></a>
		
		<h3><span class="icon"></span>  <?php _e('Logo in the header', 'zerogravity'); ?></h3>
		
		<div>
		<?php _e('if you choose a logo, instead full image for the header, go to the section "Logo in the header" and check the option "Header image is a logo". You can too center the logo.', 'zerogravity'); ?>
		<br />
			 <div><img style="max-width:100%; height:auto;" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/center-logo.png"  /></div>
			</div>
			
			<div style="clear:both; display:block;">
				<div style="float:left; width:46%; padding:0 2%;">
					<p><?php _e('Before to check "Header image is a logo".', 'zerogravity'); ?></p>
					<img style="max-width:100%; height:auto;" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/header-logo-no-activado.png"  />
				</div>
					
				<div style="float:left; width:46%; padding:0 2%;">
					<p><?php _e('After to check "Header image is a logo".', 'zerogravity'); ?></p>
					<img style="max-width:100%; height:auto;" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/header-logo-activado.png"  />
				</div>
				
			</div>
		
		<div><br />&nbsp;<hr /></div>
		
		<h2><span class="estrella"></span> <?php _e('Rating and Review', 'zerogravity'); ?></h2>
		<?php _e('Please, if you are happy with the theme, say it on wordpress.org and give ZeroGravity a nice review. Thank you.', 'zerogravity'); ?>
		
		<div style="text-align:center; margin-top:14px;">
		<a class="button-primary ribo_rating" href="https://wordpress.org/support/view/theme-reviews/zerogravity" target="_blank"><?php _e('Review ZeroGravity', 'zerogravity'); ?></a>
		</div>
		
	</div><!-- .col-left -->
	
	<div class="col-right">
	
		<div class="titulo-pro">ZeroGravity Pro</div>
		
		<div class="imagen">
			<div style="padding:0 5px; text-align:center;">
				<?php _e('With <strong>ZeroGravity Pro</strong> you can set up your blog with everything you need in minutes.', 'zerogravity'); ?>
				<hr />
			</div>
			
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/zerogravity-pro-responsive.png" />
		
			<div style="text-align:center; font-weight:bold;">
				<hr />
				<a href="http://demos.galussothemes.com/zerogravity-pro" target="_blank"><?php _e('Live Demo', 'zerogravity'); ?></a> | 
				<a href="<?php echo ZEROGRAVITY_AUTHOR_URI; ?>/wordpress-themes/zerogravity-pro" target="_blank"><?php _e('Buy', 'zerogravity'); ?></a> | 
				<a href="<?php echo ZEROGRAVITY_AUTHOR_URI; ?>/wordpress-themes/zerogravity" target="_blank"><?php _e('Compare with Lite Version', 'zerogravity'); ?></a>
				<hr />
			</div>
		</div><!-- .imagen -->
		
		<div style="font-size:16px; font-weight:bold; padding-bottom:5px; border-bottom:1px solid #ccc;">
			<?php _e('Features', 'zerogravity'); ?>
		</div>
		
		<ul>
			<li><span class="check-lista"></span> <a href="<?php echo ZEROGRAVITY_AUTHOR_URI; ?>/soporte/foro/zerogravity-pro"><?php _e('Forum support', 'zerogravity'); ?></a></li>
			<li><span class="check-lista"></span> <?php _e('Customizable maximum width', 'zerogravity'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Unlimited theme colors', 'zerogravity'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Light gray main menu or black', 'zerogravity'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Sidebar left or right', 'zerogravity'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Show extract or whole post on homepage and archive pages.', 'zerogravity'); ?></li>
			<li><span class="check-lista"></span> <?php _e('7 widgets areas to add AdSense code or anything else', 'zerogravity'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Easily add your Favicon', 'zerogravity'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Easily add yor Login Logo', 'zerogravity'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Available 15 differents Google fonts', 'zerogravity'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Custom widgets (Recent posts with square thumbnails or rounded, Popular posts with square thumbnails or rounded, Recent comments with square avatars or rounded, Email subscription)', 'zerogravity'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Related posts with thumbnails', 'zerogravity'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Show/Hide post meta (author, date, comments number)', 'zerogravity'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Show/Hide pages title', 'zerogravity'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Breadcrumb navigation', 'zerogravity'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Custom pagination', 'zerogravity'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Custom shortcodes (Buttons, Messages, Accordion and Tabs)', 'zerogravity'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Social networks in user profile', 'zerogravity'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Google Plus Authorship Integration', 'zerogravity'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Easily apply ZeroGravity style to bbPress, just check the option.', 'zerogravity'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Google Analytics ready, just paste the code', 'zerogravity'); ?></li>
			<li><span class="check-lista"></span> <?php _e('AddThis ready, just paste the code', 'zerogravity'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Translation Ready (.po file integrated)', 'zerogravity'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Integrated Spanish and English', 'zerogravity'); ?></li>
		</ul>
	</div>
</div><!-- .wrapper -->
<?php } ?>