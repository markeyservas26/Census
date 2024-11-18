<?php
session_start();
include '../database/db_connect.php';

header('Content-Type: application/json');

// Function to check for potential SQL injection
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
    return false;
}

// Function to check for potential XSS
function checkXss($input) {
    return strip_tags($input) !== $input;
}

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Debug: Check posted data with sensitive info redacted
    error_log("Login attempt for email: " . substr($email, 0, 3) . '***');
    
    // Check for SQL injection
    if (checkSqlInjection($email) || checkSqlInjection($password)) {
        $response['success'] = false;
        $response['message'] = 'Potential SQL injection detected. This incident has been logged and reported.';
        echo json_encode($response);
        exit();
    }
    
    // Check for XSS
    if (checkXss($email) || checkXss($password)) {
        $response['success'] = false;
        $response['message'] = 'Potential XSS attack detected. This incident has been logged and reported.';
        echo json_encode($response);
        exit();
    }
    
    // Sanitize inputs
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    
    // Fetch user from database based on email
    $sql = "SELECT id, name, email, password, municipality FROM staff WHERE email = ?";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        $response['success'] = false;
        $response['message'] = 'Database error occurred. Please try again later.';
        echo json_encode($response);
        exit();
    }
    
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $staff = $result->fetch_assoc();
        
        // Verify the hashed password
        if (password_verify($password, $staff['password'])) {
            // Set session variables matching database structure
            $_SESSION['userid'] = $staff['id'];
            $_SESSION['name'] = $staff['name'];
            $_SESSION['municipality'] = $staff['municipality'];
            
       
            // Log successful login
            error_log("Successful login for staff ID: " . $staff['id']);
            
            $response['success'] = true;
            $response['redirect'] = match ($staff['municipality']) {
                'Madridejos' => '../staff/madridejos.php',
                'Bantayan' => '../staffbantayan/bantayan.php',
                'Santafe' => '../staffsantafe/santafe.php',
                default => 'error.php',
            };
        } else {
            error_log("Failed login attempt - invalid password for email: " . substr($email, 0, 3) . '***');
            $response['success'] = false;
            $response['message'] = 'Invalid email or password.';
        }
    } else {
        error_log("Failed login attempt - email not found: " . substr($email, 0, 3) . '***');
        $response['success'] = false;
        $response['message'] = 'Invalid email or password.';
    }
    
    $stmt->close();
    $conn->close();
} else {
    $response['success'] = false;
    $response['message'] = 'Invalid request method.';
}

echo json_encode($response);
?>