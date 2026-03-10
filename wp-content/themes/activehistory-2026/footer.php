</main><!-- .site-main -->

<footer class="site-footer" role="contentinfo">
    <div class="container">
        <?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) : ?>
        <div class="footer-grid">
            <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
            <div><?php dynamic_sidebar( 'footer-1' ); ?></div>
            <?php endif; ?>
            <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
            <div><?php dynamic_sidebar( 'footer-2' ); ?></div>
            <?php endif; ?>
            <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
            <div><?php dynamic_sidebar( 'footer-3' ); ?></div>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <div class="footer-bottom">
            <div>
                &copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>.
                <?php _e( 'Posts from October 2018 onward licensed under', 'activehistory-2026' ); ?>
                <a href="https://creativecommons.org/licenses/by-nd/4.0/" target="_blank" rel="noopener">CC BY-ND 4.0</a>.
            </div>

            <?php if ( has_nav_menu( 'social' ) ) : ?>
            <div class="footer-social">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'social',
                    'container'      => false,
                    'depth'          => 1,
                    'link_before'    => '<span class="screen-reader-text">',
                    'link_after'     => '</span>',
                    'fallback_cb'    => false,
                ) );
                ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</footer>

</div><!-- .site-container -->

<?php wp_footer(); ?>
</body>
</html>
