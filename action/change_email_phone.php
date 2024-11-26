<?php
session_start();

// Get the new email and phone number from the POST request
$newEmail = $_POST['username'];
$newPhone = $_POST['phone'];

// Perform necessary validation (e.g., check if new email is valid, phone number format, etc.)

// Assume you have a function `updateUserContactInfo()` to update the database
// Example:
$result = updateUserContactInfo($_SESSION['userid'], $newEmail, $newPhone);

// Return a response
if ($result) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to update contact information.']);
}
?>
