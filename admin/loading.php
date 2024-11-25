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
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f4f4f4;
            overflow: hidden;
        }

        .loading-container {
            text-align: center;
        }

        /* Progress bar styling */
        .progress-bar-background {
            width: 100%;
            height: 30px;
            background-color: #ddd;
            border-radius: 15px;
            overflow: hidden;
            margin-top: 30px;
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
        
        /* Lottie animation container */
        #lottie-container {
            width: 150px;
            height: 150px;
            margin-bottom: 20px;
        }

    </style>
</head>
<body>
    <div class="loading-container">
        <!-- Lottie animation container -->
        <div id="lottie-container"></div>

        <!-- Progress bar container -->
        <div class="progress-bar-background">
            <div class="progress-bar" id="progress-bar">0%</div>
        </div>
    </div>

    <!-- Lottie Web script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.6/lottie.min.js"></script>

    <script>
        var progressBar = document.getElementById("progress-bar");
        var width = 0;

        // Initialize the Lottie animation (you can replace this with your own Lottie file)
        var animation = lottie.loadAnimation({
            container: document.getElementById('lottie-container'), // the DOM element that will hold the animation
            renderer: 'svg', // Render type (svg, canvas, or html)
            loop: true, // Loop the animation
            autoplay: true, // Start animation automatically
            path: 'https://assets10.lottiefiles.com/packages/lf20_pvhsq8.json' // URL to the Lottie JSON animation (a loading spinner)
        });

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
