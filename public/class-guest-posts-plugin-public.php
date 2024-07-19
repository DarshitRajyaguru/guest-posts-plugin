<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://profiles.wordpress.org/darshitrajyaguru97/
 * @since      1.0.0
 *
 * @package    Guest_Posts_Plugin
 * @subpackage Guest_Posts_Plugin/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Guest_Posts_Plugin
 * @subpackage Guest_Posts_Plugin/public
 * @author     Darshit Rajyaguru <darshitrajyaguru@gmail.com>
 */
class Guest_Posts_Plugin_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/guest-posts-plugin-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/guest-posts-plugin-public.js', array( 'jquery' ), $this->version, false );

	}

	public function render_guest_post_form() {
        ob_start();
        include plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/guest-posts-plugin-public-display.php';
        return ob_get_clean();
    }

	public function handle_guest_post_submission() {
        if ( isset( $_POST['guest_post_nonce'] ) && wp_verify_nonce( $_POST['guest_post_nonce'], 'submit_guest_post' ) ) {
            // Form submission logic
            $title = sanitize_text_field($_POST['post_title']);
            $content = sanitize_textarea_field($_POST['post_content']);
            $author_name = sanitize_text_field($_POST['author_name']);
            $author_email = sanitize_email($_POST['author_email']);
            
            $post_id = wp_insert_post(array(
                'post_title'    => $title,
                'post_content'  => $content,
                'post_status'   => 'draft', // Or 'pending' based on requirement
                'post_type'     => 'guest_posts',
            ));

            if ( ! is_wp_error($post_id) ) {
                add_post_meta($post_id, 'author_name', $author_name);
                add_post_meta($post_id, 'author_email', $author_email);
                wp_redirect( home_url() ); // Redirect after submission
                exit;
            }
        }
        wp_redirect( home_url() ); // Redirect in case of failure
        exit;
    }
}
