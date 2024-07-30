<?php
include '../database/db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM staff WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: ../admin/manage-staff.php?success=2");
    } else {
        header("Location: ../admin/manage-staff.php?error=2");
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../admin/manage-staff.php");
}
?>