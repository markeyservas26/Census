<?php
$name = $_GET['firstname'] ?? '';
$household = $_GET['house_number'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Step Form with Map Locator</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
        button {
            margin: 10px;
            padding: 10px;
        }
        .input-container {
            margin-bottom: 10px;
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <h2>Multi-Step Form</h2>

    <div id="inputSection">
        <div class="input-container">
            <label for="name">Name:</label>
            <input type="text" id="name" placeholder="Enter your name" required>
        </div>
        <div class="input-container">
            <label for="household">Household Number:</label>
            <input type="text" id="household" placeholder="Enter household number" required>
        </div>
        <div class="text-center mt-4">
            <button type="button" id="nextButton">Next</button>
        </div>
    </div>

    <div id="mapSection" class="hidden">
        <div class="text-center mt-4">
            <button type="button" id="backButton">Back</button>
            <button type="button" id="getLocationBtn">Get My Location</button>
        </div>
        <div id="map"></div>
        <p>Coordinates: <span id="coordinates">None</span></p>
    </div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        // Initialize the map
        var map = L.map('map').setView([11.3, 123.7], 10); // Centered on Bantayan Island

        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Handle Next button click
        document.getElementById('nextButton').addEventListener('click', function() {
            document.getElementById('inputSection').classList.add('hidden');
            document.getElementById('mapSection').classList.remove('hidden');
        });

        // Handle Back button click
        document.getElementById('backButton').addEventListener('click', function() {
            document.getElementById('mapSection').classList.add('hidden');
            document.getElementById('inputSection').classList.remove('hidden');
        });

        // Function to update coordinates when the map is clicked
        map.on('click', function(e) {
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;
            document.getElementById('coordinates').textContent = 'Latitude: ' + lat + ', Longitude: ' + lng;
        });

        // Function to get the user's location
        document.getElementById('getLocationBtn').addEventListener('click', function() {
            var name = document.getElementById('name').value;
            var household = document.getElementById('household').value;

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var lat = position.coords.latitude;
                    var lng = position.coords.longitude;

                    // Center the map on the user's location
                    map.setView([lat, lng], 13);

                    // Add a marker for the user's location with name and household number in the popup
                    L.marker([lat, lng]).addTo(map)
                        .bindPopup('Name: ' + name + '<br>Household Number: ' + household)
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
