<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Maps Locator</title>
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h2>Click on the map to get latitude and longitude</h2>
    <div id="map"></div>
    <p>Coordinates: <span id="coordinates">None</span></p>

    <script>
        function initMap() {
            // Initialize the map and set view to a starting location
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 10.0, lng: 122.0},
                zoom: 6
            });

            // Add a click listener to the map
            map.addListener('click', function(event) {
                var lat = event.latLng.lat();
                var lng = event.latLng.lng();
                document.getElementById('coordinates').textContent = 'Latitude: ' + lat + ', Longitude: ' + lng;
            });
        }
    </script>
    <!-- Load the Google Maps JavaScript API with your API key -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>
</body>
</html>
