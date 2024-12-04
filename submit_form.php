<?php
// The secret key you received from Google reCAPTCHA
$recaptcha_secret = '6Le4MJEqAAAAAOC7zz5GE-9l3se0icE4d7jXaCHC'; // Your v3 secret key

// The reCAPTCHA response from the user's form submission
$recaptcha_response = $_POST['g-recaptcha-response'];

// Verify the reCAPTCHA response with Google's API
$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = [
    'secret' => $recaptcha_secret,
    'response' => $recaptcha_response,
];

$options = [
    'http' => [
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data),
    ],
];

$context = stream_context_create($options);
$response = file_get_contents($url, false, $context);
$response_keys = json_decode($response, true);

// Check if the reCAPTCHA was successful and the score meets your threshold
if ($response_keys["success"] && $response_keys["score"] >= 0.5) {
    // If reCAPTCHA passed, redirect to the main website page
    header('Location: ../index'); // Replace with your actual website or page
    exit;
} else {
    // If reCAPTCHA failed, show an error message
    echo 'Verification failed. Please try again.';
}
?>
