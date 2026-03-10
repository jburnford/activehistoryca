<?php
/**
 * Headerdata of Theme options.
 * @package MaidenHair
 * @since MaidenHair 1.0.0
*/  

// additional js and css
if(	!is_admin()){
function maidenhair_fonts_include () {
// Google Fonts
$bodyfont = get_theme_mod('maidenhair_body_google_fonts', maidenhair_default_options('maidenhair_body_google_fonts'));
$headingfont = get_theme_mod('maidenhair_headings_google_fonts', maidenhair_default_options('maidenhair_headings_google_fonts'));
$descriptionfont = get_theme_mod('maidenhair_description_google_fonts', maidenhair_default_options('maidenhair_description_google_fonts'));
$headlinefont = get_theme_mod('maidenhair_headline_google_fonts', maidenhair_default_options('maidenhair_headline_google_fonts'));
$postentryfont = get_theme_mod('maidenhair_postentry_google_fonts', maidenhair_default_options('maidenhair_postentry_google_fonts'));
$sidebarfont = get_theme_mod('maidenhair_sidebar_google_fonts', maidenhair_default_options('maidenhair_sidebar_google_fonts'));
$menufont = get_theme_mod('maidenhair_menu_google_fonts', maidenhair_default_options('maidenhair_menu_google_fonts'));
$topmenufont = get_theme_mod('maidenhair_top_menu_google_fonts', maidenhair_default_options('maidenhair_top_menu_google_fonts'));

$fonturl = "//fonts.googleapis.com/css?family=";

$bodyfonturl = $fonturl.$bodyfont;
$headingfonturl = $fonturl.$headingfont;
$descriptionfonturl = $fonturl.$descriptionfont;
$headlinefonturl = $fonturl.$headlinefont;
$postentryfonturl = $fonturl.$postentryfont;
$sidebarfonturl = $fonturl.$sidebarfont;
$menufonturl = $fonturl.$menufont;
$topmenufonturl = $fonturl.$topmenufont;
	// Google Fonts
     if ($bodyfont != 'default' && $bodyfont != ''){
      wp_enqueue_style('maidenhair-google-font1', $bodyfonturl); 
		 }
     if ($headingfont != 'default' && $headingfont != ''){
      wp_enqueue_style('maidenhair-google-font2', $headingfonturl);
		 }
     if ($descriptionfont != 'default' && $descriptionfont != ''){
      wp_enqueue_style('maidenhair-google-font3', $descriptionfonturl);
		 }
     if ($headlinefont != 'default' && $headlinefont != ''){
      wp_enqueue_style('maidenhair-google-font4', $headlinefonturl); 
		 }
     if ($postentryfont != 'default' && $postentryfont != ''){
      wp_enqueue_style('maidenhair-google-font5', $postentryfonturl); 
		 }
     if ($sidebarfont != 'default' && $sidebarfont != ''){
      wp_enqueue_style('maidenhair-google-font6', $sidebarfonturl);
		 }
     if ($menufont != 'default' && $menufont != ''){
      wp_enqueue_style('maidenhair-google-font8', $menufonturl);
		 }
     if ($topmenufont != 'default' && $topmenufont != ''){
      wp_enqueue_style('maidenhair-google-font9', $topmenufonturl);
		 }  
}
add_action( 'wp_enqueue_scripts', 'maidenhair_fonts_include' );
}

// Additional CSS
function maidenhair_css_include () {
	if ( get_theme_mod('maidenhair_css', maidenhair_default_options('maidenhair_css')) == 'Green (default)' ){
			wp_enqueue_style('maidenhair-style', get_stylesheet_uri());
		}

		if ( get_theme_mod('maidenhair_css', maidenhair_default_options('maidenhair_css')) == 'Orange' ){
			wp_enqueue_style('maidenhair-style-orange', get_template_directory_uri().'/css/orange.css');
		}
    
    if ( get_theme_mod('maidenhair_css', maidenhair_default_options('maidenhair_css')) == 'Red' ){
			wp_enqueue_style('maidenhair-style-red', get_template_directory_uri().'/css/red.css');
		}
    
    if ( get_theme_mod('maidenhair_layout', maidenhair_default_options('maidenhair_layout')) == 'Wide' ){
			wp_enqueue_style('maidenhair-wide-layout', get_template_directory_uri().'/css/wide-layout.css');
		}
}
add_action( 'wp_enqueue_scripts', 'maidenhair_css_include' );

