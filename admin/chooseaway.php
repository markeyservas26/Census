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
            background: linear-gradient(to right, #a0a0a0, #dcdcdc); /* Soft gray gradient */
            display: flex;
            justify-content: center;
            align-items: center;
            box-sizing: border-box;
            overflow: hidden;
        }

        .container {
            text-align: center;
            background: rgba(255, 255, 255, 0.9); /* Slightly opaque white */
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
        }

        h1 {
            color: #333333; /* Dark gray for the heading */
            font-size: 32px;
            margin-bottom: 20px;
        }

        .option-text {
            color: #555555; /* Lighter gray for option text */
            font-size: 18px;
            margin-top: 20px;
            font-weight: 500;
        }

        .info-text {
            color: #777777; /* Even lighter gray for the info text */
            font-size: 20px;
            margin-top: 20px;
            font-weight: bold;
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
            background-color: #777777; /* Medium gray for buttons */
            transition: transform 0.3s ease, background-color 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            position: relative;
        }

        a:hover {
            background-color: #555555; /* Darker gray for hover */
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.2);
        }

        a:active {
            transform: translateY(2px);
            box-shadow: none;
        }

        @media screen and (max-width: 768px) {
            .container {
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
    <div class="container">
        <h1>Choose an Option</h1>
        <p class="option-text">Select one of the following methods to proceed:</p>
        <a href="../forgotpassword/forgot-password.php" class="gmail-btn">Send Via Gmail OTP</a>
        <a href="../sms/send-otp.php" class="sms-btn">Send SMS</a>
        <p id="infoText" class="info-text"></p>
    </div>
</body>
</html>
