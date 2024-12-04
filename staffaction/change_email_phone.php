<?php
session_start();
include '../database/db_connect.php'; // Adjust the path to your database connection

$userId = $_SESSION['userid']; // Assume user_id is stored in the session
$email = $_POST['email'];
$phone = $_POST['phone'];

$query = "UPDATE staff SET email = ?, phone = ? WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('ssi', $email, $phone, $userId);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to update details.']);
}
?>
