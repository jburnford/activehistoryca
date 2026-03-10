<?php
/**
 * Template part for when no content is found
 *
 * @package ActiveHistory_2026
 */
?>

<div class="error-404">
    <h1 class="error-404__title"><?php _e( 'Nothing found', 'activehistory-2026' ); ?></h1>

    <?php if ( is_search() ) : ?>
        <p class="error-404__text"><?php _e( 'No results matched your search. Try different keywords.', 'activehistory-2026' ); ?></p>
    <?php else : ?>
        <p class="error-404__text"><?php _e( 'No posts to display.', 'activehistory-2026' ); ?></p>
    <?php endif; ?>

    <?php get_search_form(); ?>
</div>
