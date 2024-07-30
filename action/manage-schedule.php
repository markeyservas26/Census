<?php
include '../database/db_connect.php';
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if required fields are set
    if (isset($_POST['municipality'], $_POST['start_census'], $_POST['end_census'], $_POST['start_time'], $_POST['end_time'])) {
        $municipality = trim($_POST['municipality']);
        $start_census = trim($_POST['start_census']);
        $end_census = trim($_POST['end_census']);
        $start_time = trim($_POST['start_time']);
        $end_time = trim($_POST['end_time']);

        // Basic validation
        if (empty($municipality) || empty($start_census) || empty($end_census) || empty($start_time) || empty($end_time)) {
            echo json_encode(["success" => false, "message" => "All fields are required."]);
            exit;
        }

        // Validate date formats
        if (!validateDate($start_census) || !validateDate($end_census)) {
            echo json_encode(["success" => false, "message" => "Invalid date format."]);
            exit;
        }

        // Validate time formats
        if (!validateTime($start_time) || !validateTime($end_time)) {
            echo json_encode(["success" => false, "message" => "Invalid time format."]);
            exit;
        }

        // Prepare and execute the SQL statement
        $sql = "INSERT INTO schedule (municipality, start_census, end_census, start_time, end_time) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            echo json_encode(["success" => false, "message" => "Error preparing the SQL statement: " . $conn->error]);
            exit;
        }

        $stmt->bind_param("sssss", $municipality, $start_census, $end_census, $start_time, $end_time);

        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "Schedule added successfully."]);
        } else {
            echo json_encode(["success" => false, "message" => "Error: Could not add schedule. " . $stmt->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(["success" => false, "message" => "Missing required fields."]);
    }

    $conn->close();
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
}

function validateDate($date, $format = 'Y-m-d') {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}

function validateTime($time, $format = 'H:i') {
    $t = DateTime::createFromFormat($format, $time);
    return $t && $t->format($format) === $time;
}
?>