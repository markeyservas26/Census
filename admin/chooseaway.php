<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP and SMS</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-serif flex justify-center items-center min-h-screen p-0 m-0">

    <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md text-center">
        <h1 class="text-gray-800 text-3xl font-bold mb-6">Choose an Option</h1>
        <p class="text-gray-600 text-lg mb-8">Please select one of the following methods to proceed:</p>

        <!-- Button Links -->
        <a href="../forgotpassword/forgot-password.php" 
            class="block bg-gray-800 text-white rounded-md px-6 py-3 mb-6 text-xl font-semibold shadow-md hover:bg-gray-700 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-gray-400">
            Send Via Gmail OTP
        </a>
        <a href="../sms/send-otp.php" 
            class="block bg-gray-800 text-white rounded-md px-6 py-3 text-xl font-semibold shadow-md hover:bg-gray-700 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-gray-400">
            Send SMS
        </a>

        <!-- Info Text -->
        <p id="infoText" class="text-gray-500 text-lg mt-8">For account recovery, choose one of the available methods.</p>
    </div>

</body>
</html>
