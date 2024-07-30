<?php
// fetch_details.php
require_once '../database/db_connect.php'; // Include your database connection

// Retrieve the house number from GET request
$houseNumber = isset($_GET['house_number']) ? $_GET['house_number'] : '';

// Validate input
if (empty($houseNumber)) {
    echo json_encode(['error' => 'House number is required']);
    exit();
}

// Prepare and execute the query
$sql = "SELECT * FROM barangay_census WHERE house_number = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$houseNumber]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if ($data) {
    // Fetch occupants separately if needed
    $occupantsSql = "SELECT * FROM house_occupants WHERE house_number = ?";
    $occupantsStmt = $pdo->prepare($occupantsSql);
    $occupantsStmt->execute([$houseNumber]);
    $data['occupants'] = $occupantsStmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($data);
} else {
    echo json_encode(['error' => 'No data found for the provided house number']);
}
?>
