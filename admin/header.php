<?php
include '../session.php';

// Check if the user is logged in
if (!isset($_SESSION['userid'])) {
    header("Location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Dashboard - Bantayan Island Census</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="../assets/img/travelogo.png" rel="icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.8/dist/sweetalert2.min.css">
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
    .custom-header {
      height: 70px;
    }
    .custom-logo {
      width: 120px;
      height: 70px;
      margin-left: 20px;
    }
    .toggle-sidebar-btn {
      margin-left: 100px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .custom-logo {
        display: none; /* Hide logo on small screens */
      }
      .toggle-sidebar-btn {
        margin-left: 0; /* Move menu icon to the left */
      }
    }
  </style>
</head>

<body>

  <!-- Header -->
  <header id="header" class="header fixed-top d-flex align-items-center custom-header">
    <div class="d-flex align-items-center justify-content-between">
      <img src="../assets/img/trasparlogo.png" class="custom-logo">
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
      <li class="nav-item dropdown">
    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-bell"></i>
        <span class="badge bg-primary badge-number" id="notification-count"></span>
    </a>
    
    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
        <li class="dropdown-header">
            Recent Entries
        </li>

        <div id="notification-list">
            <!-- Notifications will be loaded here -->
        </div>
    </ul>
</li>
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/icon.webp" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo "Welcome, " . $_SESSION['name'] . "!" ?></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo "Welcome, " . $_SESSION['name'] . "!" ?></h6>
              <span>Admin</span>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item d-flex align-items-center" href="changepassword.php"><i class="fas fa-lock"></i><span>Change Password</span></a></li>
            <li><a class="dropdown-item d-flex align-items-center" href="logout.php"><i class="bi bi-box-arrow-right"></i><span>Sign Out</span></a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>

  <!-- Sidebar -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item"><a class="nav-link collapsed" href="index.php"><i class="bi bi-grid"></i><span>Dashboard</span></a></li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="fas fa-building"></i><span>Municipality</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li><a href="bantayan.php"><i class="bi bi-circle"></i><span>Bantayan</span></a></li>
          <li><a href="madridejos.php"><i class="bi bi-circle"></i><span>Madridejos</span></a></li>
          <li><a href="santafe.php"><i class="bi bi-circle"></i><span>Santafe</span></a></li>
        </ul>
      </li>
      <li class="nav-item"><a class="nav-link collapsed" href="form.php"><i class="bi bi-file-text"></i><span>Form</span></a></li>
      <li class="nav-item"><a class="nav-link collapsed" href="map.php"><i class="bi bi-map"></i><span>Map</span></a></li>
      <li class="nav-item"><a class="nav-link collapsed" href="schedule.php"><i class="bi bi-calendar-check"></i><span>Schedule</span></a></li>
      <li class="nav-item"><a class="nav-link collapsed" href="manage-staff.php"><i class="bi bi-people"></i><span>Manage Staff</span></a></li>
      <li class="nav-item"><a class="nav-link collapsed" href="manage-admin.php"><i class="bi bi-people"></i><span>Administrator</span></a></li>
    </ul>
  </aside>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.8/dist/sweetalert2.all.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', (event) => {
      document.querySelector('a[href="logout.php"]').addEventListener('click', function (e) {
        e.preventDefault();
        Swal.fire({
          title: 'Are you sure?',
          text: 'You will be logged out of your account.',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, log out!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = 'logout.php';
          }
        });
      });
    });
  </script>
  <script>
function loadNotifications() {
    fetch('notification.php')
        .then(response => response.json())
        .then(data => {
            const notificationList = document.getElementById('notification-list');
            const notificationCount = document.getElementById('notification-count');
            
            // Update notification count
            notificationCount.textContent = data.length;
            
            // Generate notification items
            notificationList.innerHTML = data.map(notification => `
                <li class="notification-item" 
                    onclick="handleNotificationClick('${notification.staff_municipality}', '${notification.house_number}', '${notification.created_at}')" 
                    style="cursor: pointer;">
                    <p class="mb-0"><strong>Staff:</strong> ${notification.staff_name}</p>
                    <small class="text-muted">
                        ${notification.staff_municipality} - House #${notification.house_number}
                    </small>
                </li>
            `).join('');
        })
        .catch(error => {
            console.error('Error loading notifications:', error);
        });
}


function handleNotificationClick(municipality, houseNumber, createdAt) {
    // Mark notification as read
    fetch('mark_notification_read.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            house_number: houseNumber,
            created_at: createdAt
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Redirect to the municipality page with highlight parameters
            window.location.href = `${municipality}.php?highlight=${houseNumber}`;
        }
    })
    .catch(error => console.error('Error marking notification as read:', error));
}

// Function to navigate to municipality page
function navigateToMunicipality(municipality) {
    window.location.href = `${municipality}.php`;
}


document.addEventListener('DOMContentLoaded', () => {
    loadNotifications();
    setInterval(loadNotifications, 30000);
});

</script>
</body>
</html>
