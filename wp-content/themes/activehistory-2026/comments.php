<?php
/**
 * Comments template
 *
 * @package ActiveHistory_2026
 */

if ( post_password_required() ) {
    return;
}
?>

<section id="comments" class="comments-area">
    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
            $comment_count = get_comments_number();
            printf(
                _n( '%s comment', '%s comments', $comment_count, 'activehistory-2026' ),
                number_format_i18n( $comment_count )
            );
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments( array(
                'style'      => 'ol',
                'short_ping' => true,
                'avatar_size' => 40,
            ) );
            ?>
        </ol>

        <?php
        the_comments_navigation( array(
            'prev_text' => __( '&larr; Older comments', 'activehistory-2026' ),
            'next_text' => __( 'Newer comments &rarr;', 'activehistory-2026' ),
        ) );
        ?>
    <?php endif; ?>

    <?php
    comment_form( array(
        'title_reply'        => __( 'Leave a comment', 'activehistory-2026' ),
        'title_reply_to'     => __( 'Reply to %s', 'activehistory-2026' ),
        'cancel_reply_link'  => __( 'Cancel', 'activehistory-2026' ),
        'label_submit'       => __( 'Post Comment', 'activehistory-2026' ),
    ) );
    ?>
</section>
