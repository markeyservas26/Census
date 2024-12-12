<?php 
include 'header.php'; 
include '../database/db_connect.php';

// Get highlight values as array
$highlightHouseNumbers = isset($_GET['highlight']) ? (is_array($_GET['highlight']) ? $_GET['highlight'] : [$_GET['highlight']]) : [];

$query = "SELECT id, house_number, 
          CONCAT(lastname, ', ', firstname, ' ', COALESCE(middlename, '')) AS fullname, 
          CONCAT(purok, ', ', barangay, ', ', municipality, ', ', province) AS address 
          FROM house_leader
          WHERE municipality = 'Madridejos'";
          
$result = mysqli_query($conn, $query);
?>

<link href="../offlinesweet/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="../offlinesweet/bootstrap.min.css" rel="stylesheet">
<link href="../offlinesweet/all.min.css" rel="stylesheet">

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
        <h1>Madridejos List</h1>
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
                        <button type="button" class="btn btn-success" id="exportButton">
            Export Data <i class="fas fa-download"></i>
        </button>
        <button type="button" class="btn btn-primary" id="importButton">
    Import Data <i class="fas fa-upload"></i>
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
</div>
</section>

<!-- File Upload Modal -->
<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importModalLabel">Import SQL Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="importForm" method="POST" enctype="multipart/form-data" action="import_data.php">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="sqlFile" class="form-label">Upload SQL File</label>
                        <input type="file" class="form-control" id="sqlFile" name="sqlFile" accept=".sql" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>
</main>

<script src="../offlinesweet/jquery-3.6.0.min.js"></script>
<script src="../offlinesweet/jquery.dataTables.min.js"></script>
<script src="../offlinesweet/dataTables.bootstrap5.min.js"></script>
<script src="../offlinesweet/bootstrap.bundle.min.js"></script>

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

    // Individual checkbox change event
    $(document).on('change', '.row-checkbox', function() {
        // Check if any checkboxes are selected
        const checkedBoxes = $('.row-checkbox:checked');
        
        // Enable/Disable Transfer button based on checkbox selection
        $('#transferButton').prop('disabled', checkedBoxes.length === 0);
    });

    // Transfer button functionality with SweetAlert
    $('#exportButton').on('click', function () {
        const selectedIds = $('.row-checkbox:checked').map(function () {
            return this.value;
        }).get();

        if (selectedIds.length === 0) {
            Swal.fire({
                title: 'No Rows Selected',
                text: 'Please select rows to export.',
                icon: 'warning',
            });
            return;
        }

        // AJAX request to generate and download SQL file
        $.ajax({
            url: 'export_selected.php',
            type: 'POST',
            data: { ids: selectedIds },
            xhrFields: { responseType: 'blob' },
            success: function (blob) {
                const url = window.URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = 'exported_data.sql';
                document.body.appendChild(a);
                a.click();
                a.remove();
                window.URL.revokeObjectURL(url);
            },
            error: function () {
                Swal.fire({
                    title: 'Error!',
                    text: 'An error occurred while exporting data.',
                    icon: 'error',
                });
            },
        });
    });
});

$(document).ready(function () {
    // Show Import Modal
    $('#importButton').on('click', function () {
        $('#importModal').modal('show');
    });
});

$(document).ready(function () {
    // Import button functionality with SweetAlert
    $('#importForm').on('submit', function (e) {
        e.preventDefault();
        
        // Check if a file is selected
        const fileInput = $('#sqlFile');
        if (fileInput[0].files.length === 0) {
            Swal.fire({
                title: 'No File Selected',
                text: 'Please choose an SQL file to import.',
                icon: 'warning',
            });
            return;
        }

        // Create FormData object
        const formData = new FormData(this);

        // Show loading alert
        Swal.fire({
            title: 'Importing...',
            text: 'Please wait while your SQL file is being imported.',
            didOpen: () => {
                Swal.showLoading();
            }
        });

        // AJAX request to import SQL file
        $.ajax({
            url: 'import_data.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    Swal.fire({
                        title: 'Import Successful',
                        html: `
                            <p>Total successful queries: ${response.success_count}</p>
                            ${response.failed_queries && response.failed_queries.length > 0 ? 
                                `<p>Failed Queries: ${response.failed_queries.length}</p>
                                <div style="max-height: 200px; overflow-y: auto;">
                                    <small>${response.failed_queries.map(fail => 
                                        `Query: ${fail.query}<br>Error: ${fail.error}`
                                    ).join('<hr>')}</small>
                                </div>` 
                                : ''}
                        `,
                        icon: 'success',
                    });

                    // Optionally reload the page or update the table
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                } else {
                    Swal.fire({
                        title: 'Import Error',
                        text: response.message,
                        icon: 'error',
                    });
                }
            },
            error: function () {
                Swal.fire({
                    title: 'Error!',
                    text: 'An error occurred while importing the SQL file.',
                    icon: 'error',
                });
            }
        });
    });
});

</script>
