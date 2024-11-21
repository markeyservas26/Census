<?php require_once "server.php"; ?>
<?php
if($_SESSION['info'] == false){
    header('Location: ../staff/login.php');  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Now</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
        .login-now-container {
            max-width: 350px;
            width: 100%;
            background: linear-gradient(145deg, #e0f7fa, #b3e5fc);
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            padding: 2rem;
            text-align: center;
        }
        .login-now-container img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
        .alert-success {
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
    <div class="login-now-container">
        <?php 
            if(isset($_SESSION['info'])){
                ?>
                <div class="alert alert-success text-center">
                    <?php echo htmlspecialchars($_SESSION['info']); ?>
                </div>
                <?php
            }
        ?>
        <a href="../staff/login.php" class="btn btn-danger w-100">Login Now</a>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
