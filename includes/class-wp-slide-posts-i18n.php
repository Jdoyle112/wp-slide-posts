<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://jackdoyle.co
 * @since      1.0.0
 *
 * @package    Wp_Slide_Posts
 * @subpackage Wp_Slide_Posts/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wp_Slide_Posts
 * @subpackage Wp_Slide_Posts/includes
 * @author     Jack Doyle <Jdoyle112@gmail.com>
 */
class Wp_Slide_Posts_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp-slide-posts',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
