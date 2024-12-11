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
<body class="bg-gray-50 font-sans flex flex-col justify-center items-center min-h-screen text-center p-6">

    <!-- Heading -->
    <h2 class="text-gray-900 text-3xl md:text-4xl font-semibold mb-4 tracking-tight">
        Just a moment...
    </h2>

    <!-- Paragraph -->
    <p class="text-gray-600 text-lg md:text-xl max-w-xl mb-6">
        We’re checking your browser to ensure secure access. This process is automatic. Your browser will redirect to your requested content shortly.
    </p>

    <!-- Subtext -->
    <p class="text-gray-500 text-sm md:text-base max-w-lg">
        Please allow up to 5 seconds. If you are not redirected, <a href="index.php" class="text-blue-500 hover:underline">click here</a>.
    </p>

    <!-- Spinner -->
    <div class="w-16 h-16 border-4 border-blue-500 border-dashed rounded-full animate-spin mt-6"></div>

    <!-- Form -->
    <form action="verify_recaptcha.php" method="POST" id="verificationForm" class="hidden">
        <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
    </form>

    <script>
        // Render reCAPTCHA v3 and attach the token to the form
        grecaptcha.ready(function() {
            grecaptcha.execute('6Le4MJEqAAAAAMr4sxXT8ib-_SSSq2iEY-r2-Faq', { action: 'verify' }).then(function(token) {
                // Attach the token to the hidden input field
                document.getElementById('g-recaptcha-response').value = token;

                // Automatically submit the form after token is set
                document.getElementById('verificationForm').submit();
            });
        });
    </script>

</body>
</html>