// Background color - Entry headlines
function maidenhair_background_color() {
    $background_color = get_background_color();
    $layout_style = get_theme_mod('maidenhair_layout', maidenhair_default_options('maidenhair_layout')); 
		if ($background_color != '' && $layout_style == 'Wide') { ?>
		<?php _e('.entry-headline .entry-headline-text, .sidebar-headline .sidebar-headline-text { background-color: #', 'maidenhair'); ?><?php echo $background_color ?><?php _e('; }', 'maidenhair'); ?>
<?php } 
}

// Background Pattern Opacity
function maidenhair_get_background_pattern_opacity() {
    $background_pattern_opacity = get_theme_mod('maidenhair_background_pattern_opacity', maidenhair_default_options('maidenhair_background_pattern_opacity')); 
		if ($background_pattern_opacity != '' && $background_pattern_opacity != '100' && $background_pattern_opacity != 'Default') { ?>
		<?php echo '#wrapper .pattern { opacity: 0.'; ?><?php echo $background_pattern_opacity ?><?php echo '; filter: alpha(opacity='; ?><?php echo $background_pattern_opacity ?><?php echo '); }'; ?>
<?php } 
    elseif ($background_pattern_opacity == '100') { ?>
    <?php echo '#wrapper .pattern { opacity: 1; filter: alpha(opacity=100); }';
}  
} 

// Display Sidebar on Posts/Pages
function maidenhair_display_sidebar() {
    $display_sidebar = get_theme_mod('maidenhair_display_sidebar', maidenhair_default_options('maidenhair_display_sidebar')); 
		if ($display_sidebar == 'Hide') { ?>
		<?php _e('.page #container #main-content #content, .single #container #main-content #content, .error404 #container #main-content #content { width: 100%; }', 'maidenhair'); ?>
<?php } 
}

// Display Sidebar on Archives
function maidenhair_display_sidebar_archives() {
    $display_sidebar_archives = get_theme_mod('maidenhair_display_sidebar_archives', maidenhair_default_options('maidenhair_display_sidebar_archives')); 
		if ($display_sidebar_archives != 'Display') { ?>
		<?php _e('.blog #container #main-content #content, .archive #container #main-content #content, .search #container #main-content #content { width: 100%; } .archive #sidebar { display: none; }', 'maidenhair'); ?>
<?php } 
}

// Display header Search Form - header content width
function maidenhair_display_search_form() {
    $display_search_form = get_theme_mod('maidenhair_display_search_form', maidenhair_default_options('maidenhair_display_search_form')); 
		if ($display_search_form == 'Hide') { ?>
		<?php _e('#wrapper #header .header-content .site-title, #wrapper #header .header-content .site-description, #wrapper #header .header-content .header-logo { max-width: 100%; }', 'maidenhair'); ?>
<?php } 
}

// Display Meta Box on posts - post entries styling
function maidenhair_display_meta_post_entry() {
    $display_meta_post_entry = get_theme_mod('maidenhair_display_meta_post_entry', maidenhair_default_options('maidenhair_display_meta_post_entry')); 
		if ($display_meta_post_entry == 'Hide') { ?>
		<?php _e('#wrapper #main-content .post-entry .attachment-post-thumbnail { margin-bottom: 17px; } #wrapper #main-content .post-entry .post-entry-content { margin-bottom: -4px; }', 'maidenhair'); ?>
<?php } 
}

// FONTS
// Body font
function maidenhair_get_body_font() {
    $bodyfont = get_theme_mod('maidenhair_body_google_fonts', maidenhair_default_options('maidenhair_body_google_fonts'));
    if ($bodyfont != 'default' && $bodyfont != '') { ?>
    <?php _e('html body, #wrapper blockquote, #wrapper q, #wrapper #container #comments .comment, #wrapper #container #comments .comment time, #wrapper #container #commentform .form-allowed-tags, #wrapper #container #commentform p, #wrapper input, #wrapper button, #wrapper select, #wrapper #content .breadcrumb-navigation, #wrapper #main-content .post-meta { font-family: "', 'maidenhair'); ?><?php echo $bodyfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'maidenhair'); ?>
<?php } 
}

// Site title font
function maidenhair_get_headings_google_fonts() {
    $headingfont = get_theme_mod('maidenhair_headings_google_fonts', maidenhair_default_options('maidenhair_headings_google_fonts')); 
		if ($headingfont != 'default' && $headingfont != '') { ?>
		<?php _e('#wrapper #header .site-title { font-family: "', 'maidenhair'); ?><?php echo $headingfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'maidenhair'); ?>
<?php } 
}

