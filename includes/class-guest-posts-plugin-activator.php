<?php

/**
 * Fired during plugin activation
 *
 * @link       https://profiles.wordpress.org/darshitrajyaguru97/
 * @since      1.0.0
 *
 * @package    Guest_Posts_Plugin
 * @subpackage Guest_Posts_Plugin/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Guest_Posts_Plugin
 * @subpackage Guest_Posts_Plugin/includes
 * @author     Darshit Rajyaguru <darshitrajyaguru@gmail.com>
 */
class Guest_Posts_Plugin_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		self::create_guest_posts_table();
	}
	private static function create_guest_posts_table() {
        global $wpdb;

        $table_name = $wpdb->prefix . 'guest_posts';
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
            id int(9) NOT NULL AUTO_INCREMENT,
            post_title varchar(20) NOT NULL,
            post_content longtext NOT NULL,
            author_name varchar(20) NOT NULL,
            author_email varchar(20) NOT NULL,
            submission_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            status varchar(20) DEFAULT 'pending' NOT NULL,
            PRIMARY KEY  (id)
        ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }
}
