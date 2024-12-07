<?php
$deviceId = $_GET['device'] ?? null;

if ($deviceId) {
    $file = 'blocked_devices.txt';
    file_put_contents($file, "$deviceId\n", FILE_APPEND | LOCK_EX);
    echo "Device blocked successfully.";
} else {
    echo "No device ID provided.";
}
?>
