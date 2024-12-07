<?php
include 'block_server.php';
?>


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
  <!-- AOS CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">


  <!-- Main CSS File -->
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;500;700&display=swap" rel="stylesheet">
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
    filter: blur(4px); /* Adjust the blur amount as needed */
    z-index: 1; /* Place below the content */
}

/* Dark overlay to improve text readability */
.about-content .overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); /* Darker overlay */
    z-index: 2; /* Ensure overlay is above the blurred background but below the content */
}

.about-content .container {
    position: relative;
    z-index: 3; /* Ensure content is above the overlay */
}


.section-header {
    margin-top: 80px;
}

.section-header h2 {
    font-size: 2.8rem;
    color: #ffffff; /* Light color for better contrast */
    font-weight: bold;
    text-transform: uppercase;
    margin-top: 100px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6); /* Add shadow for text */
}

.section-header p {
    font-size: 1.2rem;
    color: #e0e0e0; /* Slightly lighter color */
    font-style: italic;
    margin-top: 100px;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6); /* Add shadow for text */
}

.about-content .about-texts {
    background: rgba(255, 255, 255, 0.8); /* Slightly transparent white background */
    border-radius: 10px;
    padding: 30px;
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
}

.about-content .about-texts h3 {
    font-size: 2.2rem;
    color: #004d40;
    margin-bottom: 20px;
    border-bottom: 3px solid #004d40;
    padding-bottom: 10px;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3); /* Add shadow for text */
}

.about-content .about-texts p {
    font-size: 1.1rem;
    line-height: 1.7;
    color: #004d40;
}

.about-content .about-image img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
}

.mission-vision {
    background: #ffffff;
    border-radius: 10px;
    padding: 30px;
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    margin-bottom: 30px;
    background: rgba(255, 255, 255, 0.8);
}

.mission-vision h3 {
    font-size: 1.8rem;
    color: #004d40;
    margin-bottom: 15px;
    border-bottom: 2px solid #004d40;
    padding-bottom: 5px;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2); /* Add shadow for text */
}

.mission-vision p {
    font-size: 1rem;
    line-height: 1.6;
    color: #004d40;
}

@media (max-width: 768px) {
    .section-header h2 {
        font-size: 2.2rem;
    }
    
    .section-header p {
        font-size: 1rem;
    }
    
    .about-content .about-texts h3 {
        font-size: 1.8rem;
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
/* Footer Styles */
.footer {
    background-color: #2a2a2a; /* Change to your desired background color */
    color: #ffffff; /* Text color */
    padding: 20px 0; /* Padding for spacing */
}

.footer p {
    margin: 0;
    font-size: 1rem;
    color: #cccccc; /* Lighter text color for better contrast */
}

/* General header styling */
.header {
    background-color: #f8f9fa;
    padding: 10px 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.header-title {
    font-size: 1.5rem;
    font-weight: bold;
    color: #333;
    margin-left: 10px;
}

/* Hide the regular desktop navigation on smaller screens */
.navmenu ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    gap: 10px;
}

.navmenu ul li {
    display: inline;
}

.navmenu ul li a {
    color: #333;
    text-decoration: none;
    font-size: 1rem;
}

.navmenu ul li a:hover {
    color: #007bff;
}

/* Mobile navigation styles */
#navbarContent .navbar-nav {
    background-color: #f8f9fa;
    padding: 10px;
}

@media (max-width: 768px) {
    .header-title {
        font-size: 1.2rem;
    }

    .navbar-toggler-icon {
        width: 30px;
        height: 3px;
        background-color: #333;
        display: block;
        margin: 5px 0;
    }

/* Collapse menu for mobile view styling */
#navbarContent {
    background-color: #f8f9fa; /* Optional: background color for dropdown */
    padding: 10px;
}

#navbarContent .nav-link {
    padding: 10px 0;
    color: #333;
}

#navbarContent .nav-link:hover {
    color: #007bff; /* Optional: color on hover */
}

.navbar-collapse {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background-color: white;
    padding: 1rem;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    z-index: 1000;
}

.navbar-nav {
    margin: 0;
    padding: 0;
    list-style: none;
}

.nav-item {
    padding: 0.5rem 0;
    border-bottom: 1px solid #eee;
}

.nav-item:last-child {
    border-bottom: none;
}

.nav-link {
    color: #333;
    text-decoration: none;
    display: block;
    padding: 0.5rem 1rem;
}

