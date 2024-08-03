<?php 
include 'header.php';
include '../database/db_connect.php';

$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $limit;

$total_records_query = "SELECT COUNT(*) as total FROM users";
$total_records_result = $conn->query($total_records_query);
if (!$total_records_result) {
    die("Error retrieving total record count: " . $conn->error);
}
$total_records_row = $total_records_result->fetch_assoc();
$total_records = $total_records_row['total'];
$total_pages = ceil($total_records / $limit);

$sql = "SELECT id, name, username FROM users LIMIT ? OFFSET ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $limit, $offset);
if (!$stmt->execute()) {
    die("Error fetching records: " . $stmt->error);
}
$result = $stmt->get_result();
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-QfU7+rwg2rZ5spmt6No5y46/6vY9PVetMzU78vIzYq6G9qkcY0lUkH1COHt0dj5iIw4B5BnLxVKw1VcAVKxvrw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
  .container {
    display: flex;
    justify-content: flex-end;
    padding: 0 15px;
  }

  .eye {
    position: absolute;
    top: 49%;
    right: 24px;
    transform: translateY(-50%);
    cursor: pointer;
  }

  .form-groups {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
    padding: 0.5rem;
  }

  .form-groups .dropdown-container {
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }

  .form-groups .dropdown-container label {
    display: inline-block;
    font-weight: bold;
    text-align: center;
    width: 50px;
  }

  .form-selects {
    border-radius: 0.375rem;
    border: 1px solid #ced4da;
    padding: 0.5rem 1rem;
    font-size: 1rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    width: 80px;
    margin: 0;
  }

  .form-selects:focus {
    border-color: #80bdff;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
  }

  .search-container {
    margin-left: auto;
    margin-right: 1rem;
    display: flex;
    align-items: center;
  }

  #searchInput {
    width: 200px;
    padding: 0.5rem 1rem;
    border-radius: 0.375rem;
    border: 1px solid #ced4da;
    font-size: 1rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  }

  #searchInput:focus {
    border-color: #80bdff;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
  }

  .pagination-info-wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 1rem;
  }

  .pagination-info {
    font-size: 0.875rem;
    color: black;
    font-family: 'Roboto', sans-serif;
  }

  .pagination-controls {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    margin-top: 1rem;
  }

  .pagination-controls .btn {
    margin: 0 0.2rem;
  }

  .highlight {
    background-color: yellow;
    font-weight: bold;
  }
</style>

<main id="main" class="main">
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-end">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Admin</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="addAdminForm" class="row g-3" method="POST" action="../staffaction/manage-admin.php">
            <div class="col-md-12">
              <input type="text" class="form-control" id="nameInput" name="nameInput" placeholder="Name" required>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" id="usernameInput" name="usernameInput" placeholder="Username" required>
            </div>
            <div class="col-md-6">
              <div class="password-container">
                <input type="password" class="form-control" id="passwordInput" name="passwordInput" placeholder="Password" required>
                <span class="eye" onclick="togglePasswordVisibility()">
                  <i id="eyeIcon" class="fas fa-eye"></i>
                </span>
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="pagetitle">
    <h1>Staff List</h1>
  </div>
  
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Admin
      </button>
    </div>
  </div>

  <section class="section mt-3">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="form-groups align-items-center">
              <div class="dropdown-container">
                <label for="entriesSelect">Show</label>
                <select id="entriesSelect" class="form-selects">
                  <option value="5" selected>5</option>
                  <option value="10">10</option>
                  <option value="25">25</option>
                  <option value="50">50</option>
                  <option value="100">100</option>
                </select>
                <span><b>Entries</b></span>
              </div>

              <div class="search-container">
                <input type="text" id="searchInput" class="form-control" placeholder="Search...">
              </div>
            </div>

            <table id="adminTable" class="table datatable">
  <thead>
    <tr>
      <th>Name</th>
      <th>Username</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['username']) . "</td>";
        echo "<td>
               <button class='btn btn-primary edit-btn' data-id='" . htmlspecialchars($row['id']) . "' data-bs-toggle='modal' data-bs-target='#editModal'>Edit</button> |
                <button class='btn btn-danger delete-btn' data-id='" . htmlspecialchars($row['id']) . "'>Delete</button>
              </td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='3'>No records found</td></tr>";
    }
    ?>
  </tbody>
