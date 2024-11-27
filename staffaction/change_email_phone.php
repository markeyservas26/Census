<?php
session_start();

// Assuming session variables hold the current user's information
// Validate and sanitize the input data
$newEmail = filter_var($_POST['emailInput'], FILTER_SANITIZE_EMAIL);
$newPhone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);

// Perform necessary validation (e.g., check if new email is valid, phone number format, etc.)
if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Invalid email format.']);
    exit;
}

// Optional: Add phone number validation (e.g., check if it's a valid phone number format)
if (strlen($newPhone) < 10) {
    echo json_encode(['success' => false, 'message' => 'Invalid phone number format.']);
    exit;
}

// Assume you have a function `updateUserContactInfo()` to update the database
// This function should take the user ID (which should be stored in the session) and the new email and phone

// Example of updating the database
$result = updateUserContactInfo($_SESSION['userid'], $newEmail, $newPhone);

// Return a response
if ($result) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to update contact information.']);
}

// Define the update function (make sure to adapt this to your actual DB connection and update logic)
function updateUserContactInfo($userId, $email, $phone) {
    // Example DB connection (replace with your actual DB logic)
    $conn = new mysqli('127.0.0.1', 'u510162695_bantayanisland', '1Bantayan', 'u510162695_bantayanisland');

    // Check for connection errors
    if ($conn->connect_error) {
        return false;
    }

    // Prepare and execute the SQL query to update the user's contact information
    $stmt = $conn->prepare("UPDATE staff SET email = ?, phone = ? WHERE id = ?");
    $stmt->bind_param("ssi", $email, $phone, $userId);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        return true; // Success
    } else {
        $stmt->close();
        $conn->close();
        return false; // Failure
    }
}
?>
