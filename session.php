<?php
// Start the session
session_start();

// Set the session timeout to 5 hours (in seconds)
define('SESSION_TIMEOUT', 5 * 60 * 60);

// Check if the session timeout needs to be set or verified
if (isset($_SESSION['start_time'])) {
    // Calculate the session's age
    $sessionAge = time() - $_SESSION['start_time'];

    // If the session has timed out, destroy the session and redirect to the login page
    if ($sessionAge > SESSION_TIMEOUT) {
        session_unset(); // Unset all session variables
        session_destroy(); // Destroy the session
        header('Location: login'); // Redirect to the login page
        exit;
    }
} else {
    // If session start time is not set, set it now
    $_SESSION['start_time'] = time();
}
