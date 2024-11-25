<?php
// Your secret key from reCAPTCHA v3
$recaptcha_secret = '6LdRWokqAAAAAOuHkI6EUm7rCURzTuwM23AphhJs'; // Replace with your secret key

// The reCAPTCHA response from the user (token sent by the form)
$recaptcha_response = $_POST['g-recaptcha-response'];

// Google reCAPTCHA verification URL
$verify_url = 'https://www.google.com/recaptcha/api/siteverify';

// Make the API request to Google for verification
$response = file_get_contents($verify_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);

// Decode the response from JSON format
$response_keys = json_decode($response, true);

// Get the reCAPTCHA score (0 to 1)
$recaptcha_score = $response_keys['score'];

// Check the score to determine if the user is human
if ($recaptcha_score >= 0.5) {
    // Score is high enough, human verified
    echo 'Human verification successful. You may now proceed!';
    // Redirect or show the main website content
    header('Location: ../index.php'); // Redirect to your actual website
    exit;
} else {
    // Score is low, suspicious behavior detected
    echo 'Verification failed. Please try again.';
    exit;
}
?>
