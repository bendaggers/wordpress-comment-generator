<?php
/**
 * Plugin Name: Custom Comments Plugin
 * Description: A plugin to add comments to published posts.
 * Version: 1.0
 * Author: BenDaggers
 */

// Include menu setup and script enqueueing functions
require_once plugin_dir_path(__FILE__) . 'admin-page.php';

// Include comment handling functions
require_once plugin_dir_path(__FILE__) . 'comment-submission.php';

// Include comment author
require_once plugin_dir_path(__FILE__) . 'comment_author.php';

/**
 * Generates the custom comments page content.
 */
function custom_comments_page() {
    echo '<div class="wrap">';
    echo '<h2>Custom Comments</h2>';

    // Get a list of published posts
    $args = array(
        'post_status' => 'publish',
        'posts_per_page' => -1,
    );
    $query = new WP_Query($args);

    // Display post selection dropdown
    echo '<form method="post">';
    echo '<select name="post_id">';
    while ($query->have_posts()) {
        $query->the_post();
        echo '<option value="' . get_the_ID() . '">' . get_the_title() . '</option>';
    }
    echo '</select><br>';

    // Display date pickers
    echo 'Start Date: <input type="text" name="start_date" class="datepicker" placeholder="Start Date"><br>';
    echo 'End Date: <input type="text" name="end_date" class="datepicker" placeholder="End Date"><br>';

    // Generate comment author name based on options
    $comment_author = generate_comment_author_name(); // Use the function from the previous response

    // Display comment form
    echo '<form method="post">';
    echo '<input type="text" name="comment_author" placeholder="Your Name"><br>';
    echo '<textarea name="comment_content" placeholder="Your Comment"></textarea><br>';
    echo '<input type="submit" name="submit_comment" value="Add Comment">';
    echo '</form>';

    echo '</div>';
}

/**
 * Activates the custom comments plugin and sets up menu.
 */
function custom_comments_plugin_activation() {
    custom_comments_menu();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'custom_comments_plugin_activation');
?>