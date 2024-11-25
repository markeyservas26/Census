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

// Function to validate reCAPTCHA
function verifyRecaptcha($token) {
    $secretKey = '6LcqT4kqAAAAAISjS-JW3zVhOZy0yKoBzgmDR47s'; // Replace with your reCAPTCHA secret key
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    
    $data = [
        'secret' => $secretKey,
        'response' => $token
    ];

    $options = [
        'http' => [
            'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        ]
    ];

    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);

    if ($response === false) {
        return false;
    }

    $result = json_decode($response, true);
    return isset($result['success']) && $result['success'] === true && $result['score'] > 0.5;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recaptchaToken = $_POST['recaptcha_token'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validate reCAPTCHA
    if (empty($recaptchaToken) || !verifyRecaptcha($recaptchaToken)) {
        echo json_encode([
            'icon' => 'error',
            'title' => 'reCAPTCHA Failed',
            'text' => 'Failed to validate reCAPTCHA. Try again.'
        ]);
        exit;
    }

    // Validate input
    if (empty($username) || empty($password)) {
        echo json_encode([
            'icon' => 'error',
            'title' => 'Invalid Input',
            'text' => 'Please enter both email and password.'
        ]);
        exit;
    }

    // Check for user in the database
    $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            // Successful login
            $_SESSION['userid'] = $user['id'];
            $_SESSION['name'] = $user['name'];

            echo json_encode([
                'icon' => 'success',
                'title' => 'Login Successful',
                'text' => 'Welcome, ' . htmlspecialchars($user['name']) . '!',
                'redirect' => '../admin/index.php'
            ]);
        } else {
            // Invalid credentials
            echo json_encode([
                'icon' => 'error',
                'title' => 'Invalid Login',
                'text' => 'Email or password is incorrect!'
            ]);
        }
    } else {
        // User not found
        echo json_encode([
            'icon' => 'error',
            'title' => 'Invalid Login',
            'text' => 'Email or password is incorrect!'
        ]);
    }

    $stmt->close();
    $conn->close();
}
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
