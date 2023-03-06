<?php
/**
 * themesflat functions and definitions
 *
 * @package hamela
 */

define('THEMESFLAT_DIR', trailingslashit(get_template_directory()));
define('THEMESFLAT_LINK', trailingslashit(get_template_directory_uri()));
define('THEMESFLAT_PROTOCOL', (is_ssl()) ? 'https' : 'http');
if (!function_exists('themesflat_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */

    function themesflat_setup()
    {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on burger, use a find and replace
         * to change 'hamela' to the name of your theme in all the template files
         */
        load_theme_textdomain('hamela', THEMESFLAT_DIR . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        // Content width
        global $content_width;
        if (!isset($content_width)) {
            $content_width = 1200; /* pixels */
        }

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');
        add_image_size('themesflat-blog', 1170, 562, true);
        add_image_size('themesflat-blog-five-columns', 332, 422, true);
        add_image_size('themesflat-blog-grid', 750, 536, true);
        add_image_size('themesflat-blog-grid-s2', 700, 474, true);
        add_image_size('themesflat-blog-formatted', 750, 304, true);
        add_image_size('themesflat-blog-single', 1170, 854, true);
        add_image_size('themesflat-services', 750, 507, true);
        //add_image_size('themesflat-portfolios', 370, 422, true);
        add_image_size('themesflat-portfolios', 370, 470, true);

        //Get thumbnail url
        function themesflat_thumbnail_url($size)
        {
            global $post;
            if ($size == '') {
                $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                return esc_url($url);
            } else {
                $url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size);
                return esc_url($url[0]);
            }
        }

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary Menu', 'hamela')
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
        ));

        /*
         * Enable support for Post Formats.
         * See http://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', array(
            'aside', 'image', 'gallery', 'video', 'quote', 'link', 'audio'
        ));

        // Set up the WordPress core custom background feature.
        $args = array(
            'default-color' => 'ffffff',
            'default-image' => '',
        );

        add_theme_support('custom-background', $args);
        add_theme_support('custom-header', $args);

        // Custom stylesheet to the TinyMCE visual editor
        function themesflat_add_editor_styles()
        {
            add_editor_style('css/editor-style.css');
        }

        add_action('admin_init', 'themesflat_add_editor_styles');

    }
endif; // themesflat_setup

add_action('after_setup_theme', 'themesflat_setup');

function themesflat_wpfilesystem()
{
    include_once(ABSPATH . '/wp-admin/includes/file.php');
    WP_Filesystem();
}

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function themesflat_widgets_init()
{

    register_sidebar(array(
        'name' => esc_html__('Blog Sidebar', 'hamela'),
        'id' => 'blog-sidebar',
        'description' => esc_html__('Add widgets here to appear in your sidebar Blog Sidebar.', 'hamela'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Blog Single Sidebar', 'hamela'),
        'id' => 'blog-single-sidebar',
        'description' => esc_html__('Add widgets here to appear in your sidebar Blog single Sidebar.', 'hamela'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Portfolios Sidebar', 'hamela'),
        'id' => 'portfolios-sidebar',
        'description' => esc_html__('Add widgets here to appear in your sidebar Portfolios Sidebar.', 'hamela'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ));

    //Widget footer
    register_sidebar(array(
        'name' => esc_html__('Footer Widget Area 1', 'hamela'),
        'id' => 'footer-1',
        'description' => esc_html__('Add widgets here to appear in your sidebar Footer area 1.', 'hamela'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Widget Area 2', 'hamela'),
        'id' => 'footer-2',
        'description' => esc_html__('Add widgets here to appear in your sidebar Footer area 2.', 'hamela'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ));
}

add_action('widgets_init', 'themesflat_widgets_init');

function themesflat_get_style($style)
{
    return str_replace('italic', 'i', $style);
}


function themesflat_fonts_url()
{
    $fonts_url = '';
    $body_font_name = themesflat_get_json('body_font_name');
    $headings_font_name = themesflat_get_json('headings_font_name');
    $menu_font_name = themesflat_get_json('menu_font_name');
    $font_families = array();

    if ('' != $body_font_name) {
        $font_families[] = $body_font_name['family'] . ':300,400,500,600,700,900,' . themesflat_get_style($body_font_name['style']);
    } else {
        $font_families[] = 'Oswald:300,300i,400,400i,500,500i,600,600i,700,700i';
    }

    if ('' != $headings_font_name) {
        $font_families[] = $headings_font_name['family'] . ':300,400,500,600,700,900,' . themesflat_get_style($headings_font_name['style']);
    } else {
        $font_families[] = 'Oswald:300,300i,400,400i,500,500i,600,600i,700,700i';
    }

    if ('' != $menu_font_name) {
        $font_families[] = $menu_font_name['family'] . ':' . themesflat_get_style($menu_font_name['style']);
    } else {
        $font_families[] = 'Oswald:300,300i,400,400i,500,500i,600,600i,700,700i';
    }

    $font_families[] = 'Open Sans:300,300i,400,400i,500,500i,600,600i,700,700i';

    $query_args = array(
        'family' => urlencode(implode('|', $font_families)),
    );

    $fonts_url = add_query_arg($query_args, THEMESFLAT_PROTOCOL . '://fonts.googleapis.com/css');

    return esc_url_raw($fonts_url);
}

function themesflat_scripts_styles()
{
    wp_enqueue_style('themesflat-theme-slug-fonts', themesflat_fonts_url(), array(), null);
}

add_action('wp_enqueue_scripts', 'themesflat_scripts_styles');


/**
 * Enqueue scripts and styles.
 */

function themesflat_scripts()
{
    // Theme stylesheet.    
    wp_enqueue_style('hamela-icon', THEMESFLAT_LINK . 'css/hamela-icon.css');
    wp_enqueue_style('hamela-digital-icon', THEMESFLAT_LINK . 'css/hamela-digital-icon.css');
    wp_enqueue_style('themesflat-icomoon', THEMESFLAT_LINK . 'css/icomoon.css');
    wp_enqueue_style('icofont', THEMESFLAT_LINK . 'css/icofont.css');
    wp_enqueue_style('owl-carousel', THEMESFLAT_LINK . 'css/owl.carousel.css');
    wp_enqueue_style('themesflat-animated', THEMESFLAT_LINK . 'css/animated.css');
    wp_enqueue_style('themesflat-main', THEMESFLAT_LINK . 'css/main.css');
    wp_enqueue_style('themesflat-inline-css', THEMESFLAT_LINK . 'css/inline-css.css');

    // Load the html5 shiv..    
    wp_enqueue_script('html5shiv', THEMESFLAT_LINK . 'js/html5shiv.js', array('jquery'), '3.7.0', true);
    wp_enqueue_script('matchmedia', THEMESFLAT_LINK . 'js/matchMedia.js', array('jquery'), '1.2', true);

    wp_register_style('font-awesome', THEMESFLAT_LINK . 'css/font-awesome.css');
    wp_enqueue_style('font-awesome');

    wp_enqueue_script('nice-select', THEMESFLAT_LINK . 'js/jquery.nice-select.min.js', array('jquery'), '', true);
    wp_enqueue_style('nice-select', THEMESFLAT_LINK . 'css/nice-select.css');

    wp_enqueue_script('owl-carousel', THEMESFLAT_LINK . 'js/owl.carousel.js', array('jquery'), '2.3.4', true);
    wp_enqueue_script('parallax', THEMESFLAT_LINK . 'js/parallax.js', array('jquery'), '2.6.0', true);
    wp_enqueue_script('jquery-mb-ytplayer', THEMESFLAT_LINK . 'js/jquery.mb.YTPlayer.js', array('jquery'), '3.2.8', true);

    if (themesflat_get_opt('enable_smooth_scroll') == 1) {
        wp_enqueue_script('smoothscroll', THEMESFLAT_LINK . 'js/smoothscroll.js', array(), '1.2.1', true);
    }

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply', array(), '2.0.4', true);
    }

    // Load the main js    
    wp_enqueue_script('themesflat-main', THEMESFLAT_LINK . 'js/main.js', array(), '2.0.4', true);
}

