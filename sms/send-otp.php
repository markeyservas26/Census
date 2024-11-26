<?php
require_once 'conn.php';

session_start();

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Function to standardize phone number format for comparison
function standardizePhoneNumber($phone) {
    // Remove any non-numeric characters
    $phone = preg_replace('/[^0-9]/', '', $phone);
    
    // If it starts with 63, remove it
    if (substr($phone, 0, 2) === '63') {
        $phone = '0' . substr($phone, 2);
    }
    
    return $phone;
}

// Function to format phone for SMS sending
function formatPhoneForSMS($phone) {
    // Remove any non-numeric characters
    $phone = preg_replace('/[^0-9]/', '', $phone);
    
    // If it starts with 0, replace with +63
    if (substr($phone, 0, 1) === '0') {
        return '+63' . substr($phone, 1);
    }
    
    // If it starts with 63, add +
    if (substr($phone, 0, 2) === '63') {
        return '+' . $phone;
    }
    
    // If no prefix, assume it needs 63
    return '+63' . $phone;
}

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $phone = $_POST['phone'];
        
        // Standardize phone number for database lookup
        $standardizedPhone = standardizePhoneNumber($phone);
        
        // Debug log
        error_log("Looking up standardized phone: " . $standardizedPhone);
        
        // Check if phone exists in database
        $stmt = $conn->prepare("SELECT id FROM users WHERE phone = ?");
        if (!$stmt) {
            throw new Exception("Database prepare error: " . $conn->error);
        }
        
        $stmt->bind_param("s", $standardizedPhone);
        if (!$stmt->execute()) {
            throw new Exception("Database execute error: " . $stmt->error);
        }
        
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            // Generate OTP
            $otp = sprintf("%06d", mt_rand(0, 999999));
            $_SESSION['reset_phone'] = $standardizedPhone;
            $_SESSION['OTP_TIMESTAMP'] = time();
            
            // Update OTP in database
            $update_stmt = $conn->prepare("UPDATE users SET OTP = ?, OTP_TIMESTAMP = CURRENT_TIMESTAMP WHERE phone = ?");
            if (!$update_stmt) {
                throw new Exception("Database prepare error: " . $conn->error);
            }
            
            $update_stmt->bind_param("ss", $otp, $standardizedPhone);
            
            if (!$update_stmt->execute()) {
                throw new Exception("Failed to update OTP: " . $update_stmt->error);
            }
            
            // Format phone number for SMS sending
            $smsPhone = formatPhoneForSMS($standardizedPhone);
            
            // Send OTP via SMS
            $message = "Your OTP for password reset is: " . $otp;
            
            // Log before sending SMS
            error_log("Attempting to send SMS to: " . $smsPhone);
            error_log("Message content: " . $message);
            
            if (!sendSMS($smsPhone, $message)) {
                throw new Exception("Failed to send SMS. Please try again later.");
            }
            
            // If we got here, everything worked
            $_SESSION['success_message'] = "OTP sent successfully! Please check your phone.";
            header("Location: verify-otp.php");
            exit();
            
        } else {
            throw new Exception("Phone number not found in our records");
        }
        
    } catch (Exception $e) {
        $error = $e->getMessage();
        error_log("Forgot Password Error: " . $error);
    } finally {
        if (isset($stmt)) $stmt->close();
        if (isset($update_stmt)) $update_stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-serif flex justify-center items-center min-h-screen">

    <div class="bg-white rounded-lg p-8 shadow-md w-full max-w-md text-center">
        <h2 class="text-gray-800 text-2xl font-bold mb-6">Enter Your Phone Number</h2>
        
        <!-- Error Handling -->
        <?php if ($error): ?>
        <div class="text-red-600 mb-4"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        
        <?php if ($success): ?>
        <div class="text-green-600 mb-4"><?php echo htmlspecialchars($success); ?></div>
        <?php endif; ?>
        
        <!-- Form to Submit Phone Number -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="mb-6">
            <input type="tel" id="phone" name="phone" pattern="[0-9]*" required placeholder="Enter your phone number (e.g., 09123456789)" maxlength="11" 
            class="w-full px-4 py-2 mb-4 border border-gray-300 rounded-md text-lg placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent">
            <button type="submit" class="w-full py-3 bg-gray-800 text-white rounded-md font-semibold text-lg shadow-md hover:bg-gray-700">
                Send OTP
            </button>
        </form>
        
        <!-- Instructions -->
        <div class="text-gray-600 text-sm mb-4">
            <p>Please enter your 11-digit phone number. An OTP will be sent to this number.</p>
        </div>
        
        <!-- Login Link -->
        <div class="text-gray-600 text-sm font-semibold mt-4">
            <a href="../admin/login.php" class="text-gray-600 hover:text-gray-800">Back to Login</a>
        </div>
    </div>

    <script>
        // Remove non-numeric characters
        document.getElementById('phone').addEventListener('input', function (e) {
            this.value = this.value.replace(/[^0-9]/g, ''); // Remove any non-numeric characters
        });
    </script>

</body>
</html>
