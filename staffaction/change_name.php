<?php
session_start();

// Include the database connection
include '../database/db_connect.php'; // This includes your database connection

// Get the user ID from the session
$userId = $_SESSION['userid'];

// Get the new name from the request (assuming it's passed as a parameter or via POST)
$newName = trim($_POST['newName']); // Assuming you are passing 'newName' through a POST request

// Validate the new name
if (!empty($newName)) {
    // Prepare and bind the SQL update statement to prevent SQL injection
    $stmt = $conn->prepare("UPDATE staff SET name = ? WHERE id = ?");
    $stmt->bind_param("si", $newName, $userId); // "si" means string for name and integer for userId

    // Execute the query
    if ($stmt->execute()) {
        // If successful, update the session and return a success message
        $_SESSION['name'] = $newName;  // Optionally update session value
        echo 'Name changed successfully.';
    } else {
        // If query fails, show an error message
        echo 'Error: ' . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
} else {
    echo 'Please provide a valid name.';
}

// Close the database connection
$conn->close();
?>
