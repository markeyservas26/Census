<?php
session_start();
include '../database/db_connect.php';

header('Content-Type: application/json');

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Debug: Check posted data
    error_log("Email: $email, Password: $password");

    // Fetch user from database based on email
    $sql = "SELECT id, name, email, password, municipality FROM staff WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        $response['success'] = false;
        $response['message'] = 'Prepare failed: ' . $conn->error;
        echo json_encode($response);
        exit();
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];

        // Debug: Check fetched data
        error_log("Fetched Email: " . $row['email'] . ", Fetched Password: " . $row['password']);

        // Verify the hashed password
        if (password_verify($password, $stored_password)) {
            // Passwords match, log in user
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_municipality'] = $row['municipality']; // Store municipality in session

            // Prepare the response for successful login
            $response['success'] = true;
            $response['redirect'] = ($row['municipality'] == 'Madridejos') ? '../staff/madridejos.php' :
                                    (($row['municipality'] == 'Bantayan') ? '../staffbantayan/bantayan.php' :
                                    (($row['municipality'] == 'Santa Fe') ? '../staffsantafe/santafe.php' : '../error.php'));
        } else {
            // Passwords do not match
            $response['success'] = false;
            $response['message'] = 'Incorrect password.';
        }
    } else {
        // No user found with the provided email
        $response['success'] = false;
        $response['message'] = 'User not found.';
    }

    $stmt->close();
    $conn->close();
} else {
    $response['success'] = false;
    $response['message'] = 'Invalid request.';
}

echo json_encode($response);
?>
