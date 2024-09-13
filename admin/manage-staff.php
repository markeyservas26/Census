<?php 
include 'header.php';
include '../database/db_connect.php';

$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $limit;


$total_records_query = "SELECT COUNT(*) as total FROM staff";
$total_records_result = $conn->query($total_records_query);
if (!$total_records_result) {
    die("Error retrieving total record count: " . $conn->error);
}
$total_records_row = $total_records_result->fetch_assoc();
$total_records = $total_records_row['total'];
$total_pages = ceil($total_records / $limit);

$sql = "SELECT id, name, email, municipality FROM staff LIMIT ? OFFSET ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $limit, $offset);
if (!$stmt->execute()) {
    die("Error fetching records: " . $stmt->error);
}
$result = $stmt->get_result();
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-QfU7+rwg2rZ5spmt6No5y46/6vY9PVetMzU78vIzYq6G9qkcY0lUkH1COHt0dj5iIw4B5BnLxVKw1VcAVKxvrw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<style>
  /* Custom CSS to position modal on the right side */
  .container {
    display: flex;
    justify-content: flex-end; /* Aligns children (the button) to the right */
    padding: 0 15px; /* Optional: Adds some padding for better alignment */
  }

  .eye {
    position: absolute;
    top: 33%;
    right: 24px;
    transform: translateY(-50%);
    cursor: pointer;
}

.form-groups {
  display: flex; /* Use flexbox for horizontal alignment */
  align-items: center; /* Center items vertically */
  margin-bottom: 1rem;
  padding: 0.5rem;
}

/* Flex container to align the dropdown and label */
.form-groups .dropdown-container {
  display: flex; /* Use flexbox to align label and select */
  align-items: center; /* Center items vertically */
  gap: 0.5rem; /* Space between label and dropdown */
}

/* Style the label */
.form-groups .dropdown-container label {
  display: inline-block; /* Keep label inline */
  font-weight: bold;
  text-align: center; /* Center text inside the label */
  width: 50px; /* Adjust width to fit design */
}

/* Style the dropdown */
.form-selects {
  border-radius: 0.375rem; /* Rounded corners */
  border: 1px solid #ced4da; /* Border color */
  padding: 0.5rem 1rem; /* Padding inside the select */
  font-size: 1rem; /* Font size */
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out; /* Transition for interactions */
  width: 80px; /* Adjust this value to your desired width */
  margin: 0; /* Remove margin */
}

/* Style the dropdown on focus */
.form-selects:focus {
  border-color: #80bdff; /* Border color on focus */
  outline: 0; /* Remove default outline */
  box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25); /* Box shadow on focus */
}


/* Style for the search container */
.search-container {
  margin-left: auto; /* Push the search bar to the right */
  margin-right: 1rem; /* Space between the search bar and right edge */
  display: flex;
  align-items: center;
}

/* Style for the search input */
#searchInput {
  width: 200px; /* Adjust width as needed */
  padding: 0.5rem 1rem; /* Padding inside the input */
  border-radius: 0.375rem; /* Rounded corners */
  border: 1px solid #ced4da; /* Border color */
  font-size: 1rem; /* Font size */
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out; /* Transition for interactions */
}

#searchInput:focus {
  border-color: #80bdff; /* Border color on focus */
  outline: 0; /* Remove default outline */
  box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25); /* Box shadow on focus */
}




/* Flex container for "Showing entries" and pagination */
.pagination-info-wrapper {
  display: flex;
  justify-content: space-between; /* Space between "Showing entries" and pagination */
  align-items: center; /* Center items vertically */
  margin-top: 1rem; /* Space above the container */
}

/* Style for pagination info */
.pagination-info {
  font-size: 0.875rem;
  color: black;
  font-family: 'Roboto', sans-serif;
}

/* Style for pagination controls */
.pagination-controls {
  display: flex;
  justify-content: flex-end; /* Align controls to the right */
  align-items: center;
  margin-top: 1rem; /* Space above the pagination controls */
}

/* Adjust margin and spacing for pagination buttons */
.pagination-controls .btn {
  margin: 0 0.2rem; /* Space between buttons */
}

