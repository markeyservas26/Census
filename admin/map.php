<?php include 'header.php'; ?>
<main id="main" class="main">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <!-- Input fields for name and household number -->
    <div class="input-container">
        <label for="name">Name:</label>
        <input type="text" id="name" placeholder="Enter your name" required>
    </div>
    <div class="input-container">
        <label for="household">Household Number:</label>
        <input type="text" id="household" placeholder="Enter household number" required>
    </div>
    
    <button id="getLocationBtn">Get My Location</button>
    <button id="submitBtn" disabled>Submit</button>

    <div id="map" style="height: 630px;"></div>
</main><!-- End #main -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    // Initialize the map
    var map = L.map('map').setView([11.1561, 123.7467], 12); // Centered on Bantayan Island

    // Add a tile layer (base map)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: ' '
    }).addTo(map);

    var marker; // Variable to store the user's marker
    var userLat, userLng; // Variables to store latitude and longitude

    // Function to get the user's location
    document.getElementById('getLocationBtn').addEventListener('click', function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                userLat = position.coords.latitude;
                userLng = position.coords.longitude;

                // Center the map on the user's location
                map.setView([userLat, userLng], 13);

                // If there's an existing marker, remove it
                if (marker) {
                    map.removeLayer(marker);
                }

                // Add a marker for the user's location
                marker = L.marker([userLat, userLng]).addTo(map)
                    .bindPopup('You are here!')
                    .openPopup();

                // Enable the submit button after getting the location
                document.getElementById('submitBtn').disabled = false;
            }, function() {
                alert('Unable to retrieve your location.');
            });
        } else {
            alert('Geolocation is not supported by this browser.');
        }
    });

    // Function to submit the name and household number
    document.getElementById('submitBtn').addEventListener('click', function() {
        var name = document.getElementById('name').value;
        var household = document.getElementById('household').value;

        // Check if both fields are filled
        if (name && household && userLat !== undefined && userLng !== undefined) {
            // Update the marker with the user's name and household number
            marker.setLatLng([userLat, userLng]); // Ensure the marker is at the user's location
            marker.bindPopup('Name: ' + name + '<br>Household Number: ' + household).openPopup();
        } else {
            alert('Please fill in both fields and get your location first.');
        }
    });
</script>

<?php include 'footer.php'; ?>
