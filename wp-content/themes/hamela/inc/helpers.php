<?php

/**
 * Return the built-in header styles for this theme
 *
 * @return  array
 */
class themesflat_options_helpers
{
    public function themesflat_recognize_control_class($name)
    {
        $segments = explode('-', $name);
        $segments = array_map('ucfirst', $segments);

        return implode('', $segments);
    }
}

function themesflat_get_class_for_custom($vc_class = '', $themesflat_class = '')
{
    if (!empty($vc_class)) {
        if (function_exists('vc_shortcode_custom_css_class')) {
            $vcclass = vc_shortcode_custom_css_class($vc_class, '');
        }
    } else {
        $vcclass = $themesflat_class;
    }
    return $vcclass;
}

function themesflat_shortcode_default_id()
{
    return array(
        'type' => 'textfield',
        'param_name' => 'default_id',
        'group' => esc_html__('Design Options', 'hamela'),
        'value' => 'themesflat_' . current_time('timestamp'),
        'std' => 'themesflat_' . current_time('timestamp')
    );
}

function themesflat_add_icons($icon_name = 'fa', $url = '')
{
    $icons = '';
    if ($url != '') {
        $fontContent = wp_remote_get($url, array('sslverify' => false));
        if (!is_wp_error($fontContent)) {
            $pattern = sprintf('/\.([\A%s].*?)\:/', $icon_name);
            preg_match_all($pattern, $fontContent['body'], $tmp_icons);
            $icons = $tmp_icons[1];
        }
    }

    return $icons;
}

function themesflat_check_isset($control)
{
    return isset($control) ? $control : '';
}

function themesflat_render_box_control($name, $control = array(), $id = null)
{
    add_action('admin_enqueue_scripts', 'themesflat_admin_color_picker');
    $default = array(
        'margin-top' => '',
        'margin-bottom' => '',
        'margin-left' => '',
        'margin-right' => '',
        'padding-top' => '',
        'padding-bottom' => '',
        'padding-left' => '',
        'padding-right' => '',
        'border-top-width' => '',
        'border-bottom-width' => '',
        'border-left-width' => '',
        'border-right-width' => ''
    );
    $controls = themesflat_decode($control);
    if (!is_array($controls)) {
        $controls = array();
    }
    $controls = array_merge($default, $controls);
    ?>
    <div class="themesflat_box_control">
        <div class="themesflat_box_position">
            <div class="themesflat_box_margin">
                <label class="themesflat_box_label"><?php echo esc_html__('Margin','hamela'); ?></label>
                <input placeholder="-" data-position='margin-top'
                       value="<?php themesflat_esc_attr(($controls['margin-top'])); ?>" class="top" type="text"/>
                <input placeholder="-" data-position='margin-bottom'
                       value="<?php themesflat_esc_attr(($controls['margin-bottom'])); ?>" class="bottom" type="text"/>
                <input placeholder="-" data-position='margin-left'
                       value="<?php themesflat_esc_attr(($controls['margin-left'])); ?>" class="left" type="text"/>
                <input placeholder="-" data-position='margin-right'
                       value="<?php themesflat_esc_attr(($controls['margin-right'])); ?>" class="right" type="text"/>
            </div>

            <div class="themesflat_box_padding">
                <label class="themesflat_box_label"><?php echo esc_html__('Padding','hamela'); ?></label>
                <input placeholder="-" data-position='padding-top'
                       value="<?php themesflat_esc_attr(($controls['padding-top'])); ?>" class="top" type="text"/>
                <input placeholder="-" data-position='padding-bottom'
                       value="<?php themesflat_esc_attr(($controls['padding-bottom'])); ?>" class="bottom" type="text"/>
                <input placeholder="-" data-position='padding-left'
                       value="<?php themesflat_esc_attr(($controls['padding-left'])); ?>" class="left" type="text"/>
                <input placeholder="-" data-position='padding-right'
                       value="<?php themesflat_esc_attr(($controls['padding-right'])); ?>" class="right" type="text"/>
            </div>

            <div class="themesflat_box_border">
                <label class="themesflat_box_label"><?php echo esc_html__('Border','hamela'); ?></label>
                <input placeholder="-" data-position='border-top-width'
                       value="<?php themesflat_esc_attr(($controls['border-top-width'])); ?>" class="top" type="text"/>
                <input placeholder="-" data-position='border-bottom-width'
                       value="<?php themesflat_esc_attr(($controls['border-bottom-width'])); ?>" class="bottom"
                       type="text"/>
                <input placeholder="-" data-position='border-left-width'
                       value="<?php themesflat_esc_attr(($controls['border-left-width'])); ?>" class="left"
                       type="text"/>
                <input placeholder="-" data-position='border-right-width'
                       value="<?php themesflat_esc_attr(($controls['border-right-width'])); ?>" class="right"
                       type="text"/>
            </div>
            <div class="themesflat_control_logo"></div>
        </div>
    </div>
    <input name="<?php echo esc_attr($name); ?>" data-customize-setting-link="<?php echo esc_attr($id); ?>"
           value="<?php echo esc_attr(json_encode($controls)); ?>" type="hidden"/>
    <?php
}

