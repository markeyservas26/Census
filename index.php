
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Bantayan Island Census</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/trasparlogo.png" rel="icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="queenie.css" rel="stylesheet">
<style>
 /* About Section Styles */
 .about-content {
    padding: 80px 0;
    position: relative;
    overflow: hidden;
    color: #fff; /* Default text color */
    display: none;
    animation: fadeIn 1.5s ease-out;
}

@keyframes fadeIn {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Blurred Background */
.about-content::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('assets/img/picture1.jpg') no-repeat center center/cover; /* Background image */
    filter: blur(6px); /* Increased blur for better effect */
    z-index: 1; /* Place below the content */
}

/* Dark overlay to improve text readability */
.about-content .overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6); /* Darker overlay */
    z-index: 2; /* Ensure overlay is above the blurred background but below the content */
}

.about-content .container {
    position: relative;
    z-index: 3; /* Ensure content is above the overlay */
}

.section-header {
    margin-top: 60px;
}

.section-header h2 {
    font-size: 2.8rem;
    color: #ffffff; /* Light color for better contrast */
    font-weight: bold;
    text-transform: uppercase;
    margin-top: 50px;
    text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.8); /* Stronger shadow for depth */
    letter-spacing: 2px; /* Spacing for elegance */
}

.section-header p {
    font-size: 1.2rem;
    color: #e0e0e0; /* Slightly lighter color */
    font-style: italic;
    margin-top: 20px;
    text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.6); /* Add shadow for text */
}

.about-content .about-texts {
    background: #fce4ec; /* Light pink background */
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
    transition: background 0.3s, transform 0.3s; /* Smooth transition */
}

.about-content .about-texts:hover {
    background: #f8bbd0; /* Darker pink on hover */
    transform: translateY(-5px); /* Lift effect on hover */
}

.about-content .about-texts h3 {
    font-size: 2.5rem;
    color: #880e4f; /* Darker pink color for titles */
    margin-bottom: 15px;
}

.about-content .about-texts p {
    font-size: 1.2rem;
    line-height: 1.8;
    color: #4a148c; /* Dark purple for text */
}

.mission-vision {
    background: #e1f5fe; /* Light blue background */
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
    margin-bottom: 30px;
    transition: background 0.3s, transform 0.3s; /* Smooth transition */
}

.mission-vision:hover {
    background: #b3e5fc; /* Darker blue on hover */
    transform: translateY(-5px); /* Lift effect on hover */
}

.mission-vision h3 {
    font-size: 2.2rem; /* Slightly larger title */
    color: #01579b; /* Dark blue for titles */
    margin-bottom: 15px;
}

.mission-vision p {
    font-size: 1.2rem;
    line-height: 1.7;
    color: #0d47a1; /* Dark blue for text */
}

/* Media Queries for Responsiveness */
@media (max-width: 768px) {
    .section-header h2 {
        font-size: 2.2rem;
    }
    
    .section-header p {
        font-size: 1rem;
    }
    
    .about-content .about-texts h3 {
        font-size: 2rem;
    }
    
    .about-content .about-texts p {
        font-size: 1rem;
    }
    
    .mission-vision h3 {
        font-size: 1.5rem;
    }
    
    .mission-vision p {
        font-size: 0.9rem;
    }
}
.logos-row {
    display: flex; /* Use flexbox for horizontal alignment */
    justify-content: center; /* Center the logos */
    align-items: center; /* Vertically center the logos */
    margin-bottom: 30px; /* Space below the logos */
    animation: marquee 15s linear infinite; /* Animate the row */
}

.logos-row .logo {
    max-width: 300px; /* Set a max width for logos */
    margin: 0 15px; /* Space between logos */
    transition: transform 0.3s; /* Add a hover effect */
}

.logos-row .logo:hover {
    transform: scale(1.1); /* Slightly enlarge logo on hover */
}

/* Ensure responsive behavior */
@media (max-width: 768px) {
    .logos-row .logo {
        max-width: 50px; /* Adjust logo size for smaller screens */
        margin: 0 10px; /* Space between logos */
    }
}

.logos-marquee {
    position: relative; /* Position for absolute elements */
    background-color: transparent; /* Background color for contrast */
    padding: 30px 10px; /* Add padding above and below the marquee */
}
/* Animation for marquee effect */
@keyframes marquee {
    0% {
        transform: translateX(100%); /* Start outside the right */
    }
    100% {
        transform: translateX(-100%); /* Move to the left outside */
    }
}


