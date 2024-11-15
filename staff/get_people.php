<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header("Content-Type: application/json");
include '../database/db_connect.php'; // Include your database connection script

if (!$conn) {
    die(json_encode(["error" => "Connection failed: " . mysqli_connect_error()])); // Return error as JSON
}

// Modify the SQL query to fetch house number, first name, last name, and coordinates
$sql = "SELECT house_number, firstname, lastname, municipality, coordinates FROM house_leader WHERE coordinates IS NOT NULL";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die(json_encode(["error" => "Query failed: " . mysqli_error($conn)])); // Return SQL error as JSON
}

$people = [];
while ($row = mysqli_fetch_assoc($result)) {
    // Split the coordinates into latitude and longitude
    if (!empty($row['coordinates'])) {
        $coords = explode(',', $row['coordinates']);
        if (count($coords) === 2) {
            $people[] = [
                'house_number' => $row['house_number'],
                'firstname' => $row['firstname'],
                'lastname' => $row['lastname'],
                'municipality' => $row['municipality'],
                'latitude' => trim($coords[0]),
                'longitude' => trim($coords[1]),
            ];
        }
    }
}

// Return the people data as JSON
echo json_encode($people);
?>
