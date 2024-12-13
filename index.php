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
    .highlight {
    background-color: yellow;
    font-weight: bold;
}


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
<style>
    /* Normal header (when at the top) */
.header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 999;
    backdrop-filter: blur(10px); /* This creates the blur effect */
    background-color: rgba(255, 255, 255, 0.5); /* Transparent background */
    transition: background-color 0.3s, backdrop-filter 0.3s; /* Smooth transition */
    color: white; /* White text color when at the top */
}

/* Scrolled header (when user scrolls down) */
.header.scrolled {
    background-color: #343a40; /* Original background color */
    backdrop-filter: none; /* No blur effect */
    color: white; /* Keep text white */
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
                <span class="d-inline d-md-none" style="margin-left: 20px;">B.I.Census</span>
            </h1>
        </div>

        <!-- Desktop Navigation Menu -->
        <nav id="navmenu" class="navmenu d-none d-md-flex" style="position: fixed; top: 5; right: 150px; z-index: 1000;">
    <ul class="d-flex gap-1">
        <li><a href="index">Home</a></li>
        
        <!-- Bantayan Dropdown -->
        <li class="dropdown">
            <a href="#"  class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Bantayan</a>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item enhanced-dropdown-item" href="about_municipality1">About Bantayan Municipality</a></li>
<li><a class="dropdown-item enhanced-dropdown-item" href="municipality_mayor1">Bantayan Municipality Mayor</a></li>
<li><a class="dropdown-item enhanced-dropdown-item" href="barangay_officials1">Bantayan Barangay Officials</a></li>
<li><a class="dropdown-item enhanced-dropdown-item" href="municipality_profile1">Bantayan Municipality Profile</a></li>
<li><a class="dropdown-item enhanced-dropdown-item" href="history_bantayan">Bantayan History</a></li>
            </ul>
        </li>
        
        <!-- Madridejos Dropdown -->
        <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Madridejos</a>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item enhanced-dropdown-item" href="about_municipality">About Madridejos Municipality</a></li>
        <li><a class="dropdown-item enhanced-dropdown-item" href="municipality_mayor">Madridejos Municipality Mayor</a></li>
        <li><a class="dropdown-item enhanced-dropdown-item" href="barangay_officials">Mandridejos Barangay Officials</a></li>
        <li><a class="dropdown-item enhanced-dropdown-item" href="municipality_profile">Madridejos Municipality Profile</a></li>
        <li><a class="dropdown-item enhanced-dropdown-item" href="history_madridejos">Madridejos History</a></li>
    </ul>
</li>

        
       <!-- Santafe Dropdown -->
       <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Santa Fe</a>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item enhanced-dropdown-item" href="about_municipality2">About Santa Fe Municipality</a></li>
        <li><a class="dropdown-item enhanced-dropdown-item" href="municipality_mayor2">Santa Fe Municipality Mayor</a></li>
        <li><a class="dropdown-item enhanced-dropdown-item" href="barangay_officials2">Santa Fe Barangay Officials</a></li>
        <li><a class="dropdown-item enhanced-dropdown-item" href="municipality_profile2">Santa Fe Municipality Profile</a></li>
        <li><a class="dropdown-item enhanced-dropdown-item" href="history_santafe">Santa Fe History</a></li>
    </ul>
</li>

        <li><a href="schedule">Schedule</a></li>
        <li><a href="about_us">About Us</a></li>
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
            <li class="nav-item"><a href="index" class="nav-link">Home</a></li>
            
            <!-- Bantayan Dropdown -->
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Bantayan    
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="about_municipality1">About Bantayan Municipality</a></li>
                    <li><a class="dropdown-item" href="municipality_mayor1">Bantayan Municipality Mayor</a></li>
                    <li><a class="dropdown-item" href="barangay_officials1">Bantayan Barangay Officials</a></li>
                    <li><a class="dropdown-item" href="municipality_profile1">Bantayan Municipality Profile</a></li>
                    <li><a class="dropdown-item" href="history_bantayan">Bantayan History</a></li>
                </ul>
            </li>

            <!-- Madridejos Dropdown -->
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Madridejos 
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="about_municipality">About Madridejos Municipality</a></li>
                    <li><a class="dropdown-item" href="municipality_mayor">Madridejos Municipality Mayor</a></li>
                    <li><a class="dropdown-item" href="barangay_officials">Madridejos Barangay Officials</a></li>
                    <li><a class="dropdown-item" href="municipality_profile">Madridejos Municipality Profile</a></li>
                    <li><a class="dropdown-item" href="history_madridejos">Madridejos History</a></li>
                </ul>
            </li>

            <!-- Santa Fe Dropdown -->
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Santa Fe 
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="about_municipality2">About Santa Fe Municipality</a></li>
                    <li><a class="dropdown-item" href="municipality_mayor2">Santa Fe Municipality Mayor</a></li>
                    <li><a class="dropdown-item" href="barangay_officials2">Santa Fe Barangay Officials</a></li>
                    <li><a class="dropdown-item" href="municipality_profile2">Santa Fe Municipality Profile</a></li>
                    <li><a class="dropdown-item" href="history_santafe">Santa Fe History</a></li>
                </ul>
            </li>

            <li class="nav-item"><a href="schedule" class="nav-link">Schedule</a></li>
            <li class="nav-item"><a href="about_us" class="nav-link">About</a></li>
        </ul>
    </nav>
</div>
</header>




<main class="main">
    <!-- Hero Section -->
    <section class="hero section" style="margin-top: -20px;" >
        <div class="container">
            <!-- Search Bar Section Inside Hero -->
            <div class="row justify-content-center mt-4">
    <div class="col-lg-8" data-aos="fade-down" data-aos-duration="1000">
        <!-- Add Small Text Above the Search Input, aligned to the left -->
        <p class="text-start" style="font-size: 14px; color: #666; margin-bottom: 5px;">Search Site Map</p>
        
        <form id="searchForm" class="d-flex align-items-center" style="margin-top: 8px;"> 
            <input type="text" id="searchInput" class="form-control form-control-lg" 
                   placeholder="" 
                   style="border-radius: 20px; padding: 5px; background-color: rgba(255, 255, 255, 0.7); border: 2px solid white;" 
                   list="searchSuggestions">
            <datalist id="searchSuggestions"></datalist>
            <!-- Search Button with Icon -->
            <button type="button" id="searchButton" class="btn btn-lg ms-2" 
                    style="border-radius: 20px; padding: 10px 15px; background-color: #007bff; border: none;">
                <i class="fas fa-search" style="color: white;"></i>
            </button>
        </form>
    </div>
</div>


            <div class="row align-items-center">
                <!-- Left Column: Welcome Text and Paragraph -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1000">
                    <div class="hero-content" style="margin-top: 50px;">
                        <h3>Welcome to the Bantayan Island Census!</h3>
                        <br>
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
                <!-- Remove the Right Column with Image -->
                <script src="//code.tidio.co/xjhnpy1s8nfzl3muds8u7acrmf1p3jkc.js" async></script>

                </div>
            </div>
        </div>
    </section>
    
</main>







<!-- FAQ and Map Section -->
<section id="faq-map" class="section" style="background: url('assets/img/faqback.jpg') no-repeat center center; background-size: cover; position: relative; color: #f8f9fa; ">
    <!-- Overlay to darken the background image and make text readable -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); filter: blur(10px); "></div>
    
    <div class="container" style="position: relative; z-index: 1;">
        <div class="row">
            <!-- Map Column -->
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="map-container" style="position: relative; overflow: hidden; height: 548px; border: 1px solid #ccc; border-radius: 8px;">
                    <iframe 
                        style="height: 100%; width: 100%; border: 0;" 
                        frameborder="0" 
                        src="https://www.google.com/maps/embed/v1/place?q=Bantayan+Island,+Cebu,+Philippines&zoom=12&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8">
                    </iframe>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
                <div class="card shadow-sm p-4 border rounded bg-light">
                    <h4 class="font-weight-bold mb-3 text-primary" style="font-family: 'Merriweather', serif;">Frequently Asked Questions</h4>
                    <p style="font-family: 'Merriweather', serif;">Here are some common questions about the Bantayan Island Census project:</p>
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeadingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseOne" aria-expanded="true" aria-controls="faqCollapseOne">
                                    What is the purpose of the Bantayan Island Census?
                                </button>
                            </h2>
                            <div id="faqCollapseOne" class="accordion-collapse collapse show" aria-labelledby="faqHeadingOne">
                                <div class="accordion-body">
                                    The census aims to collect accurate data about residents to improve public services, allocate resources effectively, and plan for the community's development.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeadingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseTwo" aria-expanded="false" aria-controls="faqCollapseTwo">
                                    Who can participate in the census?
                                </button>
                            </h2>
                            <div id="faqCollapseTwo" class="accordion-collapse collapse" aria-labelledby="faqHeadingTwo">
                                <div class="accordion-body">
                                    All residents of Bantayan Island are encouraged to participate in the census, regardless of age, gender, or citizenship status.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeadingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseThree" aria-expanded="false" aria-controls="faqCollapseThree">
                                    How is the data collected?
                                </button>
                            </h2>
                            <div id="faqCollapseThree" class="accordion-collapse collapse" aria-labelledby="faqHeadingThree">
                                <div class="accordion-body">
                                    Data is collected through door-to-door surveys by authorized census staff, and community centers.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeadingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseFour" aria-expanded="false" aria-controls="faqCollapseFour">
                                    Is my information confidential?
                                </button>
                            </h2>
                            <div id="faqCollapseFour" class="accordion-collapse collapse" aria-labelledby="faqHeadingFour">
                                <div class="accordion-body">
                                    Yes, all collected data is kept strictly confidential and is used only for research and planning purposes in accordance with privacy laws.
                                </div>
                            </div>
                        </div>

                        <!-- New FAQ Added (Initially hidden) -->
                        <div class="accordion-item" id="faqMoreItems" style="display: none;">
                            <h2 class="accordion-header" id="faqHeadingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseFive" aria-expanded="false" aria-controls="faqCollapseFive">
                                    How can I update my information after participating in the census?
                                </button>
                            </h2>
                            <div id="faqCollapseFive" class="accordion-collapse collapse" aria-labelledby="faqHeadingFive">
                                <div class="accordion-body">
                                    If your information changes after the census has been completed, you can contact the census office to modify your details.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" id="faqMoreItems" style="display: none;">
                            <h2 class="accordion-header" id="faqHeadingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseSix" aria-expanded="false" aria-controls="faqCollapseSix">
                                    Will I be compensated for participating in the census?
                                </button>
                            </h2>
                            <div id="faqCollapseSix" class="accordion-collapse collapse" aria-labelledby="faqHeadingSix">
                                <div class="accordion-body">
                                    Participation in the census is voluntary and free of charge. There is no financial compensation, but your participation will contribute to improving public services for the community.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" id="faqMoreItems" style="display: none;">
                            <h2 class="accordion-header" id="faqHeadingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseSeven" aria-expanded="false" aria-controls="faqCollapseSeven">
                                    Can I participate if I am living outside Bantayan Island?
                                </button>
                            </h2>
                            <div id="faqCollapseSeven" class="accordion-collapse collapse" aria-labelledby="faqHeadingSeven">
                                <div class="accordion-body">
                                    Only residents currently living on Bantayan Island are eligible to participate in the census. If you are temporarily away from the island, you may still be able to participate through remote surveys conducted by census staff.
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Show More / Show Less Text -->
                    <div class="text-center mt-4">
                        <a href="#" id="showMoreText" style="color: #007bff; text-decoration: none;">Show More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


