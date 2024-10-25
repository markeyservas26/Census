<?php
require_once '../database/db_connect.php';

function sanitize_input($conn, $data) {
    return mysqli_real_escape_string($conn, trim($data));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // House Leader
    $lastname_hl = sanitize_input($conn, $_POST['lastname_hl']);
    $firstname_hl = sanitize_input($conn, $_POST['firstname_hl']);
    $middlename_hl = sanitize_input($conn, $_POST['middlename_hl']);
    $exname_hl = sanitize_input($conn, $_POST['exname_hl']);
    $province_hl = sanitize_input($conn, $_POST['province_hl']);
    $municipality_hl = sanitize_input($conn, $_POST['municipality_hl']);
    $barangay_hl = sanitize_input($conn, $_POST['Barangay_hl']);
    $purok_hl = sanitize_input($conn, $_POST['purok_hl']);
    $dob_hl = sanitize_input($conn, $_POST['dob_hl']);
    $sex_hl = sanitize_input($conn, $_POST['sex_hl']);
    $age_hl = sanitize_input($conn, $_POST['age_hl']);
    $occupation_hl = sanitize_input($conn, $_POST['occupation_hl']);
    $lcro_hl = sanitize_input($conn, $_POST['lcro_hl']);
    $marital_hl = sanitize_input($conn, $_POST['marital_hl']);
    $contactnumber_hl = sanitize_input($conn, $_POST['contactnumber_hl']);
    $religion = sanitize_input($conn, $_POST['religion']);

    // Insert House Leader data
    $sql = "INSERT INTO family_members (member_type, lastname, firstname, middlename, extension_name, province, municipality, barangay, purok, date_of_birth, sex, age, occupation, lcro_registered, marital_status, contact_number, religion) 
            VALUES ('House Leader', '$lastname_hl', '$firstname_hl', '$middlename_hl', '$exname_hl', '$province_hl', '$municipality_hl', '$barangay_hl', '$purok_hl', '$dob_hl', '$sex_hl', '$age_hl', '$occupation_hl', '$lcro_hl', '$marital_hl', '$contactnumber_hl', '$religion')";

    if (mysqli_query($conn, $sql)) {
        echo "House Leader record inserted successfully<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Spouse (if applicable)
    if (!empty($_POST['lastname_spouse'])) {
        $lastname_spouse = sanitize_input($conn, $_POST['lastname_spouse']);
        $firstname_spouse = sanitize_input($conn, $_POST['firstname_spouse']);
        $middlename_spouse = sanitize_input($conn, $_POST['middlename_spouse']);
        $extension_spouse = sanitize_input($conn, $_POST['extension_spouse']);
        $age_spouse = sanitize_input($conn, $_POST['age_spouse']);
        $occupation_spouse = sanitize_input($conn, $_POST['occupation_spouse']);
        $dob_spouse = sanitize_input($conn, $_POST['dob_spouse']);
        $lcro_spouse = sanitize_input($conn, $_POST['lcro_spouse']);
        $address_spouse = sanitize_input($conn, $_POST['address_spouse']);
        $status_spouse = sanitize_input($conn, $_POST['status_spouse']);

        // Insert Spouse data
        $sql = "INSERT INTO family_members (member_type, lastname, firstname, middlename, extension_name, age, occupation, date_of_birth, lcro_registered, purok, marital_status) 
                VALUES ('Spouse', '$lastname_spouse', '$firstname_spouse', '$middlename_spouse', '$extension_spouse', '$age_spouse', '$occupation_spouse', '$dob_spouse', '$lcro_spouse', '$address_spouse', '$status_spouse')";

        if (mysqli_query($conn, $sql)) {
            echo "Spouse record inserted successfully<br>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    // Children (Working)
    $working_children_fields = [
        ['oldername', 'olderage', 'olderworking', 'olderoccupation', 'olderincome'],
        ['oldername_second', 'agesecond', 'workingsecond', 'occupationsecond', 'olderincomesec'],
        ['oldernamethree', 'agethree', 'workingthree', 'occupationthree', 'incomethree'],
        ['oldernamefour', 'agefour', 'workingfour', 'occupationfour', 'incomefour'],
        ['oldenamefive', 'agefive', 'workingfive', 'occupationfive', 'incomefive']
    ];

    foreach ($working_children_fields as $index => $fields) {
        $name = sanitize_input($conn, $_POST[$fields[0]]);
        if (!empty($name)) {
            $age = sanitize_input($conn, $_POST[$fields[1]]);
            $working = sanitize_input($conn, $_POST[$fields[2]]);
            $occupation = sanitize_input($conn, $_POST[$fields[3]]);
            $income = sanitize_input($conn, $_POST[$fields[4]]);

            $sql = "INSERT INTO family_members (member_type, firstname, age, working, occupation, income) 
                    VALUES ('Child (Working)', '$name', '$age', '$working', '$occupation', '$income')";

            if (mysqli_query($conn, $sql)) {
                echo "Child (Working) record " . ($index + 1) . " inserted successfully<br>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }

    // Children (Students)
    $student_children_fields = [
        ['firstyoungchildname', 'firstyoungage', 'firstyounglevel', 'firstyoungacademic'],
        ['secondyoungname', 'secondyoungage', 'secondyounglevel', 'secondyoungacademic'],
        ['thirdyoungname', 'thirdyoungage', 'thirdyounglevel', 'thirdyoungacademic'],
        ['fourthyoungname', 'fourthyoungage', 'fourthyounglevel', 'fourthyoungacademic'],
        ['fifthyoungname', 'fifthyoungage', 'fifthyounglevel', 'fifthyoungacademic']
    ];

    foreach ($student_children_fields as $index => $fields) {
        $name = sanitize_input($conn, $_POST[$fields[0]]);
        if (!empty($name)) {
            $age = sanitize_input($conn, $_POST[$fields[1]]);
            $level = sanitize_input($conn, $_POST[$fields[2]]);
            $academic = sanitize_input($conn, $_POST[$fields[3]]);

            $sql = "INSERT INTO family_members (member_type, firstname, age, education_level, academic_year) 
                    VALUES ('Child (Student)', '$name', '$age', '$level', '$academic')";

            if (mysqli_query($conn, $sql)) {
                echo "Child (Student) record " . ($index + 1) . " inserted successfully<br>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }

    //

    mysqli_close($conn);
}
?>