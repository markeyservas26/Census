<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/img/travelogo.png" rel="icon">
    <title>Terms and Conditions</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
<body class="bg-gradient-to-br from-white-200 via-cyan-100 to-teal-200 font-sans text-gray-700">
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

    <div class="max-w-7xl mx-auto px-6 py-12 bg-white rounded-lg shadow-lg mt-16">
        <h1 class="text-3xl font-semibold text-teal-600 text-center mb-4">Terms and Conditions</h1>
        <p class="text-sm text-center text-gray-500">Last updated: December 07, 2024</p>
        <p class="my-4">Please read these terms and conditions carefully before using Our Service.</p>
        
        <h2 class="text-2xl font-semibold text-teal-600 mt-8 border-b-2 pb-2 border-teal-600">Interpretation and Definitions</h2>
        
        <h3 class="text-xl font-semibold text-teal-600 mt-6">Interpretation</h3>
        <p class="mt-2">The words of which the initial letter is capitalized have meanings defined under the following conditions. The following definitions shall have the same meaning regardless of whether they appear in singular or in plural.</p>
        
        <h3 class="text-xl font-semibold text-teal-600 mt-6">Definitions</h3>
        <p class="mt-2">For the purposes of these Terms and Conditions:</p>
        
        <ul class="list-disc pl-6 mt-4">
            <li><p><strong>Affiliate</strong> means an entity that controls, is controlled by or is under common control with a party, where "control" means ownership of 50% or more of the shares, equity interest or other securities entitled to vote for election of directors or other managing authority.</p></li>
            <li><p><strong>Country</strong> refers to: Philippines</p></li>
            <li><p><strong>Company</strong> (referred to as either "the Company", "We", "Us" or "Our" in this Agreement) refers to Bantayan Island Census.</p></li>
            <li><p><strong>Device</strong> means any device that can access the Service such as a computer, a cellphone or a digital tablet.</p></li>
            <li><p><strong>Service</strong> refers to the Website.</p></li>
            <li><p><strong>Terms and Conditions</strong> (also referred to as "Terms") mean these Terms and Conditions that form the entire agreement between You and the Company regarding the use of the Service. This Terms and Conditions agreement has been created with the help of the <a href="https://www.termsfeed.com/terms-conditions-generator/" target="_blank" class="text-teal-600 hover:text-teal-800">Terms and Conditions Generator</a>.</p></li>
            <li><p><strong>Third-party Social Media Service</strong> means any services or content (including data, information, products or services) provided by a third-party that may be displayed, included or made available by the Service.</p></li>
            <li><p><strong>Website</strong> refers to Bantayan Island Census, accessible from <a href="https://www.bantayanislandcensus.com/" target="_blank" class="text-teal-600 hover:text-teal-800">https://www.bantayanislandcensus.com/</a></p></li>
            <li><p><strong>You</strong> means the individual accessing or using the Service, or the company, or other legal entity on behalf of which such individual is accessing or using the Service, as applicable.</p></li>
        </ul>

        <h2 class="text-2xl font-semibold text-teal-600 mt-8 border-b-2 pb-2 border-teal-600">Acknowledgment</h2>
        <p class="mt-4">These are the Terms and Conditions governing the use of this Service and the agreement that operates between You and the Company. These Terms and Conditions set out the rights and obligations of all users regarding the use of the Service.</p>
        <p>Your access to and use of the Service is conditioned on Your acceptance of and compliance with these Terms and Conditions. These Terms and Conditions apply to all visitors, users and others who access or use the Service.</p>
        <p class="mt-4">By accessing or using the Service You agree to be bound by these Terms and Conditions. If You disagree with any part of these Terms and Conditions then You may not access the Service.</p>
        <p class="mt-4">You represent that you are over the age of 18. The Company does not permit those under 18 to use the Service.</p>
        <p class="mt-4">Your access to and use of the Service is also conditioned on Your acceptance of and compliance with the Privacy Policy of the Company. Our Privacy Policy describes Our policies and procedures on the collection, use and disclosure of Your personal information when You use the Application or the Website and tells You about Your privacy rights and how the law protects You. Please read Our Privacy Policy carefully before using Our Service.</p>
        
        <h2 class="text-2xl font-semibold text-teal-600 mt-8 border-b-2 pb-2 border-teal-600">Links to Other Websites</h2>
        <p class="mt-4">Our Service may contain links to third-party web sites or services that are not owned or controlled by the Company.</p>
        <p class="mt-4">The Company has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party web sites or services. You further acknowledge and agree that the Company shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with the use of or reliance on any such content, goods or services available on or through any such web sites or services.</p>
        <p class="mt-4">We strongly advise You to read the terms and conditions and privacy policies of any third-party web sites or services that You visit.</p>
        
        <h2 class="text-2xl font-semibold text-teal-600 mt-8 border-b-2 pb-2 border-teal-600">Termination</h2>
        <p class="mt-4">We may terminate or suspend Your access immediately, without prior notice or liability, for any reason whatsoever, including without limitation if You breach these Terms and Conditions.</p>
        <p class="mt-4">Upon termination, Your right to use the Service will cease immediately.</p>
        
        <h2 class="text-2xl font-semibold text-teal-600 mt-8 border-b-2 pb-2 border-teal-600">Limitation of Liability</h2>
        <p class="mt-4">Notwithstanding any damages that You might incur, the entire liability of the Company and any of its suppliers under any provision of this Terms and Your exclusive remedy for all of the foregoing shall be limited to the amount actually paid by You through the Service or 100 USD if You haven't purchased anything through the Service.</p>
        <p class="mt-4">To the maximum extent permitted by applicable law, in no event shall the Company or its suppliers be liable for any special, incidental, indirect, or consequential damages whatsoever (including, but not limited to, damages for loss of profits, loss of data or other information, for business interruption, for personal injury, loss of privacy arising out of or in any way related to the use of or inability to use the Service, third-party software and/or third-party hardware used with the Service, or otherwise in connection with any provision of this Terms), even if the Company or any supplier has been advised of the possibility of such damages and even if the remedy fails of its essential purpose.</p>
        <p class="mt-4">Some states do not allow the exclusion of implied warranties or limitation of liability for incidental or consequential damages, which means that some of the above limitations may not apply. In these states, each party's liability will be limited to the greatest extent permitted by law.</p>

        <h2 class="text-2xl font-semibold text-teal-600 mt-8 border-b-2 pb-2 border-teal-600">"AS IS" and "AS AVAILABLE" Disclaimer</h2>
        <p class="mt-4">The Service is provided to You "AS IS" and "AS AVAILABLE" and with all faults and defects without warranty of any kind. To the maximum extent permitted under applicable law, the Company, on its own behalf and on behalf of its Affiliates and its and their respective licensors and service providers, expressly disclaims all warranties, whether express, implied, statutory or otherwise, with respect to the Service, including all implied warranties of merchantability, fitness for a particular purpose, title and non-infringement, and warranties that may arise out of course of dealing, course of performance, usage or trade practice. Without limitation to the foregoing, the Company provides no warranty or undertaking, and makes no representation of any kind that the Service will meet Your requirements, achieve any intended results, be compatible or work with any other software, applications, systems or services, operate without interruption, meet any performance or reliability standards or be error free or that any errors or defects can or will be corrected.</p>
        <p class="mt-4">Without limiting the foregoing, neither the Company nor any of the company's provider makes any representation or warranty of any kind, express or implied: (i) as to the operation or availability of the Service, or the information, content, and materials or products included thereon; (ii) that the Service will be uninterrupted or error-free; (iii) as to the accuracy, reliability, or currency of any information or content provided through the Service; or (iv) that the Service, its servers, the content, or emails sent from or on behalf of the Company are free of viruses, scripts, trojan horses, worms, malware, timebombs or other harmful components.</p>

        <h2 class="text-2xl font-semibold text-teal-600 mt-8 border-b-2 pb-2 border-teal-600">Changes</h2>
        <p class="mt-4">We may update these Terms and Conditions from time to time. When we do, we will post the new Terms and Conditions on this page and update the "Last updated" date at the top of this page. You are advised to review this Terms and Conditions periodically for any changes. Changes to this Terms and Conditions are effective when they are posted on this page.</p>

        <h2 class="text-2xl font-semibold text-teal-600 mt-8 border-b-2 pb-2 border-teal-600">Contact Us</h2>
        <p class="mt-4">If you have any questions about these Terms and Conditions, please contact us:</p>
        <ul class="list-disc pl-6 mt-4">
            <li>Email: <a href="mailto:info@bantayanislandcensus.com" class="text-teal-600 hover:text-teal-800">info@bantayanislandcensus.com</a></li>
            <li>Website: <a href="https://www.bantayanislandcensus.com/" class="text-teal-600 hover:text-teal-800">https://www.bantayanislandcensus.com/</a></li>
        </ul>
    </div>

</body>
</html>
