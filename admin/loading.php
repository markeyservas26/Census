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
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .loading-container {
            text-align: center;
        }

        .loading-text {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        /* Progress bar styling */
        .progress-bar-background {
            width: 100%;
            height: 30px;
            background-color: #ddd;
            border-radius: 15px;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;
            width: 0;
            background-color: #2a9d8f;
            text-align: center;
            line-height: 30px;
            color: white;
            font-weight: bold;
            border-radius: 15px 0 0 15px;
            transition: width 0.03s;
        }

    </style>
</head>
<body>
    <div class="loading-container">
        <div class="loading-text">Loading... Please wait</div>

        <!-- Progress bar container -->
        <div class="progress-bar-background">
            <div class="progress-bar" id="progress-bar">0%</div>
        </div>
    </div>

    <script>
        var progressBar = document.getElementById("progress-bar");
        var width = 0;

        // Function to simulate loading and increment progress bar
        function moveProgressBar() {
            if (width >= 100) {
                clearInterval(interval);  // Stop once it reaches 100%
                setTimeout(function() {
                    window.location.href = "../index.php";  // Redirect after loading is complete
                }, 500);  // Add delay before redirect (optional)
            } else {
                width++;
                progressBar.style.width = width + "%";
                progressBar.innerText = width + "%";
            }
        }

        // Simulate the loading process by incrementing the progress bar every 30ms
        var interval = setInterval(moveProgressBar, 30);
    </script>
</body>
</html>
