<?php
/**
 * Search results template
 *
 * @package ActiveHistory_2026
 */

get_header(); ?>

<header class="search-results-header">
    <div class="container">
        <h1 class="search-results-header__title">
            <?php printf( __( 'Results for &ldquo;%s&rdquo;', 'activehistory-2026' ), '<span>' . get_search_query() . '</span>' ); ?>
        </h1>
    </div>
</header>

<?php if ( have_posts() ) : ?>
<section class="post-grid-section">
    <div class="container">
        <div class="post-grid">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'template-parts/post-card' ); ?>
            <?php endwhile; ?>
        </div>

        <?php ah26_pagination(); ?>
    </div>
</section>
<?php else : ?>
    <?php get_template_part( 'template-parts/content', 'none' ); ?>
<?php endif;

get_footer();
