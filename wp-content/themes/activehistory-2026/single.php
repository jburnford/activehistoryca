<?php
/**
 * Single post template
 *
 * @package ActiveHistory_2026
 */

get_header();

while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="post-header">
        <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'ah26-hero', array( 'class' => 'post-header__image' ) ); ?>
        <?php endif; ?>

        <div class="container--narrow">
            <div class="post-header__content">
                <?php
                $category = ah26_get_primary_category();
                if ( $category ) : ?>
                    <div class="post-header__category">
                        <a href="<?php echo esc_url( get_category_link( $category ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
                    </div>
                <?php endif; ?>

                <h1 class="post-header__title"><?php the_title(); ?></h1>

                <div class="post-header__meta">
                    <?php
                    $contributors = ah26_get_contributors();
                    if ( $contributors ) : ?>
                        <span class="post-header__contributors"><?php
                            $links = array();
                            foreach ( $contributors as $c ) {
                                $links[] = '<a href="' . esc_url( get_term_link( $c ) ) . '">' . esc_html( $c->name ) . '</a>';
                            }
                            echo implode( ', ', $links );
                        ?></span>
                    <?php endif; ?>
                    <span><?php echo esc_html( get_the_date() ); ?></span>
                    <?php if ( comments_open() || get_comments_number() ) : ?>
                        <span>
                            <a href="#comments"><?php comments_number( __( 'No comments', 'activehistory-2026' ), __( '1 comment', 'activehistory-2026' ), __( '% comments', 'activehistory-2026' ) ); ?></a>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>

    <div class="post-content">
        <?php the_content(); ?>
    </div>

    <?php
    $tags = get_the_tags();
    if ( $tags ) : ?>
    <div class="post-tags container--narrow">
        <span class="post-tags__label"><?php _e( 'Tags:', 'activehistory-2026' ); ?></span>
        <?php foreach ( $tags as $tag ) : ?>
            <a href="<?php echo esc_url( get_tag_link( $tag ) ); ?>"><?php echo esc_html( $tag->name ); ?></a>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <?php
    // Author bio omitted — real author bylines are in the post content ?>

    <?php
    // Post navigation
    $prev = get_previous_post();
    $next = get_next_post();
    if ( $prev || $next ) : ?>
    <div class="container--narrow">
        <nav class="post-nav">
            <div>
                <?php if ( $prev ) : ?>
                <a class="post-nav__link" href="<?php echo esc_url( get_permalink( $prev ) ); ?>">
                    <div class="post-nav__label">&larr; <?php _e( 'Previous', 'activehistory-2026' ); ?></div>
                    <div class="post-nav__title"><?php echo esc_html( get_the_title( $prev ) ); ?></div>
                </a>
                <?php endif; ?>
            </div>
            <div>
                <?php if ( $next ) : ?>
                <a class="post-nav__link post-nav__link--next" href="<?php echo esc_url( get_permalink( $next ) ); ?>">
                    <div class="post-nav__label"><?php _e( 'Next', 'activehistory-2026' ); ?> &rarr;</div>
                    <div class="post-nav__title"><?php echo esc_html( get_the_title( $next ) ); ?></div>
                </a>
                <?php endif; ?>
            </div>
        </nav>
    </div>
    <?php endif; ?>

</article>

<?php
// Comments
if ( comments_open() || get_comments_number() ) :
    comments_template();
endif;

endwhile;

get_footer();
