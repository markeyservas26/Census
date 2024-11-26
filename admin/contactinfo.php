<?php
// Assuming you have a session started and the user is logged in
session_start();

// Fetch the current user's email and phone number from the session or database
// For example, let's assume the session holds the user's information
$currentUserEmail = $_SESSION['username'];  // Replace with actual session variable
$currentUserPhone = $_SESSION['phone'];  // Replace with actual session variable
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/img/travelogo.png" rel="icon">
    <title>Change Email or Phone Number</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-serif flex justify-center items-center min-h-screen p-0 m-0">

    <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md text-center">
        <!-- Heading -->
        <h1 class="text-gray-800 text-3xl font-bold mb-6">Change Email or Phone Number</h1>

        <!-- Form to change email or phone number -->
        <form id="changeEmailPhoneForm" method="POST" action="../action/change_email_phone.php" class="space-y-6">
            <!-- Email -->
            <div>
                <label for="email" class="block text-left text-gray-600 text-sm mt-1">Email</label>
                <input type="email" class="w-full px-4 py-3 border rounded-md text-lg text-gray-700" id="email" name="email" value="<?php echo $currentUserEmail; ?>" placeholder="New Email">
            </div>

            <!-- Phone Number -->
            <div>
                <label for="phone" class="block text-left text-gray-600 text-sm mt-1">Phone Number</label>
                <input type="text" class="w-full px-4 py-3 border rounded-md text-lg text-gray-700" id="phone" name="phone" value="<?php echo $currentUserPhone; ?>" placeholder="New Phone Number">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-gray-800 text-white rounded-md px-6 py-3 text-xl font-semibold shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400">
                Change Email & Phone Number
            </button>
        </form>

        <!-- Info Text -->
        <p id="infoText" class="text-gray-500 text-lg mt-8">If you have any issues or need further assistance, please contact support.</p>

        <div class="text-gray-600 text-sm font-semibold mt-4">
            <a href="../admin/myaccount.php" class="text-gray-600 hover:text-gray-800">Back to My Account</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Handle form submission with AJAX -->
    <script>
        $(document).ready(function () {
            // Handle form submission
            $('#changeEmailPhoneForm').on('submit', function (e) {
                e.preventDefault(); // Prevent default form submission

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function (response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Success!',
                                text: 'Your email and phone number have been updated successfully.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                window.location.href = 'index.php'; // Redirect to home page or any other page
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: response.message,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'An error occurred: ' + error,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });
        });
    </script>

</body>
</html>
