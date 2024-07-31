<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../database/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get POST data
    $house_number = $_POST['house_number'];
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $street = $_POST['street'];
    $municipality = $_POST['municipality'];
    $barangay = $_POST['barangay'];
    $province = $_POST['province'];
    $residence_status = $_POST['residence_status'];
    $length_of_stay = $_POST['length_of_stay'];
    $provincial_address = $_POST['provincial_address'];
    $sex = $_POST['sex'];
    $civil_status = $_POST['civil_status'];
    $date_of_birth = $_POST['date_of_birth'];
    $place_of_birth = $_POST['place_of_birth'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $contact_number = $_POST['contact_number'];
    $religion = $_POST['religion'];
    $elementary_school = $_POST['elementary_school'];
    $elementary_address = $_POST['elementary_address'];
    $highschool = $_POST['highschool'];
    $highschool_address = $_POST['highschool_address'];
    $vocational_school = $_POST['vocational_school'];
    $vocational_address = $_POST['vocational_address'];
    $college = $_POST['college'];
    $college_address = $_POST['college_address'];
    $employment_duration = $_POST['employment_duration'];
    $employer_name = $_POST['employer_name'];
    $employer_address = $_POST['employer_address'];
    $occupant_name = $_POST['occupant_name'];
    $occupant_position = $_POST['occupant_position'];
    $occupant_age = $_POST['occupant_age'];
    $occupant_birth_date = $_POST['occupant_birth_date'];
    $occupant_civil_status = $_POST['occupant_civil_status'];
    $occupant_occupation = $_POST['occupant_occupation'];

    // Update query
    $stmt = $conn->prepare("UPDATE barangay_census SET last_name = ?, first_name = ?, middle_name = ?, street = ?, municipality = ?, barangay = ?, province = ?, residence_status = ?, length_of_stay = ?, provincial_address = ?, sex = ?, civil_status = ?, date_of_birth = ?, place_of_birth = ?, height = ?, weight = ?, contact_number = ?, religion = ?, elementary_school = ?, elementary_address = ?, highschool = ?, highschool_address = ?, vocational_school = ?, vocational_address = ?, college = ?, college_address = ?, employment_duration = ?, employer_name = ?, employer_address = ?, occupant_name = ?, occupant_position = ?, occupant_age = ?, occupant_birth_date = ?, occupant_civil_status = ?, occupant_occupation = ? WHERE house_number = ?");

    // Bind parameters (all are strings, except the last one)
    $stmt->bind_param('ssssssssssssssssssssssssssssssssssss', 
        $last_name, $first_name, $middle_name, $street, $municipality, $barangay, $province, $residence_status, 
        $length_of_stay, $provincial_address, $sex, $civil_status, $date_of_birth, $place_of_birth, $height, 
        $weight, $contact_number, $religion, $elementary_school, $elementary_address, $highschool, $highschool_address, 
        $vocational_school, $vocational_address, $college, $college_address, $employment_duration, $employer_name, 
        $employer_address, $occupant_name, $occupant_position, $occupant_age, $occupant_birth_date, $occupant_civil_status, 
        $occupant_occupation, $house_number);

    if ($stmt->execute()) {
        echo 'Record updated successfully';
    } else {
        echo 'Error updating record: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
