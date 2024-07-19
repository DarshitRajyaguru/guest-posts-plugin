<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://profiles.wordpress.org/darshitrajyaguru97/
 * @since      1.0.0
 *
 * @package    Guest_Posts_Plugin
 * @subpackage Guest_Posts_Plugin/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<form id="guest-post-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
    <input type="hidden" name="action" value="submit_guest_post">
    <?php wp_nonce_field( 'submit_guest_post', 'guest_post_nonce' ); ?>
    <p>
        <label for="post_title">Title</label>
        <input type="text" name="post_title" id="post_title" required>
    </p>
    <p>
        <label for="post_content">Content</label>
        <textarea name="post_content" id="post_content" required></textarea>
    </p>
    <p>
        <label for="author_name">Author Name</label>
        <input type="text" name="author_name" id="author_name" required>
    </p>
    <p>
        <label for="author_email">Author Email</label>
        <input type="email" name="author_email" id="author_email" required>
    </p>
    <p>
        <input type="submit" value="Submit">
    </p>
</form>
