<?php
include '../database/db_connect.php';
header('Content-Type: application/json');

if (isset($_GET['id'])) {
    // Fetch a single schedule by ID
    $id = intval($_GET['id']);
    $sql = "SELECT id, municipality, start_census, end_census, start_time, end_time FROM schedule WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        echo json_encode($row);
    } else {
        echo json_encode(['error' => 'Schedule not found']);
    }
} else {
    // Fetch all schedules (current behavior)
    $sql = "SELECT id, municipality, start_census, end_census, start_time, end_time FROM schedule";
    $result = $conn->query($sql);

    $schedules = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $schedules[] = $row;
        }
    }

    echo json_encode($schedules);
}

$conn->close();
?>