<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP and SMS</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-purple-600 to-indigo-700 flex justify-center items-center min-h-screen p-0 m-0">

    <div class="bg-white bg-opacity-90 rounded-3xl p-12 shadow-2xl backdrop-blur-lg w-full max-w-md text-center transition-all ease-in-out transform hover:scale-105">
        <h1 class="text-gray-900 text-4xl font-extrabold mb-6">Choose an Option</h1>
        <p class="text-gray-600 text-lg mb-8 font-medium">Select one of the following methods to proceed:</p>

        <!-- Button Links -->
        <a href="../forgotpassword/forgot-password.php" 
            class="inline-block bg-gradient-to-r from-red-500 to-red-600 text-white rounded-full px-8 py-4 mb-6 text-xl font-semibold shadow-lg transform transition-all duration-300 hover:from-red-400 hover:to-red-500 hover:shadow-xl hover:scale-105 active:scale-95">
            Send Via Gmail OTP
        </a>
        <a href="../sms/send-otp.php" 
            class="inline-block bg-gradient-to-r from-green-500 to-green-600 text-white rounded-full px-8 py-4 text-xl font-semibold shadow-lg transform transition-all duration-300 hover:from-green-400 hover:to-green-500 hover:shadow-xl hover:scale-105 active:scale-95">
            Send SMS
        </a>

        <!-- Info Text -->
        <p id="infoText" class="text-gray-500 text-lg font-semibold mt-8"></p>
    </div>

</body>
</html>