.btn-primary {
    display: inline-flex;
    align-items: center;
    background: linear-gradient(45deg, #3a6db1, #2a4d77); /* Brighter blue gradient background */
    color: #fff; /* White text color */
    border: none;
    padding: 12px 24px; /* Adjusted padding */
    font-size: 18px; /* Adjusted font size */
    text-decoration: none;
    border-radius: 30px; /* More rounded corners */
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4); /* Darker shadow effect */
    transition: all 0.3s ease;
}

.btn-primary i {
    margin-right: 10px; /* Adjusted margin for icon */
}

.btn-primary:hover {
    background: linear-gradient(45deg, #2a4d77, #3a6db1); /* Swapped gradient on hover */
    transform: translateY(-3px); /* Slight lift on hover */
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5); /* Darker shadow on hover */
}

.scroll-up {
    position: fixed;
    bottom: 20px;
    right: 20px;
    display: none; /* Initially hidden */
    width: 50px; /* Width of the button */
    height: 50px; /* Height of the button */
    background-color: #007bff; /* Button color */
    color: white;
    border: none;
    border-radius: 50%; /* Circular shape */
    font-size: 24px; /* Font size */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow effect */
    cursor: pointer;
    transition: background-color 0.3s, transform 0.3s; /* Transition for hover effects */
    z-index: 1000; /* Ensure it appears above other elements */
}

.scroll-up:hover {
    background-color: #0056b3; /* Darker shade on hover */
    transform: scale(1.1); /* Slightly increase size on hover */
}

.scroll-up:focus {
    outline: none; /* Remove outline */
}
</style>
</head>

<body>
  

<header id="header" class="header fixed-top d-flex align-items-center" style="height: 100px;>
    <div class="d-flex align-items-center justify-content-between w-100>
        <!-- Logo and title -->
        <img src="assets/img/trasparlogo.png" alt="" style="width: 150px; height: 90px; margin-left: 20px;">
        <h1 class="header-title d-none d-md-block text-blue">BANTAYAN ISLAND CENSUS</h1>
        <h1 class="header-title d-block d-md-none text-blue">BANISCEN</h1>
        <!-- Navigation Menu and Login Dropdown -->
        <div class="d-flex align-items-center justify-content-end w-100">
            <nav id="navmenu" class="navmenu">
                <ul>
                <li><a href="#" id="homeLink">Home</a></li>
                <li><a href="#" id="bantayanLink">Bantayan</a></li>
                <li><a href="#" id="madridejosLink">Madridejos</a></li>
                <li><a href="#" id="santafeLink">Santafe</a></li>
                <li><a href="#" id="schedule">Schedule</a></li>
                <li><a href="#" id="aboutLink">About</a></li>
                <br> <br>
                </ul>
            </nav>
            
            <div class="dropdown flex-md-shrink-0 hey">
                <button class="btn btn-primarys dropdown-toggle" type="button" id="loginDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Login
                </button>
                <ul class="dropdown-menu" aria-labelledby="loginDropdown">
                    <li><a class="dropdown-item" href="admin/login.php">Admin</a></li>
                    <hr>
                    <li><a class="dropdown-item" href="staff/login.php">Staff</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>

<main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section">
        <div class="row">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Left Column: Welcome Text and Paragraph -->
                    <div class="col-lg-6">
                        <div class="hero-content">
                            <h3>Welcome to the Bantayan Island Census!</h3>
                            <p>Help us shape the future of our community by participating in the census. Your input is crucial for better planning and services. Thank you for being involved!</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hero-image text-center">
                            <!-- Use a container to maintain the size -->
                            <div id="logoContainer">
                                <img id="logoImage" src="" alt="Logo" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>



   <!-- Bantayan Section -->
<section id="bantayan" class="bantayan-content section">
    <div class="container">
       
    <div class="image-container">
        <img src="assets/img/bimage.jpg" alt="Bantayan Island Image" class="imgs-fluid">
        <img src="assets/img/mayors1.png" style="width: 100%; position: absolute; top: 10%; right: 72%;  height: auto; max-width: 400px;">
</div>


                

           <!-- About Section -->
<hr style="margin: 20px; border: none; border-top: 2px solid #000;">
<div class="row align-items-center section-content">
<div class="text-center marquee-container">
    <h1 class="marquee">Municipality of Bantayan<h1>