.highlight {
  background-color: yellow; /* Change this to the color you prefer */
  font-weight: bold; /* Optional: makes highlighted text bold */
}
</style>
<main id="main" class="main">
  
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-end">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Staff</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form -->
                <form id="addStaffForm" class="row g-3" method="POST" action="../staffaction/manage-staff.php" novalidate>
                    <div class="col-md-12">
                        <input type="text" class="form-control" id="nameInput" name="nameInput" placeholder="Name" required>
                    </div>
                    <div class="col-md-6">
                        <input type="email" class="form-control" id="emailInput" name="emailInput" placeholder="Username (@gmail.com only)" required>
                    </div>
                    <div class="col-md-6">
                        <div class="password-container">
                            <input type="password" class="form-control" id="passwordInput" name="passwordInput" placeholder="Password" required>
                            <span class="eye" onclick="togglePasswordVisibility()">
                                <i id="eyeIcon" class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="municipalityInput" class="form-label">Municipality</label>
                        <select id="municipalityInput" name="municipalityInput" class="form-select" required>
                            <option value="" disabled selected>Select Municipality</option>
                            <option value="Madridejos">Madridejos</option>
                            <option value="Bantayan">Bantayan</option>
                            <option value="Santafe">Santafe</option>
                        </select>
                    </div>  
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </div>
</div><!-- End Modal --

  <div class="pagetitle">
    <h1>Staff List</h1>
  </div><!-- End Page Title -->
  
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Show Entries Dropdown -->
       
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Staff
        </button>
    </div>
</div>


<section class="section mt-3">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <!-- Container for dropdown and search input -->
          <div class="form-groups align-items-center">
            <!-- Dropdown for show entries -->
            <div class="dropdown-container">
              <label for="entriesSelect">Show</label>
              <select id="entriesSelect" class="form-selects">
                <option value="5"selected>5</option>
                <option value="10" >10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
              </select>
              <span><b>Entries</b></span>
            </div>

            <!-- Search bar -->
            <div class="search-container">
              <input type="text" id="searchInput" class="form-control" placeholder="Search...">
            </div>
          </div>

          <!-- Table with stripped rows -->
          <table id="staffTable" class="table datatable">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Municipality</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['municipality']) . "</td>";
                  echo "<td>  
                          <button class='btn btn-primary edit-btn' data-id='" . htmlspecialchars($row['id']) . "'>Edit</button> |
                          <button class='btn btn-danger delete-btn' data-id='" . htmlspecialchars($row['id']) . "'>Delete</button>
                        </td>";
                  echo "</tr>";
                }
              } else {
                echo "<tr><td colspan='5'>No records found</td></tr>";
              }
              ?>
            </tbody>
          </table>
          <!-- End Table with stripped rows -->
          
          <!-- Pagination Info and Controls Wrapper -->
<div class="pagination-info-wrapper">
  <!-- Pagination Info -->
  <div class="pagination-info">
    <span class="info-text">Showing</span> 
    <span id="startEntry" class="range">1</span> 
    <span class="info-text">to</span> 
    <span id="endEntry" class="range">5</span> 
    <span class="info-text">of</span> 
    <span id="totalEntries" class="total">6</span> 
    <span class="info-text">entries</span>
  </div>

  <!-- Pagination Controls -->
  <div class="pagination-controls">
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

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-end">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Staff</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Edit Form -->
        <form id="editStaffForm" class="row g-3" method="POST" action="../staffaction/update-staff.php">
          <input type="hidden" id="editId" name="id"> <!-- Hidden field for staff ID -->
          <div class="col-md-12">
            <input type="text" class="form-control" id="editNameInput" name="nameInput" placeholder="Name" required>
          </div>
          <div class="col-md-6">
            <input type="email" class="form-control" id="editEmailInput" name="emailInput" placeholder="Username" required>
          </div>
          <div class="col-md-6">
          <div class="password-container">
    <input type="password" class="form-control" id="editPasswordInput" name="passwordInput" placeholder="Password">
    <span class="eye" onclick="toggleEditPasswordVisibility()">
        <i id="editEyeIcon" class="fas fa-eye"></i>
    </span>
</div>

          </div>
          <div class="col-6">
            <label for="editMunicipalityInput" class="form-label">Municipality</label>
            <select id="editMunicipalityInput" name="municipalityInput" class="form-select" required>
              <option value="" disabled>Select Municipality</option>
              <option value="Madridejos">Madridejos</option>
              <option value="Bantayan">Bantayan</option>
              <option value="Santafe">Santafe</option>
            </select>
          </div>  
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form><!-- End Edit Form -->
      </div>
    </div>
  </div>
