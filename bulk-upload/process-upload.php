<?php

// process-upload.php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['csv_file']) && $_FILES['csv_file']['error'] === UPLOAD_ERR_OK) {
        // Get the uploaded file
        $uploaded_file = $_FILES['csv_file']['tmp_name'];

        // Include the file for generating comment date
        include 'references.php';
        
        include 'generate-comment-date.php';
        include 'comment-author.php';
        include 'comment-author-ip.php';
        include 'comment-agent.php';


        // Process the CSV file and build the comment data array
        $comment_data_array = array();
        if (($handle = fopen($uploaded_file, 'r')) !== false) {
            while (($data = fgetcsv($handle)) !== false) {
                $post_id = intval($_POST['comment_post_id']);
                $comment_content = $data[0]; // Assuming the comment content is in the first column

                // Generate random comment author and email
                $author_data = generate_random_comment_author($first_names, $middle_names, $last_names, $email_providers);
                $comment_author = $author_data['author_name'];
                $comment_author_email = $author_data['author_email'];

                // Generate random comment author ip address
                $comment_author_IP = generate_random_ip($ip_ranges);

                // Call the function to generate comment date
                $comment_date = generate_random_comment_date($_POST['start_date'], $_POST['end_date']);

                // Generate random comment agent
                $comment_agent = generate_comment_agent($comment_agents);

                // Add comment data to array
                $comment_data_array[] = array(
                    'comment_post_ID' => $post_id,
                    'comment_author' => $comment_author,
                    'comment_author_email' => $comment_author_email,
                    'comment_author_IP' => $comment_author_IP,
                    'comment_content' => $comment_content,
                    'comment_date' => $comment_date,
                    'comment_date_gmt' => $comment_date,
                    'comment_agent' => $comment_agent,
                );
            }
            fclose($handle);
        }

        // Insert comments into the database
        foreach ($comment_data_array as $comment_data) {
            wp_insert_comment($comment_data);
        }

        // Display success message
        echo '<div class="notice notice-success is-dismissible">
        <p>Comments uploaded successfully!</p>
        </div>';
    }
}
?>