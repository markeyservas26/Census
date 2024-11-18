<?php
include '../database/db_connect.php';

// Modified query to include house_number and name but not display them
$query = "
   SELECT 
    hl.house_number,
    CONCAT(hl.firstname, ' ', hl.lastname) as leader_name,
    s.name as staff_name,
    s.municipality as staff_municipality,
    hl.created_at
FROM house_leader hl
JOIN staff s ON hl.staff_id = s.id
WHERE hl.notification_read = 0
ORDER BY hl.created_at DESC
LIMIT 5
";

try {
    $result = $conn->query($query);
    
    if (!$result) {
        throw new Exception($conn->error);
    }
    
    $notifications = array();
    
    while ($row = $result->fetch_assoc()) {
        $notifications[] = array(
            'staff_name' => $row['staff_name'],
            'staff_municipality' => $row['staff_municipality'],
            'created_at' => $row['created_at'],
            'house_number' => $row['house_number'],
            'leader_name' => $row['leader_name']
        );
    }
    
    header('Content-Type: application/json');
    echo json_encode($notifications);
    
} catch (Exception $e) {
    header('Content-Type: application/json');
    echo json_encode(array(
        'error' => true,
        'message' => $e->getMessage()
    ));
}

$conn->close();
?>