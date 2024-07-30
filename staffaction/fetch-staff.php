<?php
include '../database/db_connect.php';

// Fetch staff data
$sql = "SELECT id, name, email, municipality FROM staff";
$result = $conn->query($sql);

// Initialize an empty array to hold staff data
$staffData = [];

if ($result->num_rows > 0) {
    // Fetch all rows and add them to the staffData array
    while ($row = $result->fetch_assoc()) {
        $staffData[] = $row;
    }
}

// Close the database connection
$conn->close();
?>
