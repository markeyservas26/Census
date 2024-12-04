<?php
include '../database/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['nameInput'];
    $email = $_POST['emailInput'];
    $phone = $_POST['phone'];
    $password = $_POST['passwordInput'];
    $municipality = $_POST['municipalityInput'];

    // Generate a 6-digit random ID
    $random_id = random_int(100000, 999999);

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the statement to insert
    $stmt = $conn->prepare("INSERT INTO staff (id, name, email, phone, password, municipality) VALUES (?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        echo json_encode(['success' => false, 'message' => 'Error preparing statement: ' . $conn->error]);
        exit;
    }

    $stmt->bind_param("isssss", $random_id, $name, $email, $phone, $hashed_password, $municipality);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'id' => $random_id]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error adding new staff: ' . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
