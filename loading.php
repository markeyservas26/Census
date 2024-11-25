<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Verification</title>
    <script src="https://www.google.com/recaptcha/api.js?render=6LdRWokqAAAAAFrLVJR3SMkPjDqtu6JvFWEr7AAI"></script> <!-- Your v3 site key -->
</head>
<body>

    <h2>Please complete the verification to proceed</h2>

    <form id="captchaForm" action="submit_form.php" method="POST">
        <!-- The reCAPTCHA score will be added here dynamically -->
        <button type="submit">Submit</button>
    </form>

    <script>
        // Function to execute reCAPTCHA v3 and get the score
        grecaptcha.ready(function() {
            document.getElementById("captchaForm").onsubmit = function(event) {
                event.preventDefault(); // Prevent form submission

                grecaptcha.execute('6LdRWokqAAAAAFrLVJR3SMkPjDqtu6JvFWEr7AAI', {action: 'submit'}).then(function(token) {
                    // Attach the token to the form
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'g-recaptcha-response';
                    input.value = token;
                    document.getElementById('captchaForm').appendChild(input);

                    // Submit the form now that the token is added
                    document.getElementById('captchaForm').submit();
                });
            };
        });
    </script>

</body>
</html>
