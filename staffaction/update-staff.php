<?php
include '../database/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the values from the form
    $id = $_POST['editId']; // Match the form input name
    $name = $_POST['editNameInput']; // Match the form input name
    $username = $_POST['editUsernameInput']; // Match the form input name
    $phone = $_POST['editphone'];

    // Check if a new password is provided
    $password = "";
    if (!empty($_POST['editPasswordInput'])) {
        // Hash the new password
        $password = password_hash($_POST['editPasswordInput'], PASSWORD_BCRYPT);
    }

    // Update the SQL query depending on whether a password is provided
    if ($password !== "") {
        // New password provided
        $sql = "UPDATE users SET name = ?, username = ?, phone = ?,  password = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("SQL error: " . $conn->error);
        }
        $stmt->bind_param("ssssi", $name, $username, $phone, $password, $id);
    } else {
        // No password provided, only update name and username
        $sql = "UPDATE users SET name = ?, username = ?, phone = ?, WHERE id = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("SQL error: " . $conn->error);
        }
        $stmt->bind_param("sssi", $name, $username, $phone, $id);
    }

    // Execute the query and check if successful
    $response = array();
    if ($stmt->execute()) {
        $response['success'] = true;
    } else {
        $response['success'] = false;
        $response['message'] = 'Failed to update admin details: ' . $stmt->error; // Include error message from SQL
    }

    $stmt->close();
    $conn->close();

    // Send the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    header("Location: ../admin/manage-admin.php");
}
?>
