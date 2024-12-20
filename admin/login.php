<?php
include '../block_check.php';
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

  <script src="https://www.google.com/recaptcha/api.js?render=6Le4MJEqAAAAAMr4sxXT8ib-_SSSq2iEY-r2-Faq"></script>

  <!-- Custom CSS for Logo Size -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-serif flex justify-center items-center min-h-screen p-0 m-0">

  <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md text-center">
    <!-- Logo -->
    <div class="d-flex justify-content-center py-2 mb-3">
      <img src="../assets/img/trasparlogo.png" alt="" class="h-32 w-auto">
    </div>
    <!-- Title -->
    <h5 class="text-center text-gray-800 text-2xl font-semibold mb-8">Admin | Login</h5>

    <!-- Login Form -->
    <form id="loginForm" method="POST" class="space-y-6">
    <div id="countdownMessage" class="text-red-500 text-lg font-semibold hidden mb-4"></div>

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
              <i class="fas"></i>
              </span>
            </div>
        <div class="text-sm text-red-500 mt-1" id="passwordError"></div>
      </div>

      <!-- Terms & Conditions Checkbox -->
      <div class="flex items-center">
        <input type="checkbox" id="termsCheckbox" name="terms" required class="mr-2">
        <label for="termsCheckbox" class="text-sm text-gray-600">Yes, I agree to the <a href="../termsandconditions" class="text-blue-600 hover:underline">Terms & Conditions</a></label>
      </div>

      <!-- Forgot Password & Back to Website Links -->
      <div class="flex justify-between text-gray-600 text-sm">
        <a href="chooseaway" class="hover:text-gray-800">Forgot password?</a>
        <a href="../index" class="hover:text-gray-800">Back to Website</a>
      </div>

      <!-- Submit Button -->
      <div>
       <input type="hidden" id="recaptcha_token" name="recaptcha_token">
        <button type="submit"
          class="w-full py-3 px-4 bg-gray-800 text-white rounded-md font-semibold shadow-md hover:bg-gray-700 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-gray-400">
          Login
        </button>
      </div>

    </form>
  </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
   grecaptcha.ready(function() {
    // Execute reCAPTCHA and get the token
    grecaptcha.execute('6Le4MJEqAAAAAMr4sxXT8ib-_SSSq2iEY-r2-Faq', { action: 'login' }).then(function(token) {
      // Add the token to the form before submission
      const recaptchaInput = document.createElement('input');
      recaptchaInput.type = 'hidden';
      recaptchaInput.name = 'g-recaptcha-response';
      recaptchaInput.value = token;
      document.getElementById('loginForm').appendChild(recaptchaInput);
    });
  });

document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    // Assuming you have other form validation here
    let formData = new FormData(this);

    // Submit the form data with the reCAPTCHA token
    fetch('../action/login', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.icon === 'error') {
            if (data.title === "Account Locked") {
                // Extract remaining time from the response
                let remainingTime = parseInt(data.text.match(/\d+/)[0]);
                
                // Check if there's a stored countdown in localStorage
                if (localStorage.getItem('countdownTime')) {
                    remainingTime = parseInt(localStorage.getItem('countdownTime'));
                }

                let countdownMessage = document.getElementById('countdownMessage');
                countdownMessage.classList.remove('hidden');
                countdownMessage.textContent = `Your account is locked. Please try again in ${remainingTime} seconds.`;

                // Start the countdown
                let countdownInterval = setInterval(function() {
                    remainingTime--;
                    countdownMessage.textContent = `Your account is locked. Please try again in ${remainingTime} seconds.`;

                    // Save the remaining time in localStorage
                    localStorage.setItem('countdownTime', remainingTime);

                    if (remainingTime <= 0) {
                        clearInterval(countdownInterval);
                        countdownMessage.textContent = "The countdown has ended. Please try logging in again.";
                        // Clear the countdown from localStorage after it's finished
                        localStorage.removeItem('countdownTime');
                    }
                }, 1000);
            } else {
                // Show SweetAlert for other errors
                Swal.fire(data.title, data.text, data.icon);
            }
        } else if (data.icon === 'success') {
            // Show SweetAlert for successful login
            Swal.fire({
                icon: 'success',
                title: 'Login Successful',
                text: 'You will be redirected shortly.',
                showConfirmButton: false,
                timer: 2000 // 2 seconds delay before redirect
            }).then(() => {
                // Redirect after the SweetAlert closes
                window.location.href = data.redirect;
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

// On page load, check if there's a stored countdown and display it
window.addEventListener('load', function() {
    let remainingTime = localStorage.getItem('countdownTime');
    if (remainingTime && remainingTime > 0) {
        let countdownMessage = document.getElementById('countdownMessage');
        countdownMessage.classList.remove('hidden');
        countdownMessage.textContent = `Your account is locked. Please try again in ${remainingTime} seconds.`;

        // Start the countdown if there's a stored value
        let countdownInterval = setInterval(function() {
            remainingTime--;
            countdownMessage.textContent = `Your account is locked. Please try again in ${remainingTime} seconds.`;

            // Save the remaining time in localStorage
            localStorage.setItem('countdownTime', remainingTime);

            if (remainingTime <= 0) {
                clearInterval(countdownInterval);
                countdownMessage.textContent = "The countdown has ended. Please try logging in again.";
                // Clear the countdown from localStorage after it's finished
                localStorage.removeItem('countdownTime');
            }
        }, 1000);
    }
});



document.addEventListener('DOMContentLoaded', function () {
    const togglePassword = document.querySelector('#togglePassword');
    const passwordField = document.querySelector('#yourPassword');

    // Set initial state
    const icon = togglePassword.querySelector('i');
    icon.classList.add('fa-eye-slash'); // Ensure it starts with the "eye slash"

    togglePassword.addEventListener('click', function () {
        // Toggle the type attribute
        const isPasswordVisible = passwordField.getAttribute('type') === 'text';
        passwordField.setAttribute('type', isPasswordVisible ? 'password' : 'text');

        // Set the eye icon based on visibility
        if (isPasswordVisible) {
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
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

</html>
