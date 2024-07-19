<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://profiles.wordpress.org/darshitrajyaguru97/
 * @since      1.0.0
 *
 * @package    Guest_Posts_Plugin
 * @subpackage Guest_Posts_Plugin/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Guest_Posts_Plugin
 * @subpackage Guest_Posts_Plugin/admin
 * @author     Darshit Rajyaguru <darshitrajyaguru@gmail.com>
 */
class Guest_Posts_Plugin_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Guest_Posts_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Guest_Posts_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/guest-posts-plugin-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Guest_Posts_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Guest_Posts_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/guest-posts-plugin-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function add_plugin_admin_menu() {
        add_menu_page(
            'Guest Posts',
            'Guest Posts',
            'manage_options',
            $this->plugin_name,
            array( $this, 'display_plugin_admin_page' ),
            'dashicons-admin-post',
            26
        );
    }

	public function display_plugin_admin_page() {
        include_once plugin_dir_path( __FILE__ ) . 'partials/guest-posts-plugin-admin-display.php';
    }

	public function approve_guest_post() {
        // Approval logic
        if ( isset($_POST['post_id']) ) {
            global $wpdb;
            $post_id = intval($_POST['post_id']);
            $table_name = $wpdb->prefix . 'guest_posts';
            $wpdb->update(
                $table_name,
                array('status' => 'approved'),
                array('id' => $post_id),
                array('%s'),
                array('%d')
            );
            wp_send_json_success();
        }
        wp_send_json_error();
    }

    public function reject_guest_post() {
        // Rejection logic
        if ( isset($_POST['post_id']) ) {
            global $wpdb;
            $post_id = intval($_POST['post_id']);
            $table_name = $wpdb->prefix . 'guest_posts';
            $wpdb->update(
                $table_name,
                array('status' => 'rejected'),
                array('id' => $post_id),
                array('%s'),
                array('%d')
            );
            wp_send_json_success();
        }
        wp_send_json_error();
    }
}
