<?php
include '../database/db_connect.php';

// Check if house_number is set
if (isset($_POST['house_number'])) {
    $house_number = $_POST['house_number'];

    // Prepare the SQL query
    $sql = "SELECT house_number, CONCAT(first_name, ' ', last_name) AS fullname, CONCAT(street, ', ', barangay, ', ', municipality, ', ', province) AS address, sex, date_of_birth, place_of_birth, height, weight, contact_number, religion, elementary_school, elementary_address, highschool, highschool_address, vocational_school, vocational_address, college, college_address, employment_duration, employer_name, employer_address, occupant_name, occupant_position, occupant_age, occupant_birth_date, occupant_civil_status, occupant_occupation
            FROM barangay_census
            WHERE house_number = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param('s', $house_number);
        $stmt->execute();
        $result = $stmt->get_result();

        // Fetch the data and output as JSON
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            // Debugging output
            // var_dump($data); // Uncomment this to check the output
            echo json_encode($data);
        } else {
            echo json_encode(['error' => 'No data found']);
        }

        $stmt->close();
    } else {
        echo json_encode(['error' => 'Query preparation failed']);
    }
} else {
    echo json_encode(['error' => 'No house number provided']);
}

$conn->close();
?>
