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
 <h2>Guest Post Form</h2>
<form id="guest-post-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
    <input type="hidden" name="action" value="submit_guest_post">
    <?php wp_nonce_field( 'submit_guest_post', 'guest_post_nonce' ); ?>
    <div>
        <label for="post_title">Title</label><br/>
        <input type="text" name="post_title" id="post_title" placeholder="Enter Post Title" required>
    </div>
    <div>
        <label for="post_content">Content</label><br/>
        <textarea name="post_content" id="post_content" placeholder="Enter Post Content" required></textarea>
    </div>
    <div>
        <label for="author_name">Author Name</label><br/>
        <input type="text" name="author_name" id="author_name" placeholder="Enter Author Name" required>
    </div>
    <div>
        <label for="author_email">Author Email</label><br/>
        <input type="email" name="author_email" id="author_email" placeholder="Enter Author Email" required>
    </div>
    <div>
        <input type="submit" value="Submit">
    </div>
</form>
