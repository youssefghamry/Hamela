<?php
/**
 * The template for displaying all single posts.
 *
 * @package hamela
 */

get_header();
$blog_layout_single = themesflat_get_opt('blog_layout_single');
$main_col = 'col-lg-8';
?>
    <div class="main-content">
        <div class="container">
            <div class="row justify-content-center <?php echo esc_attr($blog_layout_single); ?>">
                <div class="<?php echo esc_attr($main_col); ?>">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('content', 'single'); ?>
                        <div class="main-single">
                            <?php
                            if ('post' == get_post_type() && themesflat_get_opt('show_post_navigator') == 1):
                                themesflat_post_navigation();
                            endif;
                            ?>
                            <?php get_template_part('tpl/related-post') ?>
                            <?php if (is_user_logged_in()) : ?>
                                <?php if (get_the_author_meta('description')): ?>

                                <?php endif; ?>
                            <?php endif; ?>
                            <?php
                            // If comments are open or we have at least one comment, load up the comment template
                            if (comments_open() || get_comments_number()) :
                                comments_template();
                            endif;
                            ?>
                        </div><!-- /.main-single -->
                    <?php endwhile; // end of the loop. ?>
                </div>
                <?php
                get_sidebar();
                ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>