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

<?php
include '../session.php';
include '../database/db_connect.php';

// Verify reCAPTCHA token
function verifyRecaptcha($token) {
    $secretKey = '6LcqT4kqAAAAAISjS-JW3zVhOZy0yKoBzgmDR47s';
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
    curl_close($ch);
    
    if ($response === false) {
        error_log('reCAPTCHA verification failed: CURL error');
        return false;
    }
    
    $result = json_decode($response, true);
    return isset($result['success']) && $result['success'] === true && 
           isset($result['score']) && $result['score'] >= 0.5 && 
           isset($result['action']) && $result['action'] === 'login';
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

// Handle login request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate required fields
    if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['recaptcha_token'])) {
        sendJsonResponse('error', 'Missing Data', 'Please provide all required information.');
    }

    // Verify reCAPTCHA
    if (!verifyRecaptcha($_POST['recaptcha_token'])) {
        sendJsonResponse('error', 'reCAPTCHA Failed', 'Please try again.');
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
        
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            
            if (password_verify($password, $user['password'])) {
                // Set session variables
                $_SESSION['userid'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                
                sendJsonResponse('success', 'Login Successful', 
                    'Welcome, ' . htmlspecialchars($user['name']), 
                    '../admin/index.php');
            }
        }
        
        // Invalid credentials (don't specify which one)
        sendJsonResponse('error', 'Login Failed', 'Invalid email or password.');
        
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
}
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
