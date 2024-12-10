<?php
include '../session.php';
include '../database/db_connect.php';

function checkSqlInjection($input) {
    // SQL injection detection logic here...
}

function checkXss($input) {
    // XSS detection logic here...
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

function sendJsonResponse($icon, $title, $text, $redirect = null) {
    $response = ['icon' => $icon, 'title' => $title, 'text' => $text];
    if ($redirect) {
        $response['redirect'] = $redirect;
    }
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
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

function resetLoginAttempts() {
    unset($_SESSION['login_attempts']);
    unset($_SESSION['lockout_time']);
    unset($_SESSION['last_attempt_time']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['g-recaptcha-response'])) {
        sendJsonResponse('error', 'Missing Data', 'Please complete the reCAPTCHA challenge.');
    }

    $lockRemaining = isAccountLocked();
    if ($lockRemaining !== false) {
        sendJsonResponse("error", "Account Locked", "Too many failed attempts. Please try again in {$lockRemaining} seconds.");
    }

    if (empty($_POST['username']) || empty($_POST['password'])) {
        sendJsonResponse('error', 'Missing Data', 'Please provide your username and password.');
    }

    if (!verifyRecaptcha($_POST['g-recaptcha-response'])) {
        sendJsonResponse('error', 'reCAPTCHA Verification Failed', 'Please complete the reCAPTCHA challenge.');
    }

    $username = filter_var($_POST['username'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        sendJsonResponse('error', 'Invalid Email', 'Please enter a valid email address.');
    }

    try {
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
                resetLoginAttempts();

                $_SESSION['userid'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['start_time'] = time();

                sendJsonResponse('success', 'Login Successful', 'Welcome, ' . htmlspecialchars($user['name']), '../admin/index');
            } else {
                if (trackLoginAttempts()) {
                    sendJsonResponse("error", "Invalid Login", "Email or password is incorrect! Attempt " . $_SESSION['login_attempts'] . " of 3.");
                } else {
                    sendJsonResponse("error", "Account Locked", "Too many failed attempts. Please try again in 30 seconds.");
                }
            }
        } else {
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
}
?>
