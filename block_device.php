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

// Function to deny access with a block message
function denyAccess() {
    // Redirect to the "403 Forbidden" page or display a message
    header('HTTP/1.1 403 Forbidden');
    echo "<h1>403 Forbidden</h1><p>Your access has been blocked by the system administrator. Please contact support.</p>";
    exit();
}

// Function to block an IP address
function blockIP($ip) {
    // Prevent duplicate IPs
    if (!isBlocked($ip)) {
        file_put_contents(BLOCKLIST_FILE, $ip . PHP_EOL, FILE_APPEND | LOCK_EX);
    }
}

// Function to unblock an IP address
function unblockIP($ip) {
    if (file_exists(BLOCKLIST_FILE)) {
        $blocked_ips = file(BLOCKLIST_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $updated_ips = array_filter($blocked_ips, function ($blocked_ip) use ($ip) {
            return $blocked_ip !== $ip;
        });
        file_put_contents(BLOCKLIST_FILE, implode(PHP_EOL, $updated_ips) . PHP_EOL, LOCK_EX);
    }
}

// Sanitize user input (action and IP)
$action = isset($_GET['action']) ? htmlspecialchars($_GET['action']) : '';
$ip = isset($_GET['ip']) ? filter_var($_GET['ip'], FILTER_VALIDATE_IP) : '';

// Check if the IP is blocked before processing any request
if (isBlocked($_SERVER['REMOTE_ADDR'])) {
    denyAccess(); // If the user's IP is blocked, deny access
}

if ($action && $ip) {
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
            // Provide immediate feedback that the IP is unblocked
            echo "IP $ip has been unblocked and can now access the system.";
            // Optionally redirect or provide a button for the user to return to a different page
            echo '<br><a href="index.php">Click here to go back to the homepage</a>';
            exit();
        }
    } else {
        echo "Invalid action. Use 'block' or 'unblock'.";
    }
} else {
    echo "Invalid request. Provide both 'action' (block/unblock) and a valid 'ip'.";
}

?>