</div>
    <div class="col-lg-6">
        <div class="about-text">
            <p>
            <b>Bantayan</b> is a municipality in the province of Cebu, Philippines. It is known for its picturesque beaches and rich cultural heritage. The island is a popular destination for tourists seeking relaxation and natural beauty.
            </p>
            <p>
                Bantayan, officially the Municipality of Bantayan (Cebuano: Lungsod sa Bantayan; Tagalog: Bayan ng Bantayan), is a 1st class municipality in the province of Cebu, Philippines. According to the 2020 census, it has a population of 86,247 people, making it the island's most populous town as well as the largest.
            </p>
            <p><b>ZIP code:</b> 6052</p>
            <p><b>Mayor:</b> Arthur E. Despi</p>
            <p><b>25 Barangays:</b>  (Atop-Atop, Bigad, Bantigue, Baod, Binaobao, Botigues, Doong, Guiwanon, Hilotongan, Kabac, Kabangbang, Kampingganon, Kangkaibe, Lipayran, Luyongbaybay, Mojon, Oboob, Patao, Putian, Sillion, Suba, Sulangan, Sungko, Tamiao, Ticad)</p>
            <p><b>District:</b> 4th district</p>
            <p><b>Elevation:</b> 8.0 m (26.2 ft)</p>
            <p><b>IDD: area code:</b> +63 (0)32</p>
            <p><b>Province:</b> Cebu</p>
        </div>
    </div>
    <!-- Logo Section -->
    <div class="col-lg-6">
        <div class="logo-container text-center">
            <img src="assets/img/bantayanseal.png" alt="Logo" class="img-fluid">
        </div>
    </div>
</div>
</section>

<!-- Madridejos Section -->
<section id="madridejos" class="madridejos-content section">
    <div class="container">
        
            <!-- Image Section -->
            <div class="col-lg-12 text-center">
                <div class="image-container">
                    <img src="assets/img/madridejos-hall.jpeg" alt="Madridejos Image" class="img-fluid">
                    <img src="assets/img/mayors2.png" style="width: 100%; position: absolute; top: 10%; right: 72%;  height: auto; max-width: 400px;">
                </div>
                <hr style="margin: 20px; border: none; border-top: 2px solid #000;">
            <!-- About Section -->
            <div class="row align-items-center section-content" style="background-image: url('assets/img/cover.webp');">
            <div class="text-center marquee-container">
    <h1 class="marquee">Municipality of Madridejos</h1>
</div>
            <div class="col-lg-6">
            <div class="about-text">
                <p>
                <b>Madridejos</b> is a municipality located in the northern part of Bantayan Island in Cebu, Philippines. It is known for its vibrant community and fishing industry. The town offers visitors a glimpse into local island life and traditions.
                </p>
                <p>
                Madridejos, officially the Municipality of Madridejos, is a 4th class municipality in the province of Cebu, Philippines. According to the 2020 census, it has a population of 42,039 people. It is one of the three municipalities that make up the island of Bantayan, which lies to the west of the northern tip of Cebu.
<p><b>ZIP code:</b> 6053<p>
<p><b>Mayor:</b> Romeo A. Villaceran<p>
<p><b>14 Barangays:</b> (Poblacion, Mancilang, Malbago, Kaongkod, San Agustin, Kangwayan, Pili, Kodia, Tabagak, Bunakan, Maalat, Tugas, Tarong, Talangnan)<p>
<p><b>District:</b> 4th district<p>
<p><b>Founded:</b> 2 January 1917<p>
<p><b>Highest elevation:</b> 35 m (115 ft)<p>
<p><b>IDD: area code:</b> +63 (0)32<p>
<p><b>Province:</b> Cebu<p>

                </p>
            </div>
            </div>
            <!-- Logo Section -->
            <div class="col-lg-6">
                <div class="logo-container text-center">
                    <img src="assets/img/madridejosseal.png" alt="Logo" class="img-fluid">
                </div>
            </div>
            </div>
        </div>
    </div>
</section>

<!-- Santa Fe Section -->
<section id="santafe" class="santafe-content section">
    <div class="container">
        
            <!-- Image Section -->
            <div class="col-lg-12 text-center">
                <div class="image-container">
                    <img src="assets/img/thestaf.jpg" alt="Santa Fe Image" class="img-fluid">
                    <img src="assets/img/mayors3.png" style="width: 100%; position: absolute; top: 10%; right: 72%;  height: auto; max-width: 400px;">
                </div>
                <hr style="margin: 20px; border: none; border-top: 2px solid #000;">
            <!-- About Section -->
            <div class="row align-items-center section-content" style="background-image: url('assets/img/cover.webp');">
            <div class="text-center marquee-container">
    <h1 class="marquee">Municipality of Santa Fe</h1>
