<?php
/**
 * Post card for grid display
 *
 * @package ActiveHistory_2026
 */
?>

<article class="post-card">
    <a href="<?php the_permalink(); ?>" class="post-card__image <?php echo has_post_thumbnail() ? '' : 'post-card__image--placeholder'; ?>">
        <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'ah26-card' ); ?>
        <?php else : ?>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14,2 14,8 20,8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10,9 9,9 8,9"/>
            </svg>
        <?php endif; ?>
    </a>

    <div class="post-card__body">
        <?php
        $category = ah26_get_primary_category();
        if ( $category ) : ?>
            <div class="post-card__category">
                <a href="<?php echo esc_url( get_category_link( $category ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
            </div>
        <?php endif; ?>

        <h3 class="post-card__title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>

        <div class="post-card__excerpt">
            <?php the_excerpt(); ?>
        </div>

        <div class="post-card__meta">
            <?php echo esc_html( get_the_date() ); ?> &middot; <?php the_author(); ?>
        </div>
    </div>
</article>
