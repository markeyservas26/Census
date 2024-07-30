<?php
include '../database/db_connect.php';

header('Content-Type: application/json');

$sql = "SELECT municipality, start_census, end_census, start_time, end_time FROM schedule";
$result = $conn->query($sql);

$schedules = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $schedules[] = $row;
    }
}

echo json_encode($schedules);

$conn->close();
?>
