<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/PHPMailer/src/Exception.php';
require '../vendor/PHPMailer/src/PHPMailer.php';
require '../vendor/PHPMailer/src/SMTP.php';

// Get user's IP address and other details
$user_ip = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$current_time = date('Y-m-d H:i:s');

// Collect latitude and longitude from POST (provided by JavaScript)
$latitude = isset($_POST['latitude']) ? $_POST['latitude'] : 'N/A';
$longitude = isset($_POST['longitude']) ? $_POST['longitude'] : 'N/A';

// Fallback: Track IP-based location using an API
function trackIPAddress($ip) {
    $api_key = 'a9c7df9068cf491dbf4a3450d88e2338'; // Replace with your geolocation API key
    $url = "https://api.ipgeolocation.io/ipgeo?apiKey={$api_key}&ip={$ip}";

    $response = file_get_contents($url);
    $location_data = json_decode($response, true);

    return [
        'city' => $location_data['city'] ?? 'Unknown City',
        'region' => $location_data['state_prov'] ?? 'Unknown Region',
        'country' => $location_data['country_name'] ?? 'Unknown Country'
    ];
}

$location = trackIPAddress($user_ip);
$city = $location['city'];
$region = $location['region'];
$country = $location['country'];

// Generate Google Maps URL using latitude and longitude
$google_maps_url = "https://maps.google.com/?q={$latitude},{$longitude}";

// Send email notification
function sendLoginAlert($user_ip, $user_agent, $current_time, $google_maps_url, $latitude, $longitude, $city, $region, $country) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'johnreyjubay315@gmail.com';
        $mail->Password = 'tayv aptj ggcy fdol';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('johnreyjubay315@gmail.com', 'Login Alert');
        $mail->addAddress('johnreyjubay315@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'Login Attempt Notification';
        $mail->Body = "
            <h3>Login Attempt Detected</h3>
            <p><strong>IP Address:</strong> $user_ip</p>
            <p><strong>Device Details:</strong> $user_agent</p>
            <p><strong>Time:</strong> $current_time</p>
            <p><strong>Device Location:</strong> Latitude: $latitude, Longitude: $longitude</p>
            <p><strong>IP-based Location:</strong> $city, $region, $country</p>
            <p><strong>View on Google Maps:</strong> <a href='$google_maps_url' target='_blank'>Click here to view the location</a></p>
        ";

        $mail->send();
    } catch (Exception $e) {
        error_log("Email not sent: {$mail->ErrorInfo}");
    }
}

sendLoginAlert($user_ip, $user_agent, $current_time, $google_maps_url, $latitude, $longitude, $city, $region, $country);

?>
