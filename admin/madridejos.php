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
        WHERE municipality = 'madridejos'
        LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

// Fetch total records for pagination controls
$count_sql = "SELECT COUNT(*) AS total FROM barangay_census WHERE municipality = 'madridejos'";
$count_result = $conn->query($count_sql);
$total_rows = $count_result->fetch_assoc()['total'];
$total_pages = ceil($total_rows / $limit);

// Calculate the current start and end entry numbers
$start_entry = $offset + 1;
$end_entry = min($offset + $limit, $total_rows);
?>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
     <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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

#modal-content {
display: grid;
grid-template-columns: 1fr 1fr;
gap: 0;
padding: 0;
border: 1px solid #000;
background-color: #FEFCFF;
border-radius: 8px;
position: relative; /* For the middle line */
}

#modal-content::before {
content: "";
position: absolute;
top: 0;
bottom: 0;
left: 50%;
width: 1px;
background-color: #000;
display: block; /* Display the vertical line */
}

#modal-content h5 {
grid-column: span 2;
margin: 0;
font-weight: bold;
padding: 1rem;
text-align: center;
background-color: #f1f1f1;
border-bottom: none; /* Remove the bottom border from headers */
}

#modal-content p {
display: flex;
justify-content: space-between;
padding: 1rem;
margin: 0;
border-top: 1px solid #000;
background-color: #fff;
}

#modal-content p:nth-child(odd) {
border-right: none; /* Remove the right border */
}

#modal-content p:nth-child(even) {
border-left: none; /* Remove the left border */
}

#modal-content p strong {
min-width: 150px;
color: #495057;
}

#modal-content .section {
grid-column: span 2;
border-top: 1px solid #000; /* Add a horizontal line above each section */
padding: 0;
margin: 0;
background-color: #eaeaea;
}

#modal-content .section h5 {
padding: 1rem;
margin: 0;
text-align: left;
background-color: #f1f1f1;
}

#modal-content .form-section {
grid-column: span 2;
padding: 0;
display: flex;
flex-wrap: wrap;
}

#modal-content .form-group {
flex: 1 1 50%;
padding: 0;
}

#modal-content .form-group p {
border: none;
padding: 1rem;
margin: 0;
}

.modal-header, .modal-footer {
background-color: #007bff;
color: #fff;
border-radius: 8px 8px 0 0;
padding: 1rem;
}

.modal-footer {
display: flex;
justify-content: flex-end;
padding: 1rem;
}

.modal-footer .btn-secondary {
background-color: #6c757d;
color: #fff;
border-radius: 4px;
padding: 0.5rem 1rem;
border: none;
}

.modal-footer .btn-primary {
background-color: #007bff;
color: #fff;
border-radius: 4px;
padding: 0.5rem 1rem;
border: none;
margin-left: 1rem;
}

/* Ensure the modal itself has no background color */


.modal-header, .modal-body, .modal-footer {
background-color: white; /* No background color for header, body, and footer */
border: none; /* Remove borders if any */
}

.modal-footer .btn {
background-color: transparent; /* Button background color inside footer */
border: none; /* Remove border */
}

.modal-footer .btn-primary {
background-color: transparent; /* Primary button background color */
color: #007bff; /* Adjust text color if needed */
}

.modal-footer .btn-secondary {
background-color: gray; /* Secondary button background color */
color: #6c757d; /* Adjust text color if needed */
}

/* Optional: Adjust styles if needed for button borders and hover effects */
.modal-footer .btn:hover {
background-color: rgba(0, 0, 0, 0.1); /* Subtle background on hover if needed */
border: none;
}

@media print {
body {
    margin: 0;
    padding: 0;
}
.print-content {
    max-width: 100%;
    margin: 0;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    background: #fff;
    page-break-before: auto;
    page-break-after: auto;
    page-break-inside: avoid;
}
@page {
    size: auto;
    margin: 0;
}
}

