<?php 
include 'header.php'; 
include '../database/db_connect.php';

// Fetch data from the database
$sql = "SELECT house_number, CONCAT(first_name, ' ', last_name) AS fullname, CONCAT(street, ', ', barangay, ', ', municipality, ', ', province) AS address
        FROM barangay_census
        WHERE municipality = 'santafe'";
$result = $conn->query($sql);
?>
<main id="main" class="main">

<div class="pagetitle">
    <h1>Santafe List</h1>
    
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
         

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
                               <td><a href='#' data-house-number='{$row['house_number']}' class='view-btn'>View</a> | <a href='#'>Delete</a></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No records found</td></tr>";
                }
                ?>
              </tbody>
              </table>
              <!-- End Table with stripped rows -->

            <!-- End Table with stripped rows -->

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
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
// JavaScript to handle modal view
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
    <p><strong>Reference Name:</strong> ${data.reference_name}</p>
    <p><strong>Reference Address:</strong> ${data.reference_address}</p>
    <p><strong>Reference Contact:</strong> ${data.reference_contact}</p>
`;
            } else {
                modalContent.innerHTML = '<p>No details found.</p>';
            }
        })
        .catch(error => console.error('Error fetching data:', error));
    }

    // Event delegation to handle dynamic 'View' links
    document.querySelector('tbody').addEventListener('click', function(event) {
        if (event.target && event.target.matches('.view-btn')) {
            const houseNumber = event.target.getAttribute('data-house-number');
            if (houseNumber) {
                loadModalData(houseNumber);
                new bootstrap.Modal(document.getElementById('viewModal')).show();
            }
        }
    });
});
</script>
</body>

</html>