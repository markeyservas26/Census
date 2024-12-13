<?php 
include 'header.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaflet Map</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 100vh; /* Full viewport height */
            width: 100%; /* Full width */
        }
        /* Style for the search box */
        .search-container {
            position: absolute;
            top: 80px;
            right: 10px;
            z-index: 1000;
            background-color: transparent;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .search-container input {
            width: 240px;
            padding: 5px;
            margin-right: 10px; /* Add space between input and icon */
        }
        .search-container button {
            background: none;
            border: none;
            cursor: pointer;
        }
        .search-container button i {
            font-size: 20px; /* Size of the search icon */
            color: #333;
        }
         /* Style for the 'x' clear button inside the input */
         .clear-btn {
            position: absolute;
            right: 55px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            font-size: 24px;
            font-weight: bold; /* Bold style */
            color: black;
        }
    </style>
</head>
<body>
    <div id="map"></div>
    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Search" />
        <button onclick="searchLocation()">
            <i class="fas fa-search"></i> <!-- Font Awesome Search Icon -->
        </button>
        <!-- Clear button (×) inside the input field -->
        <button class="clear-btn" onclick="clearSearch()">
            ×
        </button>
    </div>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        const map = L.map('map').setView([0, 0], 2);

        // Move the zoom control to the bottom right
        map.zoomControl.setPosition('bottomright');

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        const icons = {
            bantayan: L.icon({
                iconUrl: '../admin/assets/img/yellowicon.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
            }),
            madridejos: L.icon({
                iconUrl: '../admin/assets/img/blue.png',
                iconSize: [35, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
            }),
            santafe: L.icon({
                iconUrl: '../admin/assets/img/redicon.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
            })
        };

        let markers = []; // Array to store markers

        function loadMarkers() {
            fetch("get_people.php")
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        console.error("Error from server:", data.error);
                        alert("Error fetching household data: " + data.error);
                        return;
                    }

                    if (data.length > 0) {
                        const firstCoords = [parseFloat(data[0].latitude), parseFloat(data[0].longitude)];
                        map.setView(firstCoords, 13);

                        data.forEach(person => {
                            const personLat = parseFloat(person.latitude);
                            const personLng = parseFloat(person.longitude);
                            const municipality = person.municipality.toLowerCase();

                            if (!isNaN(personLat) && !isNaN(personLng)) {
                                const marker = L.marker([personLat, personLng], { 
                                    icon: icons[municipality] || icons.santafe
                                })
                                .addTo(map)
                                .bindPopup(`House Number: ${person.house_number}<br>Name: ${person.firstname} ${person.lastname}<br>Municipality: ${person.municipality}`);

                                marker.houseNumber = person.house_number;
                                marker.fullName = `${person.firstname} ${person.lastname}`;

                                markers.push(marker); // Store marker in the array
                            }
                        });
                    } else {
                        alert("No coordinates found in the database.");
                    }
                })
                .catch(error => console.error("Error fetching data:", error));
        }

        function searchLocation() {
            const query = document.getElementById("searchInput").value.toLowerCase();
            const foundMarker = markers.find(marker => 
                marker.houseNumber.toString().toLowerCase() === query || 
                marker.fullName.toLowerCase().includes(query)
            );

            if (foundMarker) {
                map.setView(foundMarker.getLatLng(), 15);
                foundMarker.openPopup();
            } else {
                alert("No results found for the entered house number or name.");
            }
        }

        function clearSearch() {
            document.getElementById("searchInput").value = ''; // Clear input field
        }

        function locateUser() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const lat = position.coords.latitude;
                        const lng = position.coords.longitude;
                        map.setView([lat, lng], 13);
                        loadMarkers();
                    },
                    () => {
                        alert("Geolocation access denied. Showing default location.");
                        loadMarkers();
                    }
                );
            } else {
                alert("Geolocation is not supported by this browser.");
                loadMarkers();
            }
        }

        locateUser();
    </script>
    <?php
    include 'footer.php';
    ?>
</body>
</html>
