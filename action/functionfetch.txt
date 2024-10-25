<?php
include '../database/db_connect.php';

function fetch_house_leader_data($house_leader_id) {
    global $conn;
    $sql = "SELECT * FROM house_leader WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $house_leader_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function fetch_spouse_data($house_leader_id) {
    global $conn;
    $sql_spouse = "SELECT * FROM spouse WHERE house_leader_id = ?";
    $stmt_spouse = $conn->prepare($sql_spouse);
    $stmt_spouse->bind_param("i", $house_leader_id);
    $stmt_spouse->execute();
    $result_spouse = $stmt_spouse->get_result();
    return $result_spouse->fetch_assoc();
}

function fetch_older_household_members($house_leader_id) {
    global $conn;
    $sql_older = "SELECT * FROM older_household_members WHERE house_leader_id = ? ORDER BY id LIMIT 5";
    $stmt_older = $conn->prepare($sql_older);
    $stmt_older->bind_param("i", $house_leader_id);
    $stmt_older->execute();
    $result_older = $stmt_older->get_result();
    return $result_older->fetch_all(MYSQLI_ASSOC);
}

function fetch_younger_household_members($house_leader_id) {
    global $conn;
    $sql_younger = "SELECT * FROM younger_household_members WHERE house_leader_id = ? ORDER BY id LIMIT 5";
    $stmt_younger = $conn->prepare($sql_younger);
    $stmt_younger->bind_param("i", $house_leader_id);
    $stmt_younger->execute();
    $result_younger = $stmt_younger->get_result();
    return $result_younger->fetch_all(MYSQLI_ASSOC);
}

function fetch_transportation_data($house_leader_id) {
    global $conn;
    
    $sql = "SELECT * FROM public_transportation WHERE house_leader_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $house_leader_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function fetch_financial_accounts_data($house_leader_id) {
    global $conn;
    
    $sql = "SELECT * FROM financial_accounts WHERE house_leader_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $house_leader_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function fetch_internet_access_data($house_leader_id) {
    global $conn;
    
    $sql = "SELECT * FROM internet_access WHERE house_leader_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $house_leader_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

?>