<?php
$deviceId = $_GET['device'] ?? null;

if ($deviceId) {
    $file = 'blocked_devices.txt';

    // Check if the file exists
    if (!file_exists($file)) {
        echo "Blocked devices list does not exist.";
        exit;
    }

    $blockedDevices = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    // Remove the device from the list
    $updatedDevices = array_filter($blockedDevices, function($id) use ($deviceId) {
        return trim($id) !== $deviceId;
    });

    // Write the updated list back to the file
    file_put_contents($file, implode("\n", $updatedDevices) . "\n");
    echo "Device unblocked successfully.";
} else {
    echo "No device ID provided.";
}
?>
