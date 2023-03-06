<?php
/**
 * @package hamela
 */
?>

<div class="item">
    <article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
        <div class="main-post entry-border">
            <?php get_template_part('tpl/feature-post'); ?>

            <div class="content-post">
                <!-- Blog List -->
                <?php if (themesflat_get_opt('blog_archive_layout') == 'blog-list'): ?>
                    <div class="entry-box-title clearfix">
                        <div class="wrap-entry-title">
                            <?php
                            printf('<div class="meta-category-list">%s</div>', get_the_category_list(' '));
                            if (is_singular('post')) :
                                the_title('<h1 class="entry-title">', '</h1>');
                            else :
                                the_title(sprintf('<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h4>');
                            endif;
                            ?>
                        </div><!-- /.wrap-entry-title -->
                    </div>
                <?php endif; ?>

                <!-- Blog Grid -->
                <?php if (themesflat_get_opt('blog_archive_layout') == 'blog-grid'): ?>
                    <div class="entry-box-title clearfix">
                        <div class="wrap-entry-title">
                            <?php
                            printf('<div class="meta-category-list">%s</div>', get_the_category_list(' '));
                            if (is_singular('post')) :
                                the_title('<h1 class="entry-title">', '</h1>');
                            else :
                                the_title(sprintf('<h4 class="entry-title"><a href="%s" rel="bookmark" title="%s">', esc_url(get_permalink()), get_the_title()), '</a></h4>');
                            endif;
                            ?>
                        </div><!-- /.wrap-entry-title -->
                    </div>
                <?php endif; ?>

                <?php if (themesflat_get_opt('show_content')): ?>
                    <div class="post-excerpt">
                        <?php
                        the_excerpt();
                        if (themesflat_get_opt('blog_archive_readmore')) {
                            $readmore_text = themesflat_get_opt('blog_archive_readmore_text');
                            ?>

                            <div class="tfl-button tfl-style1 tfl-align-left ">
                                <div class="tfl-content-wrapper">
                                    <a href="<?php the_permalink(); ?>">
                                        <span class="text"> <?php echo esc_html($readmore_text); ?></span>
                                        <span class="icon"><i class="fas fa-plus"></i></span>
                                    </a>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>

                    <?php
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'hamela'),
                        'after' => '</div>',
                    ));
                    ?>
                <?php endif; ?>
            </div><!-- /.entry-post -->

        </div><!-- /.main-post -->
    </article><!-- #post-## -->
</div>