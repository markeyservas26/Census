<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP and SMS</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            height: 100vh;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            display: flex;
            justify-content: center;
            align-items: center;
            box-sizing: border-box;
            overflow: hidden;
        }

        .button-container {
            text-align: center;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
        }

        h1 {
            color: white;
            font-size: 32px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }

        a {
            text-decoration: none;
            padding: 15px 25px;
            margin: 15px;
            display: inline-block;
            color: white;
            border-radius: 30px;
            font-size: 18px;
            font-weight: bold;
            transition: transform 0.3s ease, background-color 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            position: relative;
        }

        .gmail-btn {
            background: linear-gradient(45deg, #ea4335, #f44336);
        }

        .sms-btn {
            background: linear-gradient(45deg, #34a853, #1b8f3a);
        }

        .gmail-btn:hover, .sms-btn:hover {
            background: linear-gradient(45deg, #c62828, #b71c1c);
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.3);
        }

        .gmail-btn:active, .sms-btn:active {
            transform: translateY(2px);
            box-shadow: none;
        }

        .gmail-btn::after, .sms-btn::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.1);
            border-radius: 30px;
            transition: opacity 0.3s ease;
            opacity: 0;
        }

        .gmail-btn:hover::after, .sms-btn:hover::after {
            opacity: 1;
        }

        @media screen and (max-width: 768px) {
            .button-container {
                padding: 30px;
            }

            a {
                font-size: 16px;
                padding: 12px 20px;
                margin: 12px;
            }

            h1 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <div class="button-container">
        <h1>Choose OTP Method</h1>
        <a href="../forgotpassword/forgot-password.php" class="gmail-btn">Send Via Gmail OTP</a>
        <a href="../sms/send-otp.php" class="sms-btn">Send SMS</a>
    </div>
</body>
</html>
