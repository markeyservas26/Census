<?php include 'header.php'; ?>

<style>
  .container {
    display: flex;
    justify-content: flex-end; /* Aligns button to the right */
    padding: 0 15px; /* Optional: Adds padding for better alignment */
  }

  body.modal-open {
    overflow: auto !important;
    padding-right: 0 !important;
  }

  .modal-backdrop {
    display: none !important; /* Prevents backdrop display */
  }
</style>

<main id="main" class="main">
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-end">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Schedule</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="scheduleForm" class="row g-3" method="POST" action="../action/manage-schedule.php">
            <div class="col-md-12">
              <select class="form-select" id="municipalityInput" name="municipality" required>
                <option value="" disabled selected>Select Municipality</option>
                <option value="Madridejos">Madridejos</option>
                <option value="Bantayan">Bantayan</option>
                <option value="Santafe">Santafe</option>
              </select>
            </div>
            <div class="col-md-12">
              <label for="startCensusInput">Start Census Date</label>
              <input type="date" class="form-control" id="startCensusInput" name="start_census" required>
            </div>
            <div class="col-md-12">
              <label for="endCensusInput">End Census Date</label>
              <input type="date" class="form-control" id="endCensusInput" name="end_census" required>
            </div>
            <div class="col-md-12">
              <label for="startTimeInput">Start Census Time</label>
              <input type="time" class="form-control" id="startTimeInput" name="start_time" required>
            </div>
            <div class="col-md-12">
              <label for="endTimeInput">End Census Time</label>
              <input type="time" class="form-control" id="endTimeInput" name="end_time" required>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="pagetitle">
    <h1>Schedule List</h1>
  </div><!-- End Page Title -->

  <div class="container">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Add Schedule
    </button>
  </div>

  <section class="section mt-3">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <!-- Table with stripped rows -->
            <table id="scheduleTable" class="table datatable">
              <thead>
                <tr>
                  <th>Municipality</th>
                  <th>Census Date</th>
                  <th>Census Time</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  include '../database/db_connect.php';
                  $sql = "SELECT id, municipality, start_census, end_census, start_time, end_time FROM schedule";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                          $censusDate = date("F d, Y", strtotime($row["start_census"])) . " to " . date("F d, Y", strtotime($row["end_census"]));
                          $censusTime = date("h:i A", strtotime($row["start_time"])) . " to " . date("h:i A", strtotime($row["end_time"]));
                          echo "<tr>
                                  <td>" . htmlspecialchars($row["municipality"]) . "</td>
                                  <td>" . htmlspecialchars($censusDate) . "</td>
                                  <td>" . htmlspecialchars($censusTime) . "</td>
                                  <td>
                                      <button class='btn btn-danger btn-sm' onclick='deleteSchedule(" . intval($row["id"]) . ")'>Delete</button>
                                  </td>
                                </tr>";
                      }
                  } else {
                      echo "<tr><td colspan='4'>No schedules found</td></tr>";
                  }
                  $conn->close();
                ?>
              </tbody>
            </table>
            <!-- End Table with stripped rows -->
          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const scheduleForm = document.getElementById('scheduleForm');
    scheduleForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this);

        fetch(this.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Schedule added successfully.',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    updateScheduleTable();
                    closeModal();
                });

                this.reset();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: data.message || 'Something went wrong! Please try again later.',
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong! Please try again later.',
            });
        });
    });
});

function closeModal() {
    const modal = document.getElementById('exampleModal');
    const modalInstance = bootstrap.Modal.getInstance(modal);
    if (modalInstance) {
        modalInstance.hide();
    }
}

function deleteSchedule(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch('../action/delete_schedule.php?id=' + id)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: 'Schedule has been deleted.',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            updateScheduleTable();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: data.message || 'There was a problem deleting the schedule.',
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'There was a problem deleting the schedule.',
                    });
                });
        }
    });
}

function updateScheduleTable() {
    fetch('../action/fetch_schedules.php')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('#scheduleTable tbody');
            tableBody.innerHTML = '';

            if (data.length > 0) {
                data.forEach(row => {
                    const startDate = new Date(row.start_census);
                    const endDate = new Date(row.end_census);
                    const censusDate = `${startDate.toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })} to ${endDate.toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })}`;
                    const censusTime = `${formatTime(row.start_time)} to ${formatTime(row.end_time)}`;
                    
                    tableBody.innerHTML += `<tr>
                        <td>${row.municipality}</td>
                        <td>${censusDate}</td>
                        <td>${censusTime}</td>
                        <td>
                            <button class='btn btn-danger btn-sm' onclick='deleteSchedule(${row.id})'>Delete</button>
                        </td>
                    </tr>`;
                });
            } else {
                tableBody.innerHTML = "<tr><td colspan='4'>No schedules found</td></tr>";
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'There was a problem fetching the schedule data.',
            });
        });
}

function formatTime(timeString) {
    const [hours, minutes] = timeString.split(':');
    return new Date(0, 0, 0, hours, minutes).toLocaleTimeString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });
}
</script>

<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<?php include 'footer.php'; ?>
