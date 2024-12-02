<?php
session_start(); // Start the session to store the verification code

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Make sure PHPMailer is installed via Composer

// Check if the form is submitted and the email is provided
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); // Sanitize the email input
    
    // Check if the email is a valid Gmail address
    if (strpos($email, '@gmail.com') === false) {
        echo "Please enter a valid Gmail address.";
        exit;
    }

    // Check if email is already in the session to prevent multiple requests
    if (isset($_SESSION['verification_requests'][$email])) {
        echo "A verification email has already been sent to this address.";
        exit;
    }

    // Generate a unique verification code
    $verificationCode = bin2hex(random_bytes(16)); // 32 characters code

    // Store the verification data in session
    $_SESSION['verification_requests'][$email] = $verificationCode;

    // Send the verification email
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = getenv('GMAIL_USERNAME'); // Use environment variable for Gmail username
        $mail->Password = getenv('tayv aptj ggcy fdol');  // Use environment variable for Gmail App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Set sender and recipient
        $mail->setFrom(getenv('GMAIL_USERNAME'), 'BIC');
        $mail->addAddress($email);

        // Content of the email
        $verifyLink = "https://www.bantayanislandcensus.com/admin/verify.php?email=" . urlencode($email) . "&code={$verificationCode}";

        $mail->isHTML(true);
        $mail->Subject = 'Email Verification Request';
        $mail->Body = "Hi Admin,<br><br>
                There is someone who requested for verification. To verify and allow access to the login page, click the button below:<br><br>
                <a href='{$verifyLink}' style='padding: 10px 20px; background-color: #28a745; color: white; text-decoration: none; border-radius: 5px;'>Yes</a><br><br>
                If this request is unauthorized, you can ignore this email.";

        // Send the email
        if ($mail->send()) {
            echo 'Verification email sent! Please check your email.';
        } else {
            echo 'Error sending email. Please try again later.';
        }

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