</main>





   



















<a href="#" class="scroll-to-top">
  <i class="fas fa-chevron-up"></i>
</a>

<script>
        document.addEventListener("DOMContentLoaded", function() {
            AOS.init({
                duration: 1000,
                offset: 100,
            });
        });
    </script>

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
<!-- JavaScript to toggle "Show More" / "Show Less" text -->
<script>
    document.getElementById("showMoreText").addEventListener("click", function(e) {
        e.preventDefault();
        var moreItems = document.querySelectorAll("#faqMoreItems");
        var isVisible = moreItems[0].style.display === "block";
        
        if (isVisible) {
            // Hide the additional FAQs
            moreItems.forEach(function(item) {
                item.style.display = "none";
            });
            document.getElementById("showMoreText").textContent = "Show More"; // Change text to "Show More"
        } else {
            // Show the additional FAQs
            moreItems.forEach(function(item) {
                item.style.display = "block";
            });
            document.getElementById("showMoreText").textContent = "Show Less"; // Change text to "Show Less"
        }
    });
</script>
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
    const sitemap = {
        "About Bantayan Municipality": "about_municipality1.php",
        "About Madridejos Municipality": "about_municipality.php",
        "About Santa Fe Municipality": "about_municipality2.php",
        "Bantayan Municipality Mayor": "municipality_mayor1.php",
        "Madridejos Municipality Mayor": "municipality_mayor.php",
        "Santa Fe Municipality Mayor": "municipality_mayor2.php",
        "Bantayan Barangay Officials": "barangay_officials1.php",
        "Madridejos Barangay Officials": "barangay_officials.php",
        "Santa Fe Barangay Officials": "barangay_officials2.php",
        "Bantayan Municipality Profile": "municipality_profile1.php",
        "Madridejos Municipality Profile": "municipality_profile.php",
        "Santa Fe Municipality Profile": "municipality_profile2.php",
        "Bantayan History": "history_bantayan.php",
        "Madridejos History": "history_madridejos.php",
        "Santa Fe History": "history_santafe.php",
        "Schedule": "schedule.php",
        "About Us": "about_us.php"
    };

    let typingAnimationActive = true;

    function updateSuggestions(query) {
        const suggestions = document.getElementById('searchSuggestions');
        suggestions.innerHTML = '';  // Clear previous suggestions
        const filteredResults = [];

        for (const [key, value] of Object.entries(sitemap)) {
            if (key.toLowerCase().includes(query.toLowerCase())) {
                filteredResults.push(key);
            }
        }

        filteredResults.forEach(result => {
            const option = document.createElement('option');
            option.innerHTML = highlightText(result, query);
            suggestions.appendChild(option);
        });
    }

    function highlightText(text, query) {
        const regex = new RegExp(`(${query})`, 'gi');
        return text.replace(regex, '<span class="highlight">$1</span>');
    }

    document.getElementById('searchInput').addEventListener('input', function () {
        const query = this.value.trim();
        updateSuggestions(query);

        // Pause typing animation when the user types
        typingAnimationActive = false;
    });

    document.getElementById('searchButton').addEventListener('click', function () {
        const query = document.getElementById('searchInput').value.toLowerCase().trim();
        const results = [];

        for (const [key, value] of Object.entries(sitemap)) {
            if (key.toLowerCase().includes(query)) {
                results.push({ key, value });
            }
        }

        if (results.length > 0) {
            window.location.href = results[0].value;
        } else {
            alert("No matching page found. Please try a different search.");
        }
    });

    document.getElementById('searchInput').addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            const query = this.value.toLowerCase().trim();
            const results = [];

            for (const [key, value] of Object.entries(sitemap)) {
                if (key.toLowerCase().includes(query)) {
                    results.push({ key, value });
                }
            }

            if (results.length > 0) {
                window.location.href = results[0].value;
            } else {
                alert("No matching page found. Please try a different search.");
            }
        }
    });

    const sitemapArray = [
        "About Bantayan Municipality",
        "About Madridejos Municipality",
        "About Santa Fe Municipality",
        "Bantayan Municipality Mayor",
        "Madridejos Municipality Mayor",
        "Santa Fe Municipality Mayor",
        "Bantayan Barangay Officials",
        "Madridejos Barangay Officials",
        "Santa Fe Barangay Officials",
        "Bantayan Municipality Profile",
        "Madridejos Municipality Profile",
        "Santa Fe Municipality Profile",
        "Bantayan History",
        "Madridejos History",
        "Santa Fe History",
        "Schedule",
        "About"
    ];

    function typePlaceholder() {
        if (!typingAnimationActive) return;

        let currentIndex = 0;
        let currentCharIndex = 0;
        const searchInput = document.getElementById("searchInput");

        function typeNextCharacter() {
            const currentText = sitemapArray[currentIndex];
            if (currentCharIndex < currentText.length) {
                searchInput.placeholder += currentText.charAt(currentCharIndex);
                currentCharIndex++;
                setTimeout(typeNextCharacter, 100);
            } else {
                setTimeout(() => {
                    currentIndex = (currentIndex + 1) % sitemapArray.length;
                    currentCharIndex = 0;
                    searchInput.placeholder = '';
                    typeNextCharacter();
                }, 1500);
            }
        }

        typeNextCharacter();
    }

    window.addEventListener('load', typePlaceholder);
</script>

<?php 
include 'footer.php';
?>
</body>
</html>
