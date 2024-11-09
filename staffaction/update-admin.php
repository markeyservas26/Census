<?php
include '../database/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the values from the form
    $id = $_POST['editId']; // Match the form input name
    $name = $_POST['editNameInput']; // Match the form input name
    $username = $_POST['editUsernameInput']; // Match the form input name

    // Check if a new password is provided
    if (!empty($_POST['editPasswordInput'])) {
        $password = password_hash($_POST['editPasswordInput'], PASSWORD_BCRYPT);

        $sql = "UPDATE users SET name = ?, username = ?, password = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("SQL error: " . $conn->error);
        }
        $stmt->bind_param("sssi", $name, $username, $password, $id);
    } else {
        // No new password, only update name and username
        $sql = "UPDATE users SET name = ?, username = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("SQL error: " . $conn->error);
        }
        $stmt->bind_param("ssi", $name, $username, $id);
    }

    // Execute the query
    $response = array();
    if ($stmt->execute()) {
        $response['success'] = true;
    } else {
        $response['success'] = false;
        $response['message'] = 'Failed to update admin details: ' . $stmt->error; // Show error message from SQL
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
