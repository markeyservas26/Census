<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/PHPMailer/src/Exception.php';
require '../vendor/PHPMailer/src/PHPMailer.php';
require '../vendor/PHPMailer/src/SMTP.php';

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

// Get user's IP address, device details, and current time
$user_ip = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$current_time = date('Y-m-d H:i:s');

// Deny access if the IP is blocked
if (isBlocked($user_ip)) {
    denyAccess(); // Block access to all pages
}

// Function to get location data based on IP address using ipstack API
function getLocationByIP($ip) {
    $access_key = '513a6267f354485cdeb02fab553ca940'; // Replace with your ipstack API key
    $url = "http://api.ipstack.com/{$ip}?access_key={$access_key}&format=1";

    $response = file_get_contents($url);
    $location_data = json_decode($response, true);

    if (isset($location_data['latitude']) && isset($location_data['longitude'])) {
        return [
            'latitude' => $location_data['latitude'],
            'longitude' => $location_data['longitude']
        ];
    } else {
        return null;
    }
}

$location = getLocationByIP($user_ip);
$latitude = $location ? $location['latitude'] : null;
$longitude = $location ? $location['longitude'] : null;

$google_maps_url = $latitude && $longitude 
    ? "https://maps.google.com/?q={$latitude},{$longitude}" 
    : "https://maps.google.com/?q=" . urlencode($user_ip);

// Send email notification with block option
function sendLoginAlert($user_ip, $user_agent, $current_time, $google_maps_url) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'johnreyjubay315@gmail.com'; // Your Gmail address
        $mail->Password = 'tayv aptj ggcy fdol'; // Your Gmail app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('johnreyjubay315@gmail.com', 'Log in ALert');
        $mail->addAddress('johnreyjubay315@gmail.com');

        $block_url = "https://www.bantayanislandcensus.com/block_device.php?action=block&ip=" . urlencode($user_ip);
        $unblock_url = "https://www.bantayanislandcensus.com/block_device.php?action=unblock&ip=" . urlencode($user_ip);

        $mail->isHTML(true);
        $mail->Subject = 'Log in Attempt Alert';
        $mail->Body = "
            <h3>Log in Attempt Detected</h3>
            <p><strong>IP Address:</strong> $user_ip</p>
            <p><strong>Device Details:</strong> $user_agent</p>
            <p><strong>Time:</strong> $current_time</p>
            <p><strong>View on Google Maps:</strong> <a href='$google_maps_url' target='_blank'>Click here to view the location</a></p>
            <p><strong>Block Device:</strong> <a href='$block_url' target='_blank'>Click here to block this device</a></p>
            <p><strong>Unblock Device:</strong> <a href='$unblock_url' target='_blank'>Click here to unblock this device</a></p>
        ";

        $mail->send();
    } catch (Exception $e) {
        error_log("Email not sent: {$mail->ErrorInfo}");
    }
}

// Send the email notification
sendLoginAlert($user_ip, $user_agent, $current_time, $google_maps_url);

?>