</div><!-- End Edit Modal -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const table = document.getElementById('staffTable');
  const editModal = new bootstrap.Modal(document.getElementById('editModal'));
  const entriesSelect = document.getElementById('entriesSelect');
  const startEntryElem = document.getElementById('startEntry');
  const endEntryElem = document.getElementById('endEntry');
  const totalEntriesElem = document.getElementById('totalEntries');

  let currentPage = 1;
  let rowsPerPage = parseInt(entriesSelect.value, 10);
  let totalRows = table.querySelectorAll('tbody tr').length;

  function updatePaginationControls() {
    const totalPages = Math.ceil(totalRows / rowsPerPage);
    const pagination = document.querySelector('.pagination');

    // Clear existing pagination
    pagination.innerHTML = '';

    // Create previous button
    const prevItem = document.createElement('li');
    prevItem.className = 'page-item' + (currentPage === 1 ? ' disabled' : '');
    prevItem.innerHTML = '<a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>';
    pagination.appendChild(prevItem);

    // Create page number buttons
    for (let i = 1; i <= totalPages; i++) {
      const pageItem = document.createElement('li');
      pageItem.className = 'page-item' + (i === currentPage ? ' active' : '');
      pageItem.innerHTML = `<a class="page-link" href="#">${i}</a>`;
      pagination.appendChild(pageItem);
    }

    // Create next button
    const nextItem = document.createElement('li');
    nextItem.className = 'page-item' + (currentPage === totalPages ? ' disabled' : '');
    nextItem.innerHTML = '<a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>';
    pagination.appendChild(nextItem);
  }

  function applyEntries(entries, page) {
    const rows = table.querySelectorAll('tbody tr');
    totalRows = rows.length;
    const totalPages = Math.ceil(totalRows / entries);
    const startIndex = (page - 1) * entries;
    const endIndex = startIndex + entries;

    rows.forEach((row, index) => {
      row.style.display = (index >= startIndex && index < endIndex) ? '' : 'none';
    });

    // Update start and end entries display
    const startEntry = startIndex + 1;
    const endEntry = Math.min(endIndex, totalRows);
    startEntryElem.textContent = startEntry;
    endEntryElem.textContent = endEntry;
    totalEntriesElem.textContent = totalRows;

    updatePaginationControls();
  }

  function updateTable() {
  applyEntries(rowsPerPage, currentPage);
  updatePaginationControls();
}

  entriesSelect.addEventListener('change', function() {
    rowsPerPage = parseInt(this.value, 10);
    currentPage = 1; // Reset to first page on entries change
    updateTable();
  });

  document.querySelector('.pagination').addEventListener('click', function(e) {
    if (e.target.closest('.page-link')) {
      e.preventDefault();
      if (e.target.closest('.page-item').classList.contains('disabled')) return;

      if (e.target.closest('.page-item').classList.contains('prev')) {
        if (currentPage > 1) {
          currentPage--;
        }
      } else if (e.target.closest('.page-item').classList.contains('next')) {
        const totalPages = Math.ceil(totalRows / rowsPerPage);
        if (currentPage < totalPages) {
          currentPage++;
        }
      } else {
        currentPage = parseInt(e.target.textContent, 10);
      }

      updateTable();
    }
  });

  table.addEventListener('click', function(e) {
    if (e.target.classList.contains('edit-btn')) {
      const id = e.target.dataset.id;
      const row = e.target.closest('tr');
      const name = row.cells[0].textContent;
      const email = row.cells[1].textContent;
      const municipality = row.cells[2].textContent;

      document.getElementById('editId').value = id;
      document.getElementById('editNameInput').value = name;
      document.getElementById('editEmailInput').value = email;
      document.getElementById('editMunicipalityInput').value = municipality;

      editModal.show();
    }

    if (e.target.classList.contains('delete-btn')) {
      const id = e.target.dataset.id;
      const name = e.target.closest('tr').cells[0].textContent;
      
      Swal.fire({
        title: 'Are you sure?',
        text: `You are about to delete ${name}. This action cannot be undone!`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = `../staffaction/delete-staff.php?id=${id}`;
        }
      });
    }
  });

  document.getElementById("addStaffForm").addEventListener("submit", function(event) {
    event.preventDefault();
    
    const emailInput = document.getElementById("emailInput");
    const emailValue = emailInput.value;
    const gmailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;

    // Check if the email matches the @gmail.com pattern
    if (!gmailPattern.test(emailValue)) {
        Swal.fire({
            icon: "error",
            title: "Validation Error",
            text: "Username must have an @gmail.com."
        });
        return; // Stop form submission
    }

    // If validation passes, proceed with form submission
    const formData = new FormData(this);

    fetch(this.action, {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                icon: "success",
                title: "Success",
                text: "New staff added successfully!"
            }).then(() => {
                location.reload();
            });
        } else {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: data.message || "There was a problem adding the new staff."
            });
        }
    })
    .catch(error => {
        console.error("Error:", error);
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "An error occurred while adding the new staff."
        });
    });
});



document.getElementById('editStaffForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    Swal.fire({
      title: 'Updating staff information...',
      text: 'Please wait',
      allowOutsideClick: false,
      showConfirmButton: false,
      didOpen: () => {
        Swal.showLoading();
      }
    });

    fetch(this.action, {
      method: 'POST',
      body: new FormData(this)
    })
    .then(response => response.json())
    .then(data => {
      Swal.close();
      if (data.success) {
        Swal.fire('Success!', 'Staff information updated successfully.', 'success')
        .then(() => {
          location.reload();
        });
      } else {
        Swal.fire('Error!', data.message || 'There was a problem updating the staff information.', 'error');
      }
    })
    .catch(error => {
      Swal.close();
      console.error('Error:', error);
      Swal.fire('Error!', 'There was a problem updating the staff information. Please check the console for more details.', 'error');
    });
});

