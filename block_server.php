
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';

require 'vendor/autoload.php';


// Get the incoming JSON data
$data = file_get_contents("php://input");
$visitorInfo = json_decode($data, true);

// Extract details
$latitude = $visitorInfo['latitude'] ?? 'Unknown';
$longitude = $visitorInfo['longitude'] ?? 'Unknown';
$userAgent = $visitorInfo['userAgent'] ?? 'Unknown';

// Construct Google Maps link
$googleMapsLink = "https://www.google.com/maps?q={$latitude},{$longitude}";

// Configure PHPMailer
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'johnreyjubay315@gmail.com'; // Your Gmail address
$mail->Password = 'tayv aptj ggcy fdol'; // Your Gmail app password
$mail->SMTPSecure = 'tls';
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
    <p><strong>View Location:</strong> <a href='{$googleMapsLink}' target='_blank'>Click here to view on Google Maps</a></p>
";

if (!$mail->send()) {
    echo 'Error sending email: ' . $mail->ErrorInfo;
} else {
    echo 'Email sent successfully!';
}
?>