.btn-cancel {
  background: linear-gradient(135deg, #ff6f61, #d62d2a); /* Gradient background */
  color: white; /* Text color */
  border: none; /* Remove default border */
  border-radius: 10px; /* Circular shape */
  width: 80px; /* Width of the button */
  height: 40px; /* Height of the button */
  display: flex; /* Center content */
  align-items: center; /* Center content vertically */
  justify-content: center; /* Center content horizontally */
  font-size: 20px; /* Size of the close icon */
  cursor: pointer; /* Pointer cursor on hover */
  transition: all 0.3s ease; /* Smooth transition for hover effects */
}

.btn-cancel:hover {
  background: linear-gradient(135deg, #d62d2a, #ff6f61); /* Inverted gradient on hover */
  transform: scale(1.1); /* Slightly larger on hover */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow effect */
}

.btn-cancel:focus {
  outline: none; /* Remove default focus outline */
  box-shadow: 0 0 0 4px rgba(255, 105, 135, 0.5); /* Custom focus shadow */
}

.btn-cancel span {
  font-size: 24px; /* Larger close icon */
}
     </style>
     <style media="print">
    /* Define print-specific styles here */
    body {
        font-family: Arial, sans-serif;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 1em;
    }
    th, td {
        border: 1px solid #000;
        padding: 8px;
    }
    th {
        background-color: #f2f2f2;
    }
</style>
<style>
    .center-button {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
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
        <input type="text" id="searchInput" placeholder="Search by name or house number" />
    </div>
</div>

            <!-- Table with stripped rows -->
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
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['house_number']}</td>
                        <td>{$row['fullname']}</td>
                        <td>{$row['address']}</td>
                        <td>
                            <a href='#' data-house-number='{$row['house_number']}' class='btn btn-primary view-btn'>View</a>
                            <a href='#' data-house-number='{$row['house_number']}' class='btn btn-secondary edit-btn'>Edit</a>
                            <a href='#' data-house-number='{$row['house_number']}' class='btn btn-danger delete-btn'>Delete</a>
                        </td>
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
  <<div class="center-button">
        <button id="printButton" class="btn btn-primary text-white"> <i class="fas fa-print"></i>Reports</button>
    </div>
</main><!-- End #main -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="viewModalLabel" >Person Details</h5>
      </div>
      <div class="modal-body" id="print-section">
        <div id="modal-content">
          <!-- Details will be loaded here -->
        </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary text-white" style="background-color: blue;" onclick="printElement('print-section')">
    <i class="fas fa-print"></i> Print
</button>

<button type="button" class="btn-cancel" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <div class="row">
                        <!-- Column 1 -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">House Number:</label>
                                <input type="text" class="form-control" id="editHouseNumber" name="house_number" placeholder="House Number">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Name:</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" id="editLastName" name="last_name" placeholder="Last Name">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="editFirstName" name="first_name" placeholder="First Name">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="editMiddleName" name="middle_name" placeholder="Middle Name">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Street/Purok/Sitio/Subd.:</label>
                                <input type="text" class="form-control" id="editStreet" name="street" placeholder="Street/Purok/Sitio/Subd.">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Municipality:</label>
                                <input type="text" class="form-control" id="editMunicipality" name="municipality" placeholder="Municipality">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Barangay:</label>
                                <input type="text" class="form-control" id="editBarangay" name="barangay" placeholder="Barangay">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Province:</label>
                                <input type="text" class="form-control" id="editProvince" name="province" placeholder="Province">
                            </div>
                        </div>

                        <!-- Column 2 -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Residence Status:</label>
                                <select class="form-select" id="editResidenceStatus" name="residence_status">
                                    <option value="owner">Owner</option>
                                    <option value="boarder">Boarder/Rentee</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Length of Stay:</label>
                                <input type="text" class="form-control" id="editLengthOfStay" name="length_of_stay" placeholder="Length of Stay">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Provincial Address:</label>
                                <input type="text" class="form-control" id="editProvincialAddress" name="provincial_address" placeholder="(House/Block/Lot No.) (St./Purok/Sitio/Subd.) (Barangay) (City/Municipality) (Province)">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Sex:</label>
                                <select class="form-select" id="editSex" name="sex">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Civil Status:</label>
                                <select class="form-select" id="editCivilStatus" name="civil_status">
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="widower">Widow/er</option>
                                    <option value="separated">Separated</option>
                                </select>
                            </div>
                        </div>

                        <!-- Column 3 -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Date of Birth:</label>
                                <input type="date" class="form-control" id="editDateOfBirth" name="date_of_birth">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Place of Birth:</label>
                                <input type="text" class="form-control" id="editPlaceOfBirth" name="place_of_birth" placeholder="Place of Birth">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Height and Weight:</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="number" step="0.01" class="form-control" id="editHeight" name="height" placeholder="Height (m)">
                                    </div>
                                    <div class="col">
                                        <input type="number" step="0.1" class="form-control" id="editWeight" name="weight" placeholder="Weight (kg)">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Contact Number:</label>
                                <input type="text" class="form-control" id="editContactNumber" name="contact_number" placeholder="Contact Number" pattern="\d{11}" title="Please enter an 11-digit contact number" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Religion:</label>
                                <input type="text" class="form-control" id="editReligion" name="religion" placeholder="Religion">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <h4>Educational Attainment:</h4>
                            <div class="mb-3">
                                <label class="form-label">Elementary:</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" id="editElementarySchool" name="elementary_school" placeholder="School">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="editElementaryAddress" name="elementary_address" placeholder="Address">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Highschool:</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" id="editHighschool" name="highschool" placeholder="School">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="editHighschoolAddress" name="highschool_address" placeholder="Address">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Vocational Course:</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" id="editVocationalSchool" name="vocational_school" placeholder="School">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="editVocationalAddress" name="vocational_address" placeholder="Address">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">College/Course:</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" id="editCollege" name="college" placeholder="School">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="editCollegeAddress" name="college_address" placeholder="Address">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <h4>Employment Record:</h4>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Duration:</label>
                                    <input type="text" class="form-control" id="editEmploymentDuration" name="employment_duration" placeholder="Duration">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Name of Company/Employer:</label>
                                    <input type="text" class="form-control" id="editEmployerName" name="employer_name" placeholder="Name of Company/Employer">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Address:</label>
                                    <input type="text" class="form-control" id="editEmployerAddress" name="employer_address" placeholder="Address">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <h4>Other House Occupants:</h4>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Name (LN, FN, MI, QLFR):</label>
                                            <input type="text" class="form-control" id="editOccupantName" name="occupant_name" placeholder="Name">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Position in the Family:</label>
                                            <input type="text" class="form-control" id="editOccupantPosition" name="occupant_position" placeholder="Position in the Family">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Age:</label>
                                            <input type="number" class="form-control" id="editOccupantAge" name="occupant_age" placeholder="Age">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Birth Date:</label>
                                            <input type="date" class="form-control" id="editOccupantBirthDate" name="occupant_birth_date">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Civil Status:</label>
                                            <select class="form-select" id="editOccupantCivilStatus" name="occupant_civil_status">
                                                <option value="single">Single</option>
                                                <option value="married">Married</option>
                                                <option value="widower">Widow/er</option>
                                                <option value="separated">Separated</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Occupation/Income:</label>
                                            <input type="text" class="form-control" id="editOccupantOccupation" name="occupant_occupation" placeholder="Occupation/Income">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Save Changes Button -->
                    <div class="row mt-4">
                        <div class="col-12 text-end">
                            <button type="button" id="saveChangesBtn" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
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
    function loadModalData(houseNumber) {
        fetch('../fetch/fetch_update.php', {
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
            if (data.error) {
                console.error('Error loading data:', data.error);
                return;
            }

            // Populate edit modal fields
            document.getElementById('editHouseNumber').value = data.house_number;
            document.getElementById('editLastName').value = data.last_name;
            document.getElementById('editFirstName').value = data.first_name;
            document.getElementById('editMiddleName').value = data.middle_name;
            document.getElementById('editStreet').value = data.street;
            document.getElementById('editMunicipality').value = data.municipality;
            document.getElementById('editBarangay').value = data.barangay;
            document.getElementById('editProvince').value = data.province;
            document.getElementById('editResidenceStatus').value = data.residence_status;
            document.getElementById('editLengthOfStay').value = data.length_of_stay;
            document.getElementById('editProvincialAddress').value = data.provincial_address;
            document.getElementById('editSex').value = data.sex;
            document.getElementById('editCivilStatus').value = data.civil_status;
            document.getElementById('editDateOfBirth').value = data.date_of_birth;
            document.getElementById('editPlaceOfBirth').value = data.place_of_birth;
            document.getElementById('editHeight').value = data.height;
            document.getElementById('editWeight').value = data.weight;
            document.getElementById('editContactNumber').value = data.contact_number;
            document.getElementById('editReligion').value = data.religion;
            document.getElementById('editElementarySchool').value = data.elementary_school;
            document.getElementById('editElementaryAddress').value = data.elementary_address;
            document.getElementById('editHighschool').value = data.highschool;
            document.getElementById('editHighschoolAddress').value = data.highschool_address;
            document.getElementById('editVocationalSchool').value = data.vocational_school;
            document.getElementById('editVocationalAddress').value = data.vocational_address;
            document.getElementById('editCollege').value = data.college;
            document.getElementById('editCollegeAddress').value = data.college_address;
            document.getElementById('editEmploymentDuration').value = data.employment_duration;
            document.getElementById('editEmployerName').value = data.employer_name;
            document.getElementById('editEmployerAddress').value = data.employer_address;
            document.getElementById('editOccupantName').value = data.occupant_name;
            document.getElementById('editOccupantPosition').value = data.occupant_position;
            document.getElementById('editOccupantAge').value = data.occupant_age;
            document.getElementById('editOccupantBirthDate').value = data.occupant_birth_date;
            document.getElementById('editOccupantCivilStatus').value = data.occupant_civil_status;
            document.getElementById('editOccupantOccupation').value = data.occupant_occupation;

            // Show the modal
            new bootstrap.Modal(document.getElementById('editModal')).show();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    document.addEventListener('click', function(e) {
        if (e.target.matches('.edit-btn')) {
            const houseNumber = e.target.getAttribute('data-house-number');
            loadModalData(houseNumber);
        }
    });

    document.getElementById('saveChangesBtn').addEventListener('click', function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to save the changes?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, save it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // Show loading state
            Swal.fire({
                title: 'Saving...',
                text: 'Please wait while we save your changes.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // Collect form data and send it to the server
            const formData = new FormData(document.getElementById('editForm'));
            fetch('../action/update_record.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(responseText => {
                console.log('Update response:', responseText);

                // Close the loading state and show success message
                Swal.fire({
                    title: 'Updated!',
                    text: 'Your record has been updated successfully.',
                    icon: 'success',
                    confirmButtonColor: '#3085d6'
                }).then(() => {
                    // Hide the modal
                    new bootstrap.Modal(document.getElementById('editModal')).hide();
                    
                    // Optionally, refresh the modal data or table
                    const houseNumber = document.getElementById('editHouseNumber').value;
                    loadModalData(houseNumber);
                    
                    // Refresh the table data (replace with AJAX call as suggested above)
                    location.reload(true);
                });
            })
            .catch(error => {
                console.error('Error updating data:', error);

                // Close the loading state and show error message
                Swal.fire({
                    title: 'Error!',
                    text: 'There was a problem updating your record.',
                    icon: 'error',
                    confirmButtonColor: '#3085d6'
                });
            });
        }
    });
});

    // Add event listener for municipality change
    document.getElementById('editMunicipality').addEventListener('change', function() {
        const selectedMunicipality = this.value.toLowerCase();
        populateBarangays(selectedMunicipality, '');
    });
});

  </script>
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
                <div class="section"><h5>Personal Information</h5></div>
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

                <div class="section"><h5>Education Attainment</h5></div>
                <p><strong>Elementary School:</strong> ${data.elementary_school}</p>
                <p><strong>Elementary Address:</strong> ${data.elementary_address}</p>
                <p><strong>High School:</strong> ${data.highschool}</p>
                <p><strong>High School Address:</strong> ${data.highschool_address}</p>
                <p><strong>Vocational School:</strong> ${data.vocational_school}</p>
                <p><strong>Vocational Address:</strong> ${data.vocational_address}</p>
                <p><strong>College:</strong> ${data.college}</p>
                <p><strong>College Address:</strong> ${data.college_address}</p>

                <div class="section"><h5>Employment Record</h5></div>
                <p><strong>Employment Duration:</strong> ${data.employment_duration}</p>
                <p><strong>Employer Name:</strong> ${data.employer_name}</p>
                <p><strong>Employer Address:</strong> ${data.employer_address}</p>

                <div class="section"><h5>Other House Occupants</h5></div>
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
                        fetch('../action/delete_record.php', {
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
                        .catch(error => console.error('Error:', error));
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
<script>
function printElement(elementId) {
    var element = document.getElementById(elementId);
    var width = 800;
    var height = 600;

    // Calculate the position for centering the window
    var left = (window.innerWidth / 2) - (width / 2);
    var top = (window.innerHeight / 2) - (height / 2);

    var printWindow = window.open('', '', `height=${height},width=${width},top=${top},left=${left}`);

    // Check if the window opened successfully
    if (printWindow) {
        printWindow.document.open();
        printWindow.document.write('<html><head><title>Print Document</title>');

        // Add CSS for print
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
                    font-size: 12px; /* Adjust font size if needed */
                }
                .print-content {
                    max-width: 100%;
                    margin: 0;
                    padding: 10px;
                    box-shadow: none; /* Remove shadow for print */
                    background: #fff;
                    page-break-before: auto;
                    page-break-after: auto;
                    page-break-inside: avoid;
                }
                @page {
                    size: A4; /* Use A4 size for a standard page */
                    margin: 20mm; /* Adjust margins if needed */
                }
                .header {
                    text-align: center;
                    margin-bottom: 20px;
                    position: relative;
                }
                .header img {
                    position: absolute;
                    right: 0;
                    top: 0;
                    width: 80px; /* Adjust size as needed */
                }
                .header h3 {
                    margin: 0;
                    padding: 0;
                    font-size: 16px;
                }
                /* Hide browser default print header and footer */
                @page :left {
                    margin-left: 0;
                }
                @page :right {
                    margin-right: 0;
                }
                @page :first {
                    margin-top: 20mm; /* Add margin to the top of the first page */
                    margin-bottom: 0;
                }
                /* Ensure headers and footers are not printed */
                @media print {
                    @page {
                        margin: 0;
                    }
                    body {
                        margin: 0;
                    }
                    .print-content {
                        margin: 0;
                    }
                }
            }
        `);

        printWindow.document.write('</style></head><body>');

        // Add the header content
        printWindow.document.write('<div class="header">');
        printWindow.document.write('<img src="../assets/img/madridejosseal.png" alt="Logo">'); // Replace with your logo path
        printWindow.document.write('<h4>REPUBLIC OF THE PHILIPPINES</h4>');
        printWindow.document.write('<h4>PROVINCE OF CEBU</h4>');
        printWindow.document.write('<h4>MUNICIPALITY OF MADRIDEJOS</h4>');
        printWindow.document.write('<br><h4>CENSUS FORM</h4>');
        printWindow.document.write('</div>');

        // Add the content to the print window
        printWindow.document.write('<div class="print-content">');
        printWindow.document.write(element.innerHTML);
        printWindow.document.write('</div>');

        printWindow.document.write('</body></html>');
        printWindow.document.close(); // Complete the document

        // Ensure the content is loaded before printing
        printWindow.focus(); // Focus on the print window
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
   document.getElementById('printButton').addEventListener('click', function() {
       var table = document.getElementById('dataTable');
       console.log("Table found: ", table !== null); // Debugging: Check if table is found

       if (table) {
           // Clone the table to preserve the original
           var clonedTable = table.cloneNode(true);

           // Remove the last column (Action column) from each row
           var rows = clonedTable.getElementsByTagName('tr');
           for (var i = 0; i < rows.length; i++) {
               rows[i].deleteCell(-1); // Delete last cell (Action column)
           }

           var width = 800;
           var height = 600;

           // Calculate the position for centering the window
           var left = (window.innerWidth / 2) - (width / 2);
           var top = (window.innerHeight / 2) - (height / 2);

           var printWindow = window.open('', '', `height=${height},width=${width},top=${top},left=${left}`);

           // Check if the window opened successfully
           if (printWindow) {
               printWindow.document.open();
               printWindow.document.write('<html><head><title>Print Document</title>');

               // Add CSS for print
               printWindow.document.write('<style>');
               printWindow.document.write(`
                   body {
                       font-family: Arial, sans-serif;
                       margin: 0;
                       padding: 0;
                       width: 100%;
                   }
                   table {
                       width: 100%; /* Ensure table covers full width */
                       border-collapse: collapse;
                       margin-top: 10px; /* Add margin to top of the table */
                   }
                   th, td {
                       border: 1px solid #000;
                       padding: 8px; /* Adjust padding if needed */
                   }
                   th {
                       background-color: #f2f2f2;
                   }
                   h2 {
                       text-align: center;
                   }
                   .header {
                       position: relative;
                       text-align: center;
                       margin-bottom: 20px;
                       margin-top: 20px; /* Add margin at the top of the header content */
                   }
                   .header img {
                       position: absolute;
                       top: 0;
                       right: 0;
                       width: 80px;
                   }
                   .header h2, .header h5 {
                       margin: 0;
                       padding: 0;
                   }
                   @media print {
                       @page {
                           size: A4; /* Use A4 size for a standard page */
                           margin: 0; /* Remove margins for full width */
                       }
                       body {
                           margin: 0;
                           padding: 0;
                       }
                       table {
                           width: 100%; /* Ensure table covers full width */
                           margin-top: 20mm; /* Add space above the table for print */
                       }
                       .header img {
                           width: 60px; /* Adjust size as needed */
                       }
                   }
               `);
               printWindow.document.write('</style></head><body>');

               // Add the header content
               printWindow.document.write('<div class="header">');
               printWindow.document.write('<img src="../assets/img/madridejosseal.png" alt="Logo">'); // Replace with your logo path
               printWindow.document.write('<h5>REPUBLIC OF THE PHILIPPINES</h5>');
               printWindow.document.write('<h5>PROVINCE OF CEBU</h5>');
               printWindow.document.write('<h5>MUNICIPALITY OF MADRIDEJOS</h5>');
               printWindow.document.write('<h4>MADRIDEJOS LIST</h4>');
               printWindow.document.write('</div>');

               // Add the table to the print window
               printWindow.document.write(clonedTable.outerHTML);
               printWindow.document.write('</body></html>');
               printWindow.document.close();

               // Wait for the document to be ready before printing
               printWindow.onload = function() {
                   printWindow.print();
                   printWindow.close();
               };
           } else {
               console.error('Failed to open print window.');
           }
       } else {
           alert('No data to print.');
       }
   });
</script>


</body>

</html>