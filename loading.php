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

    <!-- Invisible reCAPTCHA -->
    <form action="submit_form.php" method="POST">
        <button class="g-recaptcha" 
                data-sitekey="6LdRWokqAAAAAFrLVJR3SMkPjDqtu6JvFWEr7AAI" 
                data-callback="onSubmit">Submit</button>
    </form>

    <script>
        function onSubmit(token) {
            document.getElementsByTagName("form")[0].submit();
        }
    </script>

</body>
</html>