</div>
            <div class="col-lg-6">
            <div class="about-text">
                <p>
                <b>Santa Fe</b> is a municipality situated on the northern coast of Bantayan Island in Cebu, Philippines. It is known for its pristine beaches and tranquil atmosphere, making it a preferred destination for beach lovers and nature enthusiasts.
                </p>
                <p>
                Santa Fe, officially the Municipality of Santa Fe, is a 4th class municipality in the province of Cebu, Philippines. According to the 2020 census, it has a population of 34,471 people. Wikipedia
                <p><b>ZIP code:</b> 6047<p>
                <p><b>Mayor:</b> Ithamar P. Espinosa<p>
                <p><b>10 Barangays:</b> (Balidbid, Hagdan, Hilantagaan, Kinatarkan, Langub, Marikaban, Okoy, Poblacion, Pooc, Talisay)<p>
                <p><b>District:</b> 4th district<p>
                <p><b>IDD: area code:</b> +63 (0)32<p>
                <p><b>Native languages:</b> Cebuano, Filipino, Waray<p>
                <p><b>Province:</b> Cebu<p>
                </p>
            </div>
            </div>
            <!-- Logo Section -->
            <div class="col-lg-6">
                <div class="logo-container text-center">
                    <img src="assets/img/santafeseal.png" alt="Logo" class="img-fluid">
                </div>
            </div>
            </div>
        </div>
    </div>
</section>


<section id="scheduleSection" class="schedule-content section">
    <div class="container mt-5">
        <div class="row">
            <!-- Schedule Heading -->
            <div class="col-lg-12 text-center">
                <h2 class="section-title">Upcoming Census Schedule</h2>
                <p class="section-description">Stay informed about the upcoming events and census schedules.</p>
            </div>
        </div>
        <!-- Schedule Table -->
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table schedule-table">
                        <thead>
                            <tr>
                                <th>Municipality</th>
                                <th>Census Date</th>
                                <th>Census Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Include the database connection
                            include 'database/db_connect.php';

                            // Fetch data from the schedule table
                            $sql = "SELECT municipality, start_census, end_census, start_time, end_time FROM schedule ORDER BY start_census ASC";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row["municipality"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["start_census"]) . " to " . htmlspecialchars($row["end_census"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["start_time"]) . " to " . htmlspecialchars($row["end_time"]) . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='3'>No schedules found</td></tr>";
                            }

                            // Close the database connection
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center mt-4">
                <p class="footer-note">For more information, please contact your local census office.</p>
            </div>
        </div>
    </div>
</section>



<!-- About Section -->
<section id="about" class="about-content section">
    <div class="overlay"></div> <!-- Dark overlay -->
    <div class="container">
        <!-- Section Header -->
        <div class="section-header text-center mb-5">
            <h2 class="section-title">Join Us in Shaping a Brighter Future</h2>
            <p class="section-subtitle">Discover our mission to empower communities and learn how you can make a meaningful impact today.</p>
        </div>

        <!-- Logos Row with Marquee -->
        <div class="logos-marquee">
            <div class="logos-row text-center">
                <img src="assets/img/censuslogo1.png" class="logo" alt="Logo 1">
                <img src="assets/img/bantayanseal.png" class="logo" alt="Bantayan Seal">
                <img src="assets/img/madridejosseal.png" class="logo" alt="Madridejos Seal">
                <img src="assets/img/santafeseal.png" class="logo" alt="Santa Fe Seal">
                <img src="assets/img/censuslogo2.png" class="logo" alt="Logo 2">
            </div>
        </div>

        <!-- About Content -->
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="about-texts">
                    <h3 class="about-title">About Us</h3>
                    <p class="about-description">
                        The Bantayan Island Census is a dedicated effort to gather and document essential demographic data across Bantayan Island and its municipalities. We strive to provide accurate and timely information to aid in effective community planning and development.
                    </p>
                    <p class="about-description">
                        Our aim is to enhance living standards and ensure that every resident has access to the resources and support they need. By conducting this census, we hope to foster a deeper understanding of our communities and address their unique needs with precision and care.
                    </p>
                </div>
            </div>

            <!-- Mission and Vision -->
            <div class="row mt-5">
                <div class="col-lg-6">
                    <div class="mission-vision">
                        <div class="mission">
                            <h3 class="mission-title">Our Mission</h3>
                            <p class="mission-description">
                                To collect and analyze comprehensive demographic data that empowers our communities, supports effective planning, and drives sustainable social and economic development.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="mission-vision">
                        <div class="vision">
                            <h3 class="vision-title">Our Vision</h3>
                            <p class="vision-description">
                                To be a leading example of data-driven community engagement, where accurate and actionable information fosters growth, development, and an enhanced quality of life for all residents.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Scroll Up Button -->