function themesflat_color_picker_control($title, $control)
{
    $output = '<span class="themesflat-options-control-title">' . esc_attr($title) . '</span>
                <div class="background-color">
                    <div class="themesflat-options-control-color-picker">
                        <div class="themesflat-options-control-inputs">
                            <input type="text" class="themesflat-color-picker" id="' . esc_attr($control['name']) . '-color" name="' . esc_attr($control['name']) . '" data-default-color value="' . esc_attr($control['color']) . '" />
                        </div>
                    </div>
                </div>';
    return $output;
}

function themesflat_iconpicker_type_simpleline($icons)
{
    $tmp_icon = themesflat_add_icons('icon', THEMESFLAT_LINK . 'css/simple-line-icons.css');
    foreach ($tmp_icon as $icon) {
        $iconname = str_replace('iconsl-', '', $icon);
        $iconname = ucwords(str_replace("-", " ", $iconname));
        $_icons[] = array($icon => $iconname);
    }
    return array_merge($icons, $_icons);
}

function themesflat_iconpicker_type_eleganticons($icons)
{
    $tmp_icon = themesflat_add_icons('icon social', THEMESFLAT_LINK . 'css/font-elegant.css');
    foreach ($tmp_icon as $icon) {
        $iconname = str_replace('icon_', '', $icon);
        $iconname = ucwords(str_replace("_", " ", $iconname));
        $_icons[] = array($icon => $iconname);
    }
    return array_merge($icons, $_icons);
}

function themesflat_iconpicker_type_ionicons($icons)
{
    $tmp_icon = themesflat_add_icons('icon', THEMESFLAT_LINK . 'css/font-ionicons.css');
    foreach ($tmp_icon as $icon) {
        $iconname = str_replace('ion-', '', $icon);
        $iconname = ucwords(str_replace("-", " ", $iconname));
        $_icons[] = array($icon => $iconname);
    }
    return array_merge($icons, $_icons);
}

function themesflat_iconpicker_type_themifyicons($icons)
{
    $tmp_icon = themesflat_add_icons('ti', THEMESFLAT_LINK . 'css/themify-icons.css');
    foreach ($tmp_icon as $icon) {
        $iconname = str_replace('ti-', '', $icon);
        $iconname = ucwords(str_replace("-", " ", $iconname));
        $_icons[] = array($icon => $iconname);
    }
    return array_merge($icons, $_icons);
}

function themesflat_iconpicker_type_icomoon($icons)
{
    $tmp_icon = themesflat_add_icons('icon', THEMESFLAT_LINK . 'css/icomoon.css');
    foreach ($tmp_icon as $icon) {
        $iconname = str_replace('icon-', '', $icon);
        $iconname = ucwords(str_replace("-", " ", $iconname));
        $_icons[] = array($icon => $iconname);
    }
    return array_merge($icons, $_icons);
}

add_filter('vc_iconpicker-type-simpleline', 'themesflat_iconpicker_type_simpleline');
add_filter('vc_iconpicker-type-eleganticons', 'themesflat_iconpicker_type_eleganticons');
add_filter('vc_iconpicker-type-ionicons', 'themesflat_iconpicker_type_ionicons');
add_filter('vc_iconpicker-type-themifyicons', 'themesflat_iconpicker_type_themifyicons');
add_filter('vc_iconpicker-type-icomoon', 'themesflat_iconpicker_type_icomoon');

function themesflat_available_icons($name = 'icon')
{
    $icon_types = array($name . '_type' => 'fontawesome', $name . '_fontawesome' => '', $name . '_openiconic' => '', $name . '_typicons' => '', $name . '_entypo' => '', $name . '_linecons' => '', $name . '_monosocial' => '', $name . '_material' => '', $name . '_simpleline' => '', $name . '_ionicons' => '', $name . '_eleganticons' => '', $name . '_themifyicons' => '', $name . '_icomoon' => '');
    return $icon_types;
}

function themesflat_excerpt_more($more)
{
    return '';
}

function themesflat_excerpt_not_more($more)
{
    return '';
}

