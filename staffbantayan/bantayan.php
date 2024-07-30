<?php 
include 'header.php'; 
include '../database/db_connect.php';

// Pagination variables
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 5; // Default to 5 if not specified
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Fetch data from the database with pagination
$sql = "SELECT house_number, CONCAT(first_name, ' ', last_name) AS fullname, CONCAT(street, ', ', barangay, ', ', municipality, ', ', province) AS address
        FROM barangay_census
        WHERE municipality = 'bantayan'
        LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

// Fetch total records for pagination controls
$count_sql = "SELECT COUNT(*) AS total FROM barangay_census WHERE municipality = 'bantayan'";
$count_result = $conn->query($count_sql);
$total_rows = $count_result->fetch_assoc()['total'];
$total_pages = ceil($total_rows / $limit);

// Calculate the current start and end entry numbers
$start_entry = $offset + 1;
$end_entry = min($offset + $limit, $total_rows);
?>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
     <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
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

#printBtn {
    background-color: #007bff; /* Bootstrap primary color */
    color: #fff; /* White text color */
    border: none; /* Remove default border */
    border-radius: 4px; /* Rounded corners */
    padding: 8px 16px; /* Add padding for size */
    font-size: 16px; /* Adjust font size */
    cursor: pointer; /* Pointer cursor on hover */
    transition: background-color 0.3s ease; /* Smooth background color transition */
}

/* Hover state for the Print button */
#printBtn:hover {
    background-color: #0056b3; /* Darker blue on hover */
}

/* Focus state for accessibility */
#printBtn:focus {
    outline: 2px solid #0056b3; /* Add a focus outline */
    outline-offset: 2px; /* Offset the outline */
}
</style>
<main id="main" class="main">

<div class="pagetitle">
    <h1>Bantayan List</h1>

  </div><!-- End Page Title -->

  <section class="section">
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
        <input type="text" id="searchInput" placeholder="Search by name or house number" />
    </div>
</div>

            <!-- Table with stripped rows -->
            <table class="table datatable">
                <thead>
                  <tr>
                    <th>House Number</th>
                    <th>Fullname.</th>
                    <th>Address</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['house_number']}</td>
                                <td>{$row['fullname']}</td>
                                <td>{$row['address']}</td>
                                   <td><a href='#' data-house-number='{$row['house_number']}' class='btn btn-primary view-btn'>View</a> | <a href='#' data-house-number='{$row['house_number']}' class='btn btn-danger delete-btn'>Delete</a></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No records found</td></tr>";
                }
                ?>
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
                        <a class="page-link" href="?page=<?= max(1, $page - 1) ?>&limit=<?= $limit ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                            <a class="page-link" href="?page=<?= $i ?>&limit=<?= $limit ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
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
  </section>

</main><!-- End #main -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewModalLabel">Person Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="modal-content">
          <!-- Details will be loaded here -->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

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

  <script>
