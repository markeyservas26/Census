<?php
session_start();
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

  <!-- Favicons -->
  <link href="../assets/img/trasparlogo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.8/dist/sweetalert2.min.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    .custom-header {
      height: 70px; /* Adjust the height as needed */
    }
    .custom-logo {
      width: 120px; /* Adjust the width as needed */
      height: 70px; /* Maintain aspect ratio */
      margin-left: 20px; /* Adjust the margin as needed */
    }
    .toggle-sidebar-btn {
      margin-left: 100px; /* Adjust the margin as needed */
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

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center custom-header">
    <div class="d-flex align-items-center justify-content-between">
      <img src="../assets/img/trasparlogo.png" class="custom-logo">
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <!-- Hamburger Icon on the left side for mobile views -->
    <i class="bi bi-list toggle-sidebar-btn d-md-none"></i>
  </div><!-- End Logo -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">
      <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="assets/img/icon.webp" alt="Profile" class="rounded-circle">
          <span class="d-none d-md-block dropdown-toggle ps-2">
            <?php echo "Welcome staff, " . $_SESSION['name'] . "!" ?>
          </span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6><?php echo "Welcome staff,  " . $_SESSION['name'] . "!" ?></h6>
            <span>Staff</span>
          </li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item d-flex align-items-center" href="changepassword.php"><i class="fas fa-lock"></i><span>Change Password</span></a></li>
          <li><a class="dropdown-item d-flex align-items-center" href="logout.php"><i class="bi bi-box-arrow-right"></i><span>Sign Out</span></a></li>
        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->
    </ul>
  </nav><!-- End Icons Navigation -->
</header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="fas fa-building"></i><span>Municipality</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">    
          <li>
            <a href="madridejos.php">
              <i class="bi bi-circle"></i><span>Madridejos</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="form.php">
          <i class="bi bi-file-text"></i><span>Form</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="map.php">
          <i class="bi bi-map"></i><span>Map</span>
        </a>
      </li>
<!-- add lng dir -->

    </ul>

  </aside><!-- End Sidebar-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.8/dist/sweetalert2.all.min.js"></script>
  <script>
  document.addEventListener('DOMContentLoaded', (event) => {
    // Add click event listener to logout link
    document.querySelector('a[href="logout.php"]').addEventListener('click', function (e) {
      e.preventDefault(); // Prevent the default action

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
          // Redirect to logout.php if confirmed
          window.location.href = 'logout.php';
        }
      });
    });
  });
</script>
  