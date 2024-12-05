<?php 
require_once "server.php"; 
$email = $_SESSION['email'];
if($email == false){
  header('Location: ../staff/login');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/img/travelogo.png" rel="icon">
    <title>Code Verification</title>
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
        .verification-container {
            max-width: 500px;
            width: 100%;
            background-color: #d1dbfc;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            padding: 2rem;
            position: relative;
            overflow: hidden;
            text-align: center;
        }
        .verification-container img {
            width: 250px;
            height: 120px;
            border-radius: 5%;
            margin-bottom: 1rem;
        }
        .verification-container .content {
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
    <div class="verification-container">
        <img src="../assets/img/enterotp1.gif" alt="Logo">
        <div class="content">
            <h2>Enter OTP</h2>
            <p>Enter the OTP sent to your email.</p>
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
            <form action="reset-code.php" method="POST" autocomplete="off">
                <div class="mb-3">
                    <input type="text" name="otp" class="form-control" placeholder="Enter OTP code" required>
                </div>
                <button type="submit" name="check-reset-otp" class="btn btn-danger w-100 mb-3">Submit</button>
                <p class="text-center mb-0">Didn’t receive a code? <a href="forgot-password">Resend Code</a></p>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