document.addEventListener('DOMContentLoaded', function() {
    // Function to load and display data in the modal
    function loadModalData(houseNumber) {
        fetch('../fetch/fetch_details.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                'house_number': houseNumber
            })
        })
        .then(response => response.json())
        .then(data => {
            const modalContent = document.getElementById('modal-content');
            if (data) {
                modalContent.innerHTML = `
<p><strong>House Number:</strong> ${data.house_number}</p>
<p><strong>Full Name:</strong> ${data.fullname}</p>
<p><strong>Address:</strong> ${data.address}</p>
<p><strong>Sex:</strong> ${data.sex}</p>
<p><strong>Date of Birth:</strong> ${data.date_of_birth}</p>
<p><strong>Place of Birth:</strong> ${data.place_of_birth}</p>
<p><strong>Height:</strong> ${data.height}</p>
<p><strong>Weight:</strong> ${data.weight}</p>
<p><strong>Contact Number:</strong> ${data.contact_number}</p>
<p><strong>Religion:</strong> ${data.religion}</p>
<p><strong>Elementary School:</strong> ${data.elementary_school}</p>
<p><strong>Elementary Address:</strong> ${data.elementary_address}</p>
<p><strong>High School:</strong> ${data.highschool}</p>
<p><strong>High School Address:</strong> ${data.highschool_address}</p>
<p><strong>Vocational School:</strong> ${data.vocational_school}</p>
<p><strong>Vocational Address:</strong> ${data.vocational_address}</p>
<p><strong>College:</strong> ${data.college}</p>
<p><strong>College Address:</strong> ${data.college_address}</p>
<p><strong>Employment Duration:</strong> ${data.employment_duration}</p>
<p><strong>Employer Name:</strong> ${data.employer_name}</p>
<p><strong>Employer Address:</strong> ${data.employer_address}</p>
<p><strong>Occupant Name:</strong> ${data.occupant_name}</p>
<p><strong>Occupant Position:</strong> ${data.occupant_position}</p>
<p><strong>Occupant Age:</strong> ${data.occupant_age}</p>
<p><strong>Occupant Birth Date:</strong> ${data.occupant_birth_date}</p>
<p><strong>Occupant Civil Status:</strong> ${data.occupant_civil_status}</p>
<p><strong>Occupant Occupation:</strong> ${data.occupant_occupation}</p>
`;
            } else {
                modalContent.innerHTML = '<p>No details found.</p>';
            }
        })
        .catch(error => console.error('Error fetching data:', error));
    }

    // Event delegation to handle dynamic 'View' and 'Delete' links
    document.querySelector('tbody').addEventListener('click', function(event) {
        if (event.target && event.target.matches('.view-btn')) {
            const houseNumber = event.target.getAttribute('data-house-number');
            if (houseNumber) {
                loadModalData(houseNumber);
                new bootstrap.Modal(document.getElementById('viewModal')).show();
            }
        }
        if (event.target && event.target.matches('.delete-btn')) {
            const houseNumber = event.target.getAttribute('data-house-number');
            if (houseNumber) {
                // SweetAlert2 delete confirmation
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Perform delete operation
                        fetch('../staffaction/delete_record.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: new URLSearchParams({
                                'house_number': houseNumber
                            })
                        })
                        .then(response => response.text())
                        .then(result => {
                            console.log('Delete response:', result); // Log the response
                            if (result === 'success') {
                                Swal.fire(
                                    'Deleted!',
                                    'Your record has been deleted.',
                                    'success'
                                ).then(() => {
                                    location.reload(); // Reload the page to reflect changes
                                });
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'There was an issue deleting the record.',
                                    'error'
                                );
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error); // Log any fetch errors
                            Swal.fire(
                                'Error!',
                                'There was an issue deleting the record.',
                                'error'
                            );
                        });
                    }
                });
            }
        }
    });

    // Highlight search term
    function highlightSearchTerm(text, term) {
        if (!term) return text;
        const regex = new RegExp(`(${term})`, 'gi');
        return text.replace(regex, '<span class="highlight-term">$1</span>');
    }

    // Search functionality
    document.getElementById('searchInput').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const rows = document.querySelectorAll('tbody tr');

        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            let match = false;
            
            cells.forEach((cell, index) => {
                if (index < 3) { // Apply highlight only to the first three columns
                    const cellText = cell.textContent.toLowerCase();
                    if (cellText.includes(searchTerm)) {
                        match = true;
                        cell.innerHTML = highlightSearchTerm(cell.textContent, searchTerm);
                    } else {
                        cell.innerHTML = cell.textContent; // Reset cell content
                    }
                }
            });

            row.style.display = match ? '' : 'none';
        });

        // Update footer info
        const visibleRows = document.querySelectorAll('tbody tr:not([style="display: none;"])');
        const visibleStart = visibleRows.length > 0 ? Array.from(visibleRows)[0].querySelector('td').textContent : start_entry;
        const visibleEnd = visibleRows.length > 0 ? Array.from(visibleRows)[visibleRows.length - 1].querySelector('td').textContent : end_entry;
        document.querySelector('.footer-info').innerHTML = `Showing ${visibleStart} to ${visibleEnd} of ${total_rows} entries`;
    });

    // Handle "Show entries" dropdown change
    document.getElementById('entriesPerPage').addEventListener('change', function() {
        const selectedLimit = this.value;
        const currentPage = new URLSearchParams(window.location.search).get('page') || 1;
        window.location.href = `?page=${currentPage}&limit=${selectedLimit}`;
    });
});

</script>
</body>

</html>