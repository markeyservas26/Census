<?php
// Load Composer's autoloader
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'johnreyjubay315@gmail.com';  // Replace with your email
    $mail->Password   = 'jubayjohnrey0000';     // Replace with your app-specific password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Recipients
    $mail->setFrom('bosskira41@gmail.com', 'Mailer');
    $mail->addAddress('bosskira41@gmail.com', 'Joe User');  // Replace with recipient's email

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Test Email from PHPMailer';
    $mail->Body    = 'This is a test email sent using PHPMailer with Gmail SMTP!';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

// Function to check login attempts
function checkLoginAttempts($ip) {
    // Set the maximum number of login attempts
    $max_attempts = 5;
    $timeout_duration = 600; // 10 minutes timeout after exceeding max attempts
    
    // Path to store login attempt data (can be in a DB or file)
    $file = 'login_attempts.txt'; 
    
    // Read existing login attempts data from a file (or database)
    $attempts = [];
    if (file_exists($file)) {
        $attempts = json_decode(file_get_contents($file), true);
    }
    
    // Get the current time
    $current_time = time();
    
    // Remove attempts older than the timeout
    foreach ($attempts as $ip_address => $data) {
        if ($data['last_attempt'] < ($current_time - $timeout_duration)) {
            unset($attempts[$ip_address]);
        }
    }
    
    // If the IP is already in the attempts list, increment the count
    if (isset($attempts[$ip])) {
        $attempts[$ip]['attempts'] += 1;
        $attempts[$ip]['last_attempt'] = $current_time;
    } else {
        // If this IP address is not on the list, add it
        $attempts[$ip] = [
            'attempts' => 1,
            'last_attempt' => $current_time
        ];
    }
    
    // Save the updated attempts back to the file
    file_put_contents($file, json_encode($attempts));
    
    // Check if the number of attempts exceeds the limit
    if ($attempts[$ip]['attempts'] >= $max_attempts) {
        // Trigger an alert if the threshold is crossed
        sendSecurityAlert("Multiple failed login attempts detected from IP: {$ip}");
    }
}

function getServerLocation() {
    $access_token = 'ec7e48b369092b';  // Replace this with your actual API token
    $url = "http://ipinfo.io/json?token={$access_token}";  // No need to change this URL for your server's location

    try {
        $response = file_get_contents($url);
        $details = json_decode($response, true);
        return $details;  // Return the server's location details
    } catch (Exception $e) {
        return "Unable to retrieve location: " . $e->getMessage();  // Handle errors
    }
}

// Simulate a failed login attempt
$ip = $_SERVER['REMOTE_ADDR'];  // Get the IP of the user attempting to log in

// Call the function to check login attempts
checkLoginAttempts($ip);

// Simulate a failed login check
$login_success = false;  // Simulate a failed login attempt

if (!$login_success) {
    echo "Login failed!";
} else {
    echo "Login successful!";
}

// Example: Detect unauthorized access
$unauthorizedAccessDetected = true; // Example condition
$attackerIP = $_SERVER['REMOTE_ADDR']; // Get attacker's IP address

if ($unauthorizedAccessDetected) {
    // Get attacker location based on IP
    $attackerDetails = getServerLocation();  // Corrected function call

    // Build the alert message
    $alertMessage = "Warning: Unauthorized access detected on your system!";
    $attackerInfo = "IP Address: " . $attackerIP . "<br>";
    
    if (is_array($attackerDetails)) {
        $attackerInfo .= "Location: " . $attackerDetails['city'] . ", " . $attackerDetails['region'] . ", " . $attackerDetails['country'] . "<br>";
        $attackerInfo .= "Org: " . $attackerDetails['org'] . "<br>";
    } else {
        $attackerInfo .= $attackerDetails; // Handle error messages from the getServerLocation function
    }
    
    // Send security alert with attacker details
    sendSecurityAlert($alertMessage . "<br>" . $attackerInfo);
}
?>
