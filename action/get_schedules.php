<?php
include '../database/db_connect.php';

$sql = "SELECT id, municipality, census_date, start_time, end_time FROM schedule";
$result = $conn->query($sql);

$schedules = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $schedules[] = $row;
    }
}

echo json_encode($schedules);

$conn->close();
?>
