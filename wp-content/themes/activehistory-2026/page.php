<?php
/**
 * Page template
 *
 * @package ActiveHistory_2026
 */

get_header();

while ( have_posts() ) : the_post(); ?>

<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container--narrow">
        <header class="page-header">
            <h1 class="page-header__title"><?php the_title(); ?></h1>
        </header>
    </div>

    <div class="post-content">
        <?php the_content(); ?>
    </div>
</article>

<?php
if ( comments_open() || get_comments_number() ) :
    comments_template();
endif;

endwhile;

get_footer();
