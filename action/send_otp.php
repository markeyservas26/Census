<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files
require '../vendor/autoload.php';

// Include database connection (you need to modify this part based on your DB connection details)
include '../database/db_connect.php'; // Assume you have a db_connection.php file to handle DB connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
        exit;
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

            // Show success message and redirect to OTP verification page
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>OTP Sent</title>
                <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.js"></script>
                <script src="https://cdn.tailwindcss.com"></script>
            </head>
            <body class="bg-gradient-to-r from-white-400 to-teal-400 h-screen flex justify-center items-center">

                <div class="bg-white p-8 rounded-lg shadow-2xl w-full max-w-sm text-center">
                    <div class="mb-6">
                        <img src="https://img.icons8.com/ios/452/mail.png" alt="Mail Icon" class="w-20 mx-auto mb-4">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">OTP Sent Successfully!</h2>
                        <p class="text-lg text-gray-600 mb-4">An OTP has been sent to your Gmail address. Please check your inbox.</p>
                    </div>

                    <a href="../admin/verify_otp.php" class="w-full py-5 bg-gradient-to-r from-blue-500 to-teal-400 text-white font-semibold rounded-md shadow-lg hover:bg-gradient-to-l hover:from-teal-400 hover:to-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-all duration-300 ease-in-out">
                        Enter OTP
                    </a>
                </div>

            </body>
            </html>
            <?php
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        // If email is not registered, show an error message
        echo "Email is not registered. Please enter a valid email.";
    }
}
?>
