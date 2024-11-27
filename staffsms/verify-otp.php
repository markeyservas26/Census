<?php
include 'conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $otp = $_POST['otp'];
    $phone = $_SESSION['reset_phone']; // Assuming this is set when the OTP is sent

    // Verify OTP from the database and check if it's still valid (within 15 minutes)
    $stmt = $conn->prepare("SELECT id FROM staff WHERE phone = ? AND OTP = ? AND OTP_TIMESTAMP > NOW() - INTERVAL 15 MINUTE");
    $stmt->bind_param("ss", $phone, $otp);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $_SESSION['otp_verified'] = true;
        // Clear the OTP in the database to prevent reuse
        $clear_stmt = $conn->prepare("UPDATE staff SET OTP = NULL, OTP_TIMESTAMP = NULL WHERE phone = ?");
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
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-serif flex justify-center items-center min-h-screen">

    <div class="bg-white rounded-lg p-8 shadow-md w-full max-w-md text-center">
        <h2 class="text-gray-800 text-2xl font-bold mb-6">Enter OTP</h2>

        <!-- Success message -->
        <?php if (isset($_SESSION['verification_success'])): ?>
            <div class="text-green-600 mb-4">
                <?php 
                    echo htmlspecialchars($_SESSION['verification_success']); 
                    unset($_SESSION['verification_success']); 
                ?>
            </div>
        <?php endif; ?>

        <!-- Error message -->
        <?php if (isset($error)): ?>
            <div class="text-red-600 mb-4"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <!-- OTP form -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="mb-6">
            <input type="text" id="otp" name="otp" required placeholder="Enter OTP" maxlength="6" pattern="[0-9]{6}" 
            class="w-full px-4 py-2 mb-4 border border-gray-300 rounded-md text-lg placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent">
            <button type="submit" class="w-full py-3 bg-gray-800 text-white rounded-md font-semibold text-lg shadow-md hover:bg-gray-700">
                Verify OTP
            </button>
        </form>

        <!-- Instructions -->
        <div class="text-gray-600 text-sm mb-4">
            <p>The OTP was sent to your phone/email. Please enter it above to proceed.</p>
        </div>

        <!-- Back to Login Link -->
        <div class="text-gray-600 text-sm font-semibold mt-4">
            <a href="../staff/login.php" class="text-gray-600 hover:text-gray-800">Back to Login</a>
        </div>
    </div>

</body>
</html>