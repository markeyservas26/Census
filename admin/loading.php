<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Just Wait a Moment...</title>
    <style>
        /* Full screen loading screen styling */
        html, body {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: black; /* Ensure the background color is black */
        }

        .loading-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Make the container take the full height of the viewport */
            flex-direction: column; /* Center items vertically */
            color: white; /* White text on black background */
        }

        .loading-text {
            font-size: 24px;
            color: white; /* Ensure text is white */
            margin-top: 20px;
        }

        .loading-gif {
            width: 100px; /* Width of the loading GIF */
            height: auto;
        }
    </style>
</head>
<body>
    <div class="loading-container">
        <img class="loading-gif" src="assets/img/loading.gif" alt="Loading..."> <!-- Loading GIF -->
        <div class="loading-text">Loading... Please wait</div>
    </div>

    <script>
        // Wait for 3 seconds (3000 milliseconds) before redirecting
        setTimeout(function() {
            window.location.href = "../index.php";  // Redirect to your main website
        }, 3000);  // 3000ms = 3 seconds
    </script>
</body>
</html>
