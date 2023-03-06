<?php
/**
 * The template for displaying archive services.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package hamela
 */

get_header(); ?>
<?php
$columns = themesflat_get_opt('services_grid_columns');
$orderby = themesflat_get_opt('services_order_by');
$order = themesflat_get_opt('services_order_direction');
$exclude = themesflat_get_opt('services_exclude');
$class = array('services-archive');
$class[] = 'archive-' . get_post_type();
$class = apply_filters('themesflat/template/services_class', $class);
$paged = get_query_var('paged') ? intval(get_query_var('paged')) : 1;

$query_args = array(
    'post_type' => 'services',
    'orderby' => $orderby,
    'order' => $order,
    'paged' => $paged,
);

if (!empty($exclude)) {
    if (!is_array($exclude))
        $exclude = explode(',', $exclude);

    $query_args['post__not_in'] = $exclude;
}
?>
    <div class="main-content">
        <div class="container">
            <div class="themesflat-services-taxonomy">
                <div class="service-grid wrap-services-post tf-posts row grid-<?php echo esc_attr($columns); ?>-columns>
                    <?php
                    $query = new WP_Query($query_args);
                    if ($query->have_posts()) {
                        while ($query->have_posts()) : $query->the_post();
                            $id = $post->ID;
                            $termsArray = get_the_terms($id, 'services_category');
                            $termsString = "";

                            if ($termsArray) {
                                foreach ($termsArray as $term) {
                                    $itemname = strtolower($term->slug);
                                    $itemname = str_replace(' ', '-', $itemname);
                                    $termsString .= $itemname . ' ';
                                }
                            }
                            ?>
                            <div class="<?php echo esc_attr($termsString); ?> services-item">
                                <div class="service-item-inner">
                                    <div class="divider-left"></div>
                                    <div class="box-item">
                                        <!--icon-->
                                        <?php
                                            $icon = themesflat_meta('service_icon');
                                            if ($icon) echo '<div class="wrap-icon">'.wp_kses( $icon, themesflat_kses_allowed_html() ).'</div>';
                                        ?>

                                        <h6 class="title-box"><a href="<?php echo esc_url(get_permalink()); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a></h6>
                                        <div class="content-post"><?php echo get_the_excerpt(); ?></div>
                                        <a href="<?php echo esc_url(get_permalink()); ?>" class="readmore"><i class="fas fa-chevron-right"></i></a>
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
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <?php
                    global $themesflat_paging_style, $themesflat_paging_for;
                    $themesflat_paging_for = 'services';
                    $themesflat_paging_style = 'pager-numeric';
                    get_template_part('tpl/pagination');
                    wp_reset_postdata();
                    ?>
                </div>
            </div>

        </div>
    </div>

<?php get_footer(); ?>