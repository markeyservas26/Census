<?php
include '../database/db_connect.php';
header('Content-Type: application/json');

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id <= 0) {
    echo json_encode(['success' => false, 'message' => 'Invalid ID']);
    exit;
}

$sql = "SELECT name, username, password FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if (!$stmt->execute()) {
    echo json_encode(['success' => false, 'message' => $stmt->error]);
    exit;
}

$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $admin = $result->fetch_assoc();
    echo json_encode(['success' => true, 'admin' => $admin]);
} else {
    echo json_encode(['success' => false, 'message' => 'No admin found']);
}
?>
