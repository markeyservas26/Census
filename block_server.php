<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';

// File to store blocked user-agents
define('BLOCKLIST_FILE', 'blocked_user_agents.txt');

// Function to check if the device (user-agent) is blocked
function isBlocked($user_agent) {
    if (!file_exists(BLOCKLIST_FILE)) {
        return false;
    }
    $blocked_agents = file(BLOCKLIST_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return in_array($user_agent, $blocked_agents);
}

// Function to deny access with a block message
function denyAccess() {
    // Redirect to the "403 Forbidden" page or display a message
    header('HTTP/1.1 403 Forbidden');
    echo "<h1>403 Forbidden</h1><p>Your access has been blocked by the system administrator. Please contact support.</p>";
    exit();
}

// Function to block the device by adding its user-agent to the blocklist
function blockDevice($user_agent) {
    $blocked_agents = file_exists(BLOCKLIST_FILE) ? file(BLOCKLIST_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
    $blocked_agents[] = $user_agent;
    file_put_contents(BLOCKLIST_FILE, implode(PHP_EOL, $blocked_agents) . PHP_EOL);
}

// Function to unblock the device by removing its user-agent from the blocklist
function unblockDevice($user_agent) {
    $blocked_agents = file_exists(BLOCKLIST_FILE) ? file(BLOCKLIST_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
    $blocked_agents = array_diff($blocked_agents, [$user_agent]);
    file_put_contents(BLOCKLIST_FILE, implode(PHP_EOL, $blocked_agents) . PHP_EOL);
}

// Get user's IP address, device details (user-agent), and current time
$user_ip = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$current_time = date('Y-m-d H:i:s');

// Deny access if the device is blocked
if (isBlocked($user_agent)) {
    denyAccess(); // Block access to all pages
}

// If you want to block or unblock the device manually, call the following function
// Example: Block the device
// blockDevice($user_agent);

// Example: Unblock the device
// unblockDevice($user_agent);

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

        $mail->setFrom('johnreyjubay315@gmail.com', 'Website Visit');
        $mail->addAddress('johnreyjubay315@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'Website Visit Notification';
        $mail->Body = "
    <h3>Website Visit Detected</h3>
    <p><strong>IP Address:</strong> $user_ip</p>
    <p><strong>Device Details:</strong> $user_agent</p>
    <p><strong>Time:</strong> $current_time</p>
    <p><strong>View on Google Maps:</strong> <a href='$google_maps_url' target='_blank'>Click here to view the location</a></p>
    <p>
        <a href='block_device.php?user_agent=" . urlencode($user_agent) . "' 
           style='padding: 10px; background-color: red; color: white; text-decoration: none;'>Block Device</a>
    </p>
    <p>
        <a href='unblock_device.php?user_agent=" . urlencode($user_agent) . "' 
           style='padding: 10px; background-color: green; color: white; text-decoration: none;'>Unblock Device</a>
    </p>
";

        $mail->send();
    } catch (Exception $e) {
        error_log("Email not sent: {$mail->ErrorInfo}");
    }
}

// Send the email notification
sendLoginAlert($user_ip, $user_agent, $current_time, $google_maps_url);

?>
