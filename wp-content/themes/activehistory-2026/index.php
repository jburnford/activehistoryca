<?php
/**
 * Main template — homepage and fallback
 *
 * Shows the latest post as a hero, then a grid of recent posts.
 *
 * @package ActiveHistory_2026
 */

get_header();

if ( have_posts() ) :
    $post_count = 0;
    ?>

    <?php
    // First post: hero
    the_post();
    $post_count++;
    $hero_image = ah26_get_post_image_url( get_the_ID(), 'ah26-hero' );
    ?>
    <article class="hero <?php echo $hero_image ? '' : 'hero--no-image'; ?>">
        <?php if ( $hero_image ) : ?>
            <img src="<?php echo esc_url( $hero_image ); ?>" alt="<?php the_title_attribute(); ?>" class="hero__image">
        <?php endif; ?>

        <div class="hero__content">
            <?php
            $category = ah26_get_primary_category();
            if ( $category ) : ?>
                <span class="hero__category">
                    <a href="<?php echo esc_url( get_category_link( $category ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
                </span>
            <?php endif; ?>

            <h2 class="hero__title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>

            <div class="hero__meta">
                <?php echo esc_html( get_the_date() ); ?>
            </div>
        </div>
    </article>

    <?php if ( $wp_query->post_count > 1 ) : ?>
    <section class="post-grid-section">
        <div class="container">
            <h2 class="section-title"><?php _e( 'Recent Articles', 'activehistory-2026' ); ?></h2>

            <div class="post-grid">
                <?php while ( have_posts() ) : the_post(); $post_count++; ?>
                    <?php get_template_part( 'template-parts/post-card' ); ?>
                <?php endwhile; ?>
            </div>

            <?php ah26_pagination(); ?>
        </div>
    </section>
    <?php endif; ?>

<?php else : ?>
    <?php get_template_part( 'template-parts/content', 'none' ); ?>
<?php endif;

get_footer();
