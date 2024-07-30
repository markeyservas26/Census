<?php
include '../database/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['nameInput'];
    $email = $_POST['emailInput'];
    $municipality = $_POST['municipalityInput'];

    // Check if a new password is provided
    if (!empty($_POST['passwordInput'])) {
        $password = password_hash($_POST['passwordInput'], PASSWORD_BCRYPT);

        $sql = "UPDATE staff SET name = ?, email = ?, password = ?, municipality = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $name, $email, $password, $municipality, $id);
    } else {
        // No new password provided, only update name, email, and municipality
        $sql = "UPDATE staff SET name = ?, email = ?, municipality = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $name, $email, $municipality, $id);
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
    header("Location: ../admin/manage-staff.php");
}
?>
