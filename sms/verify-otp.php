<?php
include 'conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $otp = $_POST['otp'];
    $phone = $_SESSION['reset_phone']; // Assuming this is set when the OTP is sent

    // Verify OTP from the database and check if it's still valid (within 15 minutes)
    $stmt = $conn->prepare("SELECT id FROM users WHERE phone = ? AND OTP = ? AND OTP_TIMESTAMP > NOW() - INTERVAL 15 MINUTE");
    $stmt->bind_param("ss", $phone, $otp);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $_SESSION['otp_verified'] = true;
        // Clear the OTP in the database to prevent reuse
        $clear_stmt = $conn->prepare("UPDATE users SET OTP = NULL, OTP_TIMESTAMP = NULL WHERE phone = ?");
        $clear_stmt->bind_param("s", $phone);
        $clear_stmt->execute();
        $clear_stmt->close();
        
        $_SESSION['verification_success'] = "OTP Verified Successfully! You can now change your password.";
        header("Location: newpassword.php");
        exit();
    } else {
        $error = "Invalid OTP or OTP has expired.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/img/travelogo.png" rel="icon">
    <title>Enter OTP</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white rounded-lg shadow-md p-8 w-full max-w-md text-center">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Enter OTP</h2>

        <?php if (isset($_SESSION['verification_success'])): ?>
            <div class="text-green-600 bg-green-100 p-4 rounded-md mb-4">
                <?php 
                    echo htmlspecialchars($_SESSION['verification_success']); 
                    unset($_SESSION['verification_success']); 
                ?>
            </div>
        <?php endif; ?>

        <?php if (isset($error)): ?>
            <div class="text-red-600 bg-red-100 p-4 rounded-md mb-4"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="otp" class="text-lg text-gray-700 mb-2 block">One-Time Password (OTP):</label>
            <input type="text" id="otp" name="otp" class="w-full px-4 py-2 border border-gray-300 rounded-md text-lg placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent mb-4" required placeholder="Enter OTP" maxlength="6" pattern="[0-9]{6}">
            <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-md font-semibold text-lg shadow-md hover:bg-blue-700 transition duration-300">
                Verify OTP
            </button>
        </form>

        <div class="text-gray-600 text-sm mt-4">
            <p>The OTP was sent to your phone/email. Please enter it above to proceed.</p>
        </div>

        <div class="mt-4 text-sm">
            <a href="resend-otp.php" class="text-blue-600 hover:underline">Resend OTP</a>
        </div>

        <div class="mt-6">
            <a href="../admin/login.php" class="text-blue-600 hover:underline">Back to Login</a>
        </div>
    </div>

</body>
</html>
