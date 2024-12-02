<?php
session_start(); // Start the session to store the verification code

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Make sure PHPMailer is installed via Composer

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $_POST['email'];
    
    // Check if the email is a Gmail address
    if (strpos($email, '@gmail.com') === false) {
        echo "Please enter a valid Gmail address.";
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
        $mail->Username = 'johnreyjubay315@gmail.com'; // Your Gmail email address
        $mail->Password = 'tayv aptj ggcy fdol';  // Your Gmail App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Set sender and recipient
        $mail->setFrom('johnreyjubay315@gmail.com', 'BIC');
        $mail->addAddress('admin@bantayanislandcensus.com'); // Admin email

        // Content of the email
        $verifyLink = "https://bantayanislandcensus.com/admin/verify.php?email=" . urlencode($email) . "&code={$verificationCode}";

        $mail->isHTML(true);
        $mail->Subject = 'Email Verification Request';
        $mail->Body = "Hi Admin,<br><br>
                There is someone who requested for verification. To verify and allow access to the login page, click the button below:<br><br>
                <a href='{$verifyLink}' style='padding: 10px 20px; background-color: #28a745; color: white; text-decoration: none; border-radius: 5px;'>Yes</a><br><br>
                If this request is unauthorized, you can ignore this email.";
        $mail->send();

        echo 'Verification email sent! Please wait until the admin confirm it.';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
