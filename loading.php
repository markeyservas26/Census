<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Verification</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>

    <h2>Please complete the verification to proceed</h2>

    <!-- Form with only reCAPTCHA -->
    <form action="submit_form.php" method="POST">
        <!-- Google reCAPTCHA -->
        <div class="g-recaptcha" data-sitekey="6LceYIkqAAAAABQK7C1RrAe_STU3BDwgIHhcZHO8"></div><br><br>

        <button type="submit">Submit</button>
    </form>

</body>
</html>
