<?php
// Database connection variables
$servername = "127.0.0.1";
$username = "u510162695_bantayanisland"; // Change to your MySQL username
$password = "1Bantayan"; // Change to your MySQL password
$dbname = "u510162695_bantayanisland"; // Name of the database containing the 'users' table

// Create connection to MySQL server and select the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to add the OTP_TIMESTAMP and phone columns to the 'users' table
$sql = "ALTER TABLE staff 
        ADD COLUMN OTP_TIMESTAMP DATETIME DEFAULT NULL, 
        ADD COLUMN phone VARCHAR(20) DEFAULT NULL";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Columns 'OTP_TIMESTAMP' and 'phone' added successfully.";
} else {
    echo "Error adding columns: " . $conn->error;
}

// Close the connection
$conn->close();
?>
