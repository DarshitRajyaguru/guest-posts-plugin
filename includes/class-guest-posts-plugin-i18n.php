<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://profiles.wordpress.org/darshitrajyaguru97/
 * @since      1.0.0
 *
 * @package    Guest_Posts_Plugin
 * @subpackage Guest_Posts_Plugin/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Guest_Posts_Plugin
 * @subpackage Guest_Posts_Plugin/includes
 * @author     Darshit Rajyaguru <darshitrajyaguru@gmail.com>
 */
class Guest_Posts_Plugin_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'guest-posts-plugin',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
