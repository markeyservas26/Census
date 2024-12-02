<?php
session_start();
// Check if the user has been verified
if (isset($_SESSION['is_verified']) && $_SESSION['is_verified'] === true) {
    header('Location: ../admin/login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Gmail for Verification</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Enter Gmail for Verification</h2>
        <form id="emailForm" action="../action/send-verification.php" method="POST" class="space-y-4">
            <div>
                <label for="userEmail" class="block text-gray-700 font-medium mb-2">Enter your Gmail:</label>
                <input type="email" id="userEmail" name="email" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300 focus:outline-none">
            </div>
            <button type="submit"
                    class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-200">
                Send Verification Email
            </button>
        </form>
    </div>

    <script>
        // Add SweetAlert confirmation on form submission
        document.getElementById("emailForm").addEventListener("submit", function (event) {
            event.preventDefault(); // Prevent the default form submission
            
            // Capture the email entered
            const email = document.getElementById("userEmail").value;

            if (email) {
                Swal.fire({
                    title: 'Sending Verification Email...',
                    text: 'Please wait while we send the verification email.',
                    icon: 'info',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    didOpen: () => {
                        Swal.showLoading();
                        
                        // Simulate form submission
                        setTimeout(() => {
                            // Submit the form programmatically
                            event.target.submit();
                        }, 2000); // 2-second delay for better user experience
                    }
                });
            } else {
                Swal.fire({
                    title: 'Error',
                    text: 'Please enter a valid Gmail address.',
                    icon: 'error',
                });
            }
        });
    </script>
</body>
</html>
