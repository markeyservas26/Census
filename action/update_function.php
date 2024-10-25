<?php

function sanitize_input($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

function update_house_leader($conn, $data) {
    $sql = "UPDATE house_leader SET 
            house_number = ?, lastname = ?, firstname = ?, middlename = ?,
            exname = ?, province = ?, municipality = ?, barangay = ?,
            purok = ?, dob = ?, age = ?, sex = ?, occupation = ?,
            lcro = ?, marital_status = ?, contact_number = ?, religion = ?
            WHERE id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssssssssssi",
        $data['housenumber'], $data['lastname_hl'], $data['firstname_hl'], $data['middlename_hl'],
        $data['exname_hl'], $data['province_hl'], $data['municipality_hl'], $data['Barangay_hl'],
        $data['purok_hl'], $data['dob_hl'], $data['age_hl'], $data['sex_hl'], $data['occupation_hl'],
        $data['lcro_hl'], $data['marital_hl'], $data['contactnumber_hl'], $data['religion'],
        $data['house_leader_id']
    );
    
    return $stmt->execute();
}

function update_spouse($conn, $data) {
    $sql = "UPDATE spouse SET 
            lastname = ?, firstname = ?, middlename = ?, extension = ?,
            age = ?, occupation = ?, dob = ?, lcro = ?, address = ?, status = ?
            WHERE house_leader_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssi",
        $data['lastname_spouse'], $data['firstname_spouse'], $data['middlename_spouse'],
        $data['extension_spouse'], $data['age_spouse'], $data['occupation_spouse'],
        $data['dob_spouse'], $data['lcro_spouse'], $data['address_spouse'],
        $data['status_spouse'], $data['house_leader_id']
    );
    
    return $stmt->execute();
}

function update_older_household_members($conn, $house_leader_id, $data) {
    // First delete existing records
    $delete_sql = "DELETE FROM older_household_members WHERE house_leader_id = ?";
    $delete_stmt = $conn->prepare($delete_sql);
    $delete_stmt->bind_param("i", $house_leader_id);
    $delete_stmt->execute();
    
    // Insert new/updated records
    $success = true;
    for ($i = 1; $i <= 5; $i++) {
        if (!empty($data["oldername_$i"])) {
            $sql = "INSERT INTO older_household_members 
                    (house_leader_id, name, age, working, occupation, income) 
                    VALUES (?, ?, ?, ?, ?, ?)";
            
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("issssd",
                $house_leader_id,
                $data["oldername_$i"],
                $data["olderage_$i"],
                $data["olderworking_$i"],
                $data["olderoccupation_$i"],
                $data["olderincome_$i"]
            );
            
            if (!$stmt->execute()) {
                $success = false;
            }
        }
    }
    return $success;
}

function update_younger_household_members($conn, $house_leader_id, $data) {
    // First delete existing records
    $delete_sql = "DELETE FROM younger_household_members WHERE house_leader_id = ?";
    $delete_stmt = $conn->prepare($delete_sql);
    $delete_stmt->bind_param("i", $house_leader_id);
    $delete_stmt->execute();
    
    // Insert new/updated records
    $success = true;
    for ($i = 1; $i <= 5; $i++) {
        if (!empty($data["youngername_$i"])) {
            $sql = "INSERT INTO younger_household_members 
                    (house_leader_id, name, age, education_level, academic_status) 
                    VALUES (?, ?, ?, ?, ?)";
            
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("isiss",
                $house_leader_id,
                $data["youngername_$i"],
                $data["youngerage_$i"],
                $data["younglevel_$i"],
                $data["youngacademic_$i"]
            );
            
            if (!$stmt->execute()) {
                $success = false;
            }
        }
    }
    return $success;
}

//Radio part
function update_transportation($conn, $house_leader_id, $data) {
    $sql = "UPDATE public_transportation SET 
            transportation = ? 
            WHERE house_leader_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $data['transportation'], $house_leader_id);
    
    return $stmt->execute();
}

function update_financial_accounts($conn, $house_leader_id, $data) {
    $sql = "UPDATE financial_accounts SET 
            bank_account = ?, digital_bank_account = ?, emoney_account = ?,
            nssla_account = ?, cooperative_account = ?, microfinance_ngo_account = ?,
            remittance_center_account = ?, prefer_not_answer = ?
            WHERE house_leader_id = ?";
    
    $bank_account = isset($data['bankaccount']) ? 1 : 0;
    $digital_bank = isset($data['digitalbankaccount']) ? 1 : 0;
    $emoney = isset($data['emoneyaccount']) ? 1 : 0;
    $nssla = isset($data['nssla']) ? 1 : 0;
    $cooperative = isset($data['awc']) ? 1 : 0;
    $microfinance = isset($data['ngo']) ? 1 : 0;
    $remittance = isset($data['amrc']) ? 1 : 0;
    $prefer_not = isset($data['notanswer']) ? 1 : 0;
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiiiiiii",
        $bank_account, $digital_bank, $emoney, $nssla,
        $cooperative, $microfinance, $remittance, $prefer_not,
        $house_leader_id
    );
    
    return $stmt->execute();
}

function update_internet_access($conn, $house_leader_id, $data) {
    $sql = "UPDATE internet_access SET 
            fixed_wired = ?, fixed_wireless = ?, satellite = ?, mobile = ?
            WHERE house_leader_id = ?";
    
    $fixed_wired = isset($data['ko3network']) ? 1 : 0;
    $fixed_wireless = isset($data['fixednetwork']) ? 1 : 0;
    $satellite = isset($data['satellitenetwork']) ? 1 : 0;
    $mobile = isset($data['mobilenetwork']) ? 1 : 0;
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiii",
        $fixed_wired, $fixed_wireless, $satellite, $mobile,
        $house_leader_id
    );
    
    return $stmt->execute();
}

function update_public_safety($conn, $house_leader_id, $data) {
    $sql = "UPDATE public_safety SET 
            safety_level = ?
            WHERE house_leader_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $data['safety_level'], $house_leader_id);
    
    return $stmt->execute();
}