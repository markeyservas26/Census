<?php
// Decode the JSON request
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['latitude']) && isset($data['longitude'])) {
    // Process the location data (e.g., log it, validate it, etc.)
    $latitude = $data['latitude'];
    $longitude = $data['longitude'];

    // Example: Save to a log file (for demonstration purposes)
    file_put_contents('location_log.txt', "Latitude: $latitude, Longitude: $longitude\n", FILE_APPEND);

    // Send a success response
    echo json_encode(['success' => true]);
    exit;
} else {
    // Invalid data
    echo json_encode(['success' => false]);
    exit;
}
?>
