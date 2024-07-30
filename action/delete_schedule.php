<?php
include '../database/db_connect.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ensure it's an integer

    $sql = "DELETE FROM schedule WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error deleting schedule']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'No ID provided']);
}
?>
