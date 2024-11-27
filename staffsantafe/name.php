<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/img/travelogo.png" rel="icon">
    <title>Change Name</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-serif flex justify-center items-center min-h-screen p-0 m-0">

    <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md text-center">
        <!-- Heading -->
        <h1 class="text-gray-800 text-3xl font-bold mb-6">Change Your Name</h1>

        <!-- PHP to fetch and display the current user name -->
        <?php
        // Assuming you have a session started and user info is stored in session
        session_start();
        if (isset($_SESSION['name'])) {
            $currentUserName = $_SESSION['name'];
        } else {
            $currentUserName = 'User'; // Default name if session is not set
        }
        ?>

        <form id="changeNameForm" method="POST" action="../staffaction/change_name.php" class="space-y-6">
            <!-- Display the current name fetched from the session -->
            <div>
            <label for="currentName" class="block text-left text-gray-600 text-sm mt-1">Current Name</label>
                <input type="text" class="w-full px-4 py-3 border rounded-md text-lg text-gray-700" id="currentName" name="currentName" value="<?php echo $currentUserName; ?>" disabled required placeholder=" ">
            </div>

            <!-- Input for the new name -->
            <div>
            <label for="newName" class="block text-left text-gray-600 text-sm mt-1">New Name</label>
                <input type="text" class="w-full px-4 py-3 border rounded-md text-lg text-gray-700" id="newName" name="newName" required placeholder="Name or Full Name">
            </div>

            <!-- Input for confirming the new name -->
            <div>
            <label for="confirmName" class="block text-left text-gray-600 text-sm mt-1">Confirm New Name</label>
                <input type="text" class="w-full px-4 py-3 border rounded-md text-lg text-gray-700" id="confirmName" name="confirmName" required placeholder="Confirm Name or Full Name">
            </div>

            <button type="submit" class="w-full bg-gray-800 text-white rounded-md px-6 py-3 text-xl font-semibold shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400">
                Change Name
            </button>
        </form>

        <!-- Info Text -->
        <p id="infoText" class="text-gray-500 text-lg mt-8">If you have any issues or need further assistance, please contact support.</p>

        <div class="text-gray-600 text-sm font-semibold mt-4">
            <a href="../staffsantafe/myaccount.php" class="text-gray-600 hover:text-gray-800">Back to My Account</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {
            $('#changeNameForm').submit(function (e) {
                e.preventDefault(); // Prevent form from refreshing the page

                var newName = $('#newName').val();
                var confirmName = $('#confirmName').val();

                // Check if the new name and confirm name match
                if (newName !== confirmName) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'New name and confirm name do not match.',
                    });
                    return;
                }

                // Use AJAX to submit the form without reloading the page
                $.ajax({
                    type: 'POST',
                    url: '../staffaction/change_name.php',
                    data: { newName: newName }, // Send newName as POST data
                    success: function (response) {
                        // Show success message
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response, // Response from backend (Name changed successfully)
                        });
                    },
                    error: function () {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Something went wrong. Please try again.',
                        });
                    }
                });
            });
        });
    </script>

</body>
</html>
