<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="site-container">

<header class="site-header" role="banner">
    <div class="container">
        <div class="site-header__inner">
            <div class="site-branding">
                <button class="menu-toggle" aria-controls="mobile-navigation" aria-expanded="false" aria-label="<?php esc_attr_e( 'Menu', 'activehistory-2026' ); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
                </button>
                <div>
                    <h1 class="site-title">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="accent">Active</span>History</a>
                    </h1>
                    <p class="site-tagline"><?php bloginfo( 'description' ); ?></p>
                </div>
            </div>

            <?php if ( has_nav_menu( 'primary' ) ) : ?>
            <nav class="primary-nav" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'activehistory-2026' ); ?>">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'depth'          => 1,
                    'fallback_cb'    => false,
                ) );
                ?>
            </nav>
            <?php endif; ?>

            <div class="header-search">
                <button class="search-toggle" aria-label="<?php esc_attr_e( 'Search', 'activehistory-2026' ); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                </button>
            </div>
        </div>
    </div>

    <nav class="mobile-nav" id="mobile-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Mobile Menu', 'activehistory-2026' ); ?>">
        <div class="container">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'depth'          => 1,
                'fallback_cb'    => false,
            ) );
            ?>
        </div>
    </nav>
</header>

<!-- Search Overlay -->
<div class="search-overlay" role="search">
    <button class="search-overlay__close" aria-label="<?php esc_attr_e( 'Close search', 'activehistory-2026' ); ?>">&times;</button>
    <form class="search-overlay__form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
        <input class="search-overlay__input" type="search" name="s" placeholder="<?php esc_attr_e( 'Search articles&hellip;', 'activehistory-2026' ); ?>" value="<?php echo get_search_query(); ?>" autofocus>
    </form>
</div>

<main class="site-main" role="main">
