<?php
// Database connection details
$servername = "127.0.0.1";
$username = "u510162695_bantayanisland"; // Change to your MySQL username
$password = "1Bantayan"; // Change to your MySQL password
$dbname = "u510162695_bantayanisland"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all table names
$sql = "SHOW TABLES";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_array()) {
        $tableName = $row[0];
        echo "<h2>Table: $tableName</h2>";

        // Fetch all records from the current table
        $tableSql = "SELECT * FROM $tableName";
        $tableResult = $conn->query($tableSql);

        if ($tableResult->num_rows > 0) {
            echo "<table border='1' cellpadding='5' cellspacing='0'>";
            echo "<tr>";
            
            // Display column names
            $fields = $tableResult->fetch_fields();
            foreach ($fields as $field) {
                echo "<th>" . $field->name . "</th>";
            }
            echo "</tr>";

            // Display rows
            while ($row = $tableResult->fetch_assoc()) {
                echo "<tr>";
                foreach ($row as $cell) {
                    echo "<td>" . htmlspecialchars($cell) . "</td>";
                }
                echo "</tr>";
            }
            echo "</table><br>";
        } else {
            echo "<p>No records found in table: $tableName</p>";
        }
    }
} else {
    echo "<p>No tables found in the database.</p>";
}

// Close the connection
$conn->close();
?>