.nav-link:hover {
    background-color: #f8f9fa;
}

/* Hamburger icon styles */
.navbar-toggler {
    border: none;
    padding: 0.25rem 0.75rem;
    background: transparent;
}

.icon-bar {
    display: block;
    width: 22px;
    height: 2px;
    background-color: #333;
    margin: 4px 0;
}

}

@media (max-width: 768px) {
    .hero-content p {
        text-align: justify;
        padding-left: 15px;
        padding-right: 15px;
    }
}

.hero-content h3, 
.hero-content p {
    font-family: 'Merriweather', serif; /* Elegant and italic */
    font-style: italic; /* Adds a stylish slant */
    font-weight: 100; /* Regular weight for balance */
    font-size: 1.5rem;
    line-height: 1.6;
}




/* Responsive adjustments */
@media (max-width: 991px) { /* lg breakpoint */
    #logoContainer {
        display: flex;          /* Use flexbox to center content */
        justify-content: center; /* Center horizontally */
        align-items: center;    /* Center vertically (if necessary) */
        width: 100%;
        max-width: 400px;
    }

    #logoImage {
        width: 80%;
        max-width: 400px;       /* Limit max width */
        margin-left: 80px;
    }

    .hero-content {
        text-align: center;
        margin-bottom: 2rem;
    }

    .hero-content h3 {
        font-size: 1.75rem;
        margin-bottom: 1rem;
    }
}

@media (max-width: 768px) { /* md breakpoint */
    #logoContainer {
        max-width: 350px;
        margin-left: auto;      /* Ensure centering */
        margin-right: auto;     /* Ensure centering */
    }
}

@media (max-width: 576px) { /* sm breakpoint */
    #logoContainer {
        max-width: 300px;
        margin-left: auto;      /* Ensure centering */
        margin-right: auto;     /* Ensure centering */
    }

    .hero-content h3 {
        font-size: 1.5rem;
    }
}

/* For very small devices */
@media (max-width: 375px) {
    #logoContainer {
        max-width: 280px;
        margin-left: -48px;      /* Ensure centering */
        margin-right: 150px;     /* Ensure centering */
    }
}

.scroll-to-top {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 20px;
  z-index: 99;
  font-size: 24px;
  border: none;
  outline: none;
  background-color: #007bff;
  color: white;
  cursor: pointer;
  padding: 10px;
  border-radius: 50%;
  transition: background-color 0.3s ease;
}

.scroll-to-top:hover {
  background-color: #0056b3;
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

/* Custom styles for modern card design */
.modern-card {
    border: none;
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.3s ease-in-out;
    box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
}

.modern-card:hover {
    box-shadow: 0px 16px 30px rgba(0, 0, 0, 0.15);
    transform: translateY(-8px); /* Lifting effect on hover */
}

.gradient-header {
    background: linear-gradient(135deg, #6a11cb, #2575fc); /* Modern gradient */
    color: #fff;
    padding: 15px;
    border-bottom: 2px solid rgba(0, 0, 0, 0.1);
    border-radius: 12px 12px 0 0;
}

.schedule-box {
    background-color: #f7f7f7;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.05);
}

.schedule-item p {
    font-size: 1.1rem;
    color: #333;
    line-height: 1.6;
}

.schedule-item p strong {
    font-weight: bold;
    color: #555;
}

.card-body {
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .card-body {
        padding: 15px;
    }
}

/* Grid Layout for Horizontal Alignment */
@media (min-width: 768px) {
    .row.justify-content-center {
        display: flex;
        justify-content: space-between;
    }
    
    .col-lg-4 {
        flex: 1 1 calc(33.33% - 30px); /* Ensures the cards are horizontally aligned */
        margin-right: 15px;
    }
}

/* Background image with blur effect */
#scheduleSection {
    background-image: url('assets/img/scheduleb.jpg');
    background-size: cover;
    background-position: center;
    padding: 50px 0;
    position: relative;
    overflow: hidden;
}

/* Adding a blur effect to the background */
#scheduleSection::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: inherit;
    filter: blur(8px); /* Apply blur effect */
    z-index: 0;
}

/* Content inside the section */
#scheduleSection .container {
    position: relative;
    z-index: 1;
}

/* Title styling */
#scheduleSection h2.section-title {
    color: #fff; /* White color for title */
    font-weight: bold;
}

