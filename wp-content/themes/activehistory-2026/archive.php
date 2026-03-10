<?php
/**
 * Archive template — categories, tags, dates, authors
 *
 * @package ActiveHistory_2026
 */

get_header(); ?>

<header class="archive-header">
    <div class="container">
        <div class="archive-header__label">
            <?php
            if ( is_category() ) {
                _e( 'Category', 'activehistory-2026' );
            } elseif ( is_tag() ) {
                _e( 'Tag', 'activehistory-2026' );
            } elseif ( is_author() ) {
                _e( 'Author', 'activehistory-2026' );
            } elseif ( is_date() ) {
                _e( 'Archives', 'activehistory-2026' );
            } else {
                _e( 'Archives', 'activehistory-2026' );
            }
            ?>
        </div>
        <h1 class="archive-header__title"><?php the_archive_title( '', '' ); ?></h1>
        <?php
        $description = get_the_archive_description();
        if ( $description ) : ?>
            <div class="archive-header__description"><?php echo $description; ?></div>
        <?php endif; ?>
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
