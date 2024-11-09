<?php
include '../database/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['editId'];
    $name = $_POST['editNameInput'];
    $username = $_POST['editUsernameInput'];
    $password = isset($_POST['editPasswordInput']) && !empty($_POST['editPasswordInput']) ? $_POST['editPasswordInput'] : null;

    // Prepare SQL statement conditionally based on whether password is provided
    if ($password) {
        // Hash the new password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE users SET name = ?, username = ?, password = ? WHERE id = ?");
        $stmt->bind_param("sssi", $name, $username, $hashed_password, $id);
    } else {
        // Update without password
        $stmt = $conn->prepare("UPDATE users SET name = ?, username = ? WHERE id = ?");
        $stmt->bind_param("ssi", $name, $username, $id);
    }

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error updating admin: ' . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
