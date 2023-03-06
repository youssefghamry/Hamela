<?php

use Elementor\Utils;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$query_args = tfl_get_query_args('portfolios', 'portfolios_category', $settings);

// The Query
$post_list_query = new \WP_Query($query_args);

$show_filter = '';
if ($settings['show_filter'] == 'yes') {
    $show_filter = 'show_filter_portfolio';
}

echo '<div class="tfl-portfolios-grid '.$show_filter.'">';

if ($settings['show_filter'] == 'yes'):
    $filter_category_order = $settings['filter_category_order'];
    $filters = wp_list_pluck( get_terms( 'portfolios_category','hide_empty=1'), 'name','slug' );
    echo '<ul class="portfolio-filter"><li class="active"><a data-filter="*" href="#">' . esc_html__( 'All', 'themesflat-elementor' ) . '</a></li>'; 
    if ($filter_category_order == '') { 

        foreach ($filters as $key => $value) {
            echo '<li><a data-filter=".' . esc_attr( strtolower($key)) . '" href="#" title="' . esc_attr( $value ) . '">' . esc_html( $value ) . '</a></li>'; 
        }
    
    }
    else {
        $filter_category_order = explode(",", $filter_category_order);
        foreach ($filter_category_order as $key) {
            $key = trim($key);
            echo '<li><a data-filter=".' . esc_attr( strtolower($key)) . '" href="#" title="' . esc_attr( $filters[$key] ) . '">' . esc_html( $filters[$key] ) . '</a></li>'; 
        }
    }
    echo '</ul>';
endif;

if (!empty($settings['tfl_title'])):
    echo '<' . $settings['tfl_title_tag'] . ' class="section-title mb-5 ' . $settings['tfl_align'] . '">';
    echo $settings['tfl_title'];
    echo '</' . $settings['tfl_title_tag'] . '>';
endif;

echo '<div class="portfolio-items grid-' . $settings['columns'] . '-columns">';
while ($post_list_query->have_posts()) :
    $post_list_query->the_post();

    global $post;
    $id = $post->ID;
    $termsArray = get_the_terms( $id, 'portfolios_category' );
    $termsString = "";

    if ( $termsArray ) {
        foreach ( $termsArray as $term ) {
            $itemname = strtolower( $term->slug ); 
            $itemname = str_replace( ' ', '-', $itemname );
            $termsString .= $itemname.' ';
        }
    }

    ?>
    <div class="portfolio-item <?php echo esc_attr( $termsString ); ?>">
        <?php
        $themesflat_thumbnail = $settings['portfolio_thumbnail_size'];
        if ($settings['portfolio_thumbnail_size'] == 'custom') {
            $size = array_values($settings['thumbnail_custom_dimension']);
        } else {
            $size = $themesflat_thumbnail;
        }
        $feature_post = get_the_post_thumbnail(get_the_ID(), $size);
        if ($feature_post && ($settings['show_thumb'] == 'yes')) echo '<div class="featured-post">' . $feature_post . '</div>';
        ?>
        <div class="portfolio-content <?php if ($settings['show_thumb'] != 'yes') echo 'no-thumbnail'; ?>">
            <div class="portfolio-content-inner">
                <div class="list-items">


                    <?php if ($settings['show_category'] == 'yes'): ?>
                        <div class="cat">
                            <?php echo the_terms(get_the_ID(), 'portfolios_category', '', ' , ', ''); ?>
                        </div>
                    <?php endif; ?>

                    <h5 class="entry-title">
                        <span class="small-detail"></span>
                        <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_attr(get_the_title()); ?>
                        </a>
                    </h5>


                    <?php if ($settings['show_right_detail'] == 'yes'): ?>
                        <div class="big-detail">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/big-detail1.svg"
                                 alt="<?php esc_attr_e('big detail', 'tfl'); ?>">
                        </div>
                    <?php endif; ?>


                </div>
            </div>
        </div>

    </div>

<?php
endwhile;
echo '</div>'; // end .wrap-blog-article

echo '</div>'; // end .tfl-portfolios-grid

wp_reset_postdata();

$themesflat_paging_for = 'portfolios';
$paged = get_query_var('paged') ? intval(get_query_var('paged')) : 1;
$pagenum_link = html_entity_decode(get_pagenum_link());
$query_args = array();
$url_parts = explode('?', $pagenum_link);
if (isset($url_parts[1])) {
    wp_parse_str($url_parts[1], $query_args);
}
$pagenum_link = remove_query_arg(array_keys($query_args), $pagenum_link);
$pagenum_link = trailingslashit($pagenum_link) . '%_%';
$numeric_links = paginate_links(array(
    'base' => $pagenum_link,
    //    'format'   => $format,
    'total' => $post_list_query->max_num_pages,
    'current' => $paged,
    'mid_size' => 1,
    'add_args' => array_map('urlencode', $query_args),
    'prev_next' => true,
    'prev_text' => ('<i class="fa fa-angle-left"></i>'),
    'next_text' => ('<i class="fa fa-angle-right"></i>'),
));
if ($settings['show_pagination'] == 'yes'):
    ?>

    <nav class="navigation paging-navigation numeric <?php themesflat_esc_attr($themesflat_paging_for); ?>"
         role="navigation">
        <div class="pagination loop-pagination">
            <?php echo wp_kses($numeric_links, themesflat_kses_allowed_html()) ?>
        </div>
    </nav>
<?php endif; ?>
<?php wp_reset_postdata();

