<?php
/**
 * comment-author_ip.php
 *
 * This file contains functions to generate random IP addresses within specified ranges.
 */

/**
 * Generate a random IP address within the specified IP ranges.
 *
 * @return string Random IP address
 */
function generate_random_ip() {
    // List of IP address ranges
    $ip_ranges = array(
        '1.37.0.0-1.37.255.255',
        '101.0.22.0-101.0.23.255',
        '101.0.8.0-101.0.11.255',
        '101.33.18.0-101.33.19.255',
        '101.36.100.0-101.36.101.255',
        '102.132.97.0-102.132.97.255',
        '103.1.116.0-103.1.119.255',
        '103.10.152.0-103.10.155.255',
        '103.10.176.0-103.10.179.255',
        '103.10.200.0-103.10.203.255',
    );

    // Randomly select an IP range
    $selected_range = $ip_ranges[array_rand($ip_ranges)];

    // Extract start and end IP addresses from the range
    list($start_ip, $end_ip) = explode('-', $selected_range);

    // Convert IP addresses to long integers for comparison
    $start_ip_long = ip2long($start_ip);
    $end_ip_long = ip2long($end_ip);

    // Generate a random IP address within the selected range
    $random_ip_long = mt_rand($start_ip_long, $end_ip_long);
    $random_ip = long2ip($random_ip_long);

    return $random_ip;
}
?>