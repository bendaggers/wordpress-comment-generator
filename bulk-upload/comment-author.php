<?php

// comment-author.php

function generate_random_comment_author($first_names, $middle_names, $last_names, $email_providers) {
    $options = array(
        'option_a' => 60,
        'option_b' => 15,
        'option_c' => 15,
        'option_d' => 10,
    );

    $random_value = mt_rand(1, 100);

    if ($random_value <= $options['option_a']) {
        $first_name = $first_names[array_rand($first_names)];
        $last_name = $last_names[array_rand($last_names)];
        $author_name = $first_name . ' ' . $last_name;
    } elseif ($random_value <= $options['option_a'] + $options['option_b']) {
        $author_name = $first_names[array_rand($first_names)];
    } elseif ($random_value <= $options['option_a'] + $options['option_b'] + $options['option_c']) {
        $first_name = $first_names[array_rand($first_names)];
        $middle_name = $middle_names[array_rand($middle_names)];
        $last_name = $last_names[array_rand($last_names)];
        $author_name = $first_name . ' ' . $middle_name . ' ' . $last_name;
    } else {
        $author_name = $last_names[array_rand($last_names)];
    }

    // Generate random email provider
    $email_provider = $email_providers[array_rand($email_providers)];
    
    // Combine author name and email provider to form author email
    $author_email = str_replace(' ', '', strtolower($author_name)) . $email_provider;

    return array('author_name' => $author_name, 'author_email' => $author_email);
}
?>