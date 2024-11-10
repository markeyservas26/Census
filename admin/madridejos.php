<?php 
include 'header.php'; 
include '../database/db_connect.php';

// Pagination parameters
$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$start = ($page - 1) * $limit;

// Search parameter
$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_POST['search']) : '';

// Fetch total number of rows
$total_query = "SELECT COUNT(*) as total FROM house_leader WHERE municipality = 'Madridejos'";
if (!empty($search)) {
    $total_query .= " AND (house_number LIKE '%$search%' OR 
                      CONCAT(lastname, ' ', firstname, ' ', middlename) LIKE '%$search%')";
}
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
          WHERE municipality = 'Madridejos'";
if (!empty($search)) {
    $query .= " AND (house_number LIKE '%$search%' OR 
                CONCAT(lastname, ' ', firstname, ' ', COALESCE(middlename, '')) LIKE '%$search%')";
}
$query .= " LIMIT $start, $limit";

$result = mysqli_query($conn, $query);

// Calculate showing entries
$start_entry = $total_rows > 0 ? $start + 1 : 0;
$end_entry = min($start + $limit, $total_rows);

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
    background-color: yellow;
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
</style>
<main id="main" class="main">

<div class="pagetitle">
    <h1>Madridejos List</h1>

  </div><!-- End Page Title -->

  <section class="sections">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-controls">
                        <div class="show-entries">
                            <label for="entriesPerPage">Show entries:</label>
                            <select id="entriesPerPage" class="form-select">
                                <option value="5" <?= $limit == 5 ? 'selected' : '' ?>>5</option>
                                <option value="10" <?= $limit == 10 ? 'selected' : '' ?>>10</option>
                                <option value="25" <?= $limit == 25 ? 'selected' : '' ?>>25</option>
                                <option value="50" <?= $limit == 50 ? 'selected' : '' ?>>50</option>
                                <option value="100" <?= $limit == 100 ? 'selected' : '' ?>>100</option>
                            </select>
                        </div>
                        <div class="search-container">
                            <input type="text" id="searchInput" placeholder="Search by name or house number" value="<?= htmlspecialchars($search) ?>" />
                        </div>
                    </div>

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
    <tr>
        <td><?= htmlspecialchars($row['house_number']) ?></td>
        <td><?= htmlspecialchars($row['fullname']) ?></td>
        <td><?= htmlspecialchars($row['address']) ?></td>
        <td>
            <!-- Dropdown icon for settings -->
            <div class="dropdown">
                <button class="btn btn-sm btn-secondary dropdown-toggle custom-dropdown-btn" type="button" id="dropdownMenuButton<?= $row['id'] ?>" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-cogs"></i> <!-- You can use any icon here -->
                </button>
                <ul class="dropdown-menu custom-dropdown-menu" aria-labelledby="dropdownMenuButton<?= $row['id'] ?>">
                    <li><a class="dropdown-item" href="view_household.php?id=<?= $row['id'] ?>">View</a></li>
                    <li><a class="dropdown-item" href="edit_house_leader.php?id=<?= $row['id'] ?>">Edit</a></li>
                </ul>
            </div>
        </td>
    </tr>
    <?php endwhile; ?>
                        </tbody>
                    </table>

                    <!-- Footer Info and Pagination -->
                    <div class="footer-pagination">
                        <div class="footer-info">
                            Showing <?= $start_entry ?> to <?= $end_entry ?> of <?= $total_rows ?> entries
                        </div>
                        <div class="pagination-wrapper">
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                                        <a class="page-link" href="?page=<?= max(1, $page - 1) ?>&limit=<?= $limit ?>&search=<?= urlencode($search) ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                                        <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                            <a class="page-link" href="?page=<?= $i ?>&limit=<?= $limit ?>&search=<?= urlencode($search) ?>"><?= $i ?></a>
                                        </li>
                                    <?php endfor; ?>
                                    <li class="page-item <?= $page >= $total_pages ? 'disabled' : '' ?>">
                                        <a class="page-link" href="?page=<?= min($total_pages, $page + 1) ?>&limit=<?= $limit ?>&search=<?= urlencode($search) ?>" aria-label="Next">
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
<div class="modal fade" id="transferModal" tabindex="-1" aria-labelledby="transferModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="transferModalLabel">Transfer Household Leader</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="transferForm">
          <div class="form-group">
            <label for="houseNumber">House Number</label>
            <input type="text" class="form-control" id="houseNumber" readonly>
          </div>
          <div class="form-group">
            <label for="fullName">Full Name</label>
            <input type="text" class="form-control" id="fullName" readonly>
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" readonly>
          </div>
          <div class="form-group">
            <label for="municipality">New Municipality</label>
            <select class="form-control" id="municipality">
              <option value="Madridejos">Madridejos</option>
              <option value="Bantayan">Bantayan</option>
              <option value="Santa Fe">Santa Fe</option>
            </select>
          </div>
          <input type="hidden" id="leaderId">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveTransfer">Save Transfer</button>
      </div>
    </div>
  </div>
