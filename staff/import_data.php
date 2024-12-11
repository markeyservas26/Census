<?php
// Database connection details
$servername = "127.0.0.1";
$username = "u510162695_bantayanisland";
$password = "1Bantayan";
$dbname = "u510162695_bantayanisland";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode([
        'status' => 'error',
        'message' => 'Database connection failed: ' . $conn->connect_error
    ]));
}

// Function to import SQL file
function importSQLFile($conn, $sqlFile) {
    // Read the SQL file
    $sqlContent = file_get_contents($sqlFile);

    if ($sqlContent === false) {
        return [
            'status' => 'error',
            'message' => 'Unable to read the SQL file.'
        ];
    }

    // Remove comments and split into individual queries
    $sqlContent = preg_replace('/^--.*$/m', '', $sqlContent);
    $queries = preg_split('/;\s*$/m', $sqlContent);

    // Track successful and failed queries
    $successCount = 0;
    $failedQueries = [];

    foreach ($queries as $query) {
        $query = trim($query);
        if (empty($query)) continue;

        if ($conn->query($query) === TRUE) {
            $successCount++;
        } else {
            $failedQueries[] = [
                'query' => $query,
                'error' => $conn->error
            ];
        }
    }

    return [
        'status' => 'success',
        'success_count' => $successCount,
        'failed_queries' => $failedQueries
    ];
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["sqlFile"])) {
    $fileType = strtolower(pathinfo($_FILES["sqlFile"]["name"], PATHINFO_EXTENSION));

    // Validate file type
    if ($fileType != "sql") {
        echo json_encode([
            'status' => 'error',
            'message' => 'Only SQL files are allowed.'
        ]);
        exit;
    }

    // Import the SQL file directly from temporary location
    $sqlFile = $_FILES["sqlFile"]["tmp_name"];
    $importResult = importSQLFile($conn, $sqlFile);

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($importResult);
    exit;
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'No file uploaded or invalid request method.'
    ]);
}

$conn->close();
?>