function themesflat_special_excerpt($length)
{
    global $themesflat_length;
    return $themesflat_length;
}

function themesflat_predefined_header_styles()
{
    static $styles;

    if (empty($styles)) {
        $styles = apply_filters('themesflat/header_styles', array(
            'header-v1' => esc_html__('Classic', 'hamela'),
            'header-v2' => esc_html__('Header style 02', 'hamela'),
            'header-v4' => esc_html__('Modern', 'hamela'),
        ));
    }

    return $styles;
}

/**
 * Render header style this theme
 *
 * @return  array
 */
function themesflat_render_header_styles()
{
    static $header_style;

    if (themesflat_meta('custom_header') == 1) {
        $header_style = themesflat_meta('header_style');
    } else {
        $header_style = get_theme_mod('header_style', 'Header-v1');
    }

    return $header_style;
}

function themesflat_available_social_icons()
{
    $icons = apply_filters('themesflat_available_icons', array(
        'twitter' => array('iclass' => 'fa-twitter', 'title' => 'Twitter', 'share_link' => THEMESFLAT_PROTOCOL . '://twitter.com/intent/tweet?url='),
        'facebook' => array('iclass' => 'fa-facebook-square', 'title' => 'Facebook', 'share_link' => THEMESFLAT_PROTOCOL . '://www.facebook.com/sharer/sharer.php?u='),
        'google-plus' => array('iclass' => 'fa-google-plus', 'title' => 'Google Plus', 'share_link' => THEMESFLAT_PROTOCOL . '://plus.google.com/share?url='),
        'pinterest' => array('iclass' => 'fa-pinterest', 'title' => 'Pinterest', 'share_link' => THEMESFLAT_PROTOCOL . '://pinterest.com/pin/create/bookmarklet/?url='),
        'instagram' => array('iclass' => 'fa-instagram', 'title' => 'Instagram', 'share_link' => 'https://www.instagram.com/?url='),
        'youtube' => array('iclass' => 'fa-youtube', 'title' => 'Youtube', 'share_link' => ''),
        'vimeo' => array('iclass' => 'fa-vimeo-square', 'title' => 'Vimeo', 'share_link' => ''),
        'linkedin' => array('iclass' => 'fa-linkedin', 'title' => 'LinkedIn', 'share_link' => THEMESFLAT_PROTOCOL . '://www.linkedin.com/shareArticle?url='),
        'behance' => array('iclass' => 'fa-behance', 'title' => 'Behance', 'share_link' => ''),
        'bitcoin' => array('iclass' => 'fa-bitcoin', 'title' => 'Bitcoin', 'share_link' => ''),
        'bitbucket' => array('iclass' => 'fa-bitbucket', 'title' => 'BitBucket', 'share_link' => ''),
        'codepen' => array('iclass' => 'fa-codepen', 'title' => 'Codepen', 'share_link' => ''),
        'delicious' => array('iclass' => 'fa-delicious', 'title' => 'Delicious', 'share_link' => THEMESFLAT_PROTOCOL . '://delicious.com/save?url='),
        'deviantart' => array('iclass' => 'fa-deviantart', 'title' => 'DeviantArt', 'share_link' => ''),
        'digg' => array('iclass' => 'fa-digg', 'title' => 'Digg', 'share_link' => 'http://digg.com/submit?url='),
        'dribbble' => array('iclass' => 'fa-dribbble', 'title' => 'Dribbble', 'share_link' => ''),
        'flickr' => array('iclass' => 'fa-flickr', 'title' => 'Flickr', 'share_link' => ''),
        'foursquare' => array('iclass' => 'fa-foursquare', 'title' => 'Foursquare', 'share_link' => ''),
        'github' => array('iclass' => 'fa-github-alt', 'title' => 'Github', 'share_link' => ''),
        'jsfiddle' => array('iclass' => 'fa-jsfiddle', 'title' => 'JSFiddle', 'share_link' => ''),
        'reddit' => array('iclass' => 'fa-reddit', 'title' => 'Reddit', 'share_link' => THEMESFLAT_PROTOCOL . '://reddit.com/submit?url='),
        'skype' => array('iclass' => 'fa-skype', 'title' => 'Skype', 'share_link' => THEMESFLAT_PROTOCOL . '://web.skype.com/share?url='),
        'slack' => array('iclass' => 'fa-slack', 'title' => 'Slack', 'share_link' => ''),
        'soundcloud' => array('iclass' => 'fa-soundcloud', 'title' => 'SoundCloud', 'share_link' => ''),
        'spotify' => array('iclass' => 'fa-spotify', 'title' => 'Spotify', 'share_link' => ''),
        'stack-exchange' => array('iclass' => 'fa-stack-exchange', 'title' => 'Stack Exchange', 'share_link' => ''),
        'stack-overflow' => array('iclass' => 'fa-stack-overflow', 'title' => 'Stach Overflow', 'share_link' => ''),
        'steam' => array('iclass' => 'fa-steam', 'title' => 'Steam', 'share_link' => ''),
        'stumbleupon' => array('iclass' => 'fa-stumbleupon', 'title' => 'Stumbleupon', 'share_link' => 'http://www.stumbleupon.com/submit?url='),
        'tumblr' => array('iclass' => 'fa-tumblr', 'title' => 'Tumblr', 'share_link' => THEMESFLAT_PROTOCOL . '://www.tumblr.com/widgets/share/tool?canonicalUrl=')
    ));

    $icons['__ordering__'] = array_keys($icons);

    return $icons;
}

