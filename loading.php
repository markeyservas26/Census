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
<body class="bg-gray-100 font-serif flex justify-center items-center min-h-screen p-0 m-0">

    <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-lg text-center">
        <!-- Heading -->
        <h2 class="text-gray-800 text-3xl font-bold mb-4">Human Verification</h2>
        
        <!-- Paragraph -->
        <p class="text-gray-600 text-lg mb-6">
            Please verify that you are a human by completing the CAPTCHA below. This helps us prevent automated spam and ensures a secure experience for everyone.
        </p>

        <!-- Google reCAPTCHA -->
        <form action="submit_form.php" method="POST">
  <div class="captcha-container flex justify-center items-center my-6 p-4 border rounded-lg bg-gray-50 bg-transparent">
    <div class="g-recaptcha" data-sitekey="6LceYIkqAAAAABQK7C1RrAe_STU3BDwgIHhcZHO8"></div>
  </div>

            <!-- Submit Button -->
            <button type="submit" class="bg-green-500 text-white rounded-md px-6 py-3 text-xl font-semibold shadow-md hover:bg-green-400 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-green-400 w-full">
                Verify
            </button>
        </form>

        <!-- Info Text -->
        <p id="infoText" class="text-gray-500 text-lg mt-8">
            Please complete the CAPTCHA to verify that you are not a robot. If you experience any issues, 
            <a href="javascript:location.reload()" class="text-blue-500 hover:text-blue-700">refresh the page</a> or contact support for assistance.
        </p>

    </div>

</body>
</html>
