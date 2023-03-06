<?php
/**
 * Plugin Name: ThemesFlat
 * Plugin URI:  http://themesflat.com/
 * Description: The theme's components
 * Author:      ThemesFlat
 * Version:     1.0.1
 * Author URI: http://themesflat.com/
 */

define( 'THEMESFLAT_VERSION', '1.0.1' );
define( 'THEMESFLAT_PATH', plugin_dir_path( __FILE__ ) );
define( 'THEMESFLAT_URL', plugin_dir_url( __FILE__ ) );
define( 'THEMESFLAT_ICON', plugin_dir_url( __FILE__ ).'assets/img/logo.png' );

$theme = wp_get_theme();
if ( 'Hamela' == $theme->name || 'Hamela' == $theme->parent_theme ) {
    require_once THEMESFLAT_PATH . '/poststype/init-posts-type.php';
    require_once THEMESFLAT_PATH . '/includes/options.php';
    require_once THEMESFLAT_PATH . '/includes/metabox-options.php';
    require THEMESFLAT_PATH . "widgets/themesflat_recent_post.php";
    require THEMESFLAT_PATH . "widgets/themesflat_categories.php";
    require THEMESFLAT_PATH . "widgets/themesflat_author.php";
    require THEMESFLAT_PATH . "widgets/themesflat_comments.php";
    require THEMESFLAT_PATH . "widgets/themesflat_port_cats.php";
    require THEMESFLAT_PATH . "wp-post-comment-rating/wp-post-comment-rating.php";
    require THEMESFLAT_PATH . "widget-css-classes/widget-css-classes.php";

    require_once(THEMESFLAT_PATH . '/includes/less/lessc.inc.php');
    require_once(THEMESFLAT_PATH . '/includes/less/wp-less.php');
}

function themesflat_shortcode_register_assets() {
	wp_enqueue_style( 'iziModal', plugins_url('assets/css/iziModal.css', __FILE__), array(), true );
	wp_enqueue_script( 'iziModal', plugins_url('assets/js/iziModal.js', __FILE__), array(), '1.0', true );
	wp_enqueue_script( 'tf-main-post-type', plugins_url('assets/js/tf-main-post-type.js', __FILE__), array(), '1.0', true );
}

add_action( 'wp_enqueue_scripts', 'themesflat_shortcode_register_assets', 999999 );

function themesflat_admin_script_meta_box() {
    $screen = get_current_screen(); 
    wp_enqueue_script( 'themesflat-meta-box', plugins_url('assets/js/meta-boxes.js', __FILE__), array(), true );
    
}

add_action( 'admin_enqueue_scripts', 'themesflat_admin_script_meta_box' );

function tfl_category_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'tfl_category_title' );

remove_filter('the_content', 'wpautop');

//remove_action( 'wp_head', 'sb_instagram_custom_css' );
add_filter('wpcf7_autop_or_not', '__return_false');

function tfl_render_soundcloud($audio_url)
{
    add_filter('oembed_result', 'tfl_filter_oembed_result', 50, 3);
    $video_html = wp_oembed_get($audio_url, wp_embed_defaults());
    remove_filter('oembed_result', 'tfl_filter_oembed_result', 50);
    return tfl_print_wp_kses_extended($video_html, ['iframe']);
}