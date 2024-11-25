<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Verification</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .g-recaptcha {
            margin-bottom: 20px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Add responsiveness */
        @media (max-width: 480px) {
            .container {
                padding: 20px;
            }

            button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Please complete the verification to proceed</h2>
        <!-- Form with only reCAPTCHA -->
        <form action="submit_form.php" method="POST">
            <!-- Google reCAPTCHA -->
            <div class="g-recaptcha" data-sitekey="6LceYIkqAAAAABQK7C1RrAe_STU3BDwgIHhcZHO8"></div><br><br>
            <button type="submit">Submit</button>
        </form>
    </div>

</body>
</html>