// Site description font
function maidenhair_get_description_font() {
    $descriptionfont = get_theme_mod('maidenhair_description_google_fonts', maidenhair_default_options('maidenhair_description_google_fonts'));
    if ($descriptionfont != 'default' && $descriptionfont != '') { ?>
    <?php _e('#wrapper #header .site-description {font-family: "', 'maidenhair'); ?><?php echo $descriptionfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'maidenhair'); ?>
<?php } 
}

// Page/post headlines font
function maidenhair_get_headlines_font() {
    $headlinefont = get_theme_mod('maidenhair_headline_google_fonts', maidenhair_default_options('maidenhair_headline_google_fonts'));
    if ($headlinefont != 'default' && $headlinefont != '') { ?>
		<?php _e('#wrapper h1, #wrapper h2, #wrapper h3, #wrapper h4, #wrapper h5, #wrapper h6, #wrapper #container .navigation .section-heading, #wrapper #comments .entry-headline { font-family: "', 'maidenhair'); ?><?php echo $headlinefont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'maidenhair'); ?>
<?php } 
}

// Post entry font
function maidenhair_get_postentry_font() {
    $postentryfont = get_theme_mod('maidenhair_postentry_google_fonts', maidenhair_default_options('maidenhair_postentry_google_fonts')); 
		if ($postentryfont != 'default' && $postentryfont != '') { ?>
		<?php _e('#wrapper #main-content .post-entry .post-entry-headline, #wrapper #main-content .grid-entry .grid-entry-headline { font-family: "', 'maidenhair'); ?><?php echo $postentryfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'maidenhair'); ?>
<?php } 
}

// Sidebar and Footer widget headlines font
function maidenhair_get_sidebar_widget_font() {
    $sidebarfont = get_theme_mod('maidenhair_sidebar_google_fonts', maidenhair_default_options('maidenhair_sidebar_google_fonts'));
    if ($sidebarfont != 'default' && $sidebarfont != '') { ?>
		<?php _e('#wrapper #container #sidebar .sidebar-widget .sidebar-headline, #wrapper #wrapper-footer #footer .footer-widget .footer-headline { font-family: "', 'maidenhair'); ?><?php echo $sidebarfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'maidenhair'); ?>
<?php } 
}

// Main Header menu font
function maidenhair_get_menu_font() {
    $menufont = get_theme_mod('maidenhair_menu_google_fonts', maidenhair_default_options('maidenhair_menu_google_fonts')); 
		if ($menufont != 'default' && $menufont != '') { ?>
		<?php _e('#wrapper #header .menu-box ul li a { font-family: "', 'maidenhair'); ?><?php echo $menufont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'maidenhair'); ?>
<?php } 
}

// Top Header menu font
function maidenhair_get_top_menu_font() {
    $topmenufont = get_theme_mod('maidenhair_top_menu_google_fonts', maidenhair_default_options('maidenhair_top_menu_google_fonts')); 
		if ($topmenufont != 'default' && $topmenufont != '') { ?>
		<?php _e('#wrapper #top-navigation-wrapper .top-navigation ul li { font-family: "', 'maidenhair'); ?><?php echo $topmenufont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'maidenhair'); ?>
<?php } 
}

// User defined CSS
function maidenhair_get_own_css() {
    $own_css = get_theme_mod('maidenhair_own_css'); 
    $own_css_def = maidenhair_default_options('maidenhair_own_css');
		if ($own_css != '') { ?>
		<?php echo esc_attr($own_css); ?>
<?php } elseif ($own_css == '' && $own_css_def != '') { echo esc_attr($own_css_def); } 
}

// Display custom CSS
function maidenhair_custom_styles() { ?>
<?php echo ("<style type='text/css'>"); ?>
<?php maidenhair_get_own_css(); ?>
<?php maidenhair_background_color(); ?>
<?php maidenhair_get_background_pattern_opacity(); ?>
<?php maidenhair_display_sidebar(); ?>
<?php maidenhair_display_sidebar_archives(); ?>
<?php maidenhair_display_search_form(); ?>
<?php maidenhair_display_meta_post_entry(); ?>
<?php maidenhair_get_body_font(); ?>
<?php maidenhair_get_headings_google_fonts(); ?>
<?php maidenhair_get_description_font(); ?>
<?php maidenhair_get_headlines_font(); ?>
<?php maidenhair_get_postentry_font(); ?>
<?php maidenhair_get_sidebar_widget_font(); ?>
<?php maidenhair_get_menu_font(); ?>
<?php maidenhair_get_top_menu_font(); ?>
<?php echo ("</style>"); ?>
<?php
} 
add_action('wp_enqueue_scripts', 'maidenhair_custom_styles');	?>