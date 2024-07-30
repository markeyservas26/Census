<?php
include '../database/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $house_number = $_POST['house_number'];

    // Validate input
    if (empty($house_number)) {
        echo 'error';
        exit;
    }

    // Prepare and execute delete statement
    $stmt = $conn->prepare("DELETE FROM barangay_census WHERE house_number = ?");
    $stmt->bind_param('s', $house_number);
    
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }

    $stmt->close();
    $conn->close();
} else {
    echo 'error';
}
?>