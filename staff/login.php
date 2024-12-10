<?php

session_start();

if (isset($_SESSION['user_id'])) {
    header("Location:index"); // Redirect to login page if not logged in
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
  <link href="../assets/img/travelogo.png" rel="icon">
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

  <script src="https://cdn.tailwindcss.com"></script>

  <script src="https://www.google.com/recaptcha/api.js?render=6LcqT4kqAAAAAOkPnbZCeDx8KNaPHcNMscOiFChA"></script>
</head>

<body class="bg-gray-100 font-serif flex justify-center items-center min-h-screen p-0 m-0">

<div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md text-center">
    <!-- Logo -->
    <div class="d-flex justify-content-center py-2 mb-3">
      <img src="../assets/img/trasparlogo.png" alt="" class="h-32 w-auto">
    </div>

        <!-- Title -->
        <h5 class="text-center text-gray-800 text-2xl font-semibold mb-4">Staff | Login</h5>

        <!-- Login Form -->
        <form id="loginForm" method="POST" action="../staffaction/login.php" class="space-y-6">

          <!-- Email Input -->
          <div>
            <label for="yourEmail" class="block text-left text-gray-600 text-lg font-semibold mb-2">Email</label>
            <div class="relative">
              <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">@</span>
              <input type="email" name="email" id="yourEmail" required
                class="w-full px-4 py-2 pl-10 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-400">
            </div>
            <div class="text-sm text-red-500 mt-1" id="usernameError"></div>
          </div>

          <!-- Password Input -->
          <div>
            <label for="yourPassword" class="block text-left text-gray-600 text-lg font-semibold mb-2">Password</label>
            <div class="relative">
              <input type="password" name="password" id="yourPassword" required
                class="w-full px-4 py-2 pl-10 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-400">
              <span class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer" id="togglePassword">
                <i class="fas fa-eye"></i>
              </span>
            </div>
            <div class="text-sm text-red-500 mt-1" id="passwordError"></div>
          </div>

          <!-- Terms & Conditions Checkbox -->
      <div class="flex items-center">
        <input type="checkbox" id="termsCheckbox" name="terms" required class="mr-2">
        <label for="termsCheckbox" class="text-sm text-gray-600">Yes, I agree to the <a href="termsandconditions" class="text-blue-600 hover:underline">Terms & Conditions</a></label>
      </div>

          <!-- Forgot Password & Back to Website Links -->
          <div class="flex justify-between text-gray-600 text-sm">
            <a href="../chooseforgot" class="hover:text-gray-800">Forgot password?</a>
            <a href="../index" class="hover:text-gray-800">Back to Website</a>
          </div>

          <!-- Submit Button -->
          <div>
            <button type="submit"
              class="w-full py-3 px-4 bg-gray-800 text-white rounded-md font-semibold shadow-md hover:bg-gray-700 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-gray-400">
              Login
            </button>
          </div>

          <!-- Hidden reCAPTCHA Token -->
          <input type="hidden" name="recaptcha_token" id="recaptchaToken">

        </form>
      </div>
    </section>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  

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
      const loginForm = document.querySelector('form.needs-validation');

      togglePassword.addEventListener('click', function() {
        // Toggle the type attribute
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);

        // Toggle the eye icon
        this.querySelector('i').classList.toggle('fa-eye-slash');
      });
    });

    loginForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        const formData = new FormData(loginForm);

        fetch('../staffaction/login.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Response:', data); // Log the response for debugging

            if (data.success) {
                Swal.fire({
                    title: 'Login Successful',
                    text: 'You are being redirected...',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500 // Time in milliseconds (1.5 seconds)
                }).then(() => {
                    window.location.href = data.redirect; // Redirect based on the server response
                });
            } else {
                Swal.fire({
                    title: 'Login Failed',
                    text: data.message || 'An error occurred during login.',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 1000 // Time in milliseconds (3 seconds)
                });
            }
        })
        .catch(error => {
            console.error('Fetch error:', error); // Log fetch errors
            Swal.fire({
                title: 'Error',
                text: 'An error occurred during login.',
                icon: 'error',
                showConfirmButton: false,
                timer: 3000 // Time in milliseconds (3 seconds)
            });
        });
    });
</script>


</body>

</html>
