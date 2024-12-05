<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/img/travelogo.png" rel="icon">
    <title>Just a Moment...</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google reCAPTCHA v3 -->
    <script src="https://www.google.com/recaptcha/api.js?render=6Le4MJEqAAAAAMr4sxXT8ib-_SSSq2iEY-r2-Faq"></script>
</head>
<body class="bg-gray-100 font-sans flex flex-col justify-center items-center min-h-screen text-center p-4">

    <!-- Heading -->
    <h2 class="text-gray-800 text-4xl font-bold mb-4">Just a Moment...</h2>
    
    <!-- Paragraph -->
    <p class="text-gray-600 text-lg mb-6 max-w-md">
        Verifying your request to ensure secure access. Please wait while we process your verification.
    </p>

    <!-- Form -->
    <form action="submit_form.php" method="POST" id="verificationForm">
        <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
        <noscript>
            <p class="text-red-500 text-sm">Please enable JavaScript in your browser to continue.</p>
        </noscript>
    </form>

    <script>
        // Render reCAPTCHA v3 and attach the token to the form
        grecaptcha.ready(function() {
            grecaptcha.execute('6Le4MJEqAAAAAMr4sxXT8ib-_SSSq2iEY-r2-Faq', { action: 'submit' }).then(function(token) {
                // Attach the token to the hidden input field
                document.getElementById('g-recaptcha-response').value = token;

                // Automatically submit the form after token is set
                document.getElementById('verificationForm').submit();
            });
        });
    </script>

</body>
</html>
