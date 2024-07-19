<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://profiles.wordpress.org/darshitrajyaguru97/
 * @since             1.0.0
 * @package           Guest_Posts_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Guest Posts Plugin
 * Plugin URI:        https://geustpost.com
 * Description:       A plugin to allow users to submit and manage guest posts.
 * Version:           1.0.0
 * Author:            Darshit Rajyaguru
 * Author URI:        https://profiles.wordpress.org/darshitrajyaguru97//
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       guest-posts-plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'GUEST_POSTS_PLUGIN_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-guest-posts-plugin-activator.php
 */
function activate_guest_posts_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-guest-posts-plugin-activator.php';
	Guest_Posts_Plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-guest-posts-plugin-deactivator.php
 */
function deactivate_guest_posts_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-guest-posts-plugin-deactivator.php';
	Guest_Posts_Plugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_guest_posts_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_guest_posts_plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-guest-posts-plugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_guest_posts_plugin() {

	$plugin = new Guest_Posts_Plugin();
	$plugin->run();

}
run_guest_posts_plugin();
