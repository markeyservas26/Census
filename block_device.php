<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('BLOCKLIST_FILE', 'blocked_ips.txt');

// Check if an action and IP are provided
if (isset($_GET['action']) && isset($_GET['ip'])) {
    $action = $_GET['action'];
    $ip = $_GET['ip'];

    // Perform the requested action
    if ($action === 'block') {
        if (isBlocked($ip)) {
            echo "IP $ip is already blocked.";
        } else {
            blockIP($ip);
            echo "IP $ip has been blocked.";
        }
    } elseif ($action === 'unblock') {
        if (!isBlocked($ip)) {
            echo "IP $ip is not in the blocklist.";
        } else {
            unblockIP($ip);
            echo "IP $ip has been unblocked.";
        }
    } else {
        echo "Invalid action.";
    }
} else {
    echo "Invalid request. Provide 'action' (block/unblock) and 'ip'.";
}

// Function to check if IP is blocked
function isBlocked($ip) {
    if (!file_exists(BLOCKLIST_FILE)) {
        return false;
    }
    $blocked_ips = file(BLOCKLIST_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return in_array($ip, $blocked_ips);
}

// Function to block an IP address
function blockIP($ip) {
    file_put_contents(BLOCKLIST_FILE, $ip . PHP_EOL, FILE_APPEND | LOCK_EX);
}

// Function to unblock an IP address
function unblockIP($ip) {
    if (file_exists(BLOCKLIST_FILE)) {
        $blocked_ips = file(BLOCKLIST_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $updated_ips = array_filter($blocked_ips, function ($blocked_ip) use ($ip) {
            return $blocked_ip !== $ip;
        });
        file_put_contents(BLOCKLIST_FILE, implode(PHP_EOL, $updated_ips) . PHP_EOL);
    }
}
?>