// Initialize the table with default number of entries
updateTable();

  // Password visibility toggle
  function togglePasswordVisibility() {
    const passwordInput = document.getElementById('passwordInput');
    const eyeIcon = document.getElementById('eyeIcon');

    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      eyeIcon.classList.remove('fa-eye');
      eyeIcon.classList.add('fa-eye-slash');
    } else {
      passwordInput.type = 'password';
      eyeIcon.classList.remove('fa-eye-slash');
      eyeIcon.classList.add('fa-eye');
    }
  }

  function toggleEditPasswordVisibility() {
    const editPasswordInput = document.getElementById('editPasswordInput');
    const editEyeIcon = document.getElementById('editEyeIcon');

    if (editPasswordInput.type === 'password') {
      editPasswordInput.type = 'text';
      editEyeIcon.classList.remove('fa-eye');
      editEyeIcon.classList.add('fa-eye-slash');
    } else {
      editPasswordInput.type = 'password';
      editEyeIcon.classList.remove('fa-eye-slash');
      editEyeIcon.classList.add('fa-eye');
    }
  }

  // Attach event listeners to password visibility toggles
  document.querySelector('.eye').addEventListener('click', togglePasswordVisibility);
  document.querySelector('#editModal .eye').addEventListener('click', toggleEditPasswordVisibility);
});

document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.getElementById('searchInput');
  const entriesSelect = document.getElementById('entriesSelect');
  const table = document.getElementById('staffTable');
  const pagination = document.querySelector('.pagination');
  const rows = Array.from(table.querySelectorAll('tbody tr'));

  let currentPage = 1;
  let rowsPerPage = parseInt(entriesSelect.value, 10);
  let filteredRows = rows;

  // Function to update the table and pagination
  function updateTable() {
    const totalPages = Math.ceil(filteredRows.length / rowsPerPage);
    const start = (currentPage - 1) * rowsPerPage;
    const end = start + rowsPerPage;

    // Hide all rows
    rows.forEach(row => row.style.display = 'none');

    // Show rows for the current page
    filteredRows.slice(start, end).forEach(row => row.style.display = '');

    // Update pagination controls
    updatePaginationControls(totalPages);
  }

  // Function to update pagination controls
  function updatePaginationControls(totalPages) {
    pagination.innerHTML = '';

    // Previous button
    const prevItem = document.createElement('li');
    prevItem.className = 'page-item' + (currentPage === 1 ? ' disabled' : '');
    prevItem.innerHTML = '<a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>';
    pagination.appendChild(prevItem);

    // Page number buttons
    for (let i = 1; i <= totalPages; i++) {
      const pageItem = document.createElement('li');
      pageItem.className = 'page-item' + (i === currentPage ? ' active' : '');
      pageItem.innerHTML = `<a class="page-link" href="#">${i}</a>`;
      pagination.appendChild(pageItem);
    }

    // Next button
    const nextItem = document.createElement('li');
    nextItem.className = 'page-item' + (currentPage === totalPages ? ' disabled' : '');
    nextItem.innerHTML = '<a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>';
    pagination.appendChild(nextItem);
  }

  // Function to filter rows based on search input
  function filterRows() {
    const query = searchInput.value.toLowerCase();
    filteredRows = rows.filter(row => {
      const cells = Array.from(row.querySelectorAll('td'));
      return cells.some(cell => cell.textContent.toLowerCase().includes(query));
    });
    currentPage = 1; // Reset to first page
    updateTable();
  }

  // Event listener for search input
  searchInput.addEventListener('input', filterRows);

  // Event listener for entries per page select
  entriesSelect.addEventListener('change', function() {
    rowsPerPage = parseInt(this.value, 10);
    updateTable();
  });

  // Event listener for pagination controls
  pagination.addEventListener('click', function(e) {
    if (e.target.closest('.page-link')) {
      e.preventDefault();
      if (e.target.closest('.page-item').classList.contains('disabled')) return;

      if (e.target.closest('.page-item').classList.contains('page-item')) {
        currentPage = parseInt(e.target.textContent, 10);
      } else if (e.target.closest('.page-item').classList.contains('prev')) {
        currentPage = Math.max(1, currentPage - 1);
      } else if (e.target.closest('.page-item').classList.contains('next')) {
        const totalPages = Math.ceil(filteredRows.length / rowsPerPage);
        currentPage = Math.min(totalPages, currentPage + 1);
      }
      updateTable();
    }
  });

  // Initial table update
  updateTable();
});

</script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>



<?php include 'footer.php'; ?>
