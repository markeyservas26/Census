<?php
$deviceId = $_GET['device'] ?? null;

if ($deviceId) {
    $file = 'blocked_devices.txt';
    $blockedDevices = file($file, FILE_IGNORE_NEW_LINES);
    $blockedDevices = array_filter($blockedDevices, function($id) use ($deviceId) {
        return trim($id) !== $deviceId;
    });
    file_put_contents($file, implode("\n", $blockedDevices) . "\n");
    echo "Device unblocked successfully.";
} else {
    echo "No device ID provided.";
}
?>
