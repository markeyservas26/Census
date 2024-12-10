<?php 
include 'header.php'; 
include '../database/db_connect.php';

$highlightHouseNumbers = isset($_GET['highlight']) ? (is_array($_GET['highlight']) ? $_GET['highlight'] : [$_GET['highlight']]) : [];

// Pagination parameters
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 10;
$start = ($page - 1) * $limit;

// Fetch total number of rows
$total_query = "SELECT COUNT(*) as total FROM house_leader WHERE municipality = 'Santafe'";
$total_result = mysqli_query($conn, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total_rows = $total_row['total'];

// Calculate total pages
$total_pages = ceil($total_rows / $limit);

// Fetch data
$query = "SELECT id, house_number, 
          CONCAT(lastname, ', ', firstname, ' ', COALESCE(middlename, '')) AS fullname, 
          CONCAT(purok, ', ', barangay, ', ', municipality, ', ', province) AS address 
          FROM house_leader
          WHERE municipality = 'Santafe'";

// Apply the LIMIT
$query .= " LIMIT $start, $limit";

$result = mysqli_query($conn, $query);

// Calculate showing entries
$start_entry = ($total_rows > 0) ? $start + 1 : 0; // Make sure start entry is correct
$end_entry = min($start + $limit, $total_rows);    // Make sure end entry does not exceed total rows

?>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
     <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome for icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
     <style>
        .highlight-term {
    background-color: #A3BCE8;
    font-weight: bold;
}
.table-controls {
display: flex;
justify-content: space-between;
align-items: center;
margin-bottom: 15px;
}

.search-container, .show-entries {
display: flex;
align-items: center;
}

.search-container {
margin-right: 20px;
}

.search-container input {
max-width: 500px; /* Adjust as needed */
height: 40px;
border-radius: 5px;
border: 1px solid #ced4da;
padding: 0 10px;
}

.show-entries {
display: flex;
align-items: center;
gap: 10px; /* Space between the label and the select element */
}

.show-entries label {
margin: 0;
font-weight: 500; /* Slightly bolder text */
color: #495057; /* Subtle dark color */
font-size: 1rem; /* Adjust size as needed */
}

.show-entries select {
height: 40px; /* Match the height of the input field for consistency */
border-radius: 5px;
border: 1px solid #ced4da;
font-size: 1rem;
padding: 0 10px;
background-color: #fff; /* Background color of the dropdown */
color: #495057; /* Text color inside the dropdown */
}

.show-entries select:focus {
border-color: #007bff; /* Highlight border color on focus */
outline: none; /* Remove default outline */
}

.footer-pagination {
display: flex;
justify-content: space-between; /* Distributes space between items */
align-items: center;
margin-top: 15px;
}

.footer-info {
font-size: 0.875rem;
color: #495057;
}

.pagination-wrapper {
display: flex;
justify-content: flex-end;
}

.pagination {
margin: 0;
}

    /* Custom Styles for Dropdown */
    /* Style for dropdown button */
    .custom-dropdown-btn {
        background-color: #4CAF50; /* Green background */
        color: white; /* White text */
        border-radius: 5px;
        border: 1px solid #4CAF50;
        padding: 5px 10px;
    }

    .custom-dropdown-btn:hover {
        background-color: #45a049; /* Slightly darker green on hover */
        border-color: #45a049;
    }

    .custom-dropdown-btn:focus {
        box-shadow: 0 0 0 0.2rem rgba(72, 145, 47, 0.5); /* Green focus outline */
    }

    /* Style for dropdown menu */
    .custom-dropdown-menu {
        border-radius: 5px;
        border: 1px solid #4CAF50; /* Matching border with button */
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    }

    /* Style for each item in the dropdown */
    .custom-dropdown-menu .dropdown-item {
        color: #333;
        padding: 8px 16px;
    }

    .custom-dropdown-menu .dropdown-item:hover {
        background-color: #f1f1f1; /* Light gray on hover */
        color: #333;
    }

    .custom-dropdown-menu .dropdown-item:focus {
        background-color: #ddd; /* Darker gray on focus */
        color: #333;
    }

    /* Styling the dropdown icon */
    .custom-dropdown-btn i {
        margin-right: 5px;
    }

    /* Add a horizontal line between Delete and View options */
.custom-dropdown-menu li {
  border-bottom: 1px solid #ddd;
}

/* Remove the border from the last item (View) */
.custom-dropdown-menu li:last-child {
  border-bottom: none;
}

<style>
/* Adjust layout for the "Show entries" and "Search" controls on smaller screens */
@media screen and (max-width: 576px) {
    .table-controls {
        display: flex;
        flex-direction: column;
        gap: 0.75rem; /* Adjust spacing between stacked elements */
    }

    .table-controls > div {
        width: 100%; /* Make each control take full width */
    }
}

@media (max-width: 768px) {
    .table-controls {
        gap: 0.5rem; /* Reduce gap between controls for slightly larger screens */
    }
}
</style>

</style>
<main id="main" class="main">

<div class="pagetitle">
    <h1>Santa Fe List</h1>

  </div><!-- End Page Title -->

  <section class="sections">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Table Controls -->
                        <div class="row mb-3">
                            <!-- Show Entries -->
                            <div class="row mb-3 table-controls align-items-center">
    <!-- Show Entries -->
    <div class="col-md-2 col-12">
    <label for="entriesPerPage" class="form-label">Show entries:</label>
    <select id="entriesPerPage" class="form-select form-select-sm" onchange="updateEntriesPerPage()">
        <option value="5" <?= $limit == 5 ? 'selected' : '' ?>>5</option>
        <option value="10" <?= $limit == 10 ? 'selected' : '' ?>>10</option>
        <option value="25" <?= $limit == 25 ? 'selected' : '' ?>>25</option>
        <option value="50" <?= $limit == 50 ? 'selected' : '' ?>>50</option>
        <option value="100" <?= $limit == 100 ? 'selected' : '' ?>>100</option>
    </select>
</div>
    <!-- Search Input -->
    <div class="col-md-4 col-12 ms-md-auto">
        <label for="searchInput" class="form-label">Search:</label>
        <input type="text" id="searchInput" class="form-control form-control-sm" placeholder="Search housenumber or fullname">
    </div>
</div>



                        <!-- Responsive Table -->
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

                       <!-- Footer Info and Pagination -->
<div class="row align-items-center">
    <div class="col-md-6 col-12 text-center text-md-start mb-2 mb-md-0">
        Showing <?= $start_entry ?> to <?= $end_entry ?> of <?= $total_rows ?> entries
    </div>
    <div class="col-md-6 col-12">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center justify-content-md-end">
                <!-- Previous Page Link -->
                <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= max(1, $page - 1) ?>&limit=<?= $limit ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <!-- Page Number Links -->
                <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                    <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>&limit=<?= $limit ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>

                <!-- Next Page Link -->
                <li class="page-item <?= $page >= $total_pages ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= min($total_pages, $page + 1) ?>&limit=<?= $limit ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="center-button" style="text-align: right;">
  <button type="button" class="btn btn-primary text-white" style="background-color: #3388FF; margin-right: 20px;" onclick="printTable()">
    <i class="fas fa-print"></i> Reports
  </button>
</div>
</main>

<script>
    function updateEntriesPerPage() {
        const limit = document.getElementById('entriesPerPage').value; // Get the selected value
        const urlParams = new URLSearchParams(window.location.search); // Get the current URL parameters
        urlParams.set('limit', limit); // Update the 'limit' parameter
        
        // Update the URL and reload the page
        window.location.search = urlParams.toString();
    }
</script>
<script>

document.getElementById('searchInput').addEventListener('keyup', function(e) {
    if (e.key === 'Enter') {
        window.location.href = '?page=1&limit=<?= $limit ?>&search=' + encodeURIComponent(this.value);
    }
});


document.querySelectorAll('.edit-btn').forEach(button => {
    button.addEventListener('click', function() {
        var leaderId = this.dataset.id;
        // Redirect to the edit page
        window.location.href = 'edit_house_leader.php?id=' + leaderId;
    });
});
</script>
<script>
    const searchInput = document.getElementById("searchInput");
const tableBody = document.querySelector("#dataTable tbody"); // The table body
const originalRows = Array.from(tableBody.rows); // Store all rows initially

// Highlight the matching text in the row, excluding buttons, checkboxes, and non-text elements
function highlightText(row, searchTerm) {
    const cells = row.getElementsByTagName('td');
    for (let i = 0; i < cells.length; i++) {
        let cell = cells[i];
        const text = cell.textContent || cell.innerText;

        // Skip cells that contain buttons, links, or checkboxes
        if (cell.querySelector('button') || cell.querySelector('a') || cell.querySelector('input[type="checkbox"]')) {
            continue;
        }

        // Highlight matching term
        const regex = new RegExp(searchTerm, 'gi');
        cell.innerHTML = text.replace(regex, match => `<span class="highlight-term">${match}</span>`);
    }
}

// Filter and highlight table rows
function filterTable() {
    const searchValue = searchInput.value.toLowerCase();
    const checkedState = {}; // Store checked state of checkboxes before filtering

    // Store the checked state of checkboxes for each row
    originalRows.forEach((row, index) => {
        const checkbox = row.querySelector('input[type="checkbox"]');
        if (checkbox) {
            checkedState[index] = checkbox.checked;
        }
    });

    // Clear the table body before filtering
    tableBody.innerHTML = "";

    // Filter and display rows that match the search term
    originalRows.forEach((row, index) => {
        let rowText = row.textContent.toLowerCase();
        if (rowText.includes(searchValue)) {
            highlightText(row, searchValue);
            tableBody.appendChild(row); // Re-add matching row to the table body
            
            // Restore the checked state for each checkbox
            const checkbox = row.querySelector('input[type="checkbox"]');
            if (checkbox) {
                checkbox.checked = checkedState[index]; // Keep checkbox state intact
            }
        }
    });
}

// Reset highlights when user types
searchInput.addEventListener("keyup", function(e) {
    filterTable();
});

    </script>

<?php
// Close the database connection
mysqli_close($conn);
?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
   <!-- Bootstrap JS (optional if you need dropdown functionality to work) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
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
      printWindow.document.write('<h5>MUNICIPALITY OF SANTA FE</h5>');
      printWindow.document.write('<br><h5>BANTAYAN ISLAND CENSUS REPORTS</h5>');
      printWindow.document.write('</div>');
      
      // Second logo on the right side
      printWindow.document.write('<img src="../assets/img/santafe.jpg" alt="Logo" class="right-logo">');
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
</script>

</body>

</html>