<?php
include '../database/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['nameInput'];
    $username = $_POST['usernameInput'];
    $password = $_POST['passwordInput'];

    // Debugging output
    error_log('Name: ' . $name);
    error_log('Username: ' . $username);

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (name, username, password) VALUES (?, ?, ?)");
    if ($stmt === false) {
        error_log('Error preparing statement: ' . $conn->error);
        echo json_encode(['success' => false, 'message' => 'Error preparing statement: ' . $conn->error]);
        exit;
    }

    $stmt->bind_param("sss", $name, $username, $hashed_password);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        error_log('Error adding new admin: ' . $stmt->error);
        echo json_encode(['success' => false, 'message' => 'Error adding new admin: ' . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>