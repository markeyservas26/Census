<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Printable Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .text-end {
            text-align: right;
            margin: 20px;
        }
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>

    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Search by name or house number" />
    </div>

    <!-- Table with stripped rows -->
    <table class="table datatable">
        <thead>
            <tr>
                <th>House Number</th>
                <th>Fullname</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Ensure $result is set
            if (isset($result) && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['house_number']}</td>
                            <td>{$row['fullname']}</td>
                            <td>{$row['address']}</td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <div class="text-end">
        <button class="no-print" onclick="printReport()">Print Report</button>
    </div>

    <script>
        function printReport() {
            // Get the HTML of the existing table
            const tableHtml = document.querySelector('.datatable').outerHTML;
            
            // Create a new window for the print view
            const printWindow = window.open('', '', 'height=600,width=800');
            printWindow.document.write(`
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Print Report</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                        }
                        table {
                            width: 100%;
                            border-collapse: collapse;
                            margin: 20px 0;
                        }
                        th, td {
                            border: 1px solid black;
                            padding: 8px;
                            text-align: left;
                        }
                        th {
                            background-color: #f2f2f2;
                        }
                    </style>
                </head>
                <body>
                    <h1>Printable Report</h1>
                    ${tableHtml}
                </body>
                </html>
            `);
            printWindow.document.close(); // Close the document to complete writing
            printWindow.focus(); // Focus on the new window
            printWindow.print(); // Open the print dialog
        }
    </script>

</body>
</html>