/**
 * Menu fallback
 */
function themesflat_menu_fallback()
{
    echo '<ul id="menu-main" class="menu">
    <li>
    <a class="menu-fallback" href="' . esc_url(admin_url('nav-menus.php')) . '">' . esc_html__('Create a Menu', 'hamela') . '</a></li></ul>';
}

function themesflat_esc_attr($attr)
{
    echo esc_attr($attr);
}

function themesflat_esc_html($attr)
{
    echo esc_html($attr);
}

/**
 * Change the excerpt length
 */

function tfl_trim_custom_excerpt($excerpt)
{
    if (has_excerpt()) {
        $excerpt_words = themesflat_get_opt('blog_archive_post_excepts_length');
        $excerpt = wp_trim_words(get_the_excerpt(), apply_filters("excerpt_length", $excerpt_words));
    }
    return $excerpt;
}

add_filter("the_excerpt", "tfl_trim_custom_excerpt", 999);

function themesflat_font_style($style)
{
    if (strlen($style) > 3) {
        switch (substr($style, 0, 3)) {
            case 'reg':
                $a[0] = '400';
                $a[1] = 'normal';
                break;
            case 'ita':
                $a[0] = '400';
                $a[1] = 'italic';
                break;
            default:
                $a[0] = substr($style, 0, 3);
                $a[1] = substr($style, 3);
                break;
        }

    } else {
        $a[0] = $style;
        $a[1] = 'normal';
    }
    return $a;
}

if (version_compare($GLOBALS['wp_version'], '4.1', '<')) :
    /**
     * Filters wp_title to print a neat <title> tag based on what is being viewed.
     *
     * @param string $title Default title text for current view.
     * @param string $sep Optional separator.
     * @return string The filtered title.
     */
    function themesflat_wp_title($title, $sep)
    {
        if (is_feed()) {
            return $title;
        }

        global $page, $paged;

        // Add the blog name
        $title .= get_bloginfo('name', 'display');

        // Add the blog description for the home/front page.
        $site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page())) {
            $title .= " $sep $site_description";
        }

        // Add a page number if necessary:
        if (($paged >= 2 || $page >= 2) && !is_404()) {
            $title .= " $sep " . sprintf(esc_html__('Page %s', 'hamela'), max($paged, $page));
        }

        return $title;
    }

    add_filter('wp_title', 'themesflat_wp_title', 10, 2);

    /**
     * Title shim for sites older than WordPress 4.1.
     *
     * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
     * @todo Remove this function when WordPress 4.3 is released.
     */
    if (!function_exists('_wp_render_title_tag')) {
        function themesflat_render_title()
        {
            ?>
            <title><?php wp_title('|', true, 'right'); ?></title>
            <?php
        }

        add_action('wp_head', 'themesflat_render_title');
    }

endif;

function tfl_excerpt_length($length)
{
    $excerpt_words = themesflat_get_opt('blog_archive_post_excepts_length');
    return $excerpt_words;
}

add_filter('excerpt_length', 'tfl_excerpt_length');

function themesflat_hex2rgba($color, $opacity = false)
{

    $default = 'rgb(0,0,0)';

    //Return default if no color provided
    if (empty($color))
        return $default;

    //Sanitize $color if "#" is provided 
    if ($color[0] == '#') {
        $color = substr($color, 1);
    }

    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
        $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
    } elseif (strlen($color) == 3) {
        $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
    } else {
        return $default;
    }

    //Convert hexadec to rgb
    $rgb = array_map('hexdec', $hex);

    //Check if opacity is set(rgba or rgb)
    if ($opacity) {
        if (abs($opacity) > 1)
            $opacity = 1.0;
        $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
    } else {
        $output = 'rgb(' . implode(",", $rgb) . ')';
    }

    //Return rgb(a) color string
    return $output;
}

