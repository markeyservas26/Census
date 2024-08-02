<?php
include '../database/db_connect.php';

$id = intval($_GET['id']);

$sql = "SELECT id, municipality, start_census, end_census, start_time, end_time FROM schedule WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(['success' => true] + $row);
} else {
    echo json_encode(['success' => false, 'message' => 'Schedule not found.']);
}

$stmt->close();
$conn->close();
?>
