<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map Locator</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
        button {
            margin-bottom: 10px;
            padding: 10px;
        }
        .input-container {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h2>Click on the map to get latitude and longitude</h2>

    <div class="input-container">
        <label for="name">Name:</label>
        <input type="text" id="name" placeholder="Enter your name">
    </div>
    <div class="input-container">
        <label for="household">Household Number:</label>
        <input type="text" id="household" placeholder="Enter household number">
    </div>
    <button id="getLocationBtn">Get My Location</button>
    <div id="map"></div>
    <p>Coordinates: <span id="coordinates">None</span></p>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        // Initialize the map and set view to Bantayan Island's coordinates
        var map = L.map('map').setView([11.3, 123.7], 10);  // Adjusted coordinates for Bantayan Island

        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Function to update coordinates when the map is clicked
        map.on('click', function(e) {
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;
            document.getElementById('coordinates').textContent = 'Latitude: ' + lat + ', Longitude: ' + lng;
        });

        // Function to get the user's location
        document.getElementById('getLocationBtn').addEventListener('click', function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var lat = position.coords.latitude;
                    var lng = position.coords.longitude;

                    // Center the map on the user's location
                    map.setView([lat, lng], 13);

                    // Add a marker for the user's location
                    L.marker([lat, lng]).addTo(map)
                        .bindPopup('You are here!')
                        .openPopup();

                    // Display the coordinates
                    document.getElementById('coordinates').textContent = 'Latitude: ' + lat + ', Longitude: ' + lng;
                }, function() {
                    alert('Unable to retrieve your location.');
                });
            } else {
                alert('Geolocation is not supported by this browser.');
            }
        });
    </script>
</body>
</html>
