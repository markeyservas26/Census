<?php
// Database connection details
$servername = "127.0.0.1";
$username = "u510162695_bantayanisland"; 
$password = "1Bantayan"; 
$dbname = "u510162695_bantayanisland"; 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
