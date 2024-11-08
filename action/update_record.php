<?php

include '../database/db_connect.php';
include 'update_function.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn->begin_transaction();
    try {
      
        $result = update_house_leader($conn, $_POST);
        if (!$result) throw new Exception("Error updating house leader");
        
     
        $result = update_spouse($conn, $_POST);
        if (!$result) throw new Exception("Error updating spouse");
        
       
        $result = update_older_household_members($conn, $_POST['house_leader_id'], $_POST);
        if (!$result) throw new Exception("Error updating older household members");
        
  
        $result = update_younger_household_members($conn, $_POST['house_leader_id'], $_POST);
        if (!$result) throw new Exception("Error updating younger household members");
        
    
        $result = update_transportation($conn, $_POST['house_leader_id'], $_POST);
        if (!$result) throw new Exception("Error updating transportation");
        
      
        $result = update_financial_accounts($conn, $_POST['house_leader_id'], $_POST);
        if (!$result) throw new Exception("Error updating financial accounts");
        
      
        $result = update_internet_access($conn, $_POST['house_leader_id'], $_POST);
        if (!$result) throw new Exception("Error updating internet access");

        $result = update_public_safety($conn, $_POST['house_leader_id'], $_POST);
        if (!$result) throw new Exception("Error updating public safety");

        $result = update_social_protection($conn, $_POST['house_leader_id'], $_POST);
        if (!$result) throw new Exception("Error updating social protection");

        $result = update_water_sanitation_hygiene($conn, $_POST['house_leader_id'], $_POST);
        if (!$result) throw new Exception("Error updating water sanitation hygiene");

        $result = update_improved_source($conn, $_POST['house_leader_id'], $_POST);
        if (!$result) throw new Exception("Error updating improved source");

        $result = update_unimproved_source($conn, $_POST['house_leader_id'], $_POST);
        if (!$result) throw new Exception("Error updating unimproved source");
        
        $result = update_main_water_source($conn, $_POST['house_leader_id'], $_POST);
        if (!$result) throw new Exception("Error updating main water source");

        $result = update_sanitation($conn, $_POST['house_leader_id'], $_POST);
        if (!$result) throw new Exception("Error updating sanitation");

        $result = update_toiletfacility($conn, $_POST['house_leader_id'], $_POST);
        if (!$result) throw new Exception("Error updating toilet facility");

        $result = update_garbage($conn, $_POST['house_leader_id'], $_POST);
        if (!$result) throw new Exception("Error updating garbage");

        $result = update_housing_characteristics($conn, $_POST['house_leader_id'], $_POST);
        if (!$result) throw new Exception("Error updating housing characteristics");

        $result = update_floor_bedroom($conn, $_POST['house_leader_id'], $_POST);
        if (!$result) throw new Exception("Error updating floor bedroom");

        $result = update_tenturestatus($conn, $_POST['house_leader_id'], $_POST);
        if (!$result) throw new Exception("Error updating tenture status");

        $result = update_housing($conn, $_POST['house_leader_id'], $_POST);
        if (!$result) throw new Exception("Error updating housing");

        $result = update_energy_source($conn, $_POST['house_leader_id'], $_POST);
        if (!$result) throw new Exception("Error updating energy source");

        $result = update_energy_souce_cooking($conn, $_POST['house_leader_id'], $_POST);
        if (!$result) throw new Exception("Error updating energy source cooking");

        $result = update_household_assets($conn, $_POST['house_leader_id'], $_POST);
        if (!$result) throw new Exception("Error updating household assets");

        $result = update_vehicles($conn, $_POST['house_leader_id'], $_POST);
        if (!$result) throw new Exception("Error updating vehicles");

        $conn->commit();
        echo json_encode(['status' => 'success', 'message' => 'Record updated successfully']);
        
    } catch (Exception $e) {

        $conn->rollback();
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}

$conn->close();