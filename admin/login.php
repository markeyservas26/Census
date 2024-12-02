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

  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <!-- Custom CSS for Logo Size -->

  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-serif flex justify-center items-center min-h-screen p-0 m-0">

  <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md text-center">
    <!-- Logo -->
    <div class="d-flex justify-content-center py-4 mb-6">
      <img src="../assets/img/trasparlogo.png" alt="" class="h-32 w-auto">
    </div>
        <!-- Title -->
        <h5 class="text-center text-gray-800 text-2xl font-semibold mb-4">Admin | Login</h5>

        <!-- Login Form -->
        <form id="loginForm" method="POST" class="space-y-6">

          <!-- Email Input -->
          <div>
            <label for="yourUsername" class="block text-left text-gray-600 text-lg font-semibold mb-2">Email</label>
            <div class="relative">
              <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">@</span>
              <input type="email" name="username" id="yourUsername" required
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

          <!-- Forgot Password & Back to Website Links -->
          <div class="flex justify-between text-gray-600 text-sm">
            <a href="chooseaway.php" class="hover:text-gray-800">Forgot password?</a>
            <a href="../index.php" class="hover:text-gray-800">Back to Website</a>
          </div>
<!-- reCAPTCHA -->
<div class="g-recaptcha" data-sitekey="6LceYIkqAAAAACzv1ohIn9NLAfwCaaW3ZORfRU01" name="recaptcha_token" id="recaptchaToken"></div>

          <!-- Submit Button -->
          <div>
            <button type="submit"
              class="w-full py-3 px-4 bg-gray-800 text-white rounded-md font-semibold shadow-md hover:bg-gray-700 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-gray-400">
              Login
            </button>
          </div>

        </form>
      </div>
    </section>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    // Fixed reCAPTCHA and form submission handling
    document.getElementById('loginForm').addEventListener('submit', async function(e) {
  e.preventDefault();
  
  try {
    // Get the reCAPTCHA token
    const token = await grecaptcha.getResponse();
    if (!token) {
      // Show an error if the reCAPTCHA is not validated
      await Swal.fire({
        icon: 'error',
        title: 'reCAPTCHA Verification',
        text: 'Please complete the reCAPTCHA to proceed.'
      });
      return; // Stop form submission if reCAPTCHA is not completed
    }

    // Set the token in the hidden input field
    document.getElementById('recaptchaToken').value = token;
    
    // Create FormData
    const formData = new FormData(this);
    
    // Send the request to the backend
    const response = await fetch('../action/login.php', {
      method: 'POST',
      body: formData
    });
    
    // Parse the response
    const data = await response.json();
    
    // Show result using SweetAlert
    await Swal.fire({
      icon: data.icon,
      title: data.title,
      text: data.text,
      confirmButtonColor: "#3085d6",
      confirmButtonText: "OK"
    });
    
    // Redirect if the response includes a redirect URL
    if (data.redirect) {
      window.location.href = data.redirect;
    }
  } catch (error) {
    console.error('Error:', error);
    await Swal.fire({
      icon: 'error',
      title: 'Error',
      text: 'An error occurred during login. Please try again.'
    });
  }
});

  </script>


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

    // Validation for the login form
    document.getElementById('loginForm').addEventListener('submit', function(event) {
      const usernameInput = document.getElementById('yourUsername');
      const usernameValue = usernameInput.value;
      const gmailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;

      // Check if the username matches the @gmail.com pattern
      if (!gmailPattern.test(usernameValue)) {
        event.preventDefault(); // Prevent form submission
        Swal.fire({
          icon: 'error',
          title: 'Validation Error',
          text: 'Username must have an @gmail.com.'
        });
      }
    });
  </script>

</body>

</html>
