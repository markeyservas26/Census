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
        

        $conn->commit();
        echo json_encode(['status' => 'success', 'message' => 'Record updated successfully']);
        
    } catch (Exception $e) {

        $conn->rollback();
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}

$conn->close();