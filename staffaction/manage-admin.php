<?php
include '../database/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['nameInput'];
    $username = $_POST['usernameInput'];
    $phone = $_POST['phone'];
    $password = $_POST['passwordInput'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (name, username, phone, password) VALUES (?, ?, ?, ?)");
    if ($stmt === false) {
        echo json_encode(['success' => false, 'message' => 'Error preparing statement: ' . $conn->error]);
        exit;
    }

    $stmt->bind_param("ssss", $name, $username, $phone, $hashed_password);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error adding new admin: ' . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>