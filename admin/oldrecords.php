<?php 
include 'header.php'; 
include '../database/db_connect.php';

// Get highlight values as array
$highlightHouseNumbers = isset($_GET['highlight']) ? (is_array($_GET['highlight']) ? $_GET['highlight'] : [$_GET['highlight']]) : [];

$query = "SELECT id, house_number, 
          CONCAT(lastname, ', ', firstname, ' ', COALESCE(middlename, '')) AS fullname, 
          CONCAT(purok, ', ', barangay, ', ', municipality, ', ', province) AS address 
          FROM house_leader 
          WHERE transfer = 1";

$result = mysqli_query($conn, $query);

?>

<link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<style>
    .highlight-term {
        background-color: #A3BCE8 !important;
        font-weight: bold;
    }
    .custom-dropdown-btn {
        background-color: #4CAF50;
        color: white;
        border-radius: 5px;
        border: 1px solid #4CAF50;
        padding: 5px 10px;
    }
    .custom-dropdown-menu {
        border-radius: 5px;
        border: 1px solid #4CAF50;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }
    .custom-dropdown-menu .dropdown-item {
        color: #333;
        padding: 8px 16px;
    }
</style>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Old Records List</h1>
    </div>

    <section class="sections">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table datatable">
                                <thead>
                                    <tr>
                                        <th>House Number</th>
                                        <th>Fullname</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr class="<?php echo in_array($row['house_number'], $highlightHouseNumbers) ? 'highlight-term' : ''; ?>">
            <td><?= htmlspecialchars($row['house_number']) ?></td>
            <td><?= htmlspecialchars($row['fullname']) ?></td>
            <td><?= htmlspecialchars($row['address']) ?></td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-sm btn-secondary dropdown-toggle custom-dropdown-btn" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-cogs"></i>
                    </button>
                    <ul class="dropdown-menu custom-dropdown-menu">
                        <li><a class="dropdown-item" href="view_household?id=<?= $row['id'] ?>">View</a></li>
                        <li><a class="dropdown-item" href="edit_house_leader?id=<?= $row['id'] ?>">Edit</a></li>
                    </ul>
                </div>
            </td>
        </tr>
    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <<div class="center-button" style="text-align: right;">
  <button type="button" class="btn btn-primary text-white" style="background-color: #3388FF; margin-right: 20px;" onclick="printTable()">
    <i class="fas fa-print"></i> Reports
  </button>
</div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function () {
    const highlightHouseNumbers = <?php echo json_encode($highlightHouseNumbers); ?>;

    // Initialize DataTable
    const table = $('#dataTable').DataTable({
        pageLength: 10,
        lengthMenu: [5, 10, 25, 50, 100],
        order: [[1, 'asc']], // Sort by House Number
        responsive: true,
        drawCallback: function () {
            // Highlight rows after the table is drawn
            $('#dataTable tbody tr').each(function () {
                const houseNumberCell = $(this).find('td').eq(1); // House number is in the second column
                if (highlightHouseNumbers.includes(houseNumberCell.text())) {
                    $(this).addClass('highlight-term');
                }
            });
        },
    });

    // Check all checkboxes
});

function printTable() {
    var printWindow = window.open('', '', 'height=600,width=800');
    printWindow.document.write('<html><head><title>Print Report</title>');
    printWindow.document.write(`
        <style>
            @media print {
                body { margin: 0; padding: 20px; font-size: 12px; }
                table { width: 100%; border-collapse: collapse; }
                th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
                th { background-color: #f2f2f2; }
                .header { text-align: center; margin-bottom: 20px; }
                .header img { width: 80px; }
                h5 { margin: 5px 0; font-size: 14px; }
            }
        </style>
    `);
    printWindow.document.write('</head><body>');
    
    // Add header with logos and text
    printWindow.document.write(`
        <div class="header">
            <img src="assets/img/censusformlogo.png" style="position: absolute; left: 20px;">
            <div>
                <h5>REPUBLIC OF THE PHILIPPINES</h5>
                <h5>PROVINCE OF CEBU</h5>
                <h5>MUNICIPALITY OF BANTAYAN</h5>
                <br>
                <h5>BANTAYAN ISLAND CENSUS REPORTS</h5>
            </div>
            <img src="../assets/img/bantayan.jpg" style="position: absolute; right: 20px; top: 0;">
        </div>
    `);

    // Get table HTML without the action column
    var table = document.getElementById('dataTable').cloneNode(true);
    var rows = table.getElementsByTagName('tr');
    for (var i = 0; i < rows.length; i++) {
        rows[i].deleteCell(-1); // Remove last cell (action column)
    }
    
    printWindow.document.write(table.outerHTML);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    
    printWindow.onload = function() {
        printWindow.print();
        printWindow.close();
    };
}
</script>