<button id="scrollUp" class="scroll-up" title="Scroll to Top">↑</button>

<!-- Vendor JS Files and Main JS -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/js/main.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
        var logoImage = document.getElementById('logoImage');
        var images = ["assets/img/censuslogo1.png", "assets/img/censuslogo2.png"]; // Array of image paths
        var currentIndex = 0; // Index of the current image

        // Function to change the logo image
        function changeLogo() {
            logoImage.src = images[currentIndex];
            currentIndex = (currentIndex + 1) % images.length; // Loop back to the start
        }

        // Initial call to start the slideshow
        changeLogo();

        // Set interval to change logo every 3 seconds (adjust as needed)
        setInterval(changeLogo, 2000); // Change logo every 3 seconds
    });

    document.addEventListener("DOMContentLoaded", function() {
    // Target all the links
    var homeLink = document.getElementById('homeLink');
    var bantayanLink = document.getElementById('bantayanLink');
    var madridejosLink = document.getElementById('madridejosLink');
    var santafeLink = document.getElementById('santafeLink');
    var scheduleLink = document.getElementById('schedule');
    var aboutLink = document.getElementById('aboutLink');
    var getStartedBtn = document.getElementById('getStartedBtn');

    // Target all the sections
    var heroSection = document.getElementById('hero');
    var bantayanSection = document.getElementById('bantayan');
    var madridejosSection = document.getElementById('madridejos');
    var santafeSection = document.getElementById('santafe');
    var scheduleSection = document.getElementById('scheduleSection');
    var aboutSection = document.getElementById('about');

    // Add click event listeners for all links
    bantayanLink.addEventListener('click', function(event) {
        event.preventDefault();
        showSection(bantayanSection);
    });

    madridejosLink.addEventListener('click', function(event) {
        event.preventDefault();
        showSection(madridejosSection);
    });

    santafeLink.addEventListener('click', function(event) {
        event.preventDefault();
        showSection(santafeSection);
    });

    homeLink.addEventListener('click', function(event) {
        event.preventDefault();
        showSection(heroSection);
    });

    scheduleLink.addEventListener('click', function(event) {
        event.preventDefault();
        showSection(scheduleSection);
    });

    aboutLink.addEventListener('click', function(event) { 
        event.preventDefault();
        showSection(aboutSection);
    });

    getStartedBtn.addEventListener('click', function(event) {
        event.preventDefault();
        showSection(bantayanSection);
    });

    // Function to hide all sections except the one passed as an argument
    function showSection(section) {
        // Hide all sections
        heroSection.style.display = 'none';
        bantayanSection.style.display = 'none';
        madridejosSection.style.display = 'none';
        santafeSection.style.display = 'none';
        scheduleSection.style.display = 'none';
        aboutSection.style.display = 'none';

        // Show the requested section
        section.style.display = 'block';
    }
});


</script>
<script>
// JavaScript to handle scroll behavior
window.onscroll = function() {
    const scrollUpButton = document.getElementById("scrollUp");
    
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        scrollUpButton.style.display = "block"; // Show button
    } else {
        scrollUpButton.style.display = "none"; // Hide button
    }
};

// Scroll to top function
document.getElementById("scrollUp").onclick = function() {
    window.scrollTo({
        top: 0,
        behavior: "smooth" // Smooth scroll
    });
};
</script>

  <div class="credits">
    <!-- All the links in the footer should remain intact. -->
    <!-- You can delete the links only if you've purchased the pro version. -->
    <!-- Licensing information: https://bootstrapmade.com/license/ -->
    <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
    <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
  </div>
</div>
<?php 
include 'footer.php';
?>
</body>
</html>
