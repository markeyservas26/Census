<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enteredOtp = $_POST['otp'];

    // Verify OTP
    if ($enteredOtp == $_SESSION['otp']) {
        echo 'OTP verified successfully! You can now log in.';
        // Redirect to login page after verification
        header('Location: ../admin/login.php');
        exit;
    } else {
        echo 'Invalid OTP. Please try again.';
    }
}
?>
