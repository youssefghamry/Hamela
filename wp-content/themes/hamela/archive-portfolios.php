<?php
/**
 * The template for displaying archive portfolios.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package hamela
 */
get_header(); ?>
<?php
$columns = themesflat_get_opt('portfolio_grid_columns');
$orderby = themesflat_get_opt('portfolio_order_by');
$order = themesflat_get_opt('portfolio_order_direction');
$exclude = themesflat_get_opt('portfolio_exclude');

if (get_query_var('paged')) {
    $paged = get_query_var('paged');
} elseif (get_query_var('page')) {
    $paged = get_query_var('page');
} else {
    $paged = 1;
}

$args = array(
    'post_type' => 'portfolios',
    'orderby' => $orderby,
    'order' => $order,
    'paged' => $paged,
);

if (!empty($exclude)) {
    if (!is_array($exclude))
        $exclude = explode(',', $exclude);

    $args['post__not_in'] = $exclude;
}

$query = new WP_Query($args);
?>
    <div class="main-content">
        <div class="container">
            <div class="themesflat-portfolios-taxonomy">
                <div class="container-filter portfolio-items row grid-<?php echo esc_attr($columns); ?>-columns>
                    <?php
                    if ($query->have_posts()) {
                        while ($query->have_posts()) : $query->the_post();
                            global $post;
                            $id = $post->ID;
                            $termsArray = get_the_terms($id, 'portfolios_category');
                            $termsString = "";

                            if ($termsArray) {
                                foreach ($termsArray as $term) {
                                    $itemname = strtolower($term->slug);
                                    $itemname = str_replace(' ', '-', $itemname);
                                    $termsString .= $itemname . ' ';
                                }
                            }
                            ?>

                            <div class="portfolio-item <?php echo esc_attr($termsString); ?>">
                                <div class="portfolios-post portfolios-post-<?php the_ID(); ?>">
                                    <div class="featured-post">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            $themesflat_thumbnail = "themesflat-portfolios";
                                            the_post_thumbnail($themesflat_thumbnail);
                                        }
                                        ?>
                                    </div>

                                    <div class="portfolio-content">
                                        <div class="portfolio-content-inner">
                                            <div class="list-items">
                                                <div class="cat">
                                                    <?php echo the_terms(get_the_ID(), 'portfolios_category', '', ' , ', ''); ?>
                                                </div>
                                                <h5 class="entry-title">
                                                    <div class="small-detail"></div>
                                                    <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo get_the_title(); ?></a>
                                                </h5>
                                                <div class="big-detail">
                                                    <img src="<?php echo esc_url(THEMESFLAT_LINK . '/images/big-detail1.svg'); ?>" alt="<?php esc_attr_e('big detail', 'hamela'); ?>">

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                        <?php
                        endwhile;
                    } else {
                        get_template_part('template-parts/content', 'none');
                    }
                    ?>
                </div>
            </div><!-- /.themesflat-portfolios-taxonomy -->

            <div class="row">
                <div class="col-lg-12">
                    <?php
                    global $themesflat_paging_style, $themesflat_paging_for;
                    $themesflat_paging_for = 'portfolios';
                    $themesflat_paging_style = 'pager-numeric';
                    get_template_part('tpl/pagination');
                    wp_reset_postdata();
                    ?>
                </div>
            </div>

        </div>
    </div>

<?php get_footer(); ?>