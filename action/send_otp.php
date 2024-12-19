<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files
require '../vendor/autoload.php';

// Include database connection
include '../database/db_connect.php'; // Update this path to your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die(json_encode(['status' => 'error', 'message' => 'Invalid email format!']));
    }

    // Check if the email exists in the database
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Generate a random 6-digit OTP
        $otp = rand(100000, 999999);

        // Store OTP and email in session
        $_SESSION['otp'] = $otp;
        $_SESSION['email'] = $email;

        // Create and configure the PHPMailer instance
        $mail = new PHPMailer(true);
        try {
            // SMTP server configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'johnreyjubay315@gmail.com'; // Your Gmail address
            $mail->Password = 'tayv aptj ggcy fdol'; // Your Gmail app password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Set email details
            $mail->setFrom('johnreyjubay315@gmail.com', 'Two-Factor Authentication');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Your OTP Code';
            $mail->Body = 'Your OTP code is: ' . $otp;

            // Send the email
            $mail->send();

            // Respond with success
            echo json_encode(['status' => 'success', 'message' => 'OTP sent successfully!']);
        } catch (Exception $e) {
            // Respond with error
            echo json_encode(['status' => 'error', 'message' => 'Mailer Error: ' . $mail->ErrorInfo]);
        }
    } else {
        // If email is not registered, respond with an error
        echo json_encode(['status' => 'error', 'message' => 'Email is not registered.']);
    }
}
?>
