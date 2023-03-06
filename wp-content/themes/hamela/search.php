<?php
/**
 * The template for displaying search results pages.
 *
 * @package hamela
 */

get_header();

$blog_layout = themesflat_get_opt('blog_archive_layout');
$columns = themesflat_get_opt('blog_grid_columns');
$sidebar_position = themesflat_get_opt('blog_layout');

$imgs = array(
    'blog-grid' => 'themesflat-blog-grid',
    'blog-list' => 'themesflat-blog',
);
$class_names = array(
    1 => 'blog-one-column',
    2 => 'blog-two-columns',
    3 => 'blog-three-columns',
    4 => 'blog-four-columns',
);
$main_col = 'col-lg-12';
global $themesflat_thumbnail;
$themesflat_thumbnail = $imgs[$blog_layout];
$class = array('blog-archive');
$class[] = $blog_layout;
$class[] = $class_names[$columns];
?>
    <div class="main-content">
        <div class="container">
            <div class="row <?php echo esc_attr($sidebar_position); ?>">
                <div class="<?php echo esc_attr($main_col); ?>">
                    <div class="wrap-content-area clearfix">
                        <?php if (have_posts()) : ?>
                            <div class="wrap-blog-article <?php echo esc_attr(implode(" ", $class)); ?> has-post-content">
                                <?php /* Start the Loop */ ?>
                                <?php while (have_posts()) : the_post(); ?>
                                    <?php
                                    /**
                                     * Run the loop for the search to output the results.
                                     * If you want to overload this in a child theme then include a file
                                     * called content-search.php and that will be used instead.
                                     */
                                    get_template_part('content', get_post_format());
                                    ?>
                                <?php endwhile; ?>
                            </div>
                        <?php else : ?>
                            <?php get_template_part('content', 'none'); ?>
                        <?php endif; ?>

                        <div class="clearfix w-100">
                            <?php
                            global $themesflat_paging_style, $themesflat_paging_for;
                            $themesflat_paging_for = 'blog';
                            $themesflat_paging_style = themesflat_get_opt('blog_archive_pagination_style');
                            get_template_part('tpl/pagination');
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>