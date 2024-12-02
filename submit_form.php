<?php
// The secret key you received from Google reCAPTCHA
$recaptcha_secret = '6LceYIkqAAAAACzv1ohIn9NLAfwCaaW3ZORfRU01';

// The reCAPTCHA response from the user's form submission
$recaptcha_response = $_POST['g-recaptcha-response'];

// Verify the reCAPTCHA response with Google's API
$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha_response");

// Decode the JSON response from Google's API
$response_keys = json_decode($response, true);

// Check if the reCAPTCHA was successful
if (intval($response_keys["success"]) !== 1) {
    // If reCAPTCHA failed, show an error message
    echo 'Please complete the CAPTCHA correctly.';
} else {
    // If reCAPTCHA passed, redirect to the main website page
    header('Location: ../index'); // Replace with your actual website or page
    exit;
}
?>
