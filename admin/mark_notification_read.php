<?php
include '../database/db_connect.php';

// Get the input data from the request body
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['staff_name']) && isset($data['created_at'])) {
    $staff_name = mysqli_real_escape_string($conn, $data['staff_name']);
    $created_at = mysqli_real_escape_string($conn, $data['created_at']);

    // Update all notifications for the staff member
    $query = "UPDATE house_leader hl 
              JOIN staff s ON hl.staff_id = s.id 
              SET hl.notification_read = 1 
              WHERE s.name = ? AND hl.created_at <= ?";

    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "ss", $staff_name, $created_at);

        if (mysqli_stmt_execute($stmt)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to mark notifications as read']);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to prepare query']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid data']);
}