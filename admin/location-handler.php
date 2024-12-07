<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/PHPMailer/src/Exception.php';
require '../vendor/PHPMailer/src/PHPMailer.php';
require '../vendor/PHPMailer/src/SMTP.php';

// Get user-provided location data from POST request
$latitude = isset($_POST['latitude']) ? $_POST['latitude'] : 'N/A';
$longitude = isset($_POST['longitude']) ? $_POST['longitude'] : 'N/A';
$accuracy = isset($_POST['accuracy']) ? $_POST['accuracy'] : 'N/A';

// Get other details
$user_ip = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$current_time = date('Y-m-d H:i:s');

// Generate Google Maps URL
$google_maps_url = "https://maps.google.com/?q={$latitude},{$longitude}";

// Send email notification
function sendLoginAlert($user_ip, $user_agent, $current_time, $latitude, $longitude, $accuracy, $google_maps_url) {
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
    <p><strong>Location:</strong> Latitude: $latitude, Longitude: $longitude (Accuracy: $accuracy meters)</p>
    <p><strong>View on Google Maps:</strong> <a href='$google_maps_url' target='_blank'>Click here to view the location</a></p>
";

        $mail->send();
    } catch (Exception $e) {
        error_log("Email not sent: {$mail->ErrorInfo}");
    }
}

// Send the alert
sendLoginAlert($user_ip, $user_agent, $current_time, $latitude, $longitude, $accuracy, $google_maps_url);

?>




