<?php
/**
 * 404 template
 *
 * @package ActiveHistory_2026
 */

get_header(); ?>

<div class="error-404">
    <h1 class="error-404__title">404</h1>
    <p class="error-404__text"><?php _e( 'The page you&rsquo;re looking for doesn&rsquo;t exist.', 'activehistory-2026' ); ?></p>
    <?php get_search_form(); ?>
</div>

<?php get_footer();
