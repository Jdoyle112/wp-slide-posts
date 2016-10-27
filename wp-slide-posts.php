<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://jackdoyle.co
 * @since             1.0.0
 * @package           Wp_Slide_Posts
 *
 * @wordpress-plugin
 * Plugin Name:       WP Slide Posts
 * Plugin URI:        https://github.com/jdoyle112
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Jack Doyle
 * Author URI:        https://jackdoyle.co
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-slide-posts
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-slide-posts-activator.php
 */
function activate_wp_slide_posts() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-slide-posts-activator.php';
	Wp_Slide_Posts_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-slide-posts-deactivator.php
 */
function deactivate_wp_slide_posts() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-slide-posts-deactivator.php';
	Wp_Slide_Posts_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_slide_posts' );
register_deactivation_hook( __FILE__, 'deactivate_wp_slide_posts' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-slide-posts.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_slide_posts() {

	$plugin = new Wp_Slide_Posts();
	$plugin->run();

}
run_wp_slide_posts();
