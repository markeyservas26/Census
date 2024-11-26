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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="https://www.google.com/recaptcha/api.js?render=6LcqT4kqAAAAAOkPnbZCeDx8KNaPHcNMscOiFChA"></script>

  <!-- Custom CSS for Logo Size -->
  <style>
    body {
      background-color: #f1f5f8;
      font-family: 'Open Sans', sans-serif;
    }

    .container {
      max-width: 600px;
      margin-top: 5%;
    }

    .card {
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      padding: 2rem;
      background-color: white;
    }

    .card-title {
      font-size: 1.75rem;
      font-weight: 700;
      color: #2c3e50;
    }

    .card-body {
      padding: 2rem;
    }

    .form-label {
      font-size: 1rem;
      font-weight: 500;
      color: #2c3e50;
    }

    .form-control {
      border-radius: 5px;
      border: 1px solid #ccd1d9;
      padding: 0.75rem;
    }

    .form-control:focus {
      border-color: #5c6bc0;
      box-shadow: 0 0 0 0.2rem rgba(92, 107, 192, 0.25);
    }

    .input-group-text {
      background-color: #f4f6f8;
    }

    .btn-primary {
      background-color: #2c3e50;
      border: none;
      padding: 0.75rem;
      width: 100%;
      font-size: 1.1rem;
      font-weight: 600;
      text-transform: uppercase;
      border-radius: 5px;
      cursor: pointer;
    }

    .btn-primary:hover {
      background-color: #34495e;
    }

    .back-to-website {
      color: #2980b9;
      text-decoration: none;
      font-size: 0.9rem;
    }

    .back-to-website:hover {
      text-decoration: underline;
    }

    .forgot-password {
      color: #e74c3c;
      font-size: 0.9rem;
      text-decoration: none;
      margin-left: auto;
    }

    .forgot-password:hover {
      text-decoration: underline;
    }

    .footer {
      text-align: center;
      margin-top: 2rem;
      color: #7f8c8d;
    }
  </style>

</head>

<body>

  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="row justify-content-center">
          <div class="col-lg-6 col-md-8 d-flex flex-column align-items-center justify-content-center">

            <div class="card mb-3">
              <div class="card-body">
                <div class="d-flex justify-content-center py-4">
                  <img src="../assets/img/trasparlogo.png" alt="" style="height: 100px; width: 150px;">
                </div><!-- End Logo -->
                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4"> Admin | Login</h5>
                </div>

                <form id="loginForm" class="row g-3 needs-validation" method="POST">

                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Email</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="email" name="username" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Please enter your Email.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <div class="input-group">
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <span class="input-group-text" id="togglePassword">
                        <i class="fas fa-eye"></i>
                      </span>
                    </div>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>

                  <div class="col-12 d-flex align-items-center justify-content-between">
                    <a href="chooseaway.php" class="forgot-password">Forgot password?</a>
                    <a href="../index.php" class="back-to-website">Back to Website</a>
                  </div>

                  <input type="hidden" name="recaptcha_token" id="recaptchaToken">

                  <div class="col-12">
                    <button class="btn btn-primary" type="submit">Login</button>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main><!-- End #main -->

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    // Fixed reCAPTCHA and form submission handling
    document.getElementById('loginForm').addEventListener('submit', async function(e) {
      e.preventDefault();
      
      try {
        // Get reCAPTCHA token
        const token = await grecaptcha.execute('6LcqT4kqAAAAAOkPnbZCeDx8KNaPHcNMscOiFChA', { action: 'login' });
        document.getElementById('recaptchaToken').value = token;
        
        // Create FormData
        const formData = new FormData(this);
        
        // Send request
        const response = await fetch('../action/login.php', {
          method: 'POST',
          body: formData
        });
        
        // Parse response
        const data = await response.text();
        const result = JSON.parse(data);
        
        // Show result
        await Swal.fire({
          icon: result.icon,
          title: result.title,
          text: result.text,
          confirmButtonColor: "#3085d6",
          confirmButtonText: "OK"
        });
        
        // Handle redirect if successful
        if (result.redirect) {
          window.location.href = result.redirect;
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

</body>

</html>
