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
        <label for="name">First Name:</label>
        <input type="text" id="name" placeholder="Enter your first name" value="">
    </div>
    <div class="input-container">
        <label for="household">Household Number:</label>
        <input type="text" id="household" placeholder="Enter household number" value="">
    </div>
    <button id="getLocationBtn">Get My Location</button>
    <div id="map"></div>
    <p>Coordinates: <span id="coordinates">None</span></p>

    <button id="submitBtn">Submit</button>
    <button id="backBtn">Back</button>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        // Initialize the map and set view to Bantayan Island's coordinates
        var map = L.map('map').setView([11.3, 123.7], 10);  // Adjusted coordinates for Bantayan Island

        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var userMarker; // Variable to hold the user's marker

        // Pre-fill the input fields with stored values (if available)
        document.getElementById('name').value = localStorage.getItem('firstname_hl') || ''; // Use local storage to retrieve first name
        document.getElementById('household').value = localStorage.getItem('house_number') || ''; // Use local storage to retrieve household number

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
                    if (userMarker) {
                        map.removeLayer(userMarker); // Remove the previous marker if it exists
                    }
                    userMarker = L.marker([lat, lng]).addTo(map)
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

        // Function to submit the form
        document.getElementById('submitBtn').addEventListener('click', function() {
            var name = document.getElementById('name').value;
            var household = document.getElementById('household').value;
            var coordinates = document.getElementById('coordinates').textContent;

            if (name && household && coordinates !== 'None') {
                // Save the name and household number to local storage
                localStorage.setItem('firstName', name);
                localStorage.setItem('householdNumber', household);

                // Assuming a server-side endpoint to handle the form submission
                alert('Submitting:\n' + 'Name: ' + name + '\nHousehold Number: ' + household + '\n' + coordinates);
                // Here, you would normally send the data to your server.
                // Example using fetch:
                /*
                fetch('submit.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        name: name,
                        household: household,
                        coordinates: coordinates
                    })
                })
                .then(response => response.json())
                .then(data => {
                    alert('Submission successful: ' + data.message);
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
                */
            } else {
                alert('Please fill in all fields and ensure you have selected a location.');
            }
        });

        // Function to go back to form.php
        document.getElementById('backBtn').addEventListener('click', function() {
            window.location.href = '../admin/form.php'; // Redirect to form.php
        });
    </script>
</body>
</html>
