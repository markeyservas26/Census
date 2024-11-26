<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['userid'])) {
    // If not, redirect them to the login page
    header('Location: login.php');
    exit();
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the new name from the POST request
    $newName = trim($_POST['newName']);

    // Validate the new name
    if (!empty($newName)) {
        // Assuming you have a connection to the database, adjust the credentials as needed
        $host = 'localhost'; // Database host
        $username = 'root'; // Database username
        $password = ''; // Database password
        $dbname = 'census'; // Database name

        // Create a connection to the database
        $conn = new mysqli($host, $username, $password, $dbname);

        // Check for database connection errors
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get the user ID from the session
        $userId = $_SESSION['userid'];

        // Prepare and bind the SQL update statement to prevent SQL injection
        $stmt = $conn->prepare("UPDATE users SET name = ? WHERE id = ?");
        $stmt->bind_param("si", $newName, $userId); // "si" means string for name and integer for userId

        // Execute the query
        if ($stmt->execute()) {
            // If successful, update the session and return a success message
            $_SESSION['name'] = $newName;
            echo 'Name changed successfully.';
        } else {
            // If query fails, show an error message
            echo 'Error: ' . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    } else {
        echo 'Please provide a valid name.';
    }
} else {
    echo 'Invalid request method.';
}
?>