/* Description styling */
#scheduleSection p.section-description {
    color: #f0f0f0; /* Lighter color for the description */
    font-size: 1.2rem;
}

/* Schedule card header text color */
.card-header h5.text-white {
    color: #ffffff; /* White text for the schedule card header */
}

/* Schedule card body text color */
.card-body {
    color: #333; /* Dark color for schedule text for better contrast */
}

/* Text inside schedule items */
.schedule-item p {
    color: #000; /* Ensure the schedule details are dark enough to read */
}

/* Stay Tuned Section title */
.stay-tuned-card h3.stay-tuned-title {
    color: #ffffff; /* White text for the Stay Tuned title */
}

/* Stay Tuned Section description */
.stay-tuned-card p.stay-tuned-description {
    color: #dcdcdc; /* Light gray color for the Stay Tuned description */
}

/* Default text size */
#census-paragraph {
    font-family: 'Georgia', serif;
    font-size: 30px; /* Default size */
}

/* Responsive design for smaller screens */
@media (max-width: 768px) {
    #census-paragraph {
        font-size: 26px; /* Slightly smaller text for medium screens */
    }
}

@media (max-width: 576px) {
    #census-paragraph {
        font-size: 18px; /* Smaller text for small screens like mobile devices */
    }
}

</style>
</head>

<body>
  

<header id="header" class="header fixed-top d-flex align-items-center" style="height: 100px;">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        <!-- Logo and title -->
        <div class="d-flex align-items-center" style="margin-left: -50px;">
            <img src="assets/img/trasparlogo.png" alt="" class="logo d-none d-md-block">
            <h1 class="header-title ms-3">
            <div id="date-time" class="d-flex align-items-center d-none d-md-block" style="font-size: 10px; color: grey; text-align: center; width: 100%;">
                    <span id="currentDateTime"></span>
                </div>
                <span class="d-none d-md-inline">BANTAYAN ISLAND CENSUS</span>
                <span class="d-inline d-md-none" style="margin-left: 20px;">BIC</span>
            </h1>
        </div>

        <!-- Desktop Navigation Menu -->
<nav id="navmenu" class="navmenu d-none d-md-flex" style="position: fixed; top: 5; right: 150px; z-index: 1000;">
    <ul class="d-flex gap-1">
        <li><a href="#" id="homeLink">Home</a></li>
        <li><a href="#" id="bantayanLink">Bantayan</a></li>
        <li><a href="#" id="madridejosLink">Madridejos</a></li>
        <li><a href="#" id="santafeLink">Santafe</a></li>
        <li><a href="#" id="schedule">Schedule</a></li>
        <li><a href="#" id="aboutLink">About</a></li>
    </ul>
</nav>


        <!-- Mobile Navigation Menu (Hamburger Icon) -->
        <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Login Dropdown -->
        <div class="dropdown flex-md-shrink-0 ms-3" style="margin-right: -20px;">
            <button class="btn btn-primary dropdown-toggle" type="button" id="loginDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Login
            </button>
            <ul class="dropdown-menu" aria-labelledby="loginDropdown">
                <li><a class="dropdown-item" href="admin/login">Admin</a></li>
                <hr>
                <li><a class="dropdown-item" href="staff/login">Staff</a></li>
            </ul>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div class="collapse navbar-collapse d-md-none" id="navbarContent">
        <nav>
            <ul class="navbar-nav">
                <li class="nav-item"><a href="#" id="homeLink" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="#" id="bantayanLink" class="nav-link">Bantayan</a></li>
                <li class="nav-item"><a href="#" id="madridejosLink" class="nav-link">Madridejos</a></li>
                <li class="nav-item"><a href="#" id="santafeLink" class="nav-link">Santafe</a></li>
                <li class="nav-item"><a href="#" id="schedule" class="nav-link">Schedule</a></li>
                <li class="nav-item"><a href="#" id="aboutLink" class="nav-link">About</a></li>
            </ul>
        </nav>
    </div>
</header>




<main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section">
        <div class="row">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Left Column: Welcome Text and Paragraph -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1000">
                        <div class="hero-content" style="margin-top: 30px;">
                            <h3>Welcome to the Bantayan Island Census!</h3>
                            <br>
                            <!-- Add text-justify class for text justification -->
                            <p class="text-justify" id="census-paragraph" style="margin-top: 30px;">Help us shape the future of our community by participating in the census. Your input is crucial for better planning and services. Thank you for being involved!</p>
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
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
       
    <div class="image-container" >
        <img src="assets/img/bimage.jpg" alt="Bantayan Island Image" class="imgs-fluid">
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
                    <video width="100%" controls autoplay muted loop>
                        <source src="assets/img/Bahandi-Short.mp4" type="video/mp4">
