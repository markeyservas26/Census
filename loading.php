<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/img/travelogo.png" rel="icon">
    <title>Human Verification</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google reCAPTCHA API -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body class="bg-gray-100 font-sans flex flex-col justify-center items-center min-h-screen text-center p-4">

    <!-- Heading -->
    <h2 class="text-gray-800 text-4xl font-bold mb-4">Just a Moment...</h2>
    
    <!-- Paragraph -->
    <p class="text-gray-600 text-lg mb-6 max-w-md">
        Verifying that you are not a robot. Please complete the CAPTCHA below to continue to the website.
    </p>

    <!-- Google reCAPTCHA -->
    <form action="submit_form.php" method="POST" class="w-full max-w-xs">
        <div class="g-recaptcha" data-sitekey="6LceYIkqAAAAABQK7C1RrAe_STU3BDwgIHhcZHO8"></div>
        <button type="submit" class="bg-blue-600 text-white rounded-md px-6 py-3 text-xl font-semibold mt-6 shadow-md hover:bg-blue-500 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-blue-400 w-full">
            Verify
        </button>
    </form>

    <!-- Info Text -->
    <p class="text-gray-500 text-sm mt-8">
        If verification fails, <a href="javascript:location.reload()" class="text-blue-500 hover:text-blue-700">refresh the page</a>.
    </p>

</body>
</html>
