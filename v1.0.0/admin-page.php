<?php
// admin-menu.php

function custom_comments_menu() {
    add_menu_page(
        'Custom Comments',
        'Custom Comments',
        'manage_options',
        'custom-comments',
        'custom_comments_page'
    );
}
add_action('admin_menu', 'custom_comments_menu');

function custom_comments_enqueue_scripts() {
    wp_enqueue_script('jquery-ui-datepicker');
    wp_enqueue_style('jquery-ui-datepicker', 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
    wp_add_inline_script('jquery-ui-datepicker', '
        jQuery(document).ready(function($) {
            $(".datepicker").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });
        });
    ');
}
add_action('admin_enqueue_scripts', 'custom_comments_enqueue_scripts');





// Generate email address from comment author name
function generate_comment_author_email($author_name) {
    // Remove spaces and special characters
    $cleaned_name = preg_replace('/[^a-zA-Z0-9]/', '', $author_name);

    // Randomly decide to replace spaces with "_" or remove them
    if (strpos($cleaned_name, ' ') !== false) {
        $cleaned_name = str_replace(' ', (mt_rand(0, 1) ? '_' : ''), $cleaned_name);
    }

    // Choose a random domain
    $domains = array('@gmail.com', '@yahoo.com', '@outlook.com');
    $selected_domain = $domains[array_rand($domains)];

    // Combine name and domain to create email address
    $email = $cleaned_name . $selected_domain;

    // Convert email to lowercase
    $email = strtolower($email);

    return $email;
}




?>