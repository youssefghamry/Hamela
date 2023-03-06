<?php

use Elementor\Utils;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$query_args = tfl_get_query_args('services', 'services_category', $settings);
// The Query
$post_list_query = new \WP_Query($query_args);
echo '<div class="tfl-services-grid">';

if (!empty($settings['tfl_section_title'])):
    echo '<' . $settings['tfl_section_title_tag'] . ' class="section-title mb-5 ' . $settings['tfl_section_title_align'] . '">';
    echo $settings['tfl_section_title'];
    echo '</' . $settings['tfl_section_title_tag'] . '>';
endif;

echo '<div class="service-grid row '.$settings['style'].' grid-' . $settings['grid_columns'] . '-columns">';
while ($post_list_query->have_posts()) :
    $post_list_query->the_post();
    ?>

    <div class="column services-item">
        <article id="post-<?php the_ID(); ?>" <?php post_class('service-item-inner'); ?>>
            <div class="big-detail2"><img src="<?php echo get_template_directory_uri();?>/images/big-detail2.svg" alt="<?php esc_attr_e('big detail','tfl'); ?>"></div>
            <div class="box-item">

                <!--icon-->
                <?php
                if ($settings['show_icon'] == 'yes'):
                    // $icon = themesflat_meta('service_icon');
                    // if ($icon) echo  '<div class="wrap-icon">'.$icon.'</div>';
                    
                    $services_post_icon  = \Elementor\Addon_Elementor_Icon_manager_free::render_icon( themesflat_get_opt_elementor('services_post_icon'), [ 'aria-hidden' => 'true' ] );
                    if ($services_post_icon) {
                        echo '<div class="wrap-icon">'.$services_post_icon.'</div>';
                    }
                endif;
                ?>

                <h6 class="title-box"><a href="<?php echo esc_url(get_the_permalink()); ?>" title="<?php echo esc_attr(get_the_title()); ?>"><?php echo get_the_title(); ?></a>
                </h6>

                <!--description-->
                <?php if ($settings['show_desc'] == 'yes'): ?>
                    <div class="content-post"><?php echo wp_trim_words(get_the_excerpt(), $settings['excerpt_lenght'], '&hellip;'); ?></div>
                <?php endif; ?>

                <!--read more-->
                <?php if ($settings['show_read_more'] == 'yes'): ?>
                    <a href="<?php echo esc_url(get_permalink()) ?>" class="readmore"><i
                                class="fas fa-chevron-right"></i></a>
                <?php endif; ?>

            </div>

        </article>
    </div>


<?php
endwhile;

//description_text
if (!empty($settings['description_text'])):
    echo '<div class="description_text column col-md-6">';
    echo($settings['description_text']);
    echo '</div>';
endif;

echo '</div>';  // end .service-grid
?>
<?php
wp_reset_postdata();
    echo '</div>'; // end .tfl-services-grid


    $themesflat_paging_for = 'blog';
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

<?php wp_reset_postdata(); ?>