add_action('wp_enqueue_scripts', 'themesflat_scripts');

function themesflat_scripts_woocommerce()
{
    if (class_exists('woocommerce')) {
        wp_enqueue_style('themesflat-shop-woocommerce', THEMESFLAT_LINK . 'css/shop-woocommerce.css');
        wp_enqueue_script('themesflat-shop-woocommerce', THEMESFLAT_LINK . 'js/shop-woocommerce.js', array(), '1.1', true);
    }
}

add_action('wp_enqueue_scripts', 'themesflat_scripts_woocommerce', 20);

/**
 * Enqueue Bootstrap
 */
function themesflat_enqueue_bootstrap()
{
    wp_enqueue_style('bootstrap', THEMESFLAT_LINK . 'css/bootstrap.css', array(), true);
}

add_action('wp_enqueue_scripts', 'themesflat_enqueue_bootstrap', 9);

// Customizer additions.
require THEMESFLAT_DIR . 'inc/customizer.php';

// Helpers
require THEMESFLAT_DIR . 'inc/helpers.php';

// Struct
require THEMESFLAT_DIR . 'inc/structure.php';

// Breadcrumbs additions.
require THEMESFLAT_DIR . 'inc/breadcrumb.php';

// Custom template tags for this theme.
require THEMESFLAT_DIR . 'inc/template-tags.php';

