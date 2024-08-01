<?php 
include '../database/db_connect.php';

// Prepare the SQL statement
$sql = "INSERT INTO barangay_census (
    house_number, first_name, last_name, middle_name, street, barangay, municipality, province, 
    sex, date_of_birth, place_of_birth, height, weight, contact_number, religion, 
    elementary_school, elementary_address, highschool, highschool_address, 
    vocational_school, vocational_address, college, college_address, 
    employment_duration, employer_name, employer_address, 
    occupant_name, occupant_position, occupant_age, occupant_birth_date, 
    occupant_civil_status, occupant_occupation, 
    residence_status, length_of_stay, provincial_address, civil_status
) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

// Check if the statement was prepared successfully
if (!$stmt) {
    die('Error preparing statement: ' . $conn->error);
}

// Bind the parameters
$stmt->bind_param('ssssssssssssssssssssssssssssssssssss',
    $_POST['house_number'], $_POST['first_name'], $_POST['last_name'], $_POST['middle_name'],
    $_POST['street'], $_POST['barangay'], $_POST['municipality'],
    $_POST['province'], $_POST['sex'], $_POST['date_of_birth'],
    $_POST['place_of_birth'], $_POST['height'], $_POST['weight'],
    $_POST['contact_number'], $_POST['religion'],
    $_POST['elementary_school'], $_POST['elementary_address'],
    $_POST['highschool'], $_POST['highschool_address'],
    $_POST['vocational_school'], $_POST['vocational_address'],
    $_POST['college'], $_POST['college_address'],
    $_POST['employment_duration'], $_POST['employer_name'],
    $_POST['employer_address'], $_POST['occupant_name'],
    $_POST['occupant_position'], $_POST['occupant_age'],
    $_POST['occupant_birth_date'], $_POST['occupant_civil_status'],
    $_POST['occupant_occupation'], 
    $_POST['residence_status'], $_POST['length_of_stay'], 
    $_POST['provincial_address'], $_POST['civil_status']);

// Execute the statement
if (!$stmt->execute()) {
    header('Location: ../staff/form.php?status=error');
    exit();
}

// Redirect to the form page with success status
header('Location: ../staff/form.php?status=success');
?>
