<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Function to send a security alert via email
function sendSecurityAlert($message) {
    $mail = new PHPMailer(true);
    
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'bosskira41@gmail.com';  // Replace with your email
        $mail->Password   = 'teranovakira1010';     // Replace with your app-specific password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
    
        // Recipients
        $mail->setFrom('bosskira41@gmail.com', 'Security Alert');
        $mail->addAddress('bosskira41@gmail.com', 'edoy');  // Replace with your email
    
        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Security Alert: Unauthorized Access Detected';
        $mail->Body    = $message;
    
        $mail->send();
        echo 'Security alert has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Function to check login attempts
function checkLoginAttempts($ip) {
    $max_attempts = 5;
    $timeout_duration = 600; // 10 minutes timeout after exceeding max attempts
    
    $file = 'login_attempts.txt'; 
    
    $attempts = [];
    if (file_exists($file)) {
        $attempts = json_decode(file_get_contents($file), true);
    }
    
    $current_time = time();
    
    foreach ($attempts as $ip_address => $data) {
        if ($data['last_attempt'] < ($current_time - $timeout_duration)) {
            unset($attempts[$ip_address]);
        }
    }
    
    if (isset($attempts[$ip])) {
        $attempts[$ip]['attempts'] += 1;
        $attempts[$ip]['last_attempt'] = $current_time;
    } else {
        $attempts[$ip] = [
            'attempts' => 1,
            'last_attempt' => $current_time
        ];
    }
    
    file_put_contents($file, json_encode($attempts));
    
    if ($attempts[$ip]['attempts'] >= $max_attempts) {
        sendSecurityAlert("Multiple failed login attempts detected from IP: {$ip}");
    }
}

function getServerLocation() {
    $access_token = 'ec7e48b369092b';  // Replace with your actual API token
    $url = "http://ipinfo.io/json?token={$access_token}";  

    try {
        $response = file_get_contents($url);
        $details = json_decode($response, true);
        return $details;
    } catch (Exception $e) {
        return "Unable to retrieve location: " . $e->getMessage();  
    }
}

// Include the session and database connection files
include '../session.php';
include '../database/db_connect.php';

// Enhanced function to check for potential SQL injection
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

// Function to send JSON response
function sendJsonResponse($icon, $title, $text, $redirect = null) {
    $response = [
        'icon' => $icon,
        'title' => $title,
        'text' => $text
    ];
    if ($redirect) {
        $response['redirect'] = $redirect;
    }
    echo json_encode($response);
    exit;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Simulate database credentials (replace with actual database check)
    $correct_username = 'u510162695_bantayanisland';  // Replace with actual value
    $correct_password = '1Bantayan';  // Replace with actual value

    // Get user's IP address
    $ip = $_SERVER['REMOTE_ADDR'];
    
    // Check if login is successful
    if ($username === $correct_username && $password === $correct_password) {
        // Successful login
        $_SESSION['logged_in'] = true;
        echo "Login successful!";
    } else {
        // Failed login, increment login attempt counter
        checkLoginAttempts($ip);
        
        // Simulate unauthorized access detection
        $unauthorizedAccessDetected = true;  // Example condition
        
        if ($unauthorizedAccessDetected) {
            $attackerDetails = getServerLocation();
            $attackerInfo = "IP Address: " . $ip . "<br>";
            
            if (is_array($attackerDetails)) {
                $attackerInfo .= "Location: " . $attackerDetails['city'] . ", " . $attackerDetails['region'] . ", " . $attackerDetails['country'] . "<br>";
                $attackerInfo .= "Org: " . $attackerDetails['org'] . "<br>";
            } else {
                $attackerInfo .= $attackerDetails;
            }
            
            // Send alert about unauthorized access
            sendSecurityAlert("Unauthorized access detected on your system!<br>" . $attackerInfo);
        }
        
        // Notify user that login failed
        echo "Login failed!";
    }


    // Validate input
    if (empty($username) || empty($password)) {
        sendJsonResponse("error", "Invalid Input", "Please enter both email and password.");
    }

    // Check for SQL injection attempts
    if (checkSqlInjection($username) || checkSqlInjection($password)) {
        // Log the attempt here (implement proper logging mechanism)
        sendJsonResponse("error", "Security Alert", "Potential SQL injection detected. This incident has been logged and reported.");
    }

    // Check for XSS attempts
    if (checkXss($username) || checkXss($password)) {
        // Log the attempt here (implement proper logging mechanism)
        sendJsonResponse("error", "Security Alert", "Potential XSS attack detected. This incident has been logged and reported.");
    }

    // Sanitize inputs
    $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');

    // Prepare and bind
    $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['userid'] = $user['id'];
            $_SESSION['name'] = $user['name'];

            sendJsonResponse("success", "Login Successful", "Welcome, " . htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') . "!", "../admin/index.php");
        } else {
            sendJsonResponse("error", "Invalid Login", "Email or password is incorrect!");
        }
    } else {
        sendJsonResponse("error", "Invalid Login", "Email or password is incorrect!");
    }

    $stmt->close();
    $conn->close();
}
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
