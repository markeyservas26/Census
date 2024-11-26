<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP and SMS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f9;
        }
        .button-container {
            text-align: center;
        }
        a {
            text-decoration: none;
            padding: 10px 20px;
            margin: 10px;
            display: inline-block;
            color: white;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .gmail-btn {
            background-color: #ea4335;
        }
        .gmail-btn:hover {
            background-color: #c62828;
        }
        .sms-btn {
            background-color: #34a853;
        }
        .sms-btn:hover {
            background-color: #1e7e34;
        }
    </style>
</head>
<body>
    <div class="button-container">
        <a href="../forgotpassword/forgot-password.php" class="gmail-btn">Send Via Gmail OTP</a>
        <a href="../sms/send-otp.php" class="sms-btn">Send SMS</a>
    </div>
</body>
</html>
