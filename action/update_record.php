<?php
include '../database/db_connect.php';

$house_number = $_POST['house_number'];
$fullname = $_POST['fullname'];
$address = $_POST['address'];
// Get other fields as needed

$sql = "UPDATE barangay_census SET 
            fullname = '$fullname',
            address = '$address',
            -- Set other fields
        WHERE house_number = '$house_number'";

if ($conn->query($sql) === TRUE) {
    echo 'success';
} else {
    echo 'error: ' . $conn->error;
}

$conn->close();
?>