function themesflat_render_box_position($class, $box_control, $custom_string = '')
{
    $css = esc_attr($class) . '{';
    if (is_array($box_control)) {
        foreach ($box_control as $key => $value) {
            if ($value != '') {
                $css .= esc_attr($key) . ':' . esc_attr(str_replace("px", "", $value)) . 'px; ';
            }
        }
    }
    $css .= esc_attr($custom_string);
    $css .= '}';

    wp_add_inline_style('themesflat-inline-css', $css);
}

function themesflat_render_style($class, $custom_string = '')
{
    $css = esc_attr($class) . '{';
    if (is_array($custom_string)) {
        foreach ($custom_string as $key => $value) {
            if ($value != '') {
                $css .= esc_attr($key) . ':' . esc_attr($value);
            }
        }
    } else {
        $css .= esc_attr($custom_string);
    }
    $css .= '}';
    add_action('wp_enqueue_scripts', 'themesflat_add_custom_styles', 10, $css);
}

function themesflat_add_custom_styles($custom)
{
    echo 'inhere';
    wp_add_inline_style('themesflat-inline-css', '.testimagebox{}');
}

function themesflat_render_attrs($atts, $echo = true)
{
    $attr = '';
    if (is_array($atts)) {
        foreach ($atts as $key => $value) {
            if ($value != '') {
                $attr .= $key . '="' . esc_attr($value) . '" ';
            }
        }
    }
    if ($echo == true) {
        echo esc_attr($attr);
    }
    return $attr;
}

function themesflat_get_json($key)
{
    if (get_theme_mod($key) == '') return themesflat_customize_default($key);
    if (!is_array(get_theme_mod($key))) {
        $decoded_value = json_decode(str_replace('&quot;', '"', get_theme_mod($key)), true);
    } else {
        $decoded_value = get_theme_mod($key);
    }
    return $decoded_value;
}

function themesflat_decode($value)
{
    if (!is_array($value)) {
        $decoded_value = json_decode(str_replace('&quot;', '"', $value), true);
    } else {
        $decoded_value = $value;
    }
    return $decoded_value;
}

function themesflat_dynamic_sidebar($sidebar)
{
    if (is_active_sidebar($sidebar)) {
        dynamic_sidebar($sidebar);
    }
}

function themesflat_render_meta($layout = '')
{
    ?>
    <div class="entry-meta clearfix">
        <?php themesflat_posted_on($layout); ?>
    </div><!-- /.entry-meta -->
    <?php
}

/**
 * Get post meta, using rwmb_meta() function from Meta Box class
 */
function themesflat_meta($key, $ID = '')
{
    global $post;
    if ($ID == '' && !is_null($post)) :
        return get_post_meta($post->ID, $key, true);
    else:
        return get_post_meta($ID, $key, true);
    endif;
}

function themesflat_get_opt($key)
{
    return get_theme_mod($key, themesflat_customize_default($key));
}

function themesflat_acf_opt($key, $ID = '')
{
    if (function_exists('get_field')) {
        $acf_field = get_field($key);
    } else {
        $acf_field = '';
    }

    if (function_exists('get_field') && isset($acf_field)) {
        if (is_array($acf_field)) {
            $values = '';
            foreach ($acf_field as $value) {
                $values .= $value;
            }
            if (empty($values)) {
                return themesflat_get_opt($key);
            } else {
                return themesflat_acf_get_field($key);
            }
        } else if (empty($acf_field)) {
            return themesflat_customize_default($key);
        } else {
            return themesflat_acf_get_field($key);
        }

    } else {
        return themesflat_get_opt($key);
    }
}

function themesflat_get_field_acf($key, $ID = '')
{
    if (function_exists('get_field')) {
        $acf_field = get_field($key, $ID);
    } else {
        $acf_field = '';
    }
    return $acf_field;
}

add_filter('acf/load_field/name=my_field_name', 'themesflat_acf_get_field');
function themesflat_acf_get_field($key)
{
    return get_field($key);
}

function themesflat_load_page_menu($params)
{
    if (themesflat_meta('enable_custom_navigator') == 1 && themesflat_meta('menu_location_primary') != false) {
        if ($params['theme_location'] == 'primary') {
            $params['menu'] = (int)themesflat_meta('menu_location_primary');
        }
    }
    return ($params);
}

add_filter('wp_nav_menu_args', 'themesflat_load_page_menu');

