<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading...</title>
    <style>
        /* Full screen loading screen styling */
        html, body {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: black; /* Changed background color to black */
        }
        
        .loading-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            flex-direction: column; /* Make sure GIF and text align vertically */
        }

        .loading-text {
            font-size: 24px;
            color: #fff; /* Changed text color to white for better contrast on black background */
            margin-top: 20px;
        }

        .loading-gif {
            width: 100px; /* Set a width for the loading GIF */
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
