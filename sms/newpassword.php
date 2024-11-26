<?php
include 'conn.php';
session_start();

// Ensure user has verified OTP before they can reset the password
if (!isset($_SESSION['otp_verified']) || $_SESSION['otp_verified'] !== true) {
    header("Location: verify_otp.php");
    exit();
}

$success = '';
$error = '';

// Check for verification success message
if (isset($_SESSION['verification_success'])) {
    $success = $_SESSION['verification_success'];
    unset($_SESSION['verification_success']); // Clear the message after displaying
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize the incoming user input (new password and confirm password)
    $password = $_POST['new-password'];
    $confirm_password = $_POST['confirm-password'];
    $phone = $_SESSION['reset_phone'];  // Assuming phone number is stored in session after OTP verification

    // Check if passwords match
    if ($password !== $confirm_password) {
        $error = "Passwords do not match!";
    } else {
        // Hash the new password securely
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the database query to update the password
        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE phone = ?");
        $stmt->bind_param("ss", $hashed_password, $phone);  // Bind parameters securely

        if ($stmt->execute()) {
            // Password updated successfully, clear OTP-related session data
            unset($_SESSION['otp_verified']);
            unset($_SESSION['reset_phone']);

            $_SESSION['success_message'] = "Your password has been updated successfully!";
    
            // Redirect to login page
            header("Location: ../admin/login.php");
            exit();
        } else {
            // Error occurred during the password update
            $error = "Password update failed. Please try again.";
        }

        $stmt->close();  // Close the prepared statement
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/img/travelogo.png" rel="icon">
    <title>Reset Password</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for eye icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .password-toggle {
        position: absolute;
        right: 10px;
        top: 35px;
        transform: translate(-50%);
        cursor: pointer;
        color: #718096;
        z-index: 10;
        }
        .password-toggle:hover {
            color: #4A5568;
        }
    </style>
</head>
<body class="bg-gray-100 font-serif flex justify-center items-center min-h-screen">

    <div class="bg-white rounded-lg p-8 shadow-md w-full max-w-md text-center">
        <h2 class="text-gray-800 text-2xl font-bold mb-6">Reset Your Password</h2>

        <!-- Success message -->
        <?php if ($success): ?>
            <div class="text-green-600 mb-4">
                <?php 
                    echo htmlspecialchars($success); 
                    unset($_SESSION['verification_success']); 
                ?>
            </div>
        <?php endif; ?>

        <!-- Display error message if passwords don't match or update fails -->
        <?php if ($error): ?>
            <div class="text-red-600 mb-4"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="mb-6">
            <!-- New Password -->
            <div class="mb-4 relative">
                <label for="new-password" class="block text-left text-gray-600">New Password:</label>
                <input type="password" id="new-password" name="new-password" required placeholder="Enter new password" minlength="8"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md text-lg placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent">
                <i id="toggleNewPassword" class="fas fa-eye  text-gray-600 password-toggle" onclick="togglePasswordVisibility('new-password')"></i>
            </div>

            <!-- Confirm Password -->
            <div class="mb-4 relative">
                <label for="confirm-password" class="block text-left text-gray-600">Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" required placeholder="Confirm your password" minlength="8"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md text-lg placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent">
                <i id="toggleConfirmPassword" class="fas fa-eye  text-gray-600 password-toggle" onclick="togglePasswordVisibility('confirm-password')"></i>
            </div>

            <button type="submit" class="w-full py-3 bg-gray-800 text-white rounded-md font-semibold text-lg shadow-md hover:bg-gray-700">
                Reset Password
            </button>
        </form>

        <div class="text-gray-600 text-sm font-semibold mt-4">
            <a href="../admin/login.php" class="text-gray-600 hover:text-gray-800">Back to Login</a>
        </div>
    </div>

    <script>
        // Toggle password visibility
        function togglePasswordVisibility(fieldId) {
            var passwordField = document.getElementById(fieldId);
            var icon = document.getElementById("toggle" + fieldId.charAt(0).toUpperCase() + fieldId.slice(1));

            if (passwordField.type === "password") {
                passwordField.type = "text";  // Show password
                icon.classList.remove("fa-eye");  // Change to open eye icon
                icon.classList.add("fa-eye-slash");  // Change to closed eye icon
            } else {
                passwordField.type = "password";  // Hide password
                icon.classList.remove("fa-eye-slash");  // Change to closed eye icon
                icon.classList.add("fa-eye");  // Change to open eye icon
            }
        }
    </script>

</body>
</html>
