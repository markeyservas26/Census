<?php
include '../database/db_connect.php'; // Update this with your actual database connection

if (isset($_POST['house_number'])) {
    $house_number = $_POST['house_number'];

    // Query to check if house number exists
    $stmt = $conn->prepare("SELECT COUNT(*) FROM house_leader WHERE house_number = ?");
    $stmt->bind_param("s", $house_number);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    // Return result as JSON
    echo json_encode(['exists' => $count > 0]);
}
?>
