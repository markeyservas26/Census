<?php
include '../database/db_connect.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['house_number'], $data['created_at'])) {
    $houseNumber = $data['house_number'];
    $createdAt = $data['created_at'];

    $query = "
        UPDATE house_leader
        SET notification_read = 1
        WHERE house_number = ? AND created_at = ?
    ";

    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $houseNumber, $createdAt);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid input']);
}

$conn->close();
?>
