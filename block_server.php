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

// Get the geolocation based on the IP address using ipinfo.io API
$accessKey = 'ec7e48b369092b'; // You can sign up at ipinfo.io and get your free API key
$ipData = json_decode(file_get_contents("http://ipinfo.io/{$ipAddress}/json?token={$accessKey}"), true);

// Check if the geolocation request was successful
if ($ipData && isset($ipData['loc'])) {
    list($latitudeFromIP, $longitudeFromIP) = explode(',', $ipData['loc']);
} else {
    $latitudeFromIP = 'Unknown';
    $longitudeFromIP = 'Unknown';
}

// Log the decoded data and IP address to check values (optional)
file_put_contents('log.txt', "Decoded Data: Latitude: $latitude, Longitude: $longitude, User Agent: $userAgent, IP Address: $ipAddress, IP Geolocation: Latitude: $latitudeFromIP, Longitude: $longitudeFromIP\n", FILE_APPEND);

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
        <p><strong>Latitude from Geolocation API:</strong> {$latitude}</p>
        <p><strong>Longitude from Geolocation API:</strong> {$longitude}</p>
        <p><strong>Latitude from IP Geolocation:</strong> {$latitudeFromIP}</p>
        <p><strong>Longitude from IP Geolocation:</strong> {$longitudeFromIP}</p>
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
