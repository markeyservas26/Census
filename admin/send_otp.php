<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two-Factor Authentication</title>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-white-500 to-teal-400 h-screen flex justify-center items-center">
    <div class="bg-white p-8 rounded-lg shadow-2xl w-full max-w-sm transform hover:scale-105 transition-all duration-500 ease-in-out">
        <div class="text-center mb-8">
            <img src="https://img.icons8.com/ios/452/lock-2.png" alt="Lock Icon" class="w-20 mx-auto mb-4">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Secure Login</h2>
            <p class="text-lg text-gray-600">Enter your Gmail address to receive an OTP code</p>
        </div>
        <form action="../action/send_otp.php" method="POST">
            <div class="mb-6">
                <label for="email" class="block text-lg font-medium text-gray-700 mb-2">Email (Gmail):</label>
                <input type="email" id="email" name="email" required 
                    class="w-full p-4 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400 transition duration-300 ease-in-out">
            </div>
            <button type="submit" 
                class="w-full py-3 bg-gradient-to-r from-blue-500 to-teal-400 text-white font-semibold rounded-md shadow-lg hover:bg-gradient-to-l hover:from-teal-400 hover:to-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-all duration-300 ease-in-out">
                Send OTP
            </button>
        </form>
    </div>
</body>
</html>
