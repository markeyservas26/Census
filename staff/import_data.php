<?php
// Enable detailed error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection details
$servername = "127.0.0.1";
$username = "u510162695_bantayanisland"; // Change to your MySQL username
$password = "1Bantayan"; // Change to your MySQL password
$dbname = "u510162695_bantayanisland"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode([
        'status' => 'error',
        'message' => "Database connection failed: " . $conn->connect_error
    ]));
}

// Function to import SQL file
function importSQLFile($conn, $sqlFile) {
    // Read the SQL file
    $sqlContent = file_get_contents($sqlFile);

    if (!$sqlContent) {
        return [
            'success_count' => 0,
            'failed_queries' => [
                [
                    'query' => 'File read error',
                    'error' => 'Unable to read the SQL file.'
                ]
            ]
        ];
    }

    // Remove comments and split queries using multi_query
    $successCount = 0;
    $failedQueries = [];

    if ($conn->multi_query($sqlContent)) {
        do {
            if ($result = $conn->store_result()) {
                $result->free();
            }
        } while ($conn->next_result());

        if ($conn->errno) {
            $failedQueries[] = [
                'query' => 'Batch execution',
                'error' => $conn->error
            ];
        } else {
            $successCount++;
        }
    } else {
        $failedQueries[] = [
            'query' => 'Initial execution',
            'error' => $conn->error
        ];
    }

    return [
        'success_count' => $successCount,
        'failed_queries' => $failedQueries
    ];
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["sqlFile"])) {
    $target_dir = "uploads/";

    // Create uploads directory if it doesn't exist
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["sqlFile"]["name"]);
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validate file type
    if ($fileType != "sql") {
        echo json_encode([
            'status' => 'error',
            'message' => 'Only SQL files are allowed.'
        ]);
        exit;
    }

    // Move uploaded file
    if (move_uploaded_file($_FILES["sqlFile"]["tmp_name"], $target_file)) {
        // Import the SQL file
        $importResult = importSQLFile($conn, $target_file);

        // Prepare response
        $response = [
            'status' => 'success',
            'message' => "File imported successfully.",
            'success_count' => $importResult['success_count'],
            'failed_queries' => $importResult['failed_queries']
        ];

        // Remove the uploaded file
        unlink($target_file);

        // Send JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Sorry, there was an error uploading your file.'
        ]);
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'No file uploaded.'
    ]);
}

$conn->close();
?>
