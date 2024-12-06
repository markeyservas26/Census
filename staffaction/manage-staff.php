<?php
include '../database/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Input sanitization
    $name = htmlspecialchars(trim($_POST['nameInput']));
    $email = htmlspecialchars(trim($_POST['emailInput']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $password = htmlspecialchars(trim($_POST['passwordInput']));
    $municipality = htmlspecialchars(trim($_POST['municipalityInput']));

    // Input validation
    if (!preg_match("/^[a-zA-Z\s'-]+$/", $name)) {
        echo json_encode(['success' => false, 'message' => 'Invalid name. Only letters, spaces, dashes, and apostrophes are allowed.']);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !str_ends_with($email, '@gmail.com')) {
        echo json_encode(['success' => false, 'message' => 'Invalid email. Must be a valid @gmail.com email address.']);
        exit;
    }

    if (!preg_match("/^\d{11}$/", $phone)) {
        echo json_encode(['success' => false, 'message' => 'Invalid phone number. Must be exactly 11 digits.']);
        exit;
    }

    if ($password !== 'staff') {
        echo json_encode(['success' => false, 'message' => 'Invalid password. Password must be "staff" only.']);
        exit;
    }

    if (!in_array($municipality, ['Madridejos', 'Bantayan', 'Santafe'])) {
        echo json_encode(['success' => false, 'message' => 'Invalid municipality selected.']);
        exit;
    }

    // Generate a 6-digit random ID
    $random_id = random_int(100000, 999999);

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO staff (id, name, email, phone, password, municipality) VALUES (?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        echo json_encode(['success' => false, 'message' => 'Error preparing statement: ' . $conn->error]);
        exit;
    }

    $stmt->bind_param("isssss", $random_id, $name, $email, $phone, $hashed_password, $municipality);

    // Execute the query
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'id' => $random_id]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error adding new staff: ' . $stmt->error]);
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