</div>

<script>
document.getElementById('entriesPerPage').addEventListener('change', function() {
    window.location.href = '?page=1&limit=' + this.value + '&search=<?= urlencode($search) ?>';
});

document.getElementById('searchInput').addEventListener('keyup', function(e) {
    if (e.key === 'Enter') {
        window.location.href = '?page=1&limit=<?= $limit ?>&search=' + encodeURIComponent(this.value);
    }
});


document.querySelectorAll('.transfer-btn').forEach(button => {
    button.addEventListener('click', function() {
        document.getElementById('houseNumber').value = this.dataset.house;
        document.getElementById('fullName').value = this.dataset.fullname;
        document.getElementById('address').value = this.dataset.address;
        document.getElementById('leaderId').value = this.dataset.id;
        document.getElementById('municipality').value = this.dataset.municipality;
    });
});

document.getElementById('saveTransfer').addEventListener('click', function() {
    var leaderId = document.getElementById('leaderId').value;
    var newMunicipality = document.getElementById('municipality').value;
    
    var transferData = {
        leader_id: leaderId,
        new_municipality: newMunicipality
    };
    
    // Send AJAX request to save the transfer
    fetch('save_transfer.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(transferData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Use SweetAlert2 to display the success message
            Swal.fire({
                icon: 'success',
                title: 'Transfer Scheduled!',
                text: 'Transfer scheduled after 6 months.',
                confirmButtonText: 'OK'
            });
            $('#transferModal').modal('hide');
                    // Optionally, you can refresh the page or update the table here
                    location.reload(); // Uncomment this to reload the page
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Transfer Failed',
                text: 'Failed to schedule transfer.',
                confirmButtonText: 'Try Again'
            });
        }
    });
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
    // Handle the dropdown toggle behavior
    document.addEventListener('DOMContentLoaded', function () {
        // Close other dropdowns when one is clicked
        let dropdownButtons = document.querySelectorAll('[id^="dropdownMenuButton"]');

        dropdownButtons.forEach(function(button) {
            button.addEventListener('click', function (e) {
                // Close any previously opened dropdown
                dropdownButtons.forEach(function(otherButton) {
                    if (otherButton !== button) {
                        var dropdownMenu = otherButton.nextElementSibling;
                        if (dropdownMenu.classList.contains('show')) {
                            dropdownMenu.classList.remove('show');
                        }
                    }
                });

                // Toggle the current dropdown
                var dropdownMenu = button.nextElementSibling;
                dropdownMenu.classList.toggle('show');
            });
        });
    });
</script>

<?php
// Close the database connection
mysqli_close($conn);
?>
</main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
   <!-- Bootstrap JS (optional if you need dropdown functionality to work) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  

</body>

</html>