// Custom Sidebar Dynamic for this theme.
require THEMESFLAT_DIR . 'inc/sidebar_manage.php';

// Style.
require THEMESFLAT_DIR . 'inc/styles.php';

// Required plugins
require_once THEMESFLAT_DIR . 'inc/plugins/class-tgm-plugin-activation.php';

// Plugin Activation
require_once THEMESFLAT_DIR . 'inc/plugins/plugins.php';

require THEMESFLAT_DIR . "inc/options/options-definition.php";
require_once(THEMESFLAT_DIR . 'inc/options/controls/social_icons.php');
require_once(THEMESFLAT_DIR . 'inc/options/controls/number.php');
require_once(THEMESFLAT_DIR . 'inc/options/controls/dropdown-sidebars.php');
require_once(THEMESFLAT_DIR . 'inc/options/controls/dropdown-pages.php');
require_once(THEMESFLAT_DIR . 'inc/options/controls/box-control.php');
require_once(THEMESFLAT_DIR . 'inc/options/controls/typography.php');
require_once(THEMESFLAT_DIR . 'inc/options/controls/radio-images.php');
require_once(THEMESFLAT_DIR . 'inc/options/controls/check-box.php');
require_once(THEMESFLAT_DIR . 'inc/options/controls/color_overlay.php');
require_once(THEMESFLAT_DIR . 'inc/options/controls/multi-images.php');
require_once(THEMESFLAT_DIR . 'inc/options/controls/styler_slider.php');
require_once(THEMESFLAT_DIR . 'inc/options/options-acf.php');
require_once(THEMESFLAT_DIR . 'inc/elementor-options/elementor-options.php');
require_once(THEMESFLAT_DIR . 'inc/elementor-options/elementor-functions.php');
require_once(THEMESFLAT_DIR . 'demo/import-demo.php');

// Load Customizer Style
function themesflat_load_customizer_style()
{
    wp_enqueue_script('wp-plupload');
    wp_enqueue_style('plugin-install');
    wp_enqueue_script('jquery-ui');

    wp_register_style('font-awesome', THEMESFLAT_LINK . 'css/font-awesome.css');
    wp_enqueue_style('font-awesome');
    wp_register_style('themesflat-customizer', THEMESFLAT_LINK . 'css/admin/customizer.css', false, '1.0.0');
    wp_enqueue_style('themesflat-customizer');
    wp_enqueue_style('themesflat-alpha-color-picker', THEMESFLAT_LINK . 'css/admin/alpha-color-picker.css', false, '1.0.0');
    wp_enqueue_script('themesflat-alpha-color-picker', THEMESFLAT_LINK . 'js/admin/alpha-color-picker.js', array('wp-color-picker'), '2.1.2', true);
    wp_enqueue_script('themesflat-customizer', THEMESFLAT_LINK . 'js/admin/customizer.js', array('jquery', 'customize-preview'), '', true);
    wp_enqueue_script('themesflat-multi-image', THEMESFLAT_LINK . 'js/admin/multi-image.js', array('jquery', 'customize-preview'), '', true);

    wp_enqueue_script('themesflat-customizer', THEMESFLAT_LINK . 'js/admin/customizer.js', array('jquery', 'customize-preview'), '', true);
}

add_action('customize_controls_enqueue_scripts', 'themesflat_load_customizer_style');

// Load Admin Style
function themesflat_load_admin_style()
{
    wp_enqueue_style('themesflat-admin', THEMESFLAT_LINK . 'css/admin/admin.css', false, '1.0.0');
}

add_action('admin_enqueue_scripts', 'themesflat_load_admin_style', 999);


if (class_exists('wp_less')) {
    if (themesflat_get_opt('enable_less') == 1) :
        add_action('init', array('wp_less', 'instance'));
    endif;
}

/* Function which displays your post date in time ago format */
function tfl_time_ago()
{
    return human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . esc_html__('ago', 'hamela');
}

add_filter('less_vars', 'tfl_less_vars', 10, 2);

