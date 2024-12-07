<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// File to store blocked IPs
define('BLOCKLIST_FILE', 'blocked_ips.txt');

// Function to check if IP is blocked
function isBlocked($ip) {
    if (!file_exists(BLOCKLIST_FILE)) {
        return false;
    }
    $blocked_ips = file(BLOCKLIST_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return in_array($ip, $blocked_ips);
}

// Get user's IP address
$user_ip = $_SERVER['REMOTE_ADDR'];

// Check if IP is blocked
if (isBlocked($user_ip)) {
    // Send HTTP 403 Forbidden header
    header('HTTP/1.1 403 Forbidden');
    
    // Return JSON response indicating the IP is blocked
    $response = ['blocked' => true];
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}

// If the IP is not blocked, proceed with normal logic (you can place this part below the blocking check)
$response = ['blocked' => false];
header('Content-Type: application/json');
echo json_encode($response);
?>
