<?php

function generate_random_ip($ip_ranges) {

    $selected_range = $ip_ranges[array_rand($ip_ranges)];

    list($start_ip, $end_ip) = explode('-', $selected_range);

    $start_ip_long = ip2long($start_ip);
    $end_ip_long = ip2long($end_ip);

    $random_ip_long = mt_rand($start_ip_long, $end_ip_long);
    $random_ip = long2ip($random_ip_long);

    return $random_ip;
}
?>