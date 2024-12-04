<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/img/travelogo.png" rel="icon">
    <title>Change Password</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome CDN for eye icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="bg-gray-100 font-serif flex justify-center items-center min-h-screen p-0 m-0">

    <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md text-center">
        <!-- Heading -->
        <h1 class="text-gray-800 text-3xl font-bold mb-6">Change Your Password</h1>

        <form id="changePasswordForm" method="POST" action="../staffaction/change_password.php" class="space-y-6">
            <!-- Current Password -->
            <div class="relative">
                <label for="currentPassword" class="block text-left text-gray-600 text-sm mt-1">Current Password</label>
                <input type="password" class="w-full px-4 py-3 border rounded-md text-lg text-gray-700" id="currentPassword" name="currentPassword" required placeholder="Current Password">
                <button type="button" id="toggleCurrentPassword" class="absolute inset-y-9 right-4 transform -translate-y-1/2">
                    <i class="fas fa-eye text-gray-600"></i> <!-- Eye icon -->
                </button>
            </div>

            <!-- New Password -->
            <div class="relative">
                <label for="newPassword" class="block text-left text-gray-600 text-sm mt-1">New Password</label>
                <input type="password" class="w-full px-4 py-3 border rounded-md text-lg text-gray-700" id="newPassword" name="newPassword" required placeholder="New Password">
                <button type="button" id="toggleNewPassword" class="absolute inset-y-9 right-4 transform -translate-y-1/2">
                    <i class="fas fa-eye text-gray-600"></i> <!-- Eye icon -->
                </button>
            </div>

            <!-- Confirm New Password -->
            <div class="relative">
                <label for="confirmPassword" class="block text-left text-gray-600 text-sm mt-1">Confirm New Password</label>
                <input type="password" class="w-full px-4 py-3 border rounded-md text-lg text-gray-700" id="confirmPassword" name="confirmPassword" required placeholder="Confirm New Password">
                <button type="button" id="toggleConfirmPassword" class="absolute inset-y-9 right-4 transform -translate-y-1/2">
                    <i class="fas fa-eye text-gray-600"></i> <!-- Eye icon -->
                </button>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-gray-800 text-white rounded-md px-6 py-3 text-xl font-semibold shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400">
                Change Password
            </button>
        </form>

        <!-- Info Text -->
        <p id="infoText" class="text-gray-500 text-lg mt-8">If you have any issues or need further assistance, please contact support.</p>

        <div class="text-gray-600 text-sm font-semibold mt-4">
            <a href="../staffbantayan/myaccount.php" class="text-gray-600 hover:text-gray-800">Back to My Account</a>
        </div>
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
                        window.location.href = '../staffbantayan/myaccount.php';
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
</script>
<script>
     $(document).ready(function () {
            // Toggle visibility for the password fields
            $('#toggleCurrentPassword').click(function () {
                let input = $('#currentPassword');
                let icon = $(this).find('i');
                let type = input.attr('type') === 'password' ? 'text' : 'password';
                input.attr('type', type);

                // Change the icon based on visibility
                icon.toggleClass('fa-eye fa-eye-slash');
            });

            $('#toggleNewPassword').click(function () {
                let input = $('#newPassword');
                let icon = $(this).find('i');
                let type = input.attr('type') === 'password' ? 'text' : 'password';
                input.attr('type', type);

                // Change the icon based on visibility
                icon.toggleClass('fa-eye fa-eye-slash');
            });

            $('#toggleConfirmPassword').click(function () {
                let input = $('#confirmPassword');
                let icon = $(this).find('i');
                let type = input.attr('type') === 'password' ? 'text' : 'password';
                input.attr('type', type);

                // Change the icon based on visibility
                icon.toggleClass('fa-eye fa-eye-slash');
            });
        });
</script>


</body>
</html>
