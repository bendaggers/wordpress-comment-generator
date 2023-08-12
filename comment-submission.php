<?php
/**
 * Custom Comment Handler
 *
 * This file contains functions to handle comment submissions.
 * It generates comment data based on user input and inserts
 * the comment into the WordPress database.
 */

// Include required files
require_once plugin_dir_path(__FILE__) . 'comment-agent.php';
require_once plugin_dir_path(__FILE__) . 'comment_author_ip.php';

/**
 * Handles the submission of custom comments.
 */
function custom_handle_comment_submission() {
    if (isset($_POST['submit_comment'])) {
        // Get user input data
        $post_id = intval($_POST['post_id']);
        $comment_author = sanitize_text_field($_POST['comment_author']);
        $comment_content = sanitize_textarea_field($_POST['comment_content']);
        $start_date = sanitize_text_field($_POST['start_date']);
        $end_date = sanitize_text_field($_POST['end_date']);

        // Generate random comment date within the range
        $start_timestamp = strtotime($start_date);
        $end_timestamp = strtotime($end_date);
        $random_timestamp = mt_rand($start_timestamp, $end_timestamp);
        $comment_date = date('Y-m-d H:i:s', $random_timestamp);
        $comment_date_gmt = get_gmt_from_date($comment_date);

        // Generate email address from comment author name
        $generated_email = generate_comment_author_email($comment_author);

        // Generate random IP address within the specified ranges
        $generated_ip = generate_random_ip();

        // Generate comment agent from the list
        $generated_comment_agent = generate_comment_agent();

        // Create the comment data array
        $comment_data = array(
            'comment_post_ID' => $post_id,
            'comment_author' => $comment_author,
            'comment_author_email' => $generated_email,
            'comment_author_IP' => $generated_ip,
            'comment_content' => $comment_content,
            'comment_date' => $comment_date,
            'comment_date_gmt' => $comment_date_gmt,
            'comment_agent' => $generated_comment_agent
        );

        // Insert the comment into the database
        wp_insert_comment($comment_data);
    }
}

// Hook the custom comment submission handler to WordPress init action
add_action('init', 'custom_handle_comment_submission');
?>