<?php
header('Content-Type: application/json');
include '../database/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['nameInput'] ?? '';
    $username = $_POST['usernameInput'] ?? '';
    $password = $_POST['passwordInput'] ?? '';

    if (empty($name) || empty($username) || empty($password)) {
        echo json_encode(['success' => false, 'message' => 'All fields are required.']);
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (name, username, password) VALUES (?, ?, ?)");
    if ($stmt === false) {
        echo json_encode(['success' => false, 'message' => 'Error preparing statement: ' . $conn->error]);
        exit;
    }

    $stmt->bind_param("sss", $name, $username, $hashed_password);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Admin added successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error adding new admin: ' . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
