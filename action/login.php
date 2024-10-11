<?php
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
