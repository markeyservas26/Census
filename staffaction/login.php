<?php
session_start(); // Start session if not already started
include '../database/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Debug: Check posted data
    error_log("Email: $email, Password: $password");

    // Fetch user from database based on email
    $sql = "SELECT id, name, email, password, municipality FROM staff WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die('Prepare failed: ' . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];

        // Debug: Check fetched data
        error_log("Fetched Email: " . $row['email'] . ", Fetched Password: " . $row['password']);

        // Verify the hashed password
        if (password_verify($password, $stored_password)) {
            // Passwords match, log in user
            $_SESSION['user_id'] = $row['id']; // Example: Store user ID in session
            $_SESSION['user_name'] = $row['name']; // Example: Store user name in session

            // Redirect based on municipality
            if ($row['municipality'] == 'Madridejos') {
                header("Location:../staff/madridejos.php");
            } elseif ($row['municipality'] == 'Bantayan') {
                header("Location:../staffbantayan/bantayan.php");
            } elseif ($row['municipality'] == 'Santafe') {
                header("Location:../staffsantafe/santafe.php");
            } else {
                echo "Unauthorized municipality.";
            }
            exit();
        } else {
            // Passwords do not match
            echo "Incorrect password.";
        }
    } else {
        // No user found with the provided email
        echo "User not found.";
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../staff/login.php"); // Redirect if accessed directly without POST request
}
?>
