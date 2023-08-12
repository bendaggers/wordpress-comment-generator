<?php
/**
 * Plugin Name: Comment Seeder
 * Description: A simple plugin to seed comments in two tabs.
 * Version: 1.0
 */

// Enqueue scripts and styles
function comment_seeder_enqueue_scripts() {
    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css');
    
    // Enqueue Bootstrap JS (with the necessary dependencies)
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js', array('jquery'), false, true);
    
    // Enqueue jQuery (if not already enqueued by WordPress)
    if (!wp_script_is('jquery', 'enqueued')) {
        wp_enqueue_script('jquery');
    }
}
add_action('admin_enqueue_scripts', 'comment_seeder_enqueue_scripts');

// Create the admin menu page
function comment_seeder_menu_page() {
    add_menu_page(
        'Comment Seeder',
        'Comment Seeder',
        'manage_options',
        'comment-seeder',
        'comment_seeder_page_content'
    );
}
add_action('admin_menu', 'comment_seeder_menu_page');

// Content for the admin menu page
function comment_seeder_page_content() {
    ?>
<div class="wrap">
    <h1>Comment Seeder</h1>
    <h2 class="nav-tab-wrapper">
        <a class="nav-tab nav-tab-active" id="bulk">Bulk Upload Comments</a>
        <a class="nav-tab" id="single">Post Single Comment</a>
    </h2>
    <div class="tab-content" id="bulk-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h3>Bulk Upload Comments</h3>
                    <?php include plugin_dir_path(__FILE__) . 'bulk-upload/bulk-upload.php'; ?>
                </div>
            </div>

        </div>

    </div>
    <div class="tab-content" id="single-content" style="display:none;">
        <h3>Single Comments Post</h3>
    </div>
</div>
<script>
jQuery(document).ready(function($) {
    $('.nav-tab').click(function() {
        $('.nav-tab').removeClass('nav-tab-active');
        $(this).addClass('nav-tab-active');
        $('.tab-content').hide();
        $('#' + $(this).attr('id') + '-content').show();
    });
});
</script>
<?php
}