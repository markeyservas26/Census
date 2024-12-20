<?php require_once "server.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: ../admin/login');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/img/travelogo.png" rel="icon">
    <title>Create New Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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
        .new-password-container {
            max-width: 500px;
            width: 100%;
            background: linear-gradient(145deg, #e0f7fa, #b3e5fc);
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            padding: 2rem;
            position: relative;
            overflow: hidden;
            text-align: center;
        }
        .new-password-container img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .new-password-container .content {
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
        .alert-success, .alert-danger {
            margin-top: 1rem;
            border-radius: 8px;
            font-size: 0.875rem;
        }
        .password-container {
            position: relative;
            z-index: 1;
        }
        .password-toggle {
            position: absolute;
            top: 40%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            z-index: 2;
        }
        .password-toggles {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }
        a {
            color: #007bff;
            text-decoration: none;
            font-weight: 600;
        }
        a:hover {
            text-decoration: underline;
        }
        .strength-indicator {
            height: 5px;
            width: 100%;
            margin-top: 10px;
            border-radius: 3px;
            background-color: #ddd;
        }
        .strength-indicator .strength-weak {
            width: 33%;
            background-color: #ff4d4d;
        }
        .strength-indicator .strength-medium {
            width: 66%;
            background-color: #ffcc00;
        }
        .strength-indicator .strength-strong {
            width: 100%;
            background-color: #00e600;
        }
        .strength-text {
            font-size: 0.875rem;
            margin-top: 5px;
            font-weight: 400;
        }
        .strength-text.weak {
            color: #ff4d4d;
        }
        .strength-text.medium {
            color: #ffcc00;
        }
        .strength-text.strong {
            color: #00e600;
        }
    </style>
</head>
<body>
    <div class="new-password-container">
        <img src="../assets/img/newpass.gif" alt="Logo">
        <div class="content">
            <h2>Create New Password</h2>
            <p>Please enter your new password and confirm it.</p>
            <?php if(isset($_SESSION['info'])): ?>
                <div class="alert alert-success text-center">
                    <?php echo htmlspecialchars($_SESSION['info']); ?>
                </div>
            <?php endif; ?>
            <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger text-center">
                    <?php foreach($errors as $showerror): ?>
                        <div><?php echo htmlspecialchars($showerror); ?></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <form action="createnewpassword.php" method="POST" autocomplete="off">
                <div class="mb-3 password-container">
                    <input type="password" id="new-password" name="password" class="form-control" placeholder="New Password" required oninput="checkPasswordStrength()">
                    <span class="password-toggle" onclick="togglePassword('new-password', 'toggleNewPasswordIcon')">
                        <i class="fas fa-eye" id="toggleNewPasswordIcon"></i>
                    </span>
                    <div id="password-strength" class="strength-indicator"></div>
                    <div id="password-strength-text" class="strength-text"></div>
                </div>
                <div class="mb-3 password-container">
                    <input type="password" id="confirm-password" name="cpassword" class="form-control" placeholder="Confirm Password" required>
                    <span class="password-toggles" onclick="togglePassword('confirm-password', 'toggleConfirmPasswordIcon')">
                        <i class="fas fa-eye" id="toggleConfirmPasswordIcon"></i>
                    </span>
                </div>
                <button type="submit" name="change-password" class="btn btn-danger w-100 mb-3">Reset Password</button>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = document.getElementById(iconId);
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        function checkPasswordStrength() {
            const password = document.getElementById('new-password').value;
            const strengthIndicator = document.getElementById('password-strength');
            const strengthText = document.getElementById('password-strength-text');
            let strength = 0;

            // Check length
            if (password.length >= 8) strength += 1;
            // Check for numbers
            if (/\d/.test(password)) strength += 1;
            // Check for lowercase & uppercase letters
            if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength += 1;
            // Check for special characters
            if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) strength += 1;

            // Update the strength indicator and text
            if (strength === 1) {
                strengthIndicator.innerHTML = '<div class="strength-weak"></div>';
                strengthText.textContent = 'Weak';
                strengthText.className = 'strength-text weak';
            } else if (strength === 2) {
                strengthIndicator.innerHTML = '<div class="strength-medium"></div>';
                strengthText.textContent = 'Medium';
                strengthText.className = 'strength-text medium';
            } else if (strength >= 3) {
                strengthIndicator.innerHTML = '<div class="strength-strong"></div>';
                strengthText.textContent = 'Strong';
                strengthText.className = 'strength-text strong';
            } else {
                strengthIndicator.innerHTML = '';
                strengthText.textContent = '';
            }
        }
    </script>
</body>
</html>
