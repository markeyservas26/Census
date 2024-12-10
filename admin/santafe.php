<?php 
include 'header.php'; 
include '../database/db_connect.php';

// Get highlight values as array
$highlightHouseNumbers = isset($_GET['highlight']) ? (is_array($_GET['highlight']) ? $_GET['highlight'] : [$_GET['highlight']]) : [];

$query = "SELECT id, house_number, 
          CONCAT(lastname, ', ', firstname, ' ', COALESCE(middlename, '')) AS fullname, 
          CONCAT(purok, ', ', barangay, ', ', municipality, ', ', province) AS address 
          FROM house_leader
          WHERE municipality = 'Santafe' AND transfer = 0";
          
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
        <h1>Bantayan List</h1>
    </div>

    <section class="sections">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <input type="checkbox" id="checkAll" />
                            <label for="checkAll">Select All</label>
                        </div>
                        <button type="button" class="btn btn-primary" id="transferButton">
                             Transfer <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table id="dataTable" class="table datatable">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>House Number</th>
                                    <th>Fullname</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                    <tr class="<?php echo in_array($row['house_number'], $highlightHouseNumbers) ? 'highlight-term' : ''; ?>">
                                        <td><input type="checkbox" class="row-checkbox d-none" value="<?= $row['id'] ?>" /></td>
                                        <td><?= htmlspecialchars($row['house_number']) ?></td>
                                        <td><?= htmlspecialchars($row['fullname']) ?></td>
                                        <td><?= htmlspecialchars($row['address']) ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-secondary dropdown-toggle custom-dropdown-btn" type="button" data-bs-toggle="dropdown">
                                                    <i class="fas fa-cogs"></i>
                                                </button>
                                                <ul class="dropdown-menu custom-dropdown-menu">
                                                    <li><a class="dropdown-item" href="view_household.php?id=<?= $row['id'] ?>">View</a></li>
                                                    <li><a class="dropdown-item" href="edit_house_leader.php?id=<?= $row['id'] ?>">Edit</a></li>
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
    <div class="center-button" style="text-align: right;">
  <button type="button" class="btn btn-primary text-white" style="background-color: #3388FF; margin-right: 20px;" onclick="printTable()">
    <i class="fas fa-print"></i> Reports
  </button>
</div>
</section>


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

    // Disable the Transfer button initially
    $('#transferButton').prop('disabled', true);

    // Toggle visibility of checkboxes and enable Transfer button
    $('#checkAll').on('change', function () {
        const isChecked = $(this).is(':checked');

        // Show/Hide row checkboxes and toggle their checked state
        if (isChecked) {
            $('.row-checkbox').removeClass('d-none').prop('checked', true); // Show and check all checkboxes
        } else {
            $('.row-checkbox').addClass('d-none').prop('checked', false); // Hide and uncheck all checkboxes
        }

        // Enable/Disable Transfer button
        $('#transferButton').prop('disabled', !isChecked);
    });

    // Transfer button functionality with SweetAlert
    $('#transferButton').on('click', function () {
        const selectedIds = $('.row-checkbox:checked').map(function () {
            return this.value;
        }).get();

        if (selectedIds.length > 0) {
            // Use SweetAlert for confirmation
            Swal.fire({
                title: 'Confirm Transfer',
                text: 'Are you sure you want to transfer these records?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, transfer it!',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform the transfer via AJAX
                    $.ajax({
                        url: '../action/transfer.php',
                        type: 'POST',
                        data: { ids: selectedIds },
                        dataType: 'json',
                        success: function (response) {
                            if (response.status === 'success') {
                                Swal.fire({
                                    title: 'Transferred!',
                                    text: response.message,
                                    icon: 'success',
                                    timer: 3000,
                                    showConfirmButton: false,
                                });
                                location.reload();
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Error: ' + response.message,
                                    icon: 'error',
                                });
                            }
                        },
                        error: function (xhr, status, error) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'An error occurred while transferring the records: ' + error,
                                icon: 'error',
                            });
                        },
                    });
                }
            });
        } else {
            Swal.fire({
                title: 'No Rows Selected',
                text: 'Please select rows to transfer.',
                icon: 'warning',
            });
        }
    });
});






