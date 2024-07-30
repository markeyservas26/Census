<?php include 'header.php'; ?>
<main id="main" class="main">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <div id="map" style="height: 630px; "></div>
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
</script>

<?php include 'footer.php'; ?>
