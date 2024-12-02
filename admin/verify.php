<?php
session_start();

if (isset($_GET['email']) && isset($_GET['code'])) {
    $email = $_GET['email'];
    $code = $_GET['code'];

    // Validate the verification code
    if (isset($_SESSION['verification_requests'][$email]) && $_SESSION['verification_requests'][$email] === $code) {
        // Mark the email as verified
        unset($_SESSION['verification_requests'][$email]);

        // Redirect the user to the login page
        header('Location: ../admin/login.php?status=verified');
        exit;
    } else {
        echo "Invalid or expired verification link.";
    }
} else {
    echo "Invalid verification request.";
}
?>
