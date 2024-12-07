<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';

// File to store blocked IPs
define('BLOCKLIST_FILE', 'blocked_ips.txt');

// Function to check if an IP is blocked
function isBlocked($ip) {
    if (!file_exists(BLOCKLIST_FILE)) {
        return false;
    }
    $blocked_ips = file(BLOCKLIST_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return in_array($ip, $blocked_ips);
}

// Function to block an IP
function blockIP($ip) {
    $blocked_ips = file(BLOCKLIST_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if (!in_array($ip, $blocked_ips)) {
        file_put_contents(BLOCKLIST_FILE, $ip . PHP_EOL, FILE_APPEND);
    }
}

// Function to unblock an IP
function unblockIP($ip) {
    if (file_exists(BLOCKLIST_FILE)) {
        $blocked_ips = file(BLOCKLIST_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $blocked_ips = array_filter($blocked_ips, fn($blocked_ip) => $blocked_ip !== $ip);
        file_put_contents(BLOCKLIST_FILE, implode(PHP_EOL, $blocked_ips) . PHP_EOL);
    }
}

// Check for the action (block or unblock) in the query string
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $ip = $_GET['ip'] ?? null;

    if ($ip) {
        if ($action === 'block') {
            blockIP($ip);
            echo "IP $ip has been blocked.";
        } elseif ($action === 'unblock') {
            unblockIP($ip);
            echo "IP $ip has been unblocked.";
        } else {
            echo "Invalid action specified.";
        }
    } else {
        echo "IP address is required.";
    }
    exit;
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

    // Email content
    $mail->Subject = 'Visitor Location Alert';
    $mail->Body = "
        <h3>A visitor just accessed your website!</h3>
        <p><strong>Latitude:</strong> {$latitude}</p>
        <p><strong>Longitude:</strong> {$longitude}</p>
        <p><strong>Browser Info:</strong> {$userAgent}</p>
        <p><strong>IP Address:</strong> {$ipAddress}</p>
        <p><strong>View Location:</strong> <a href='{$googleMapsLink}' target='_blank'>Click here to view on Google Maps</a></p>
    ";

    $mail->send();
    echo 'Email sent successfully!';
} catch (Exception $e) {
    echo 'Error sending email: ' . $mail->ErrorInfo;
}
?>
