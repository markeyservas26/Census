<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP and SMS</title>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script> <!-- Tailwind CSS CDN -->
</head>
<body class="bg-gradient-to-r from-gray-400 to-gray-200 flex justify-center items-center min-h-screen p-0 m-0">

    <div class="bg-white bg-opacity-90 rounded-xl p-12 shadow-xl backdrop-blur-lg w-full max-w-md text-center">
        <h1 class="text-gray-800 text-3xl mb-4 font-semibold">Choose an Option</h1>
        <p class="text-gray-600 text-lg mb-6">Select one of the following methods to proceed:</p>

        <!-- Button Links -->
        <a href="../forgotpassword/forgot-password.php" 
            class="inline-block bg-gray-700 text-white rounded-full px-6 py-3 mb-4 text-xl font-semibold transition-transform transform hover:bg-gray-600 hover:scale-105 active:scale-95">
            Send Via Gmail OTP
        </a>
        <a href="../sms/send-otp.php" 
            class="inline-block bg-gray-700 text-white rounded-full px-6 py-3 text-xl font-semibold transition-transform transform hover:bg-gray-600 hover:scale-105 active:scale-95">
            Send SMS
        </a>

        <!-- Info Text -->
        <p id="infoText" class="text-gray-500 text-lg font-semibold mt-6"></p>
    </div>

</body>
</html>
