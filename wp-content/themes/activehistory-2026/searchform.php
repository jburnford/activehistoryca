<?php
/**
 * Search form template
 *
 * @package ActiveHistory_2026
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="screen-reader-text"><?php _e( 'Search for:', 'activehistory-2026' ); ?></span>
        <input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search&hellip;', 'activehistory-2026' ); ?>" value="<?php echo get_search_query(); ?>" name="s">
    </label>
    <button type="submit" class="search-submit"><?php _e( 'Search', 'activehistory-2026' ); ?></button>
</form>
