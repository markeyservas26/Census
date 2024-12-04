<?php
include '../database/db_connect.php';

// Check if `ids` is set and is an array
if (isset($_POST['ids']) && is_array($_POST['ids'])) {
    $ids = $_POST['ids'];

    try {
        // Begin a transaction for atomicity
        $conn->begin_transaction();

        // Prepare the SQL statement with placeholders
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $sql = "UPDATE house_leader SET transfer = 1 WHERE id IN ($placeholders)";

        // Prepare the statement
        if ($stmt = $conn->prepare($sql)) {
            // Bind the parameters
            $stmt->bind_param(str_repeat('i', count($ids)), ...$ids);

            // Execute the query
            if ($stmt->execute()) {
                // Commit the transaction
                $conn->commit();
                echo json_encode([
                    'status' => 'success', 
                    'message' => 'Records successfully transferred.'
                ]);
            } else {
                // Rollback the transaction
                $conn->rollback();
                echo json_encode([
                    'status' => 'error', 
                    'message' => 'Failed to update records: ' . $stmt->error
                ]);
            }

            $stmt->close();
        } else {
            // Rollback the transaction
            $conn->rollback();
            echo json_encode([
                'status' => 'error', 
                'message' => 'Failed to prepare the statement: ' . $conn->error
            ]);
        }
    } catch (Exception $e) {
        // Rollback the transaction in case of any exception
        $conn->rollback();
        echo json_encode([
            'status' => 'error', 
            'message' => 'An unexpected error occurred: ' . $e->getMessage()
        ]);
    }
} else {
    echo json_encode([
        'status' => 'error', 
        'message' => 'Invalid request. No records selected.'
    ]);
}

$conn->close();
?>