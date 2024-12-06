<?php
include '../database/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header('Content-Type: application/json');
    header('X-Content-Type-Options: nosniff');
    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
    header('Pragma: no-cache');
    header('Expires: 0');

    $name = htmlspecialchars(trim($_POST['nameInput']), ENT_QUOTES, 'UTF-8');
    $username = filter_var(trim($_POST['usernameInput']), FILTER_SANITIZE_EMAIL);
    $phone = filter_var(trim($_POST['phone']), FILTER_SANITIZE_NUMBER_INT);
    $password = $_POST['passwordInput'];

    // Validate inputs
    if (!preg_match("/^[a-zA-Z\s'-]+$/", $name)) {
        echo json_encode(['success' => false, 'message' => 'Invalid name.']);
        exit;
    }

    if (!filter_var($username, FILTER_VALIDATE_EMAIL) || !str_ends_with($username, '@gmail.com')) {
        echo json_encode(['success' => false, 'message' => 'Username must be a valid @gmail.com address.']);
        exit;
    }

    if (!preg_match("/^\d{11}$/", $phone)) {
        echo json_encode(['success' => false, 'message' => 'Invalid phone number. Must be 11 digits.']);
        exit;
    }

    if ($password !== 'admin') {
        echo json_encode(['success' => false, 'message' => 'Password must be "admin".']);
        exit;
    }

    // Generate a 6-digit random ID
    $random_id = random_int(100000, 999999); 

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the statement to insert
    $stmt = $conn->prepare("INSERT INTO users (id, name, phone, username, password) VALUES (?, ?, ?, ?, ?)");
    if ($stmt === false) {
        error_log('SQL Error: ' . $conn->error);
        echo json_encode(['success' => false, 'message' => 'Internal Server Error.']);
        exit;
    }

    $stmt->bind_param("issss", $random_id, $name, $phone, $username, $hashed_password);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'id' => $random_id]);
    } else {
        error_log('SQL Error: ' . $stmt->error);
        echo json_encode(['success' => false, 'message' => 'Error adding new user.']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
