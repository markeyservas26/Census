<?php
// Include the database connection file
include '../database/db_connect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $terms = isset($_POST['terms']);

    // Validate input
    if (empty($name) || empty($username) || empty($password) || !$terms) {
        echo "All fields are required and terms must be accepted.";
        exit;
    }

    // Check for existing username
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        echo "Username already taken.";
        $stmt->close();
        $conn->close();
        exit;
    }
    $stmt->close();

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into database
    $stmt = $conn->prepare("INSERT INTO users (name, username, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $username, $hashed_password);

    if ($stmt->execute()) {
        header("Location: ../admin/login.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
