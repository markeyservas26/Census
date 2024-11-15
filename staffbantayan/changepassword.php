<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<!-- Favicons -->
<link href="../assets/img/travelogo.png" rel="icon">

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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #e9ecef;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }
        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 400px;
            position: relative;
        }
        h2 {
            margin-bottom: 20px;
            font-weight: bold;
            color: #007bff;
            text-align: center;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 20px;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-back {
            background-color: #f8f9fa; /* Light background for back button */
            color: #007bff; /* Blue text color */
            border: none; /* No border */
            border-radius: 20px; /* Rounded corners */
            margin-bottom: 20px; /* Spacing below the button */
            transition: background-color 0.3s ease;
        }
        .btn-back:hover {
            background-color: #e2e6ea; /* Darker shade on hover */
        }
        #message {
            margin-top: 20px;
        }
        .input-group {
            position: relative;
            margin-bottom: 30px; /* Adjust spacing */
        }
        .form-control {
            border-radius: 25px; /* Round edges */
            border: 1px solid #ced4da; /* Border color */
            transition: border-color 0.3s ease;
            padding: 12px 20px; /* Add padding for better appearance */
        }
        .form-control:focus {
            border-color: #007bff; /* Focus border color */
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.25); /* Focus shadow */
        }
        .form-label {
            position: absolute;
            top: 10px; /* Position above input */
            left: 20px; /* Position inside the input */
            color: #495057;
            transition: 0.3s;
            pointer-events: none; /* Prevent interaction */
            opacity: 0.5; /* Make label slightly transparent */
        }
        .form-control:focus + .form-label,
        .form-control:not(:placeholder-shown) + .form-label {
            top: -20px; /* Move label up */
            left: 15px; /* Adjust horizontal position */
            color: #007bff; /* Change label color on focus */
            font-size: 0.8em; /* Make label smaller */
            opacity: 1; /* Fully visible */
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #007bff; /* Eye icon color */
        }
        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('https://source.unsplash.com/random/1920x1080/?nature');
            background-size: cover;
            filter: blur(10px);
            z-index: -1; /* Behind the container */
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="background-image"></div>
    <button class="btn btn-back" onclick="window.history.back();">
        <i class="bi bi-box-arrow-left"></i> Back
    </button>
    <h2>Change Password</h2>
    <form id="changePasswordForm" method="POST" action="../action/change_password.php">
        <div class="mb-4 input-group">
            <input type="password" class="form-control" id="currentPassword" name="currentPassword" required placeholder=" ">
            <label for="currentPassword" class="form-label">Current Password</label>
            <i class="far fa-eye toggle-password" id="toggleCurrentPassword"></i>
        </div>
        <div class="mb-4 input-group">
            <input type="password" class="form-control" id="newPassword" name="newPassword" required placeholder=" ">
            <label for="newPassword" class="form-label">New Password</label>
            <i class="far fa-eye toggle-password" id="toggleNewPassword"></i>
        </div>
        <div class="mb-4 input-group">
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required placeholder=" ">
            <label for="confirmPassword" class="form-label">Confirm New Password</label>
            <i class="far fa-eye toggle-password" id="toggleConfirmPassword"></i>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Change Password</button>
    </form>

    <div id="message" class="mt-3"></div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Handle form submission with AJAX
    $('#changePasswordForm').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission
        
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
                // Assuming the server returns a success message
                if (response.success) {
                    // Display success alert
                    Swal.fire({
                        title: 'Success!',
                        text: 'Your password has been changed successfully.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        // Redirect to index.php after alert is closed
                        window.location.href = 'index.php';
                    });
                } else {
                    // Display error message
                    $('#message').html('<div class="alert alert-danger">' + response.message + '</div>');
                }
            },
            error: function(xhr, status, error) {
                $('#message').html('<div class="alert alert-danger">An error occurred: ' + error + '</div>');
            }
        });
    });

    // Show/Hide Password
    $('.toggle-password').on('click', function(e) {
        e.preventDefault(); // Prevent default anchor behavior
        const input = $(this).siblings('input');
        const type = input.attr('type') === 'password' ? 'text' : 'password';
        input.attr('type', type); // Toggle input type
        $(this).toggleClass('fa-eye fa-eye-slash'); // Toggle icon
        input.focus(); // Keep focus on the input
    });
</script>

</body>
</html>
