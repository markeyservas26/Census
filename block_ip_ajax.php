<?php
define('BLOCKLIST_FILE', 'blocked_ips.txt');

// Function to block an IP address
function blockIP($ip) {
    if (!file_exists(BLOCKLIST_FILE)) {
        file_put_contents(BLOCKLIST_FILE, '');
    }
    $blocked_ips = file(BLOCKLIST_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if (!in_array($ip, $blocked_ips)) {
        file_put_contents(BLOCKLIST_FILE, $ip . PHP_EOL, FILE_APPEND | LOCK_EX);
    }
    return true;
}

// Handle the AJAX request
if (isset($_POST['ip'])) {
    $ip = $_POST['ip'];
    if (blockIP($ip)) {
        echo json_encode(['status' => 'success', 'message' => "IP $ip has been blocked."]);
    } else {
        echo json_encode(['status' => 'error', 'message' => "Failed to block IP $ip."]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}
?>