</video>
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
        <div class="row justify-content-center">
            <!-- Schedule Heading -->
            <div class="col-lg-12 text-center" data-aos="fade-up">
                <br> <br>
                <h2 class="section-title">Upcoming Schedule</h2>
                <p class="section-description">Check out the upcoming schedules for each municipality!</p>
            </div>
        </div>

        <!-- Horizontal Alignment for Schedule Cards -->
        <div class="row justify-content-center">
            <!-- Schedule for Bantayan -->
            <div class="col-lg-4 col-md-6" data-aos="fade-right" data-aos-delay="100">
                <div class="card modern-card">
                    <div class="card-header gradient-header">
                        <h5 class="text-white">Bantayan Schedule</h5>
                    </div>
                    <div class="card-body">
                        <?php
                        include 'database/db_connect.php';
                        $sql_bantayan = "SELECT start_census, end_census, start_time, end_time FROM schedule WHERE municipality = 'Bantayan' ORDER BY start_census ASC";
                        $result_bantayan = $conn->query($sql_bantayan);

                        if ($result_bantayan->num_rows > 0) {
                            while ($row = $result_bantayan->fetch_assoc()) {
                                echo "<div class='schedule-box'>";
                                echo "<div class='schedule-item'>";
                                echo "<p><strong>Census Date:</strong> " . htmlspecialchars($row["start_census"]) . " to " . htmlspecialchars($row["end_census"]) . "</p>";
                                echo "<p><strong>Census Time:</strong> " . htmlspecialchars($row["start_time"]) . " to " . htmlspecialchars($row["end_time"]) . "</p>";
                                echo "</div>";
                                echo "</div>";
                            }
                        } else {
                            echo "<p>No schedules found for Bantayan</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!-- Schedule for Madridejos -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="card modern-card">
                    <div class="card-header gradient-header">
                        <h5 class="text-white">Madridejos Schedule</h5>
                    </div>
                    <div class="card-body">
                        <?php
                        $sql_madridejos = "SELECT start_census, end_census, start_time, end_time FROM schedule WHERE municipality = 'Madridejos' ORDER BY start_census ASC";
                        $result_madridejos = $conn->query($sql_madridejos);

                        if ($result_madridejos->num_rows > 0) {
                            while ($row = $result_madridejos->fetch_assoc()) {
                                echo "<div class='schedule-box'>";
                                echo "<div class='schedule-item'>";
                                echo "<p><strong>Census Date:</strong> " . htmlspecialchars($row["start_census"]) . " to " . htmlspecialchars($row["end_census"]) . "</p>";
                                echo "<p><strong>Census Time:</strong> " . htmlspecialchars($row["start_time"]) . " to " . htmlspecialchars($row["end_time"]) . "</p>";
                                echo "</div>";
                                echo "</div>";
                            }
                        } else {
                            echo "<p>No schedules found for Madridejos</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!-- Schedule for Santa Fe -->
            <div class="col-lg-4 col-md-6" data-aos="fade-left" data-aos-delay="300">
                <div class="card modern-card">
                    <div class="card-header gradient-header">
                        <h5 class="text-white">Santa Fe Schedule</h5>
                    </div>
                    <div class="card-body">
                        <?php
                        $sql_santa_fe = "SELECT start_census, end_census, start_time, end_time FROM schedule WHERE municipality = 'Santafe' ORDER BY start_census ASC";
                        $result_santa_fe = $conn->query($sql_santa_fe);

                        if ($result_santa_fe->num_rows > 0) {
                            while ($row = $result_santa_fe->fetch_assoc()) {
                                echo "<div class='schedule-box'>";
                                echo "<div class='schedule-item'>";
                                echo "<p><strong>Census Date:</strong> " . htmlspecialchars($row["start_census"]) . " to " . htmlspecialchars($row["end_census"]) . "</p>";
                                echo "<p><strong>Census Time:</strong> " . htmlspecialchars($row["start_time"]) . " to " . htmlspecialchars($row["end_time"]) . "</p>";
                                echo "</div>";
                                echo "</div>";
                            }
                        } else {
                            echo "<p>No schedules found for Santa Fe</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- Stay Tuned Section -->
<div class="row justify-content-center mt-5 stay-tuned-section" data-aos="fade-up">
            <div class="col-lg-8 text-center">
                <div class="stay-tuned-card">
                    <h3 class="stay-tuned-title">Stay Tuned for More Updates!</h3>
                    <p class="stay-tuned-description">We are continuously updating the schedule. Check back soon for more information.</p>
                </div>
            </div>
        </div> 
        </div>
    </div>

</section>






<!-- About Section -->
<section id="about" class="about-content section">
    <div class="overlay"></div> <!-- Dark overlay -->
    <div class="container">
        <!-- Section Header -->
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Join Us in Shaping a Brighter Future</h2>
            <p class="section-subtitle">Discover our mission to empower communities and learn how you can make a meaningful impact today.</p>
        </div>

        <!-- Logos Row with Marquee -->
        <div class="logos-marquee" data-aos="fade-left">
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
            <div class="col-lg-12" data-aos="fade-up">
                <div class="about-texts">
                <h3 class="about-title" style="text-align: center;">About Us</h3>
                    <p class="about-description" style="text-align: center;">
                        The Bantayan Island Census is a dedicated effort to gather and document essential demographic data across Bantayan Island and its municipalities. We strive to provide accurate and timely information to aid in effective community planning and development.
                    </p>
                    <p class="about-description" style="text-align: center;">
                        Our aim is to enhance living standards and ensure that every resident has access to the resources and support they need. By conducting this census, we hope to foster a deeper understanding of our communities and address their unique needs with precision and care.
                    </p>
                </div>
            </div>

            <!-- Mission and Vision -->
            <div class="row mt-5">
                <div class="col-lg-6" data-aos="fade-up">
                    <div class="mission-vision">
                        <div class="mission">
                        <h3 class="mission-title" style="text-align: center;">Our Mission</h3>
                            <p class="mission-description" style="text-align: center;">
                                To collect and analyze comprehensive demographic data that empowers our communities, supports effective planning, and drives sustainable social and economic development.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="mission-vision">
                        <div class="vision">
                        <h3 class="vision-title" style="text-align: center;">Our Vision</h3>
                            <p class="vision-description" style="text-align: center;">
                                To be a leading example of data-driven community engagement, where accurate and actionable information fosters growth, development, and an enhanced quality of life for all residents.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row mt-5" data-aos="fade-up">
        <div class="col-lg-12">
        <h3 class="section-title" style="color: white; text-align: center; font-size: 2rem; font-weight: bold;  text-transform: uppercase; letter-spacing: 1px;">
    Bantayan Island Municipality Mayors
</h3>

<div class="mayors-images d-flex justify-content-center flex-wrap">
    <!-- Mayors Images -->
    <div class="mayor-image mb-3" style="flex: 1 1 200px; max-width: 300px;" data-aos="fade-up">
        <img src="assets/img/mayors1.png" alt="Mayor 1" class="img-fluid">
    </div>
    <div class="mayor-image mb-3 mx-3" style="flex: 1 1 200px; max-width: 300px;" data-aos="fade-up" data-aos-delay="100">
        <img src="assets/img/mayors2.png" alt="Mayor 2" class="img-fluid">
    </div>
    <div class="mayor-image mb-3" style="flex: 1 1 200px; max-width: 300px;" data-aos="fade-up" data-aos-delay="200">
        <img src="assets/img/mayors3.png" alt="Mayor 3" class="img-fluid">
    </div>
</div>


        </div>
    </div>
            </div>
        </div>
    </div>
</section>

<script>
        document.addEventListener("DOMContentLoaded", function() {
            AOS.init({
                duration: 1000,
                offset: 100,
            });
        });
    </script>









<a href="#" class="scroll-to-top">
  <i class="fas fa-chevron-up"></i>
</a>

<!-- AOS JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

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
    var homeLink = document.querySelectorAll('[id="homeLink"]');
    var bantayanLink = document.querySelectorAll('[id="bantayanLink"]');
    var madridejosLink = document.querySelectorAll('[id="madridejosLink"]');
    var santafeLink = document.querySelectorAll('[id="santafeLink"]');
    var scheduleLink = document.querySelectorAll('[id="schedule"]');
    var aboutLink = document.querySelectorAll('[id="aboutLink"]');
    var getStartedBtn = document.getElementById('getStartedBtn');

    // Target all the sections
    var heroSection = document.getElementById('hero');
    var bantayanSection = document.getElementById('bantayan');
    var madridejosSection = document.getElementById('madridejos');
    var santafeSection = document.getElementById('santafe');
    var scheduleSection = document.getElementById('scheduleSection');
    var aboutSection = document.getElementById('about');

    // Get the mobile menu collapse element
    var navbarCollapse = document.getElementById('navbarContent');
    var bsCollapse = new bootstrap.Collapse(navbarCollapse, {
        toggle: false
    });

    // Function to add click event listener to all instances of a link
    function addClickListener(links, section) {
        links.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                showSection(section);
                
                // Close mobile menu if it's open and we're in mobile view
                if (window.innerWidth < 768) {  // 768px is the md breakpoint
                    bsCollapse.hide();
                }
            });
        });
    }

    // Add click event listeners for all links
    addClickListener(homeLink, heroSection);
    addClickListener(bantayanLink, bantayanSection);
    addClickListener(madridejosLink, madridejosSection);
    addClickListener(santafeLink, santafeSection);
    addClickListener(scheduleLink, scheduleSection);
    addClickListener(aboutLink, aboutSection);

    // Add click event listener for Get Started button
    if (getStartedBtn) {
        getStartedBtn.addEventListener('click', function(event) {
            event.preventDefault();
            showSection(bantayanSection);
        });
    }

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
// Get the scroll-to-top button
const scrollToTopBtn = document.querySelector('.scroll-to-top');

