<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Gmail for Verification</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <h2>Enter your Gmail to Verify</h2>
    <form id="verificationForm" action="../action/send-verification.php" method="POST">
        <label for="userEmail">Enter your Gmail:</label>
        <input type="email" id="userEmail" name="email" required>
        <button type="submit">Send Verification Email</button>
    </form>

    <script>
        // Handle form submission and trigger SweetAlert on success
        document.getElementById('verificationForm').onsubmit = function(event) {
            event.preventDefault();  // Prevent form from submitting the default way
            const form = event.target;
            const formData = new FormData(form);
            
            fetch(form.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Show SweetAlert after email is sent
                Swal.fire({
                    title: 'Success!',
                    text: 'Verification email has been sent.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            })
            .catch(error => {
                // Show error message if request fails
                Swal.fire({
                    title: 'Error!',
                    text: 'Something went wrong. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
        };
    </script>
</body>
</html>
