<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location:index.php"); // Redirect to login page if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login - Bantayan Island Census</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- Favicons -->
  <link href="../assets/img/travelogo.jpg" rel="icon">
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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  
  <!-- Custom CSS for Logo Size -->

</head>

<body>

  <main>
  <div class="container">
  <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

          <div class="card mb-3">

            <div class="card-body">

              <div class="d-flex justify-content-center py-4">
                <img src="../assets/img/trasparlogo.png" alt="" style="height: 150px; width: 200px;">
              </div><!-- End Logo -->
              <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">STAFF | Login </h5>
              </div>

              <form class="row g-3 needs-validation" novalidate action="../staffaction/login.php" method="POST">
  <div class="col-12">
    <label for="yourEmail" class="form-label">Email</label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="inputGroupPrepend">@</span>
      <input type="email" name="email" class="form-control" id="yourEmail" required>
      <div class="invalid-feedback">Please enter your email.</div>
    </div>
  </div>

  <div class="col-12">
    <label for="yourPassword" class="form-label">Password</label>
    <div class="input-group">
      <input type="password" name="password" class="form-control" id="yourPassword" required>
      <span class="input-group-text" id="togglePassword">
        <i class="fas fa-eye"></i>
      </span>
      <div class="invalid-feedback">Please enter your password!</div>
    </div>
  </div>

  <div class="col-12 d-flex align-items-center">
    <div class="form-check me-3">
      <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
      <label class="form-check-label" for="rememberMe">Remember me</label>
    </div>
    <a href="../index.php" class="back-to-website d-none d-md-block" style="margin-left: 90px; color:black;">Back to Website</a>
  </div>

  <div class="col-12">
    <button class="btn btn-primary w-100" type="submit">Login</button>
  </div>
</form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

  </main><!-- End #main -->

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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    const togglePassword = document.querySelector('#togglePassword');
    const passwordField = document.querySelector('#yourPassword');

    togglePassword.addEventListener('click', function() {
      // Toggle the type attribute
      const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordField.setAttribute('type', type);

      // Toggle the eye icon
      this.querySelector('i').classList.toggle('fa-eye-slash');
    });
  });
</script>

</body>

</html>