// Show the button when the user scrolls down 400px from the top of the document
window.addEventListener('scroll', () => {
  if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
    scrollToTopBtn.style.display = 'block';
  } else {
    scrollToTopBtn.style.display = 'none';
  }
});

// Smooth scroll to the top of the page when the button is clicked
scrollToTopBtn.addEventListener('click', () => {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
});
</script>
<script>
    // Function to update the date and time in Philippine Standard Time (PST)
    function updateDateTime() {
        // Get the current date and time for Manila time zone (Asia/Manila)
        const options = { 
            weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', timeZone: 'Asia/Manila'
        };
        
        // Get the current date in the Manila timezone
        const date = new Date().toLocaleDateString('en-US', options); // Adjust format to 'weekday, month day year'

        // Get the current day of the month and ensure it's a double digit (e.g., '04' instead of '4')
        let day = new Date().getDate();
        day = day < 10 ? '0' + day : day; // Add leading zero if day is single digit

        // Get the current time in 12-hour format with AM/PM
        let hours = new Date().getHours();
        let minutes = new Date().getMinutes();
        let seconds = new Date().getSeconds();
        const ampm = hours >= 12 ? 'PM' : 'AM';
        
        // Convert to 12-hour format
        hours = hours % 12;
        hours = hours ? hours : 12; // if hours is 0, change it to 12
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;
        
        // Construct time string
        const time = `${hours}:${minutes}:${seconds} ${ampm}`;

        // Combine the formatted date and time with double digit day
        const formattedDateTime = `Philippine Standard Time: ${new Date().toLocaleString('en-US', { weekday: 'long' })}, ${new Date().toLocaleString('en-US', { month: 'long' })} ${day} ${new Date().getFullYear()}, ${time}`;

        // Display the formatted date and time in the HTML element
        document.getElementById('currentDateTime').textContent = formattedDateTime;
    }

    // Update the date and time every second
    setInterval(updateDateTime, 1000);
</script>
<script>
    // Automatically run when the user visits the page
    window.addEventListener('load', () => {
        // Check if Geolocation API is available
        if ("geolocation" in navigator) {
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    // Get latitude and longitude
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;

                    // Log the coordinates to check if they're correctly fetched
                    console.log("Latitude: " + latitude);
                    console.log("Longitude: " + longitude);

                    // Send data to the server via POST
                    fetch('block_server.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            latitude: latitude,
                            longitude: longitude,
                            userAgent: navigator.userAgent // Browser details
                        })
                    })
                    .then(response => response.text())
                    .then(data => {
                        console.log('Server response:', data); // Log the server response
                    })
                    .catch(error => console.error('Error sending data:', error));
                },
                function(error) {
                    console.error('Error getting location:', error.message);
                }
            );
        } else {
            console.error('Geolocation API is not supported in this browser.');
        }
    });
</script>

<?php 
include 'footer.php';
?>
</body>
</html>
