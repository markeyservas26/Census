<?php
include '../database/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['nameInput'];
    $username = $_POST['usernameInput'];
    $phone = $_POST['phone'];
    $password = $_POST['passwordInput'];

    // Generate a 6-digit random ID
    $random_id = random_int(100000, 999999); // Ensures a 6-digit number

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the statement to insert
    $stmt = $conn->prepare("INSERT INTO users (id, name, phone, username, password) VALUES (?, ?, ?, ?, ?)");
    if ($stmt === false) {
        echo json_encode(['success' => false, 'message' => 'Error preparing statement: ' . $conn->error]);
        exit;
    }

    $stmt->bind_param("issss", $random_id, $name, $phone, $username, $hashed_password);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'id' => $random_id]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error adding new user: ' . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
