<?php
session_start(); // Start the session to access user data
require_once '../database/db_connect.php'; // Include your database connection

header('Content-Type: application/json'); // Set content type to JSON

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get current user ID from the session (you should adjust this based on your session setup)
    $userId = $_SESSION['userid']; 

    // Retrieve POST data
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate new password
    if ($newPassword !== $confirmPassword) {
        echo json_encode(['success' => false, 'message' => 'New password and confirm password do not match.']);
        exit;
    }

    // Fetch the current password from the database
    $stmt = $conn->prepare("SELECT password FROM staff WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        // Verify the current password
        if (password_verify($currentPassword, $hashedPassword)) {
            // Hash the new password
            $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Update the password in the database
            $updateStmt = $conn->prepare("UPDATE staff SET password = ? WHERE id = ?");
            $updateStmt->bind_param("si", $newHashedPassword, $userId);
            if ($updateStmt->execute()) {
                echo json_encode(['success' => true, 'message' => 'Password changed successfully.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to change password. Please try again later.']);
            }
            $updateStmt->close();
        } else {
            echo json_encode(['success' => false, 'message' => 'Current password is incorrect.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'User not found.']);
    }

    $stmt->close();
}
$conn->close(); // Close the database connection
?>