function themesflat_render_social($prefix = '', $value = '', $show_title = false)
{
    if ($value == '') {
        $value = themesflat_get_json('social_links');
    }
    $class = array();
    $class[] = ($show_title == false ? 'themesflat-socials' : 'themesflat-widget-socials');

    if (!is_array($value)) {
        $decoded_value = json_decode(str_replace('&quot;', '"', $value), true);
        $value = is_array($decoded_value) ? $decoded_value : array();
    }

    $icons = themesflat_available_social_icons();

    ?>
    <ul class="<?php echo esc_attr(implode(" ", $class)); ?>">
        <?php
        foreach ($value as $key => $val) {
            if ($key != '__ordering__') {
                $title = ($show_title == false ? '' : $icons[$key]['title']);
                printf(
                    '<li class="%1$s">
                        <a href="%2$s" target="_blank" rel="alternate" title="%4$s">
                            <i class="fab fa-%4$s"></i>                            
                        </a>
                    </li>',
                    esc_attr($key),
                    esc_url($val),
                    esc_attr($val),
                    esc_attr($key),
                    esc_html($title)
                );
            }
        }
        ?>
    </ul><!-- /.social -->
    <?php
}

function themesflat_custom_search_form($form)
{
    $form = '<form role="search" method="get" class="search-form" action="' . home_url('/') . '" >
    <label>
        <span class="screen-reader-text">' . esc_html__('Search for:', 'hamela') . '</span>
        <input type="search" value="' . get_search_query() . '" name="s" class="s" placeholder="' . esc_html__("Search…", "hamela") . '"/>
    </label>
    <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>    
    </form>';

    return $form;
}

add_filter('get_search_form', 'themesflat_custom_search_form');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function themesflat_pingback_header()
{
    if (is_singular() && pings_open()) {
        echo '<link rel="pingback" href="', esc_url(get_bloginfo('pingback_url')), '">';
    }
}

add_action('wp_head', 'themesflat_pingback_header');

