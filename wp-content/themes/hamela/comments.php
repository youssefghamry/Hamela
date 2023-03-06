<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package hamela
 */

/*
 * Render comment list
 */
function themesflat_comments($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
    <article id="comment-<?php comment_ID(); ?>" class="comment_wrap clearfix">
        <div class="gravatar">
            <?php if ($args['avatar_size'] != 0) echo get_avatar($comment, 80); ?>
        </div>
        <div class='comment_content'>

            <footer class="comment_meta clearfix">
                <?php
                printf('<h6 class="comment_author">%s</h6>', get_comment_author_link()); ?>

                <?php
                $text = '';
                if (class_exists('WP_Post_Comment_Rating_Common')):
                    echo WP_Post_Comment_Rating_Common::wpcr_comment_text_vote($text, $comment);
                endif;
                ?>
            </footer>

            <div class='comment_text'>
                <?php comment_text() ?>
                <?php if ($comment->comment_approved == '0') : ?>
                    <span class="unapproved"><?php esc_html_e('Your comment is awaiting moderation.', 'hamela') ?></span>
                <?php endif; ?>
            </div>

            <div class="wrap_comment_reply">

                    <?php edit_comment_link(esc_html__('Repost', 'hamela'), '<div class="comment_edit"><i class="fas fa-retweet"></i>', '</div>'); ?>

                <?php if (get_comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'])))): ?>
                    <div class="comment_reply"><i class="icofont-reply-all"></i><?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                    </div>
                <?php endif; ?>

                <div class="comment_time"><i class="icofont-clock-time"></i>

                    <?php
                    echo tfl_time_ago();
                    ?>
                </div>
            </div>

        </div>
    </article>
    <?php
    }

    /*
     * If the current post is protected by a password and
     * the visitor has not yet entered the password we will
     * return early without loading the comments.
     */
    if (post_password_required()) {
        return;
    }
    ?>

    <div id="comments" class="comments-area">

        <?php if (have_comments()) : ?>
        <div class="comment-list-wrap">
            <h5 class="comment-title">
                <?php
                comments_number(esc_html__('NO COMMENT', 'hamela'), esc_html__('COMMENT (1)', 'hamela'), esc_html__('COMMENTS (%)', 'hamela'));
                ?>
            </h5>

            <ol class="comment-list">
                <?php wp_list_comments(array('callback' => 'themesflat_comments')); ?>
            </ol>

            <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
                <nav class="navigation comment-navigation" role="navigation">
                    <h5 class="screen-reader-text section-heading"><?php esc_html_e('Comment navigation', 'hamela'); ?></h5>

                    <div class="nav-previous"><?php previous_comments_link(esc_html__('&larr; Older Comments', 'hamela')); ?></div>
                    <div class="nav-next"><?php next_comments_link(esc_html__('Newer Comments &rarr;', 'hamela')); ?></div>
                </nav>
            <?php endif; ?>

            <?php if (!comments_open() && get_comments_number()) : ?>
                <p class="no-comments"><?php esc_html_e('Comments are closed.', 'hamela'); ?></p>
            <?php endif; ?>
        </div><!-- /.comment-list-wrap -->

        <?php endif; ?><!-- have_comments -->

        <?php
        if (comments_open()) {
            $commenter = wp_get_current_commenter();
            $aria_req = get_option('require_name_email') ? " aria-required='true'" : '';
            $comment_title = sprintf('%1$s', esc_html__('LEAVE A COMMENT', 'hamela'));

            $comment_args = array(
                'title_reply' => $comment_title,
                'title_reply_before' => '<h5 id="reply-title" class="comment-reply-title">',
                'title_reply_after' => '</h5> <div class="sub-title">' . esc_html__('Please Enter Your Comments ', 'hamela') . '<span class="required">*</span>  </div>',
                'id_submit' => 'comment-reply',
                'label_submit' => esc_html__('Post Comment', 'hamela'),
                'class_form' => 'clearfix',
                'submit_button' => '<div class="wrap-btn-submit"><span class="icon"><i class="fas fa-plus"></i></span><input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" /></div>',

                'fields' => apply_filters('comment_form_default_fields', array(
                    'author' => '<div class="comment_wrap_input">
								<div class="comment-left row">
									<div class="name-container col-md-6">									
										<input type="text" id="author" placeholder="' . esc_attr__('Name*', 'hamela') . '" class="tb-my-input" name="author" tabindex="1" value="' . esc_attr($commenter['comment_author']) . '" size="32"' . $aria_req . '>
									</div>',
                    'email' => '<div class="email-container col-md-6">									
										<input type="text" id="email" placeholder="' . esc_attr__('E-mail*', 'hamela') . '" class="tb-my-input" name="email" tabindex="2" value="' . esc_attr($commenter['comment_author_email']) . '" size="32"' . $aria_req . '>
									</div></div>
							</div>',
                )),
                'comment_field' => '<div class="comment-right">
									<fieldset class="message">
										<textarea id="comment-message" placeholder="' . esc_attr__('Comment*', 'hamela') . '" name="comment" rows="8" tabindex="4"></textarea>
									</fieldset>
								</div>',
                'submit_field' => ' %1$s %2$s',

                'comment_notes_after' => '',
                'comment_notes_before' => '',
            );

            comment_form($comment_args);
        }
        ?><!-- comments_open -->
    </div><!-- #comments -->
