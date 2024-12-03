<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/PHPMailer/src/Exception.php';
require '../vendor/PHPMailer/src/PHPMailer.php';
require '../vendor/PHPMailer/src/SMTP.php';

// Get JSON input from the AJAX request
$data = json_decode(file_get_contents('php://input'), true);

// Validate the input
if (isset($data['latitude']) && isset($data['longitude'])) {
    $latitude = $data['latitude'];
    $longitude = $data['longitude'];

    // Get user's IP address and user agent
    $user_ip = $_SERVER['REMOTE_ADDR'];
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $current_time = date('Y-m-d H:i:s');

    // Generate Google Maps link
    $google_maps_url = "https://www.google.com/maps?q={$latitude},{$longitude}";

    // Function to send email
    function sendLoginAlert($user_ip, $user_agent, $current_time, $google_maps_url) {
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'johnreyjubay315@gmail.com';
            $mail->Password = 'tayv aptj ggcy fdol';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            // Disable debugging
            $mail->SMTPDebug = 0;

            // Recipients
            $mail->setFrom('johnreyjubay315@gmail.com', 'Login Alert');
            $mail->addAddress('johnreyjubay315@gmail.com');

            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'Login Attempt Notification';
            $mail->Body = "
                <h3>Login Attempt Detected</h3>
                <p><strong>IP Address:</strong> $user_ip</p>
                <p><strong>Device Details:</strong> $user_agent</p>
                <p><strong>Time:</strong> $current_time</p>
                <p><strong>View Location on Google Maps:</strong> <a href='$google_maps_url' target='_blank'>Click here</a></p>
            ";

            // Send the email
            $mail->send();
        } catch (Exception $e) {
            error_log("Email not sent: {$mail->ErrorInfo}");
        }
    }

    // Send the login alert email
    sendLoginAlert($user_ip, $user_agent, $current_time, $google_maps_url);

    // Return success response
    echo json_encode(['status' => 'success', 'message' => 'Location sent successfully.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid location data received.']);
}
?>
