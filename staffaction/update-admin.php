<?php
include '../database/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['nameInput'];
    $username = $_POST['usernameInput'];

    // Check if a new password is provided
    if (!empty($_POST['passwordInput'])) {
        $password = password_hash($_POST['passwordInput'], PASSWORD_BCRYPT);

        $sql = "UPDATE users SET name = ?, username = ?, password = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $name, $username, $password, $id);
    } else {
        // No new password provided, only update name, email, and municipality
        $sql = "UPDATE users SET name = ?, username = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $name, $username, $id);
    }

    $response = array();
    if ($stmt->execute()) {
        $response['success'] = true;
    } else {
        $response['success'] = false;
    }

    $stmt->close();
    $conn->close();

    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    header("Location: ../admin/manage-admin.php");
}
?>