function tfl_less_vars($vars, $handle)
{
    $body_text_color = themesflat_get_opt('body_text_color');
    $primary_color = themesflat_get_opt('primary_color');
    $accent_color = themesflat_get_opt('accent_color');
    $secondary_color = themesflat_get_opt('secondary_color');
    $menu_bg_color = themesflat_get_opt('header_backgroundcolor');
    $header_sticky_bg = themesflat_get_opt('header_backgroundcolor_sticky');
    $mainnav_color = themesflat_get_opt('mainnav_color');
    $mainnav_hover_color = themesflat_get_opt('mainnav_hover_color');
    $sub_nav_background = themesflat_get_opt('sub_nav_background');
    $sub_nav_color = themesflat_get_opt('sub_nav_color');
    $sub_nav_color_hover = themesflat_get_opt('sub_nav_color_hover');
    $copyright_color = themesflat_get_opt('copyright_color');
    $copyright_bg = themesflat_get_opt('copyright_bg');
    $topbar_bgcolor = themesflat_get_opt('topbar_bgcolor');
    $topbar_color = themesflat_get_opt('topbar_color');

    $breadcrumb_color = themesflat_get_opt('breadcrumb_color');
    $breadcrumb_link_color = themesflat_get_opt('breadcrumb_link_color');
    $breadcrumb_link_color_hover = themesflat_get_opt('breadcrumb_link_color_hover');
    $breadcrumb_separator_color = themesflat_get_opt('breadcrumb_separator_color');

    $page_title_text_color = themesflat_get_opt('page_title_text_color');
    $body_background_color = themesflat_get_opt('body_background_color');
    $body_font_name = themesflat_get_json('body_font_name');
    $font_style = themesflat_font_style($body_font_name['style']);
    $heading_font_name = themesflat_get_json('headings_font_name');
    $heading_font_style = themesflat_font_style($heading_font_name['style']);
    $menu_font_name = themesflat_get_json('menu_font_name');
    $menu_font_style = themesflat_font_style($menu_font_name['style']);
    $sub_menu_font_name = themesflat_get_json('sub_menu_font_name');
    $sub_menu_font_style = themesflat_font_style($sub_menu_font_name['style']);

    $h1_size = themesflat_get_opt('h1_size');
    $h2_size = themesflat_get_opt('h2_size');
    $h3_size = themesflat_get_opt('h3_size');
    $h4_size = themesflat_get_opt('h4_size');
    $h5_size = themesflat_get_opt('h5_size');
    $h6_size = themesflat_get_opt('h6_size');

    $vars = array(
        'body_font_weight' => $font_style[0],
        'body_font_style' => $font_style[1],
        'body_font_family' => '"' . $body_font_name['family'] . '"',
        'body_font_size' => str_replace('px', '', $body_font_name['size']) . 'px',
        'body_line_height' => $body_font_name['line_height'],
        'heading_font_weight' => $heading_font_style[0],
        'heading_font_style' => $heading_font_style[1],
        'heading_font_family' => '"' . $heading_font_name['family'] . '"',
        'heading_line_height' => $heading_font_name['line_height'],
        'menu_font_weight' => $menu_font_style[0],
        'menu_font_style' => $menu_font_style[1],
        'menu_font_family' => '"' . $menu_font_name['family'] . '"',
        'menu_font_size' => str_replace('px', '', $menu_font_name['size']) . 'px',
        'menu_line_height' => $menu_font_name['line_height'],
        'sub_menu_font_weight' => $sub_menu_font_style[0],
        'sub_menu_font_style' => $sub_menu_font_style[1],
        'sub_menu_font_family' => '"' . $sub_menu_font_name['family'] . '"',
        'sub_menu_font_size' => str_replace('px', '', $sub_menu_font_name['size']) . 'px',
        'sub_menu_line_height' => $sub_menu_font_name['line_height'],
        'h1_size' => str_replace('px', '', $h1_size) . 'px',
        'h2_size' => str_replace('px', '', $h2_size) . 'px',
        'h3_size' => str_replace('px', '', $h3_size) . 'px',
        'h4_size' => str_replace('px', '', $h4_size) . 'px',
        'h5_size' => str_replace('px', '', $h5_size) . 'px',
        'h6_size' => str_replace('px', '', $h6_size) . 'px',
        'copyright_color' => $copyright_color,
        'copyright_bg' => $copyright_bg,
        'body_text_color' => $body_text_color,
        'primary_color' => $primary_color,
        'accent_color' => $accent_color,
        'secondary_color' => $secondary_color,
        'menu_bg_color' => $menu_bg_color,
        'header_sticky_bg' => $header_sticky_bg,
        'mainnav_color' => $mainnav_color,
        'mainnav_hover_color' => $mainnav_hover_color,
        'sub_nav_color' => $sub_nav_color,
        'sub_nav_background' => $sub_nav_background,
        'sub_nav_color_hover' => $sub_nav_color_hover,
        'breadcrumb_color' => $breadcrumb_color,
        'breadcrumb_link_color' => $breadcrumb_link_color,
        'breadcrumb_link_color_hover' => $breadcrumb_link_color_hover,
        'breadcrumb_separator_color' => $breadcrumb_separator_color,
        'page_title_text_color' => $page_title_text_color,
        'body_background_color' => $body_background_color,
        'topbar_bgcolor' => $topbar_bgcolor,
        'topbar_color' => $topbar_color,
    );
    return $vars;
}