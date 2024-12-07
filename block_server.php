<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';

// Get the incoming JSON data
$data = file_get_contents("php://input");

// Log the raw data to debug (optional)
file_put_contents('log.txt', "Received Data: $data\n", FILE_APPEND);

// Check if data is valid JSON
if (empty($data) || ($visitorInfo = json_decode($data, true)) === null) {
    die('Invalid JSON data.');
}

// Extract details
$deviceId = $visitorInfo['deviceId'] ?? 'Unknown'; // Device identifier
$latitude = $visitorInfo['latitude'] ?? 'Unknown';
$longitude = $visitorInfo['longitude'] ?? 'Unknown';
$userAgent = $visitorInfo['userAgent'] ?? 'Unknown';

// Log the decoded data to check values (optional)
file_put_contents('log.txt', "Decoded Data: Latitude: $latitude, Longitude: $longitude, User Agent: $userAgent, Device ID: $deviceId\n", FILE_APPEND);

// Check if the device is blocked
if (isDeviceBlocked($deviceId)) {
    die('This device is blocked from accessing the website.');
}

// Construct Google Maps link to show the location
$googleMapsLink = "https://www.google.com/maps?q={$latitude},{$longitude}";

// Configure PHPMailer
$mail = new PHPMailer(true); // Enable exceptions
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'johnreyjubay315@gmail.com'; // Your Gmail address
    $mail->Password = 'tayv aptj ggcy fdol'; // Your Gmail app password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('johnreyjubay315@gmail.com', 'Website Visitor Alert');
    $mail->addAddress('johnreyjubay315@gmail.com'); // Send alert to your email
    $mail->isHTML(true);

    // Email content
    $mail->Subject = 'Visitor Location Alert';
    $mail->Body = "
        <h3>A visitor just accessed your website!</h3>
        <p><strong>Device ID:</strong> {$deviceId}</p>
        <p><strong>Latitude:</strong> {$latitude}</p>
        <p><strong>Longitude:</strong> {$longitude}</p>
        <p><strong>Browser Info:</strong> {$userAgent}</p>
        <p><strong>View Location:</strong> <a href='{$googleMapsLink}' target='_blank'>Click here to view on Google Maps</a></p>
        <p><a href='https://www.bantayanislandcensus.com/block_device.php?device={$deviceId}'>Block this Device</a></p>
        <p><a href='https://www.bantayanislandcensus.com/unblock_device.php?device={$deviceId}'>Unblock this Device</a></p>
    ";

    $mail->send();
    echo 'Email sent successfully!';
} catch (Exception $e) {
    echo 'Error sending email: ' . $mail->ErrorInfo;
}

// Function to check if a device is blocked
function isDeviceBlocked($deviceId) {
    $file = 'blocked_devices.txt';

    // If the file does not exist, the device is not blocked
    if (!file_exists($file)) {
        return false;
    }

    $blockedDevices = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return in_array($deviceId, $blockedDevices);
}
?>
