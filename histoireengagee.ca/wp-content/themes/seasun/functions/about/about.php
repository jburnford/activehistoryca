<?php
/**
 * About SeaSun admin page framework.
 * @package SeaSun
 * @since SeaSun 2.0.0
*/   

add_action('admin_init', 'seasun_about_setup');
function seasun_about_setup() {
$seasun_about = array (

array( "name" => __( 'SeaSun' , 'seasun' ),
	"type" => "title"),

array( "type" => "open"),

// Start Tabs
array( "name" => "Start Tabs",
		"type" => "tabs-open",
		"icon" => "layout"),

	// Home
	array( "name" => __( '<i class="icon_house" aria-hidden="true"></i>Welcome' , 'seasun' ),
			"id" => "tab_menu_0",
			"type" => "tab",
			"icon" => "layout",
			"class" => " selected first"),

  // Get Premium
	array( "name" => __( '<i class="icon_cart" aria-hidden="true"></i>GET PREMIUM' , 'seasun' ),
			"type" => "tab",
			"id" => "tab_menu_1",
			"class" => ""),
	
array( "name" => "Close Tabs",
		"type" => "tabs-close",
		"icon" => "layout"),


array( "name" => "Start Container",
		"type" => "container-open",
		"icon" => "layout"),

array( "name" => "tab_content_0",
		"type" => "tabcontent-open",
		"display" => "block",
		"icon" => "layout"),

	// Home
	array( "name" => __( 'Welcome to SeaSun!' , 'seasun' ),
		"type" => "heading",
		"icon" => "layout"),
	
	array("name" => __( 'First of all, I would like to thank you for choosing the SeaSun theme! I firmly believe that you will be satisfied with this template.' , 'seasun' ),
		"type" => "infotext"),
	
	array( "name" => __( 'About SeaSun' , 'seasun' ),
		"type" => "heading",
		"icon" => "layout"),
	
	array("name" => __( 'SeaSun is an easily customizable WordPress multipurpose theme. It is a fully responsive theme that allows for easy viewing on any device.' , 'seasun' ),
		"type" => "infotext"),
    
	array("name" => __( 'Since version 2.0.0, the Theme Options have been moved to the <a href="customize.php">Customizer</a>.' , 'seasun' ),
		"type" => "infotext"),

  array( "name" => "tab_content_0",
		"type" => "tabcontent-close",
		"icon" => "layout"),
// Close Home

// Open Get Premium
array( "name" => "tab_content_1",
		"type" => "tabcontent-open",
		"display" => "none",
		"icon" => "layout"),

	array( "name" => __( 'Get SeaSun Premium Version' , 'seasun' ),
		"type" => "heading",
		"icon" => "layout"),
		
  array( "type" => "infotext",
		"name" => __( 'If you would like to purchase the SeaSun Premium Version, you can do so on <a href="http://themes.tomastoman.cz/downloads/seasun-premium/" target="_blank">Developers Official Website</a>.' , 'seasun' )),
    
  array( "type" => "infotext",
		"name" => __( '<strong>What the SeaSun Premium Version offers in addition?</strong><br />
    - Support for Drag-and-drop Page Builder with 40 in-built widgets for creating custom page layouts<br />
    - 7 pre-defined color schemes (Blue, Green, Orange, Pink, Purple, Red and Turquoise)<br />
    - Unlimited ability to create custom Color scheme (unlimited color settings)<br />
    - Ability to set different Header Images for the individual pages/posts<br />
    - Ability to set different Sidebars/Footers for the individual pages/posts<br />
    - Image Slideshow with 4 different templates<br />
    - Font size settings<br />
    - Post Formats support (Aside, Audio, Image, Standard, Status, Video)<br />
    - Related Posts box on the single posts<br />
    - 4 dynamic Hover effects for the Post Thumbnails (Fade, Focus, Shadow and Tilt)<br />
    - 6 Custom widgets for displaying the latest posts from the specific categories (as a Column, Grid, List, Slider, Thumbnails and by Default - One Column)<br />
    - Custom Tab Widget (displays popular posts, recent posts, comments and tags in tabbed format)<br />
    - Box-Image Custom widget (displays full-screen image sections)<br />
    - Box-Info Custom widget (displays a text box with an icon)<br />
    - Box-Presentation Custom widget (displays a text box with an image)<br />
    - Social Networking Custom widget (displays 9 social network profile links in right sidebar/footer)<br />
    - Facebook Like Box Custom widget<br />
    - Twitter Following Custom widget<br />
    - Integrated Facebook/Twitter/Google+1 share buttons on posts/pages/post entries<br />
    - Integrated automatic Sitemap generator with advanced options<br />
    - Custom Shortcodes for adding buttons, images, slideshows, tables and highlighted texts anywhere you like<br />
    - Custom Shortcode for displaying Google maps<br />
    - Custom Shortcode for displaying specific listing of posts anywhere you like<br />
    - 7 Custom Page templates<br />
    - Ability to add custom JavaScript code' , 'seasun' )),
    
  array( "name" => "tab_content_1",
		"type" => "tabcontent-close",
		"icon" => "layout"),
    
// Close Get Premium

array("name" => "Close Container",
		"type" => "container-close",
		"icon" => "layout"),

array( "type" => "close") 
); return $seasun_about; }

add_action('admin_head', 'seasun_admin_css');

function seasun_admin_css() { ?>
     
	<script language="JavaScript">
		jQuery.noConflict();
		jQuery(document).ready(function($) {
	
		$(".tabs .tab[id^=tab_menu]").click(function() {
			var curMenu=$(this);
			$(".tabs .tab[id^=tab_menu]").removeClass("selected");
			curMenu.addClass("selected");
	
			var index=curMenu.attr("id").split("tab_menu_")[1];
			$(".curvedContainer .tabcontent").css("display","none");
			$(".curvedContainer #tab_content_"+index).css("display","block");
		});
	});
	</script>

<?php }
function seasun_add_admin() {
	add_theme_page( __( 'About SeaSun' , 'seasun' ), __( 'About SeaSun' , 'seasun' ), 'edit_theme_options', 'about.php', 'seasun_admin', '', '1' );
}

function seasun_admin() {
$seasun_about = seasun_about_setup(); 
  wp_enqueue_style('seasun-framework-style', get_template_directory_uri() . '/functions/about/css.css');
  wp_enqueue_style('seasun-framework-icons', get_template_directory_uri() . '/css/elegantfont.css');
  $seasun_manualurl = get_template_directory_uri() . '/docs/documentation.html';
?>

	<div id="wrap_fm"><!-- [ Header ]-->
		<div class="header_fm">
			<div class="logo_fm"><?php _e( 'SeaSun Theme' , 'seasun' ); ?></div>
		</div>

		<!-- [ Top Menu ]-->
		<div class="top_menu_fm">
			<a target="_blank" class="doc_fm" href="<?php echo esc_url($seasun_manualurl); ?>"><?php _e( 'Documentation' , 'seasun' ); ?></a><a target="_blank" class="support_fm" href="http://themes.tomastoman.cz/support"><?php _e( 'Support' , 'seasun' ); ?></a><a target="_blank" class="premium_fm" href="http://themes.tomastoman.cz/downloads/seasun-premium/"><?php _e( 'Get Premium Version' , 'seasun' ); ?></a>
		</div>

	<?php 
	foreach ($seasun_about as $value) {
	switch ( $value['type'] ) {
	case "open":
	?> 
	<?php break; case "title": ?> 

	<!-- [ Body ]-->
	<div id="wrap_body_fm">
	<div class="tabscontainer">

	<?php break; case "close": ?> 

</div></div>
	
	<?php break; case "heading":?>
	<h1><?php echo $value['name']; ?></h1>
	
	<?php break; case "subheader":?>
	<div class="name_fm"><?php echo $value['name']; ?></div>
	
  <?php break; case "infotext":?>
	<div class="infotext"><?php echo $value['name']; ?></div>
	
	<?php break; case "paragraph":?>
	<div class="desc_fm"><small><?php echo $value['name']; ?></small></div>
  	
	<?php break; case "tabs-open":?>	
	<div class="tabs">
	
	<?php break; case "tabs-close":?>	
	</div>	
	
	<?php break; case "tab":?>	
	<div class="tab<?php echo $value['class']; ?>" id="<?php echo $value['id']; ?>">
	<div class="link"><?php echo $value['name']; ?></div>
	<div class="arrow"></div>
	</div>
 	
 	<?php break; case "container-open":?>	
	<div class="curvedContainer">
 	
 	<?php break; case "container-close":?>	
	</div>	
 	
	<?php break; case "tabcontent-open":?>	
	<div class="tabcontent" id="<?php echo $value['name']; ?>" style="display:<?php echo $value['display']; ?>" >
	
	<?php break; case "tabcontent-close":?>	
	</div>
	 	
<?php break;
}
}
?>

<?php
}
add_action('admin_menu', 'seasun_add_admin'); ?>