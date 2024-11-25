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
        }
        
        .loading-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            background-color: #f4f4f4;
        }

        .loading-text {
            font-size: 24px;
            color: #333;
        }

        /* Optional: You can add a loading spinner or animation here */
    </style>
</head>
<body>
    <div class="loading-container">
        <div class="loading-text">Loading... Please wait</div>
    </div>

    <script>
        // Wait for 3 seconds (3000 milliseconds) before redirecting
        setTimeout(function() {
            window.location.href = "https://www.bantayanislandcensus.com/";  // Redirect to your main website
        }, 3000);  // 3000ms = 3 seconds
    </script>
</body>
</html>
