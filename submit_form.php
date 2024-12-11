<?php
// Start a session to track visits
session_start();

// reCAPTCHA secret key
$secretKey = '6Le4MJEqAAAAAOC7zz5GE-9l3se0icE4d7jXaCHC'; // Replace with your actual secret key

// Get the reCAPTCHA token from the request
$token = $_POST['g-recaptcha-response'];

// Verify the token with Google
$verifyUrl = "https://www.google.com/recaptcha/api/siteverify";
$response = file_get_contents($verifyUrl . "?secret=" . $secretKey . "&response=" . $token);
$responseKeys = json_decode($response, true);

// Check if verification was successful
if ($responseKeys["success"] && $responseKeys["score"] >= 0.5) {
    // Token is valid, check if this is a new visit
    if (!isset($_SESSION['verified'])) {
        // Mark as verified
        $_SESSION['verified'] = true;

        // Redirect to the main page
        header("Location: index.php");
        exit();
    } else {
        // Already verified in this session
        header("Location: index.php");
        exit();
    }
} else {
    // Verification failed
    echo "<h1>Access Denied</h1>";
    echo "<p>Your browser could not be verified. Please try again later.</p>";
}
