<?php
$deviceId = $_GET['device'] ?? null;

if ($deviceId) {
    $file = 'blocked_devices.txt';

    // Ensure the file exists
    if (!file_exists($file)) {
        file_put_contents($file, '');
    }

    // Append the device ID only if not already in the file
    $blockedDevices = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if (!in_array($deviceId, $blockedDevices)) {
        file_put_contents($file, "$deviceId\n", FILE_APPEND | LOCK_EX);
        echo "Device blocked successfully.";
    } else {
        echo "Device is already blocked.";
    }
} else {
    echo "No device ID provided.";
}
?>
