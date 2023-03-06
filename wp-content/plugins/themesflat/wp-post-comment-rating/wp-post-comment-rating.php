<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 */
define( 'WP_Post_Comment_Rating_VERSION', '2.4' );

/**
 * The code that runs during plugin activation.
 */
function activate_WP_Post_Comment_Rating() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-post-comment-rating-activator.php';
	WP_Post_Comment_Rating_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 */
function deactivate_WP_Post_Comment_Rating() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-post-comment-rating-deactivator.php';
	WP_Post_Comment_Rating_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_WP_Post_Comment_Rating' );
register_deactivation_hook( __FILE__, 'deactivate_WP_Post_Comment_Rating' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-post-comment-rating.php';

/**
 * Begins execution of the plugin.
 * @since    2.4
 */
function run_WP_Post_Comment_Rating() {

	$plugin = new WP_Post_Comment_Rating();
	$plugin->run();

}
run_WP_Post_Comment_Rating();
