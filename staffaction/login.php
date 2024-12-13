<?php
session_start();
include '../database/db_connect.php';

header('Content-Type: application/json');

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

function checkXss($input) {
    return strip_tags($input) !== $input;
}

function verifyRecaptcha($token) {
    $secretKey = '6Le4MJEqAAAAAOC7zz5GE-9l3se0icE4d7jXaCHC';
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = ['secret' => $secretKey, 'response' => $token];

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
    return isset($result['success']) && $result['success'] === true && $result['score'] >= 0.5;
}

function trackLoginAttempts() {
    if (!isset($_SESSION['login_attempts'])) {
        $_SESSION['login_attempts'] = 0;
        $_SESSION['last_attempt_time'] = time();
    }

    $_SESSION['login_attempts']++;

    if ($_SESSION['login_attempts'] >= 3) {
        $_SESSION['lockout_time'] = time() + 30; // 30-second lockout
        return false;
    }

    return true;
}

function isAccountLocked() {
    if (isset($_SESSION['lockout_time'])) {
        $remainingLockTime = $_SESSION['lockout_time'] - time();

        if ($remainingLockTime <= 0) {
            unset($_SESSION['lockout_time']);
            $_SESSION['login_attempts'] = 0;
            return false;
        }

        return $remainingLockTime;
    }
    return false;
}

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $recaptchaToken = $_POST['g-recaptcha-response'] ?? '';

    if (empty($recaptchaToken)) {
        $response['success'] = false;
        $response['message'] = 'Please complete the reCAPTCHA challenge.';
        echo json_encode($response);
        exit();
    }

    $lockRemaining = isAccountLocked();
    if ($lockRemaining !== false) {
        $response['success'] = false;
        $response['message'] = "Too many failed attempts. Please try again in {$lockRemaining} seconds.";
        echo json_encode($response);
        exit();
    }

    if (!verifyRecaptcha($recaptchaToken)) {
        $response['success'] = false;
        $response['message'] = 'reCAPTCHA verification failed. Please try again.';
        echo json_encode($response);
        exit();
    }

    if (checkSqlInjection($email) || checkSqlInjection($password)) {
        $response['success'] = false;
        $response['message'] = 'Potential SQL injection detected. This incident has been logged and reported.';
        echo json_encode($response);
        exit();
    }

    if (checkXss($email) || checkXss($password)) {
        $response['success'] = false;
        $response['message'] = 'Potential XSS attack detected. This incident has been logged and reported.';
        echo json_encode($response);
        exit();
    }

    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

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

        if (password_verify($password, $staff['password'])) {
            $_SESSION['userid'] = $staff['id'];
            $_SESSION['name'] = $staff['name'];
            $_SESSION['municipality'] = $staff['municipality'];

            $response['success'] = true;
            $response['redirect'] = match ($staff['municipality']) {
                'Madridejos' => '../staff/madridejos.php',
                'Bantayan' => '../staffbantayan/bantayan.php',
                'Santafe' => '../staffsantafe/santafe.php',
                default => 'error.php',
            };
        } else {
            if (trackLoginAttempts()) {
                $response['success'] = false;
                $response['message'] = "Invalid email or password. Attempt {$_SESSION['login_attempts']} of 3.";
            } else {
                $response['success'] = false;
                $response['message'] = 'Too many failed attempts. Please try again in 30 seconds.';
            }
        }
    } else {
        if (trackLoginAttempts()) {
            $response['success'] = false;
            $response['message'] = "Invalid email or password. Attempt {$_SESSION['login_attempts']} of 3.";
        } else {
            $response['success'] = false;
            $response['message'] = 'Too many failed attempts. Please try again in 30 seconds.';
        }
    }

    $stmt->close();
    $conn->close();
} else {
    $response['success'] = false;
    $response['message'] = 'Invalid request method.';
}

echo json_encode($response);
?>
