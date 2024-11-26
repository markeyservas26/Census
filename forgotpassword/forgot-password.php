<?php require_once "server.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            background: linear-gradient(135deg, #e2e2e2, #ffffff);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
        }
        .forgot-password-container {
            max-width: 500px;
            width: 100%;
            background-color:#d1dbfc;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            padding: 2rem;
            position: relative;
            overflow: hidden;
            text-align: center;
        }
        
        .forgot-password-container img {
            width: 250px;
            height: 120px;
            border-radius: 5%;
            margin-bottom: 1rem;
        }
        .forgot-password-container .content {
            position: relative;
            z-index: 1;
        }
        h2 {
            color: #333;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        p {
            color: #555;
            margin-bottom: 2rem;
        }
        .btn-danger {
            background: #007bff;
            border: none;
            border-radius: 25px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: background 0.3s ease;
        }
        .btn-danger:hover {
            background: #0056b3;
        }
        .alert-danger {
            margin-top: 1rem;
            border-radius: 8px;
        }
        a {
            color: #007bff;
            text-decoration: none;
            font-weight: 600;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="forgot-password-container">
        <img src="../assets/img/forgotpassword.gif" alt="Logo">
        <div class="content">
            <h2>Forgot Password?</h2>
            <p>Enter your email address and we'll send you instructions to reset your password.</p>
            <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger text-center">
                    <?php foreach($errors as $error): ?>
                        <div><?php echo htmlspecialchars($error); ?></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <form action="forgot-password.php" method="POST" autocomplete="off">
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" placeholder="Enter your email" required>
                </div>
                <button type="submit" name="check-email" value="Continue" class="btn btn-danger w-100 mb-3">Send Reset Link</button>
                <p class="mb-0">Remember your password? <a href="../admin/login.php">Sign In</a></p>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
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