function printTable() {
    var table = document.getElementById('dataTable'); // Get the table to print
    var width = 800;
    var height = 600;

    // Calculate the position to center the print window
    var left = (window.innerWidth / 2) - (width / 2);
    var top = (window.innerHeight / 2) - (height / 2);

    // Open a new window for printing
    var printWindow = window.open('', '', `height=${height},width=${width},top=${top},left=${left}`);

    // Check if the window opened successfully
    if (printWindow) {
      printWindow.document.open();
      printWindow.document.write('<html><head><title>Print Report</title>');

      // Add external CSS (e.g., from the page) into the print window
      printWindow.document.write('<style>');
      var styles = document.querySelectorAll('style, link[rel="stylesheet"]');
      styles.forEach(function(style) {
        printWindow.document.write(style.innerHTML || '<link rel="stylesheet" href="' + style.href + '">');
      });

      // Add custom print styles
      printWindow.document.write(`
        @media print {
          body {
            margin: 0;
            padding: 0;
            font-size: 8px;
          }
          .print-content {
            max-width: 200%;
            margin: 0;
            padding: 8px;
            background: #fff;
            page-break-before: auto;
            page-break-after: auto;
            page-break-inside: avoid;
          }

          .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
          }
          .header img {
            width: 80px; /* Adjust the logo size */
          }
          .header .right-logo {
            position: absolute;
            right: 0; /* Position the first logo on the right */
            margin-bottom: 50px;
          }
          .header .left-logo {
            position: absolute;
            left: 0; /* Position the second logo on the left */
            margin-bottom: 50px;
          }
           h5 {
            margin: 0;
            padding: 0;
            font-size: 14px;
            text-align: center;
            width: 100%;
            margin-left: 85px;
            margin-top: 20px;
          }
          .header h3 {
            margin: 0;
            padding: 0;
            font-size: 16px;
          }
          table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
          }
          th, td {
            border: 1px solid #ddd;
            padding: 3px;
            text-align: left;
          }
          th {
            background-color: #f2f2f2;
          }

          /* Hide checkboxes during printing */
          .row-checkbox {
            display: none;
          }
        }
      `);

      printWindow.document.write('</style></head><body>');

      // Add the custom header to the print window
      printWindow.document.write('<div class="header">');
      
      // First logo on the left side
      printWindow.document.write('<img src="assets/img/censusformlogo.png" alt="Census Logo" class="left-logo">');

      // Header content in the center
      printWindow.document.write('<div>');
      printWindow.document.write('<h5>REPUBLIC OF THE PHILIPPINES</h5>');
      printWindow.document.write('<h5>PROVINCE OF CEBU</h5>');
      printWindow.document.write('<h5>MUNICIPALITY OF BANTAYAN</h5>');
      printWindow.document.write('<br><h5>BANTAYAN ISLAND CENSUS REPORTS</h5>');
      printWindow.document.write('</div>');
      
      // Second logo on the right side
      printWindow.document.write('<img src="../assets/img/bantayan.jpg" alt="Logo" class="right-logo">');
      printWindow.document.write('</div>');

      // Prepare the table content to print (exclude the "Action" column)
      var printTable = table.cloneNode(true); // Clone the original table
      var headers = printTable.querySelectorAll('th');
      var rows = printTable.querySelectorAll('tbody tr');

      // Remove the "Action" column from the cloned table
      for (var i = 0; i < headers.length; i++) {
        if (headers[i].innerText === 'Action') {
          // Remove "Action" column from the header
          headers[i].remove();
          // Remove "Action" column from each row
          rows.forEach(function(row) {
            row.deleteCell(i);
          });
          break;
        }
      }

      // Add the content to the print window
      printWindow.document.write('<div class="print-content">');
      printWindow.document.write(printTable.outerHTML);
      printWindow.document.write('</div>');

      printWindow.document.write('</body></html>');
      printWindow.document.close(); // Complete the document

      // Focus the print window and trigger the print dialog
      printWindow.focus();
      printWindow.onload = function() {
        printWindow.print();
      };

      // Close the window after printing
      printWindow.onafterprint = function() {
        printWindow.close();
      };
    } else {
      console.error('Failed to open print window.');
    }
}

</script>
