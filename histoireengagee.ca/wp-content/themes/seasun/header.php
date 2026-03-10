<?php
/**
 * The header template file.
 * @package SeaSun
 * @since SeaSun 1.0.0
*/
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" /> 
  <meta name="viewport" content="width=device-width" />  
<?php if ( ! function_exists( '_wp_render_title_tag' ) ) { ?><title><?php wp_title( '|', true, 'right' ); ?></title><?php } ?>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">  
  <!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
<?php wp_head(); ?>   
</head>
 
<body <?php body_class(); ?> id="wrapper"> 
<header id="wrapper-header">
<?php if ( !is_page_template('template-landing-page.php') ) { ?>
<?php if ( has_nav_menu( 'top-navigation' ) || get_theme_mod('seasun_header_facebook_link', seasun_default_options('seasun_header_facebook_link')) != '' || get_theme_mod('seasun_header_twitter_link', seasun_default_options('seasun_header_twitter_link')) != '' || get_theme_mod('seasun_header_google_link', seasun_default_options('seasun_header_google_link')) != '' || get_theme_mod('seasun_header_rss_link', seasun_default_options('seasun_header_rss_link')) != '' ) { ?>
  <div class="top-navigation-wrapper">
    <div class="top-navigation">
<?php if ( has_nav_menu( 'top-navigation' ) ) { wp_nav_menu( array( 'menu_id'=>'top-nav', 'theme_location'=>'top-navigation' ) ); } ?> 
<?php if (get_theme_mod('seasun_header_facebook_link', seasun_default_options('seasun_header_facebook_link')) != '' || get_theme_mod('seasun_header_twitter_link', seasun_default_options('seasun_header_twitter_link')) != '' || get_theme_mod('seasun_header_google_link', seasun_default_options('seasun_header_google_link')) != '' || get_theme_mod('seasun_header_rss_link', seasun_default_options('seasun_header_rss_link')) != '' ) { ?>    
      <div class="header-icons">
<?php if (get_theme_mod('seasun_header_facebook_link', seasun_default_options('seasun_header_facebook_link')) != ''){ ?>
        <a class="social-icon facebook-icon" href="<?php echo esc_url(get_theme_mod('seasun_header_facebook_link', seasun_default_options('seasun_header_facebook_link'))); ?>" target="_blank"></a>
<?php } ?>
<?php if (get_theme_mod('seasun_header_twitter_link', seasun_default_options('seasun_header_twitter_link')) != ''){ ?>
        <a class="social-icon twitter-icon" href="<?php echo esc_url(get_theme_mod('seasun_header_twitter_link', seasun_default_options('seasun_header_twitter_link'))); ?>" target="_blank"></a>
<?php } ?>
<?php if (get_theme_mod('seasun_header_google_link', seasun_default_options('seasun_header_google_link')) != ''){ ?>
        <a class="social-icon google-icon" href="<?php echo esc_url(get_theme_mod('seasun_header_google_link', seasun_default_options('seasun_header_google_link'))); ?>" target="_blank"></a>
<?php } ?>
<?php if (get_theme_mod('seasun_header_rss_link', seasun_default_options('seasun_header_rss_link')) != ''){ ?>
        <a class="social-icon rss-icon" href="<?php echo esc_url(get_theme_mod('seasun_header_rss_link', seasun_default_options('seasun_header_rss_link'))); ?>" target="_blank"></a>
<?php } ?>
      </div>
<?php } ?>
    </div>
  </div>
<?php }} ?>
  
  <div class="header-content-wrapper">
    <div class="header-content">
      <div class="title-box">
<?php if ( get_theme_mod('seasun_logo_url', seasun_default_options('seasun_logo_url')) == '' ) { ?>
        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></p>
<?php } else { ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="header-logo" src="<?php echo esc_url(get_theme_mod('seasun_logo_url', seasun_default_options('seasun_logo_url'))); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
<?php } ?>
      </div>
<?php if ( !is_page_template('template-landing-page.php') ) { ?>
<?php if ( has_nav_menu( 'main-navigation' ) && get_theme_mod('seasun_header_layout', seasun_default_options('seasun_header_layout')) == 'Wide' ) { ?>
      <div class="menu-box">
<?php wp_nav_menu( array( 'menu_id'=>'nav', 'theme_location'=>'main-navigation' ) ); ?>
      </div>
<?php }} ?>
    </div>
  </div>
<?php if ( !is_page_template('template-landing-page.php') ) { ?>
<?php if ( has_nav_menu( 'main-navigation' ) && get_theme_mod('seasun_header_layout', seasun_default_options('seasun_header_layout')) != 'Wide' ) { ?>
  <div class="menu-panel-wrapper">
    <div class="menu-panel">
<?php wp_nav_menu( array( 'menu_id'=>'main-nav', 'theme_location'=>'main-navigation' ) ); ?>
    </div>
  </div>
<?php }} ?>

<?php if ( is_home() || is_front_page() ) { ?>
<?php if ( get_header_image() != '' && get_theme_mod('seasun_display_header_image', seasun_default_options('seasun_display_header_image')) != 'Everywhere except Homepage' ) { ?>
  <div class="header-image">
    <img class="header-img" src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>" />
    <div class="header-image-container">
    <div class="header-image-text-wrapper">
      <div class="header-image-text">
<?php if ( get_theme_mod('seasun_header_image_headline', seasun_default_options('seasun_header_image_headline')) != '' ) { ?>
        <p class="header-image-headline"><?php echo esc_attr(get_theme_mod('seasun_header_image_headline', seasun_default_options('seasun_header_image_headline'))); ?></p>
<?php } if ( get_theme_mod('seasun_header_image_link_url', seasun_default_options('seasun_header_image_link_url')) != '' && get_theme_mod('seasun_header_image_link_text', seasun_default_options('seasun_header_image_link_text')) != '' ) { ?>
        <p class="header-image-link-wrapper"><a class="header-image-link" href="<?php echo esc_url(get_theme_mod('seasun_header_image_link_url', seasun_default_options('seasun_header_image_link_url'))); ?>"><?php echo esc_attr(get_theme_mod('seasun_header_image_link_text', seasun_default_options('seasun_header_image_link_text'))); ?></a></p>
<?php } ?>
      </div>
    </div>
    </div>
  </div>
<?php } ?>
<?php } else { ?>
<?php if ( get_header_image() != '' && get_theme_mod('seasun_display_header_image', seasun_default_options('seasun_display_header_image')) != 'Only on Homepage' ) { ?>
  <div class="header-image">
    <img class="header-img" src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>" />
  </div>
<?php }} ?>
<?php if ( is_home() && get_theme_mod('seasun_display_site_description', seasun_default_options('seasun_display_site_description')) != 'Hide' ) { ?>  
  <div class="header-description-wrapper">
    <div class="header-description">
      <h1><?php bloginfo( 'description' ); ?></h1>
    </div>
  </div>
<?php } ?>
</header> <!-- end of wrapper-header -->