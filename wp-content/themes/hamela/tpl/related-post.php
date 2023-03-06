<?php
if (!get_theme_mod('show_related_post'))
    return;
$layout = get_theme_mod('related_post_style', 'blog-grid');
$carousel = 1;
$show_readmore = themesflat_get_opt('blog_archive_readmore');
$show_content = themesflat_get_opt('show_content');
$grid_columns = get_theme_mod('grid_columns_post_related', 2);
$readmore_text = themesflat_get_opt('blog_archive_readmore_text');
if (get_query_var('paged')) {
    $paged = get_query_var('paged');
} elseif (get_query_var('page')) {
    $paged = get_query_var('page');
} else {
    $paged = 1;
}
$args = array(
    'post_status' => 'publish',
    'post_type' => 'post',
    'paged' => $paged,
    'ignore_sticky_posts' => true,
    'posts_per_page' => themesflat_get_opt('number_related_post', 2),
    'post__not_in' => array($post->ID),
);

$tags = get_the_tags();
$categories = (array)get_the_category();

if (empty($tags) && empty($categories))
    return;

if (!empty($tags)) {
    $args['tag'] = wp_list_pluck($tags, 'slug');
}

$args['category'] = wp_list_pluck($categories, 'slug');
if ($layout != '') {
    $class[] = $layout;
}
if ($grid_columns != '') {
    $class[] = 'grid-' . $grid_columns.'-columns';
}
if ($carousel == 1) {
    $class[] = 'has-carousel';
}
global $themesflat_thumbnail;
$imgs = array(
    'blog-grid' => 'themesflat-blog-grid',
    'blog-list' => 'themesflat-blog',
);
$themesflat_thumbnail = $imgs[$layout];
?>
<div class="related-post related-posts-box">
    <div class="box-wrapper">
        <h3 class="box-title"><?php esc_html_e('Related Post', 'hamela') ?></h3>
        <div class="box-content">
            <div class="<?php echo esc_attr(implode(' ', $class)) ?>">
                <?php
                $tags = wp_get_post_tags($post->ID);
                if ($tags || $categories) {
                    $query = new WP_Query($args);
                    if ($query->have_posts()) {
                        while ($query->have_posts()) : $query->the_post(); ?>
                            <div class="item">
                                <article <?php echo esc_attr(post_class('entry')); ?>>
                                    <div class="main-post entry-border">
                                        <?php if (has_post_thumbnail()): ?>
                                            <div class="featured-post">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail($themesflat_thumbnail); ?>
                                                </a>
                                                <?php themesflat_render_meta(); ?>
                                                <div class="overlay"></div>
                                            </div>
                                        <?php endif; ?>

                                        <div class="content-post">
                                            <div class="entry-box-title clearfix">
                                                <div class="wrap-entry-title">
                                                    <?php
                                                    printf('<div class="meta-category-list">%s</div>', get_the_category_list(' '));
                                                    ?>


                                                    <h5 class="entry-title"><a href="<?php the_permalink(); ?>"
                                                                               title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                                    </h5>
                                                </div>
                                            </div><!-- /.entry-meta -->

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

                                        </div>
                                    </div>
                                </article><!-- /.entry -->
                            </div>
                        <?php
                        endwhile;
                    }
                    wp_reset_postdata();
                }
                ?>
            </div>
        </div>
    </div>
</div>


