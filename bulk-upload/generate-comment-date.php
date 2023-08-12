<?php
// Generate random comment date within the specified range
function generate_random_comment_date($start_date, $end_date) {
    $start_timestamp = strtotime($start_date);
    $end_timestamp = strtotime($end_date);
    $random_timestamp = mt_rand($start_timestamp, $end_timestamp);
    return date('Y-m-d H:i:s', $random_timestamp);
}
?>