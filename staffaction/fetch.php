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

function fetch_public_safety_data($house_leader_id) {
    global $conn;
    
    $sql = "SELECT * FROM public_safety WHERE house_leader_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $house_leader_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function fetch_social_protection_data($house_leader_id) {
    global $conn;
    
    $sql = "SELECT * FROM social_protection WHERE house_leader_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $house_leader_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function fetch_water_sanitation_hygiene_data($house_leader_id) {
    global $conn;
    
    $sql = "SELECT * FROM water_sanitation_hygiene WHERE house_leader_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $house_leader_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function fetch_improved_source_data($house_leader_id) {
    global $conn;
    
    $sql = "SELECT * FROM improved_source WHERE house_leader_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $house_leader_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function fetch_unimproved_source_data($house_leader_id) {
    global $conn;
    
    $sql = "SELECT * FROM unimproved_source WHERE house_leader_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $house_leader_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function fetch_main_water_source_data($house_leader_id) {
    global $conn;
    
    $sql = "SELECT * FROM main_water_source WHERE house_leader_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $house_leader_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function fetch_water_source_located_data($house_leader_id) {
    global $conn;
    
    $sql = "SELECT * FROM water_source_location WHERE house_leader_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $house_leader_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function fetch_sanitation_data($house_leader_id) {
    global $conn;
    
    $sql = "SELECT * FROM sanitation WHERE house_leader_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $house_leader_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function fetch_toiletfacility_data($house_leader_id) {
    global $conn;
    
    $sql = "SELECT * FROM toiletfacility WHERE house_leader_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $house_leader_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function fetch_garbage_data($house_leader_id) {
    global $conn;
    
    $sql = "SELECT * FROM garbage WHERE house_leader_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $house_leader_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function fetch_housing_characteristics_data($house_leader_id) {
    global $conn;
    
    $sql = "SELECT * FROM housing_characteristics WHERE house_leader_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $house_leader_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function fetch_floor_bedroom_data($house_leader_id) {
    global $conn;
    
    $sql = "SELECT * FROM floor_bedroom WHERE house_leader_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $house_leader_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function fetch_tenturestatus_data($house_leader_id) {
    global $conn;
    
    $sql = "SELECT * FROM tenturestatus WHERE house_leader_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $house_leader_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function fetch_housing_data($house_leader_id) {
    global $conn;
    
    $sql = "SELECT * FROM housing WHERE house_leader_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $house_leader_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function fetch_energy_source_data($house_leader_id) {
    global $conn;
    
    $sql = "SELECT * FROM energy_sources WHERE house_leader_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $house_leader_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function fetch_energy_souce_cooking_data($house_leader_id) {
    global $conn;
    
    $sql = "SELECT * FROM energy_souce_cooking WHERE house_leader_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $house_leader_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function fetch_household_assets_data($house_leader_id) {
    global $conn;
    
    $sql = "SELECT * FROM household_assets WHERE house_leader_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $house_leader_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function fetch_vehicles_data($house_leader_id) {
    global $conn;
    
    $sql = "SELECT * FROM vehicles WHERE house_leader_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $house_leader_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

?>