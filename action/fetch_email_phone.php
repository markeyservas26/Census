<?php
session_start();
include '../database/db_connect.php'; // Adjust the path to your database connection

// Replace 'user_id' with the session variable or identifier for the logged-in user
$userId = $_SESSION['userid'];

// Prepare SQL query to fetch username and phone number
$query = "SELECT username, phone FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(['success' => true, 'username' => $row['username'], 'phone' => $row['phone']]);
} else {
    echo json_encode(['success' => false, 'message' => 'User details not found.']);
}
?>
