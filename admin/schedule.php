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
        <form id="scheduleForm" class="row g-3" method="POST" action="../action/manage-schedule.php" onsubmit="event.preventDefault(); addSchedule();">
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
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- Table with stripped rows -->
          <div class="table-responsive">
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
                                      <button class='btn btn-primary btn-sm' onclick='editSchedule(" . intval($row["id"]) . ")'>Edit</button>
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
          </div>
          <!-- End Table with stripped rows -->
        </div>
      </div>
    </div>
  </div>
</section>
</main><!-- End #main -->

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Schedule</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editScheduleForm">
          <input type="hidden" id="editId" name="id">
          <div class="mb-3">
            <label for="editMunicipalityInput" class="form-label">Municipality</label>
            <select class="form-select" id="editMunicipalityInput" name="municipality" required>
              <option value="Madridejos">Madridejos</option>
              <option value="Bantayan">Bantayan</option>
              <option value="Santafe">Santafe</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="editStartCensusInput" class="form-label">Start Census Date</label>
            <input type="date" class="form-control" id="editStartCensusInput" name="start_census" required>
          </div>
          <div class="mb-3">
            <label for="editEndCensusInput" class="form-label">End Census Date</label>
            <input type="date" class="form-control" id="editEndCensusInput" name="end_census" required>
          </div>
          <div class="mb-3">
            <label for="editStartTimeInput" class="form-label">Start Census Time</label>
            <input type="time" class="form-control" id="editStartTimeInput" name="start_time" required>
          </div>
          <div class="mb-3">
            <label for="editEndTimeInput" class="form-label">End Census Time</label>
            <input type="time" class="form-control" id="editEndTimeInput" name="end_time" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="saveChanges()">Save changes</button>
      </div>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    updateScheduleTable();
});

function addSchedule() {
    // Show SweetAlert confirmation dialog
    Swal.fire({
        title: 'Confirm Add Schedule',
        text: 'Are you sure you want to add this schedule?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, Add it!',
        cancelButtonText: 'Cancel',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Serialize the form data
            const form = document.getElementById('scheduleForm');
            const formData = new FormData(form);

            // Submit the form via AJAX
            fetch('../action/manage-schedule.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    Swal.fire({
                        title: 'Success!',
                        text: data.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        // Close the modal
                        const scheduleModal = bootstrap.Modal.getInstance(document.getElementById('exampleModal'));
                        scheduleModal.hide();
                        // Update the schedule table
                        updateScheduleTable();
                    });
                } else {
                    // Show error message
                    Swal.fire({
                        title: 'Error!',
                        text: data.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Show error message
                Swal.fire({
                    title: 'Error!',
                    text: 'There was an error adding the schedule. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
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

            data.forEach(schedule => {
                const row = `
                    <tr>
                        <td>${schedule.municipality}</td>
                        <td>${formatDate(schedule.start_census)} to ${formatDate(schedule.end_census)}</td>
                        <td>${formatTime(schedule.start_time)} to ${formatTime(schedule.end_time)}</td>
                        <td>
                            <button class="btn btn-primary btn-sm" onclick="editSchedule(${schedule.id})">Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="deleteSchedule(${schedule.id})">Delete</button>
                        </td>
                    </tr>
                `;
                tableBody.innerHTML += row;
            });
        })
        .catch(error => console.error('Error:', error));
}



function editSchedule(id) {
    console.log('Edit function called with ID:', id);
    fetch(`../action/fetch_schedules.php?id=${id}`)
        .then(response => {
            console.log('Response status:', response.status);
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Fetched data:', data);
            if (data && !data.error) {
                document.getElementById('editId').value = data.id;
                document.getElementById('editMunicipalityInput').value = data.municipality;
                document.getElementById('editStartCensusInput').value = data.start_census;
                document.getElementById('editEndCensusInput').value = data.end_census;
                document.getElementById('editStartTimeInput').value = data.start_time;
                document.getElementById('editEndTimeInput').value = data.end_time;

                const editModal = new bootstrap.Modal(document.getElementById('editModal'));
                editModal.show();
                console.log('Modal should be visible now with populated data');
            } else {
                console.error('Received empty or invalid data:', data.error);
                alert('Error: Could not fetch schedule details.');
            }
        })
        .catch(error => {
            console.error('Error fetching schedule details:', error);
            alert('Error: Could not fetch schedule details. Please try again.');
        });
}

function saveChanges() {
    const form = document.getElementById('editScheduleForm');
    const formData = new FormData(form);

    fetch('../action/update_schedule.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Close modal
            bootstrap.Modal.getInstance(document.getElementById('editModal')).hide();
            // Show success message using SweetAlert2
            Swal.fire({
                title: 'Success!',
                text: 'Schedule updated successfully.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                // Update table
                updateScheduleTable();
            });
        } else {
            // Show error message using SweetAlert2
            Swal.fire({
                title: 'Error!',
                text: 'There was an error updating the schedule. Please try again.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        // Show error message using SweetAlert2
        Swal.fire({
            title: 'Error!',
            text: 'There was an error updating the schedule. Please try again.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    });
}


function deleteSchedule(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: 'You will not be able to recover this schedule!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, keep it',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`../action/delete_schedule.php?id=${id}`, {
                method: 'DELETE'
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    updateScheduleTable();
                    // Show success message
                    Swal.fire({
                        title: 'Deleted!',
                        text: 'Schedule has been deleted.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                } else {
                    // Show error message
                    Swal.fire({
                        title: 'Error!',
                        text: 'There was an error deleting the schedule. Please try again.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Show error message
                Swal.fire({
                    title: 'Error!',
                    text: 'There was an error deleting the schedule. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
        }
    });
}

function formatDate(dateString) {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(dateString).toLocaleDateString(undefined, options);
}

function formatTime(timeString) {
    return new Date(`1970-01-01T${timeString}`).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
}

</script>

<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<?php include 'footer.php'; ?>