</table>

            <div class="pagination-info-wrapper">
              <div class="pagination-info">
                Showing <?php echo $offset + 1; ?> to <?php echo min($offset + $limit, $total_records); ?> of <?php echo $total_records; ?> entries
              </div>

              <div class="pagination-controls">
                <nav aria-label="Page navigation">
                  <ul class="pagination">
                    <?php
                    if ($page > 1) {
                      echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '&limit=' . $limit . '">&laquo;</a></li>';
                    }
                    for ($i = 1; $i <= $total_pages; $i++) {
                      $active = $i == $page ? 'active' : '';
                      echo '<li class="page-item ' . $active . '"><a class="page-link" href="?page=' . $i . '&limit=' . $limit . '">' . $i . '</a></li>';
                    }
                    if ($page < $total_pages) {
                      echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '&limit=' . $limit . '">&raquo;</a></li>';
                    }
                    ?>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-end">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editAdminForm" class="row g-3" method="POST" action="../staffaction/manage-admin.php">
          <input type="hidden" id="editId" name="editId">
          <div class="col-md-12">
            <input type="text" class="form-control" id="editNameInput" name="editNameInput" placeholder="Name" required>
          </div>
          <div class="col-md-6">
            <input type="text" class="form-control" id="editUsernameInput" name="editUsernameInput" placeholder="Username" required>
          </div>
          <div class="col-md-6">
            <div class="password-container">
              <input type="password" class="form-control" id="editPasswordInput" name="editPasswordInput" placeholder="Password" required>
              <span class="eye" onclick="toggleEditPasswordVisibility()">
                <i id="editEyeIcon" class="fas fa-eye"></i>
              </span>
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
  const searchInput = document.getElementById("searchInput");
  const entriesSelect = document.getElementById("entriesSelect");
  const adminTable = document.getElementById("adminTable");
  const tableBody = adminTable.getElementsByTagName("tbody")[0];
  
  let originalRows = Array.from(tableBody.getElementsByTagName("tr"));

  searchInput.addEventListener("input", filterTable);
  entriesSelect.addEventListener("change", updateEntries);

  function filterTable() {
    const searchValue = searchInput.value.toLowerCase();
    tableBody.innerHTML = "";

    const filteredRows = originalRows.filter(row => {
      return Array.from(row.getElementsByTagName("td")).some(cell => {
        return cell.textContent.toLowerCase().includes(searchValue);
      });
    });

    filteredRows.forEach(row => tableBody.appendChild(row));
  }

  function updateEntries() {
    const limit = parseInt(entriesSelect.value);
    window.location.href = `?limit=${limit}`;
  }

  const addAdminForm = document.getElementById("addAdminForm");

  addAdminForm.addEventListener("submit", function(event) {
    event.preventDefault();
    const formData = new FormData(addAdminForm);

    fetch("../staffaction/manage-admin.php", {
      method: "POST",
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        Swal.fire({
          icon: "success",
          title: "Success",
          text: "Admin added successfully!"
        }).then(() => {
          location.reload();
        });
      } else {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: data.message
        });
      }
    })
    .catch(error => {
      console.error("Error:", error);
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "An error occurred while adding the admin."
      });
    });
  });

  document.querySelectorAll(".delete-btn").forEach(button => {
    button.addEventListener("click", function() {
        const adminId = this.getAttribute("data-id");

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then(result => {
            if (result.isConfirmed) {
                fetch("../staffaction/delete-admin.php", { // Adjust the URL here
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({ id: adminId })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: "success",
                            title: "Deleted!",
                            text: "The admin has been deleted."
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: data.message
                        });
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "An error occurred while deleting the admin."
                    });
                });
            }
        });
    });
});

  
  function showEditModal(adminData) {
  document.getElementById("editId").value = adminData.id;
  document.getElementById("editNameInput").value = adminData.name;
  document.getElementById("editUsernameInput").value = adminData.username;
  document.getElementById("editAdminForm").setAttribute("data-id", adminData.id);
  
  const editModal = new bootstrap.Modal(document.getElementById('editModal'));
  editModal.show();
}

function hideEditModal() {
  const editModal = bootstrap.Modal.getInstance(document.getElementById('editModal'));
  if (editModal) {
    editModal.hide();
  }
  document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
  document.body.classList.remove('modal-open');
}

document.querySelectorAll(".edit-btn").forEach(button => {
  button.addEventListener("click", function() {
    const adminId = this.getAttribute("data-id");
    
    fetch(`../staffaction/fetch-admin.php?id=${adminId}`)
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          showEditModal(data.admin);
        } else {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: data.message
          });
        }
      })
      .catch(error => {
        console.error("Error:", error);
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "An error occurred while fetching the admin data."
        });
      });
  });
});

document.getElementById("editAdminForm").addEventListener("submit", function(event) {
  event.preventDefault();
  const formData = new FormData(this);
  
  // Remove password from formData if it's empty
  if (formData.get('password') === '') {
    formData.delete('password');
  }
  
  fetch("../staffaction/manage-admin.php", {
    method: "POST",
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    hideEditModal();
    
    if (data.success) {
      Swal.fire({
        icon: "success",
        title: "Success",
        text: "Admin details updated successfully!"
      }).then(() => {
        location.reload();
      });
    } else {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: data.message
      });
    }
  })
  .catch(error => {
    console.error("Error:", error);
    hideEditModal();
    Swal.fire({
      icon: "error",
      title: "Error",
      text: "An error occurred while updating the admin details."
    });
  });
});

document.getElementById('editModal').addEventListener('hidden.bs.modal', function () {
  hideEditModal();
});


  const addPasswordInput = document.getElementById("passwordInput");
  const addEyeIcon = document.getElementById("eyeIcon");
  const editPasswordInput = document.getElementById("editPasswordInput");
  const editEyeIcon = document.getElementById("editEyeIcon");

  function togglePasswordVisibility(inputElement, iconElement) {
    if (inputElement.type === "password") {
      inputElement.type = "text";
      iconElement.classList.remove("fa-eye");
      iconElement.classList.add("fa-eye-slash");
    } else {
      inputElement.type = "password";
      iconElement.classList.remove("fa-eye-slash");
      iconElement.classList.add("fa-eye");
    }
  }

  if (addPasswordInput && addEyeIcon) {
    addEyeIcon.addEventListener("click", function() {
      togglePasswordVisibility(addPasswordInput, addEyeIcon);
    });
  }

  if (editPasswordInput && editEyeIcon) {
    editEyeIcon.addEventListener("click", function() {
      togglePasswordVisibility(editPasswordInput, editEyeIcon);
    });
  }
})
</script>
<?php include 'footer.php' ?>
