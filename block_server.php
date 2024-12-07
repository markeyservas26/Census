<?php

include 'block_device.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';

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

// Get the incoming JSON data
$data = file_get_contents("php://input");

// Log the raw data to debug (optional)
file_put_contents('log.txt', "Received Data: $data\n", FILE_APPEND);

// Check if data is valid JSON
if ($data === false || json_last_error() !== JSON_ERROR_NONE) {
    die('Invalid JSON data: ' . json_last_error_msg()); // Provide more details on the error
}

$visitorInfo = json_decode($data, true);

// Extract details
$latitude = $visitorInfo['latitude'] ?? 'Unknown';
$longitude = $visitorInfo['longitude'] ?? 'Unknown';
$userAgent = $visitorInfo['userAgent'] ?? 'Unknown';

// Get the IP address of the visitor
$ipAddress = $_SERVER['REMOTE_ADDR'];

// Check if the IP is blocked
if (isBlocked($ipAddress)) {
    die('Your IP is blocked.');
}

// Log the decoded data and IP address to check values (optional)
file_put_contents('log.txt', "Decoded Data: Latitude: $latitude, Longitude: $longitude, User Agent: $userAgent, IP Address: $ipAddress\n", FILE_APPEND);

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

    // Use the correct variable for IP address
    $block_url = "https://www.bantayanislandcensus.com/block_device.php?action=block&ip=" . urlencode($ipAddress);
    $unblock_url = "https://www.bantayanislandcensus.com/block_device.php?action=unblock&ip=" . urlencode($ipAddress);

    // Email content
$mail->Subject = 'Visitor Location Alert';
$mail->Body = "
    <h3>A visitor just accessed your website!</h3>
    <p><strong>Latitude:</strong> {$latitude}</p>
    <p><strong>Longitude:</strong> {$longitude}</p>
    <p><strong>Browser Info:</strong> {$userAgent}</p>
    <p><strong>IP Address:</strong> {$ipAddress}</p>
    <p><strong>View Location:</strong> <a href='{$googleMapsLink}' target='_blank'>Click here to view on Google Maps</a></p>
    <p><strong>Block Device:</strong> <a href='$block_url' target='_blank'>Click here to block this device</a></p>
    <p><strong>Unblock Device:</strong> <a href='$unblock_url' target='_blank'>Click here to unblock this device</a></p>
";

    $mail->send();
    echo 'Email sent successfully!';
} catch (Exception $e) {
    echo 'Error sending email: ' . $mail->ErrorInfo;
}
?>
