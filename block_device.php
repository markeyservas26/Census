<?php

// File to store blocked IPs
define('BLOCKLIST_FILE', 'blocked_ips.txt');

// Function to check if the IP is blocked
function isBlocked($ip) {
    if (!file_exists(BLOCKLIST_FILE)) {
        return false;
    }
    $blocked_ips = file(BLOCKLIST_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return in_array($ip, $blocked_ips);
}

// Function to block the IP
function blockIP($ip) {
    // Check if the IP is already blocked
    if (isBlocked($ip)) {
        return false; // IP is already blocked
    }

    // Add IP to blocked list
    file_put_contents(BLOCKLIST_FILE, $ip . PHP_EOL, FILE_APPEND);
    return true;
}

// Function to unblock the IP
function unblockIP($ip) {
    // Check if the IP is already blocked
    if (!isBlocked($ip)) {
        return false; // IP is not blocked
    }

    // Remove IP from blocked list
    $blocked_ips = file(BLOCKLIST_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $blocked_ips = array_filter($blocked_ips, function ($blocked_ip) use ($ip) {
        return $blocked_ip !== $ip;
    });

    // Write the updated list back to the file
    file_put_contents(BLOCKLIST_FILE, implode(PHP_EOL, $blocked_ips) . PHP_EOL);
    return true;
}

// Get the action (block or unblock) and the IP from the URL
$action = isset($_GET['action']) ? $_GET['action'] : '';
$ip = isset($_GET['ip']) ? $_GET['ip'] : '';

// Check if action and IP are provided
if ($action && $ip) {
    if ($action == 'block') {
        if (blockIP($ip)) {
            echo "<h3>IP $ip has been blocked successfully.</h3>";
        } else {
            echo "<h3>IP $ip is already blocked.</h3>";
        }
    } elseif ($action == 'unblock') {
        if (unblockIP($ip)) {
            echo "<h3>IP $ip has been unblocked successfully.</h3>";
        } else {
            echo "<h3>IP $ip is not currently blocked.</h3>";
        }
    } else {
        echo "<h3>Invalid action specified.</h3>";
    }
} else {
    echo "<h3>Missing action or IP address.</h3>";
}

?>
