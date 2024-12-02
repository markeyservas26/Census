<?php
include '../session.php';
include '../database/db_connect.php';

function checkSqlInjection($input) {
    $sqlPatterns = array(
        '/\b(union|select|from|where|drop|table|insert|delete|update|alter)\b/i',
        '/[\'";]/i',
        '/--/',
        '/\/\*.*\*\//',
        '/@@/',
        '/\bor\s+.*?=.*?/i',
        '/\bxp_cmdshell/i',
        '/\bexec\(/i',
        '/\bload_file/i',
        '/into\s+(out|dump)file/i'
    );

    foreach ($sqlPatterns as $pattern) {
        if (preg_match($pattern, $input)) {
            return true;
        }
    }

    // Check for hex encoded strings
    if (preg_match('/0x[0-9a-f]+/i', $input)) {
        return true;
    }

    return false;
}

// Enhanced function to check for potential XSS
function checkXss($input) {
    $xssPatterns = array(
        '/<script\b[^>]*>(.*?)<\/script>/is',
        '/on\w+\s*=\s*"(?:.|\n)*?"/is',
        '/on\w+\s*=\s*\'(?:.|\n)*?\'/is',
        '/<\s*embed/is',
        '/<\s*iframe/is',
        '/<\s*object/is',
        '/<\s*img/is',
        '/javascript:/is',
        '/vbscript:/is',
        '/data:/is'
    );

    foreach ($xssPatterns as $pattern) {
        if (preg_match($pattern, $input)) {
            return true;
        }
    }

    return strip_tags($input) !== $input;
}
// Verify reCAPTCHA token
function verifyRecaptcha($token) {
    $secretKey = '6LceYIkqAAAAACzv1ohIn9NLAfwCaaW3ZORfRU01';
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    
    $data = [
        'secret' => $secretKey,
        'response' => $token
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        error_log('reCAPTCHA CURL error: ' . curl_error($ch));
        curl_close($ch);
        return false;
    }
    curl_close($ch);
    
    $result = json_decode($response, true);
    
    return isset($result['success']) && $result['success'] === true;
}


// Send JSON response
function sendJsonResponse($icon, $title, $text, $redirect = null) {
    $response = [
        'icon' => $icon,
        'title' => $title,
        'text' => $text
    ];
    if ($redirect) {
        $response['redirect'] = $redirect;
    }
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

// Enhanced login attempts tracking function
function trackLoginAttempts() {
    // Initialize login attempts in session if not already set
    if (!isset($_SESSION['login_attempts'])) {
        $_SESSION['login_attempts'] = 0;
        $_SESSION['last_attempt_time'] = time();
    }
    
    // Increment login attempts
    $_SESSION['login_attempts']++;
    
    // If 3 attempts are reached, implement a cooldown
    if ($_SESSION['login_attempts'] >= 3) {
        // Set a 30-second lockout period
        $_SESSION['lockout_time'] = time() + 30;
        return false;
    }
    
    return true;
}

// Function to check if account is locked
function isAccountLocked() {
    // Check if lockout time is set and not expired
    if (isset($_SESSION['lockout_time'])) {
        $remainingLockTime = $_SESSION['lockout_time'] - time();
        
        // If lockout time has expired, reset login attempts
        if ($remainingLockTime <= 0) {
            unset($_SESSION['lockout_time']);
            $_SESSION['login_attempts'] = 0;  // Reset login attempts after cooldown
            return false;  // Account is no longer locked
        }
        
        // Return the remaining lockout time in seconds
        return $remainingLockTime;
    }
    return false;
}

// Reset login attempts
function resetLoginAttempts() {
    unset($_SESSION['login_attempts']);
    unset($_SESSION['lockout_time']);
    unset($_SESSION['last_attempt_time']);
}

// Handle login request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the reCAPTCHA token is provided
    if (empty($_POST['g-recaptcha-response'])) {
        sendJsonResponse('error', 'Missing Data', 'Please complete the reCAPTCHA challenge.');
    }

     // Check if account is currently locked
     $lockRemaining = isAccountLocked();
     if ($lockRemaining !== false) {
         sendJsonResponse("error", "Account Locked", "Too many failed attempts. Please try again in {$lockRemaining} minutes.");
         exit;
     }

    // Ensure username and password are present
    if (empty($_POST['username']) || empty($_POST['password'])) {
        sendJsonResponse('error', 'Missing Data', 'Please provide your username and password.');
    }

    // Verify reCAPTCHA
    if (!verifyRecaptcha($_POST['g-recaptcha-response'])) {
        sendJsonResponse('error', 'reCAPTCHA Verification Failed', 'Please complete the reCAPTCHA challenge.');
    }

    // Sanitize inputs
$username = filter_var($_POST['username'], FILTER_SANITIZE_EMAIL);
$password = $_POST['password'];

// Validate email format
if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
    sendJsonResponse('error', 'Invalid Email', 'Please enter a valid email address.');
}

try {
    // Check user credentials
    $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE username = ?");
    if (!$stmt) {
        throw new Exception("Database preparation failed");
    }

    $stmt->bind_param("s", $username);
    if (!$stmt->execute()) {
        throw new Exception("Database execution failed");
    }

    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Successful login - reset attempts
            resetLoginAttempts();

            // Set session variables
            $_SESSION['userid'] = $user['id'];
            $_SESSION['name'] = $user['name'];

            sendJsonResponse("success", "Login Successful", "Welcome, " . htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') . "!", "../admin/index.php");
        } else {
            // Failed login attempt
            if (trackLoginAttempts()) {
                sendJsonResponse("error", "Invalid Login", "Email or password is incorrect! Attempt " . $_SESSION['login_attempts'] . " of 3.");
            } else {
                sendJsonResponse("error", "Account Locked", "Too many failed attempts. Please try again in 30 seconds.");
            }
        }
    } else {
        // Username not found
        if (trackLoginAttempts()) {
            sendJsonResponse("error", "Invalid Login", "Email or password is incorrect! Attempt " . $_SESSION['login_attempts'] . " of 3.");
        } else {
            sendJsonResponse("error", "Account Locked", "Too many failed attempts. Please try again in 30 seconds.");
        }
    }
    
} catch (Exception $e) {
    error_log("Login error: " . $e->getMessage());
    sendJsonResponse('error', 'System Error', 'An error occurred. Please try again later.');
} finally {
    if (isset($stmt)) {
        $stmt->close();
    }
    if (isset($conn)) {
        $conn->close();
    }
}
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
