<?php
// Include the session and database connection files
include '../session.php';
include '../database/db_connect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validate input
    if (empty($username) || empty($password)) {
        header('Location: ../admin/login.php?error=empty'); // Redirect with error message
        exit;
    }

    // Prepare and bind
    $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE username = ?");
    if ($stmt === false) {
        header('Location: ../admin/login.php?error=db'); // Redirect with database error message
        exit;
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $name, $hashed_password);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashed_password)) {
            // Set session variables
            $_SESSION['userid'] = $id;
            $_SESSION['name'] = $name;

            // Redirect to dashboard or protected page
            header('Location: ../admin/index.php');
            exit;
        } else {
            // Invalid password, redirect with error
            header('Location: ../admin/login.php?error=invalid'); // Redirect with invalid credentials message
            exit;
        }
    } else {
        // No user found, redirect with error
        header('Location: ../admin/login.php?error=invalid'); // Redirect with invalid credentials message
        exit;
    }

    $stmt->close();
    $conn->close();
}
?>
