<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://profiles.wordpress.org/darshitrajyaguru97/
 * @since      1.0.0
 *
 * @package    Guest_Posts_Plugin
 * @subpackage Guest_Posts_Plugin/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    <h1 class="wp-heading-inline"><?php echo esc_html( get_admin_page_title() ); ?></h1>
    <form id="guest-posts-filter" method="get">
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix . 'guest_posts';
        $query = "SELECT * FROM $table_name";
        $results = $wpdb->get_results($query);
        ?>
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Submission Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ( $results as $post ) : ?>
                    <tr>
                        <td><?php echo esc_html($post->post_title); ?></td>
                        <td><?php echo esc_html($post->author_name); ?></td>
                        <td><?php echo esc_html($post->submission_date); ?></td>
                        <td><?php echo esc_html($post->status); ?></td>
                        <td>
                            <?php if ( $post->status === 'pending' ) : ?>
                                <button class="button approve-post" data-post-id="<?php echo esc_attr($post->id); ?>">Approve</button>
                                <button class="button reject-post" data-post-id="<?php echo esc_attr($post->id); ?>">Reject</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div id="pagination"></div>
    </form>
</div>
