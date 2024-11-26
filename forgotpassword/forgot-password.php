<?php require_once "server.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Open Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6 space-y-6">
        <div class="text-center">
            <img src="../assets/img/forgotpassword.gif" alt="Logo" class="w-56 h-28 mx-auto mb-4 rounded-lg">
            <h2 class="text-2xl font-semibold text-gray-800">Forgot Password?</h2>
            <p class="text-gray-600 mb-6">Enter your email address, and we'll send you instructions to reset your password.</p>
        </div>

        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger text-center bg-red-100 text-red-800 p-4 rounded-lg mb-4">
                <?php foreach($errors as $error): ?>
                    <div><?php echo htmlspecialchars($error); ?></div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form action="forgot-password.php" method="POST" autocomplete="off">
            <div class="mb-4">
                <input type="email" name="email" class="w-full p-3 border rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo htmlspecialchars($email); ?>" placeholder="Enter your email" required>
            </div>
            <button type="submit" name="check-email" value="Continue" class="w-full bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 transition duration-300">Send Reset Link</button>
            <p class="mt-4 text-gray-600">Remember your password? <a href="../admin/login.php" class="text-blue-600 hover:underline">Sign In</a></p>
        </form>

    </div>

    <script>
        <?php if ($emailSent): ?>
            Swal.fire({
                icon: 'success',
                title: 'Email Sent',
                text: 'Please check your email for the password reset link.',
                confirmButtonColor: '#007bff'
            });
        <?php endif; ?>
    </script>
</body>
</html>
