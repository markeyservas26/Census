<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-white-500 to-teal-400 h-screen flex justify-center items-center">
    <div class="bg-white p-8 rounded-lg shadow-2xl w-full max-w-sm transform hover:scale-105 transition-all duration-500 ease-in-out">
        <div class="text-center mb-8">
            <img src="https://img.icons8.com/ios/452/key.png" alt="Key Icon" class="w-20 mx-auto mb-4">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Verify OTP</h2>
            <p class="text-lg text-gray-600">Enter the OTP code sent to your Gmail address</p>
        </div>
        <form action="../action/verify_otp.php" method="POST">
            <div class="mb-6">
                <label for="otp" class="block text-lg font-medium text-gray-700 mb-2">OTP Code:</label>
                <input type="text" id="otp" name="otp" required 
                    class="w-full p-4 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400 transition duration-300 ease-in-out">
            </div>
            <button type="submit" 
                class="w-full py-3 bg-gradient-to-r from-blue-500 to-teal-400 text-white font-semibold rounded-md shadow-lg hover:bg-gradient-to-l hover:from-teal-400 hover:to-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-all duration-300 ease-in-out">
                Verify OTP
            </button>
        </form>
        <div class="text-center mt-6 text-sm text-gray-600">
            <p>Didn't receive the OTP? <a href="send_otp.php" class="text-blue-500 hover:underline">Resend OTP</a></p>
        </div>
    </div>
</body>
</html>
