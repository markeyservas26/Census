<?php
include '../database/db_connect.php';

function sanitize_input($key) {
    global $conn;
    return isset($_POST[$key]) ? mysqli_real_escape_string($conn, trim($_POST[$key])) : null;
}

function update_house_leader($house_leader_id) {
    global $conn;
    $house_number = sanitize_input('housenumber');
    $lastname_hl = sanitize_input('lastname_hl');
    $firstname_hl = sanitize_input('firstname_hl');
    $middlename_hl = sanitize_input('middlename_hl');
    $exname_hl = sanitize_input('exname_hl');
    $province_hl = sanitize_input('province_hl');
    $municipality_hl = sanitize_input('municipality_hl');
    $barangay_hl = sanitize_input('Barangay_hl');
    $purok_hl = sanitize_input('purok_hl');
    $dob_hl = sanitize_input('dob_hl');
    $sex_hl = sanitize_input('sex_hl');
    $age_hl = sanitize_input('age_hl');
    $occupation_hl = sanitize_input('occupation_hl');
    $lcro_hl = sanitize_input('lcro_hl');
    $marital_hl = sanitize_input('marital_hl');
    $contactnumber_hl = sanitize_input('contactnumber_hl');
    $religion = sanitize_input('religion');

    $sql_update_house_leader = "UPDATE house_leader SET house_number = ?, lastname = ?, firstname = ?, 
                                middlename = ?, exname = ?, province = ?, municipality = ?, barangay = ?, 
                                purok = ?, dob = ?, sex = ?, age = ?, occupation = ?, lcro = ?, 
                                marital_status = ?, contact_number = ?, religion = ? WHERE id = ?";
    
    $stmt = $conn->prepare($sql_update_house_leader);
    $stmt->bind_param("sssssssssssssssssi", $house_number, $lastname_hl, $firstname_hl, $middlename_hl, 
                      $exname_hl, $province_hl, $municipality_hl, $barangay_hl, $purok_hl, $dob_hl, 
                      $sex_hl, $age_hl, $occupation_hl, $lcro_hl, $marital_hl, $contactnumber_hl, 
                      $religion, $house_leader_id);
    $stmt->execute();
    $stmt->close();
}

function update_spouse($house_leader_id) {
    global $conn;
    $lastname_spouse = sanitize_input('lastname_spouse');
    $firstname_spouse = sanitize_input('firstname_spouse');
    $middlename_spouse = sanitize_input('middlename_spouse');
    $extension_spouse = sanitize_input('extension_spouse');
    $age_spouse = sanitize_input('age_spouse');
    $occupation_spouse = sanitize_input('occupation_spouse');
    $dob_spouse = sanitize_input('dob_spouse');
    $lcro_spouse = sanitize_input('lcro_spouse');
    $address_spouse = sanitize_input('address_spouse');
    $status_spouse = sanitize_input('status_spouse');

    $sql_update_spouse = "UPDATE spouse SET lastname = ?, firstname = ?, middlename = ?, extension = ?, 
                          age = ?, occupation = ?, dob = ?, lcro = ?, address = ?, status = ? 
                          WHERE house_leader_id = ?";
    
    $stmt = $conn->prepare($sql_update_spouse);
    $stmt->bind_param("ssssssssssi", $lastname_spouse, $firstname_spouse, $middlename_spouse, 
                      $extension_spouse, $age_spouse, $occupation_spouse, $dob_spouse, $lcro_spouse, 
                      $address_spouse, $status_spouse, $house_leader_id);
    $stmt->execute();
    $stmt->close();
}

function update_older_household_members($house_leader_id, $older_members) {
    global $conn;
    for ($i = 1; $i <= 5; $i++) {
        $name = sanitize_input("oldername_$i");
        $age = sanitize_input("olderage_$i");
        $working = sanitize_input("olderworking_$i");
        $occupation = sanitize_input("olderoccupation_$i");
        $income = sanitize_input("olderincome_$i");
    
        if (!empty($name)) {
            if (isset($older_members[$i-1]['id'])) {
                $sql_update_older = "UPDATE older_household_members SET name = ?, age = ?, working = ?, 
                                     occupation = ?, income = ? WHERE id = ?";
                $stmt = $conn->prepare($sql_update_older);
                $stmt->bind_param("ssssdi", $name, $age, $working, $occupation, $income, $older_members[$i-1]['id']);
            } else {
                $sql_insert_older = "INSERT INTO older_household_members (house_leader_id, name, age, working, 
                                     occupation, income) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql_insert_older);
                $stmt->bind_param("issssd", $house_leader_id, $name, $age, $working, $occupation, $income);
            }
            $stmt->execute();
            $stmt->close();
        }
    }
}

function update_younger_household_members($house_leader_id, $younger_members) {
    global $conn;
    for ($i = 1; $i <= 5; $i++) {
        $name = sanitize_input("youngername_$i");
        $age = sanitize_input("youngerage_$i");
        $level = sanitize_input("younglevel_$i");
        $academic = sanitize_input("youngacademic_$i");
    
        if (!empty($name)) {
            if (isset($younger_members[$i-1]['id'])) {
                $sql_update_younger = "UPDATE younger_household_members SET name = ?, age = ?, 
                                       education_level = ?, academic_status = ? WHERE id = ?";
                $stmt = $conn->prepare($sql_update_younger);
                $stmt->bind_param("sissi", $name, $age, $level, $academic, $younger_members[$i-1]['id']);
            } else {
                $sql_insert_younger = "INSERT INTO younger_household_members (house_leader_id, name, age, 
                                       education_level, academic_status) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql_insert_younger);
                $stmt->bind_param("isiss", $house_leader_id, $name, $age, $level, $academic);
            }
            $stmt->execute();
            $stmt->close();
        }
    }
}
?>