<?php
/**
 * Post card for grid display
 *
 * Shows image card if post has a featured image or inline image.
 * Falls back to a text-forward card with green accent border.
 *
 * @package ActiveHistory_2026
 */

$image_url    = ah26_get_post_image_url( get_the_ID(), 'ah26-card' );
$category     = ah26_get_primary_category();
$contributors = ah26_get_contributors();
?>

<?php if ( $image_url ) : ?>

<article class="post-card">
    <a href="<?php the_permalink(); ?>" class="post-card__image">
        <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
    </a>

    <div class="post-card__body">
        <?php if ( $category ) : ?>
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
            <?php if ( $contributors ) : ?>
                <span class="post-card__contributors"><?php
                    $links = array();
                    foreach ( $contributors as $c ) {
                        $links[] = '<a href="' . esc_url( get_term_link( $c ) ) . '">' . esc_html( $c->name ) . '</a>';
                    }
                    echo implode( ', ', $links );
                ?></span> &middot;
            <?php endif; ?>
            <?php echo esc_html( get_the_date() ); ?>
        </div>
    </div>
</article>

<?php else : ?>

<article class="post-card post-card--text">
    <div class="post-card__body">
        <?php if ( $category ) : ?>
            <div class="post-card__category">
                <a href="<?php echo esc_url( get_category_link( $category ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
            </div>
        <?php endif; ?>

        <h3 class="post-card__title post-card__title--large">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>

        <div class="post-card__excerpt post-card__excerpt--long">
            <?php the_excerpt(); ?>
        </div>

        <div class="post-card__meta">
            <?php if ( $contributors ) : ?>
                <span class="post-card__contributors"><?php
                    $links = array();
                    foreach ( $contributors as $c ) {
                        $links[] = '<a href="' . esc_url( get_term_link( $c ) ) . '">' . esc_html( $c->name ) . '</a>';
                    }
                    echo implode( ', ', $links );
                ?></span> &middot;
            <?php endif; ?>
            <?php echo esc_html( get_the_date() ); ?>
        </div>
    </div>
</article>

<?php endif; ?>
