<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// update_record.php
include '../database/db_connect.php'; // Include your database connection

// Retrieve data from POST
$houseNumber = isset($_POST['house_number']) ? $_POST['house_number'] : '';
$lastName = isset($_POST['last_name']) ? $_POST['last_name'] : '';
$firstName = isset($_POST['first_name']) ? $_POST['first_name'] : '';
$middleName = isset($_POST['middle_name']) ? $_POST['middle_name'] : '';
$street = isset($_POST['street']) ? $_POST['street'] : '';
$municipality = isset($_POST['municipality']) ? $_POST['municipality'] : '';
$barangay = isset($_POST['barangay']) ? $_POST['barangay'] : '';
$province = isset($_POST['province']) ? $_POST['province'] : '';
$residenceStatus = isset($_POST['residence_status']) ? $_POST['residence_status'] : '';
$lengthOfStay = isset($_POST['length_of_stay']) ? $_POST['length_of_stay'] : '';
$provincialAddress = isset($_POST['provincial_address']) ? $_POST['provincial_address'] : '';
$sex = isset($_POST['sex']) ? $_POST['sex'] : '';
$civilStatus = isset($_POST['civil_status']) ? $_POST['civil_status'] : '';
$dateOfBirth = isset($_POST['date_of_birth']) ? $_POST['date_of_birth'] : '';
$placeOfBirth = isset($_POST['place_of_birth']) ? $_POST['place_of_birth'] : '';
$height = isset($_POST['height']) ? $_POST['height'] : '';
$weight = isset($_POST['weight']) ? $_POST['weight'] : '';
$contactNumber = isset($_POST['contact_number']) ? $_POST['contact_number'] : '';
$religion = isset($_POST['religion']) ? $_POST['religion'] : '';
$elementarySchool = isset($_POST['elementary_school']) ? $_POST['elementary_school'] : '';
$elementaryAddress = isset($_POST['elementary_address']) ? $_POST['elementary_address'] : '';
$highschool = isset($_POST['highschool']) ? $_POST['highschool'] : '';
$highschoolAddress = isset($_POST['highschool_address']) ? $_POST['highschool_address'] : '';
$vocationalSchool = isset($_POST['vocational_school']) ? $_POST['vocational_school'] : '';
$vocationalAddress = isset($_POST['vocational_address']) ? $_POST['vocational_address'] : '';
$college = isset($_POST['college']) ? $_POST['college'] : '';
$collegeAddress = isset($_POST['college_address']) ? $_POST['college_address'] : '';
$employmentDuration = isset($_POST['employment_duration']) ? $_POST['employment_duration'] : '';
$employerName = isset($_POST['employer_name']) ? $_POST['employer_name'] : '';
$employerAddress = isset($_POST['employer_address']) ? $_POST['employer_address'] : '';

// Validate required fields
if (empty($houseNumber) || empty($lastName) || empty($firstName)) {
    echo 'Please fill in all required fields.';
    exit();
}

// Prepare and execute the update query
$sql = "UPDATE barangay_census SET
    last_name = ?, first_name = ?, middle_name = ?, street = ?,
    municipality = ?, barangay = ?, province = ?, residence_status = ?,
    length_of_stay = ?, provincial_address = ?, sex = ?, civil_status = ?,
    date_of_birth = ?, place_of_birth = ?, height = ?, weight = ?,
    contact_number = ?, religion = ?, elementary_school = ?, elementary_address = ?,
    highschool = ?, highschool_address = ?, vocational_school = ?, vocational_address = ?,
    college = ?, college_address = ?, employment_duration = ?, employer_name = ?, 
    employer_address = ?
    WHERE house_number = ?";

$stmt = $pdo->prepare($sql);
$result = $stmt->execute([
    $lastName, $firstName, $middleName, $street,
    $municipality, $barangay, $province, $residenceStatus,
    $lengthOfStay, $provincialAddress, $sex, $civilStatus,
    $dateOfBirth, $placeOfBirth, $height, $weight,
    $contactNumber, $religion, $elementarySchool, $elementaryAddress,
    $highschool, $highschoolAddress, $vocationalSchool, $vocationalAddress,
    $college, $collegeAddress, $employmentDuration, $employerName,
    $employerAddress, $houseNumber
]);

if ($result) {
    echo 'Record updated successfully';
} else {
    echo 'Failed to update the record';
}
?>
