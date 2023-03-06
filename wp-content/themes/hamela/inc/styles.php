<?php
/**
 * @package hamela
 */
//Output all custom styles for this theme

function themesflat_custom_styles($custom)
{
    $custom = '';
    $logo_controls = themesflat_decode(themesflat_get_opt('logo_controls'));
    themesflat_render_box_position("#header #logo", $logo_controls);

    $logo_width = themesflat_get_opt('logo_width');
    $custom .= "#header #logo a { max-width:" . esc_attr($logo_width) . "px;}" . "\n";

    //GROUP PAGE TITLE
    $page_title_controls = themesflat_decode(themesflat_get_opt('page_title_controls'));
    themesflat_render_box_position(".page-title", $page_title_controls);

    //  Page Title Opacity
    $page_title_background_color = themesflat_get_opt('page_title_background_color');
    if ($page_title_background_color != '') {
        $custom .= ".page-title .overlay { background:" . esc_attr($page_title_background_color) . ";}" . "\n";
    }

    $page_title_img = themesflat_get_opt('page_title_background_image');
    if ($page_title_img != '') {
        $custom .= '.page-title {background-image: url(' . $page_title_img . ');}' . "\n";
    }

    $page_title_image_size = themesflat_get_opt('page_title_image_size');
    if ($page_title_image_size != '') {
        $custom .= '.page-title {background-size: ' . $page_title_image_size . ';}' . "\n";
    }

    $custom = apply_filters('themesflat/render/style', $custom);
    wp_add_inline_style('themesflat-inline-css', $custom);

}

add_action('wp_enqueue_scripts', 'themesflat_custom_styles');