function themesflat_preload($preload)
{
    switch ($preload) {
        case 'preload-1':
            return printf('<div class="loader-icon"></div>');
            break;
        case 'preload-2':
            return printf('<div class="spin-load-holder"><span class="spin-load-1"></span></div>');
            break;
        case 'preload-3':
            return printf(' 
                <div class="load-holder" style="height: 105px">
                    <div class="cssload-loader">
                        <div class="cssload-side"></div>
                        <div class="cssload-side"></div>
                        <div class="cssload-side"></div>
                        <div class="cssload-side"></div>
                        <div class="cssload-side"></div>
                        <div class="cssload-side"></div>
                        <div class="cssload-side"></div>
                        <div class="cssload-side"></div>
                    </div>
                </div>');
            break;
        case 'preload-4':
            return printf(
                '<div class="load-holder" style="height: 105px">
                    <div class="sk-circle">
                      <div class="sk-circle1 sk-child"></div>
                      <div class="sk-circle2 sk-child"></div>
                      <div class="sk-circle3 sk-child"></div>
                      <div class="sk-circle4 sk-child"></div>
                      <div class="sk-circle5 sk-child"></div>
                      <div class="sk-circle6 sk-child"></div>
                      <div class="sk-circle7 sk-child"></div>
                      <div class="sk-circle8 sk-child"></div>
                      <div class="sk-circle9 sk-child"></div>
                      <div class="sk-circle10 sk-child"></div>
                      <div class="sk-circle11 sk-child"></div>
                      <div class="sk-circle12 sk-child"></div>
                    </div>
                </div>');
            break;
        case 'preload-5':
            return printf('<div class="load-holder"><span class="load"></span></div>');
            break;
        case 'preload-6':
            return printf('<div class="pulse-loader"><div class="double-bounce3"></div><div class="double-bounce4"></div></div>');
            break;
        case 'preload-7':
            return printf('<div class="saquare-loader-1"></div>');
            break;
        case 'preload-8':
            return printf(
                '<div class="line-loader">
                    <div class="rect1"></div>
                    <div class="rect2"></div>
                    <div class="rect3"></div>
                    <div class="rect4"></div>
                    <div class="rect5"></div>
                </div>');
            break;
        case 'preload-9':
            return printf(
                '<div id="logo_preloader" data-width="'.themesflat_get_opt('logo_width').'" data-height="50" data-url="'.themesflat_get_opt('site_logo').'" data-color="'.themesflat_get_opt('preload_percent_color').'" data-bgcolor="'.themesflat_get_opt('preload_percent_bg').'"></div>');
            break;
        default:
            return printf('<div class="loader-icon"></div>');
            break;
    }
}

function themesflat_preload_hook()
{
    // Preloader
    if (themesflat_get_opt('enable_preload') == 1): 
        if (themesflat_get_opt('preload') == "preload-9"): ?>            
            <?php themesflat_preload(themesflat_get_opt('preload')); ?>                
        <?php else : ?>
            <div id="preloader">
                <div class="row loader">
                    <?php themesflat_preload(themesflat_get_opt('preload')); ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endif;

    if (themesflat_get_opt('go_top') == 1) : ?>
        <!-- Go Top -->
        <a class="go-top">
            <i class="fas fa-level-up-alt"></i>
        </a>
    <?php endif;
}

add_action('wp_body_open', 'themesflat_preload_hook');

/* Themesflat Language Switch */
if (!function_exists('themesflat_language_switch')) {
    function themesflat_language_switch()
    { ?>
        <div class="flat-language languages">
            <?php if (!empty($languages_sidebar)): ?>
                <?php themesflat_dynamic_sidebar('languages-sidebar'); ?>
            <?php else: ?>
                <span class="title-topbar"><?php echo esc_html__("Language", 'hamela') ?></span><br>
                <ul class="unstyled">
                    <li class="current"><a href="?lang=en" class="lang_sel_sel"><?php echo esc_html__("ENG", 'hamela'); ?><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
                        <ul class="unstyled-child">
                            <li class="icl-en">
                                <a href="?lang=en" class="lang_sel_sel">
                                    <?php echo esc_html__("English", 'hamela'); ?>
                                </a>
                            </li>
                            <li class="icl-fr fr">
                                <a href="?lang=fr" class="lang_sel_other">
                                    <?php echo esc_html__("French", 'hamela'); ?>
                                </a>
                            </li>
                            <li class="icl-ge ge">
                                <a href="?lang=it" class="lang_sel_other">
                                    <?php echo esc_html__("German", 'hamela'); ?>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    <?php }
}

function themesflat_kses_allowed_html()
{
    $allowed_tags = array(
        'a' => array(
            'class' => array(),
            'href' => array(),
            'rel' => array(),
            'title' => array(),
        ),
        'abbr' => array(
            'class' => array(),
            'title' => array(),
        ),
        'iframe' => array(
            'src' => array(),
            'class' => array(),
            'height' => array(),
            'width' => array(),
            'allowfullscreen' => array(),
        ),
        'b' => array(),
        'blockquote' => array(
            'class' => array(),
            'cite' => array(),
        ),
        'cite' => array(
            'class' => array(),
            'title' => array(),
        ),
        'code' => array(
            'class' => array(),
        ),
        'del' => array(
            'datetime' => array(),
            'title' => array(),
        ),
        'dd' => array(),
        'div' => array(
            'class' => array(),
            'title' => array(),
            'style' => array(),
            'id' => array(),
            'role' => array(),
            'data-iziModal-fullscreen' => array(),
            'data-izimodal-width' => array(),
            'data-izimodal-open' => array(),
        ),
        'dl' => array(
            'class' => array(),
        ),
        'dt' => array(
            'class' => array(),
        ),
        'em' => array(
            'class' => array(),
        ),
        'h1' => array(
            'class' => array(),
            'style' => array(),
        ),
        'h2' => array(
            'class' => array(),
            'style' => array(),
        ),
        'h3' => array(
            'class' => array(),
            'style' => array(),
        ),
        'h4' => array(
            'class' => array(),
            'style' => array(),
        ),
        'h5' => array(
            'class' => array(),
            'style' => array(),
        ),
        'h6' => array(
            'class' => array(),
            'style' => array(),
        ),
        'i' => array(
            'class' => array(),
        ),
        'img' => array(
            'alt' => array(),
            'class' => array(),
            'height' => array(),
            'src' => array(),
            'width' => array(),
        ),
        'li' => array(
            'class' => array(),
            'style' => array(),
        ),
        'ol' => array(
            'class' => array(),
        ),
        'p' => array(
            'class' => array(),
            'style' => array(),
        ),
        'q' => array(
            'cite' => array(),
            'title' => array(),
            'class' => array(),
        ),
        'span' => array(
            'class' => array(),
            'title' => array(),
            'style' => array(),
        ),
        'strike' => array(
            'class' => array(),
        ),
        'strong' => array(
            'class' => array(),
        ),
        'ul' => array(
            'class' => array(),
            'style' => array(),
        ),
        'input' => array(
            'class' => array(),
            'id' => array(),
            'type' => array(),
            'value' => array(),
            'data-customize-setting-link' => array(),
            'placeholder' => array(),
            'name' => array(),
            'tabindex' => array(),
            'size' => array(),
            'aria-required' => array(),
        ),
        'label' => array(
            'class' => array(),
            'style' => array(),
            'for' => array(),
        ),
        'svg' => array(
            'xmlns' => array(),
            'viewBox' => array(),
            'id' => array(),
            'class' => array(),
            'title' => array(),
            'fill' => array(),
            'width' => array(),
            'height' => array(),
            'xmlns:xlink' => array(),
            'version' => array(),
            'g' => array(
                'id' => array(),
                'data-name' => array(),
                'fill' => array(),
            ),
            'path' => array(
                'd' => array(),
            ),
        ),
        'g' => array(
            'id' => array(),
            'data-name' => array(),
            'fill' => array(),
        ),
        'path' => array(
            'd' => array(),
        ),
    );
    return $allowed_tags;
}

add_filter('wp_kses_allowed_html', 'themesflat_kses_allowed_html', 10, 2);

function tfl_categories_post_count_filter($variable)
{
    $variable = str_replace('(', '<span class="tfl-categories-post-count tfl-font-style-regular"> ', $variable);
    $variable = str_replace(')', '</span>', $variable);
    return $variable;
}


function tfl_archive_post_count_filter($variable)
{
    $variable = str_replace('(', '<span class="tfl-archive-post-count tfl-font-style-regular">', $variable);
    $variable = str_replace(')', '</span>', $variable);
    return $variable;
}


add_filter('get_archives_link', 'tfl_archive_post_count_filter');

add_filter('wp_list_categories', 'tfl_categories_post_count_filter');


function tfl_render_post_quote()
{
    $author_id = get_post_field('post_author', get_the_ID());
    $author_name = get_the_author_meta('display_name', $author_id);
    $author_description = get_the_author_meta('description', $author_id);
    return '<div class="quote">
                <div class="left">
                    ' . get_avatar($author_id) . '
                </div>
                <div class="right">
                    <h5 class="text-heading">
                        ' . $author_description . '
                    </h5>
                    <p class="name">' . $author_name . '</p>
                </div>
            </div>';
}

function tfl_print_wp_kses_extended($string, array $tags)
{
    $allowed_tags = [
        'iframe' => [
            'iframe' => [
                'allow' => true,
                'allowfullscreen' => true,
                'frameborder' => true,
                'height' => true,
                'loading' => true,
                'name' => true,
                'referrerpolicy' => true,
                'sandbox' => true,
                'src' => true,
                'width' => true,
            ],
        ],
        'svg' => [
            'svg' => [
                'aria-hidden' => true,
                'aria-labelledby' => true,
                'class' => true,
                'height' => true,
                'role' => true,
                'viewbox' => true,
                'width' => true,
                'xmlns' => true,
            ],
            'g' => [
                'fill' => true,
            ],
            'title' => [
                'title' => true,
            ],
            'path' => [
                'd' => true,
                'fill' => true,
            ],
        ],
        'image' => [
            'img' => [
                'srcset' => true,
                'sizes' => true,
            ],
        ],
    ];

    $allowed_html = wp_kses_allowed_html('post');
    // Since PHP 5.6 cannot use isset() on the result of an expression.
    $extended_allowed_html_tags = $allowed_tags;

    foreach ($tags as $tag) {
        if (isset($extended_allowed_html_tags[$tag])) {
            $extended_tags = apply_filters("elementor/extended_allowed_html_tags/{$tag}", $allowed_tags[$tag]);
            $allowed_html = array_replace_recursive($allowed_html, $extended_tags);
        }
    }


    return wp_kses($string, $allowed_html);
}


function tfl_filter_oembed_result($html)
{
    $param_keys = [
        'auto_play',
        'buying',
        'liking',
        'download',
        'sharing',
        'show_comments',
        'show_playcount',
        'show_user',
        'show_artwork',
    ];

    $params = array(
        "auto_play" => "false",
        "buying" => "true",
        "liking" => "true",
        "download" => "true",
        "sharing" => "true",
        "show_comments" => "true",
        "show_playcount" => "true",
        "show_user" => "true",
        "show_artwork" => "true",
        'color' => '',
    );

    preg_match('/<iframe.*src=\"(.*)\".*><\/iframe>/isU', $html, $matches);

    $url = esc_url(add_query_arg($params, $matches[1]));

    $visual = 'false';

    $html = str_replace([$matches[1], 'visual=true'], [$url, 'visual=' . $visual], $html);

    if ('false' === $visual) {
        $html = str_replace('height="400"', 'height="200"', $html);
    }

    return $html;
}