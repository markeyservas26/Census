<?php
include '../database/db_connect.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve POST data
    $id = intval($_POST['id']);
    $municipality = $_POST['municipality'];
    $start_census = $_POST['start_census'];
    $end_census = $_POST['end_census'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    // Prepare SQL statement
    $sql = "UPDATE schedule SET municipality=?, start_census=?, end_census=?, start_time=?, end_time=? WHERE id=?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters and execute statement
        $stmt->bind_param('sssssi', $municipality, $start_census, $end_census, $start_time, $end_time, $id);
        
        if ($stmt->execute()) {
            $response['success'] = true;
        } else {
            $response['success'] = false;
            $response['message'] = 'Error updating schedule.';
        }

        // Close the statement
        $stmt->close();
    } else {
        $response['success'] = false;
        $response['message'] = 'Failed to prepare SQL statement.';
    }
} else {
    $response['success'] = false;
    $response['message'] = 'Invalid request method.';
}

// Output the response as JSON
echo json_encode($response);

// Close the database connection
$conn->close();
?>
