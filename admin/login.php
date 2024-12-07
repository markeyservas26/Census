<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/PHPMailer/src/Exception.php';
require '../vendor/PHPMailer/src/PHPMailer.php';
require '../vendor/PHPMailer/src/SMTP.php';

// Get user's IP address, device details, and current time
$user_ip = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$current_time = date('Y-m-d H:i:s');

// Function to get location data based on IP address using ipinfo.io API
function getLocationByIP($ip) {
    $access_token = 'ec7e48b369092b'; // Your ipinfo.io token
    $url = "https://ipinfo.io/{$ip}/json?token={$access_token}"; // ipinfo.io API URL

    // Fetch the response from the API
    $response = file_get_contents($url);
    $location_data = json_decode($response, true);

    // Check if location data is available
    if (isset($location_data['loc'])) {
        list($latitude, $longitude) = explode(',', $location_data['loc']);
        return [
            'latitude' => $latitude,
            'longitude' => $longitude
        ];
    } else {
        return null;
    }
}

// Get the user's geolocation based on IP
$location = getLocationByIP($user_ip);
$latitude = $location ? $location['latitude'] : null;
$longitude = $location ? $location['longitude'] : null;

// Prepare log message
$log_message = "$current_time | IP: $user_ip | Agent: $user_agent | Lat: $latitude | Long: $longitude\n";

// Log the login attempt to a file (log.txt)
$log_file = 'login_attempts.log'; // Path to the log file
file_put_contents($log_file, $log_message, FILE_APPEND);

// Optionally, you can also output to a console or debug log if you want to see the output
// echo "Login attempt tracked successfully";

// The rest of your code would go here (e.g., processing the form submission, etc.)

?>
