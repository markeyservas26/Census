<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Officials - Madridejos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/img/trasparlogo.png" rel="icon">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>



<!-- Main CSS File -->
<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;500;700&display=swap" rel="stylesheet">
<link href="assets/css/main.css" rel="stylesheet">
<link href="queenie.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<style>
        body {
    background-color: #e9f5f5;
    background-image: url('assets/img/back.png'); /* Replace with the path to your image */
    background-size: cover; /* Ensures the image covers the entire body */
    background-position: center center; /* Centers the image */
    background-repeat: no-repeat; /* Ensures the image doesn't repeat */
    color: #333;
    font-family: 'Arial', sans-serif;
}
        
        .content {
            padding: 20px;
            text-align: justify;
        }
        .content h2 {
            color: #008b8b;
        }
        .officials-card {
    border: 2px solid #ccc; /* Light border around the card */
    border-radius: 10px;
    padding: 10px;
    background-color: #f9f9f9;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
}

.officials-card:hover {
    transform: translateY(-10px); /* Slight hover effect */
}

.official-img {
    width: 150px; /* Set width of image */
    height: 150px; /* Set height of image */
    object-fit: cover;
    border-radius: 50%;
    margin-bottom: 15px; /* Space between image and text */
}

.officials-card h4 {
    font-size: 14px;
    font-weight: bold;
    margin: 10px 0;
}

.officials-card p {
    font-size: 14px;
    color: #555;
}

    </style>
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
<style>
    #searchInput::placeholder {
        color: white;
        font-family: 'Merriweather', serif;
    }

    .white-toggler .icon-bar {
    background-color: white;
}

.white-toggler {
    border-color: transparent; /* Optional: Removes the border */
}

/* Adjust the width of the collapsed navbar */
.navbar-collapse {
    width: 350px; /* Set a custom width when collapsed */
    margin-top: 50px;
    margin-left: -30px;
}

/* Optional: Ensure the navbar toggler (hamburger) aligns properly */
.white-toggler {
    position: absolute;
    left: 15px;
    top: 10px;
}

/* Optional: Adjust padding or other styles for navbar items */
.navbar-nav .nav-item {
    padding: 10px 20px; /* Adjust padding if needed */
}
</style>
</head>
<body>

<header id="header" class="header fixed-top d-flex align-items-center" style="height: 100px; padding: 0; margin: 0; background: rgba(0, 0, 0, 0.2); /* Dark overlay */ backdrop-filter: blur(5px); /* Blur effect */ -webkit-backdrop-filter: blur(5px); /* For Safari compatibility */">
  <!-- Admin and Staff Log In Links -->
  <div style="position: absolute; top: 10px; right: 50px; font-size: 14px; color: white; font-family: 'Merriweather', serif;">
    <ul style="list-style: none; margin: 0; padding: 0; display: flex; gap: 20px; align-items: center;">
      <li><a href="admin/login" style="color: white; text-decoration: none;"><i class="fas fa-external-link-square-alt"></i> Admin Log in</a></li>
      <li><a href="staff/login" style="color: white; text-decoration: none;"><i class="fas fa-external-link-square-alt"></i> Staff Log in</a></li>
    </ul>
  </div>

  <!-- Current Date/Time (only on large screens) -->
  <div style="position: absolute; left: 30px; top: 15px; font-size: 10px; color: white; font-family: 'Merriweather', serif;" class="d-none d-md-block">
    <span id="currentDateTime"></span>
  </div>

  <hr style="width: 100%; border: 1px solid white; margin-bottom: 20px;">

  <!-- Logo (only on large screens) -->
  <img src="assets/img/trasparlogo.png" alt="Logo" style="position: absolute; bottom: 5px; left: 0; height: 50px;" class="d-none d-md-block">

  <!-- Text (responsive version) -->
  <span class="d-none d-md-inline" id="header-text" style="position: absolute; right: 73%; bottom: 15px; font-size: 20px; font-family: 'Merriweather', serif; color: white;">BANTAYAN ISLAND CENSUS</span>
  <span class="d-md-none" id="header-text-mobile" style="position: absolute; right: 10px; bottom: 15px; font-size: 20px; font-family: 'Merriweather', serif; color: white;">B.I.Census</span>

  <!-- Mobile Navigation Hamburger Menu -->
<nav class="d-md-none" style="position: absolute; top: 45px; left: -5px; z-index: 1000;">
  <!-- Toggler Button -->
  <button class="navbar-toggler d-md-none white-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>

  <!-- Collapsing Navbar Content -->
  <div class="collapse navbar-collapse" id="navbarContent">
    <ul class="navbar-nav">
      <!-- Navbar Item with Dropdown -->
      <li class="nav-item">
        <a href="index" style="color: black; margin-left: -10px;">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">Bantayan</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="about_municipality1">About Bantayan Municipality</a></li>
          <li><a class="dropdown-item" href="municipality_mayor1">Bantayan Municipality Mayor</a></li>
          <li><a class="dropdown-item" href="barangay_officials1">Bantayan Barangay Officials</a></li>
          <li><a class="dropdown-item" href="municipality_profile1">Bantayan Municipality Profile</a></li>
          <li><a class="dropdown-item" href="history_bantayan">Bantayan History</a></li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">Madridejos</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="about_municipality">About Madridejos Municipality</a></li>
          <li><a class="dropdown-item" href="municipality_mayor">Madridejos Municipality Mayor</a></li>
          <li><a class="dropdown-item" href="barangay_officials">Madridejos Barangay Officials</a></li>
          <li><a class="dropdown-item" href="municipality_profile">Madridejos Municipality Profile</a></li>
          <li><a class="dropdown-item" href="history_madridejos">Madridejos History</a></li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">Santa Fe</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="about_municipality2">About Santa Fe Municipality</a></li>
          <li><a class="dropdown-item" href="municipality_mayor2">Santa Fe Municipality Mayor</a></li>
          <li><a class="dropdown-item" href="barangay_officials2">Santa Fe Barangay Officials</a></li>
          <li><a class="dropdown-item" href="municipality_profile2">Santa Fe Municipality Profile</a></li>
          <li><a class="dropdown-item" href="history_santafe">Santa Fe History</a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="schedule" style="color: black; margin-left: -10px;">Schedule</a>
      </li>
      <li class="nav-item">
        <a href="about_us" style="color: black; margin-left: -10px;">About Us</a>
      </li>
    </ul>
  </div>
</nav>


  <!-- Desktop Navigation Menu (will be hidden on smaller screens) -->
  <nav id="navmenu" class="navmenu d-none d-md-flex" style="position: absolute; top: 25px; right: 10px; z-index: 1000; padding: 10px;">
    <ul class="d-flex gap-3">
      <li><a href="index" style="color: white; text-decoration: none;">Home</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">Bantayan</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="about_municipality1">About Bantayan Municipality</a></li>
          <li><a class="dropdown-item" href="municipality_mayor1">Bantayan Municipality Mayor</a></li>
          <li><a class="dropdown-item" href="barangay_officials1">Bantayan Barangay Officials</a></li>
          <li><a class="dropdown-item" href="municipality_profile1">Bantayan Municipality Profile</a></li>
          <li><a class="dropdown-item" href="history_bantayan">Bantayan History</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">Madridejos</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="about_municipality">About Madridejos Municipality</a></li>
          <li><a class="dropdown-item" href="municipality_mayor">Madridejos Municipality Mayor</a></li>
          <li><a class="dropdown-item" href="barangay_officials">Madridejos Barangay Officials</a></li>
          <li><a class="dropdown-item" href="municipality_profile">Madridejos Municipality Profile</a></li>
          <li><a class="dropdown-item" href="history_madridejos">Madridejos History</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">Santa Fe</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="about_municipality2">About Santa Fe Municipality</a></li>
          <li><a class="dropdown-item" href="municipality_mayor2">Santa Fe Municipality Mayor</a></li>
          <li><a class="dropdown-item" href="barangay_officials2">Santa Fe Barangay Officials</a></li>
          <li><a class="dropdown-item" href="municipality_profile2">Santa Fe Municipality Profile</a></li>
          <li><a class="dropdown-item" href="history_santafe">Santa Fe History</a></li>
        </ul>
      </li>
      <li><a href="schedule" style="color: white; text-decoration: none;">Schedule</a></li>
      <li><a href="about_us" style="color: white; text-decoration: none;">About Us</a></li>
    </ul>
  </nav>
</header>
<br>
<br>
<br>
<br>
<section class="text-white text-center py-10" style="background: linear-gradient(to right, #9E2A2F, #C6A15C);">
    <h1 class="text-4xl font-bold mb-3" style="color: white; font-family: 'Merriweather', serif;">Barangay Officials</h1>
    <p class="text-lg" style="color: white; font-family: 'Merriweather', serif;">Meet the dedicated leaders serving the community of Madridejos.</p>
</section>

<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Barangay Official 1 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1000">
                <img src="assets/img/officialman.png" alt="Barangay Official 1" class="official-img">
                <h4>Hon. Floreto Pacana Batayola</h4>
                <p>Barangay Captain of Poblacion</p>
                <a href="#" class="small-text" data-toggle="modal" data-target="#officialModal">See Official</a>
            </div>
        </div>

        <!-- Barangay Official 2 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1200">
                <img src="assets/img/officialwomen.png" alt="Barangay Official 2" class="official-img">
                <h4>Hon. Rowenna Bacolod Tayo</h4>
                <p>Barangay Captain of Mancilang</p>
                <a href="#" class="small-text" data-toggle="modal" data-target="#officialModal2">See Official</a>
            </div>
        </div>

        <!-- Barangay Official 3 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1400">
                <img src="assets/img/officialman.png" alt="Barangay Official 3" class="official-img">
                <h4>Hon. Neil DosDos Caratao</h4>
                <p>Barangay Captain of Malbago</p>
                <a href="#" class="small-text" data-toggle="modal" data-target="#officialModal3">See Official</a>
            </div>
        </div>

        <!-- Barangay Official 4 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1500">
                <img src="assets/img/officialwomen.png" alt="Barangay Official 4" class="official-img">
                <h4>Hon. Magdalena Bautro Marollano</h4>
                <p>Barangay Captain of Kaongkod</p>
                <a href="#" class="small-text" data-toggle="modal" data-target="#officialModal4">See Official</a>
            </div>
        </div>

        <!-- Barangay Official 5 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1600">
                <img src="assets/img/officialwomen.png" alt="Barangay Official 5" class="official-img">
                <h4>Hon. Dolores D. Bastusbatusan</h4>
                <p>Barangay Captain of San Agustin</p>
                <a href="#" class="small-text" data-toggle="modal" data-target="#officialModal5">See Official</a>
            </div>
        </div>

        <!-- Barangay Official 6 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1700">
                <img src="assets/img/officialman.png" alt="Barangay Official 6" class="official-img">
                <h4>Hon. Joevic S. Villaceran</h4>
                <p>Barangay Captain of Kangwayan</p>
                <a href="#" class="small-text" data-toggle="modal" data-target="#officialModal6">See Official</a>
            </div>
        </div>

        <!-- Barangay Official 7 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1800">
                <img src="assets/img/officialman.png" alt="Barangay Official 7" class="official-img">
                <h4>Hon. Jesus V. Villacarlos</h4>
                <p>Barangay Captain of Kodia</p>
                <a href="#" class="small-text" data-toggle="modal" data-target="#officialModal7">See Official</a>
            </div>
        </div>

        <!-- Barangay Official 8 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1900">
                <img src="assets/img/officialman.png" alt="Barangay Official 8" class="official-img">
                <h4>Hon. Rexiber S. Villaceran</h4>
                <p>Barangay Captain of Tabagak</p>
                <a href="#" class="small-text" data-toggle="modal" data-target="#officialModal8">See Official</a>
            </div>
        </div>

        <!-- Barangay Official 9 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="2000">
                <img src="assets/img/officialman.png" alt="Barangay Official 9" class="official-img">
                <h4>Hon. Basilio Sinday Ducay</h4>
                <p>Barangay Captain of Bunakan</p>
                <a href="#" class="small-text" data-toggle="modal" data-target="#officialModal9">See Official</a>
            </div>
        </div>

        <!-- Barangay Official 10 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="2100">
                <img src="assets/img/officialman.png" alt="Barangay Official 10" class="official-img">
                <h4>Hon. Pedro Bacolod Maru</h4>
                <p>Barangay Captain of Maalat</p>
                <a href="#" class="small-text" data-toggle="modal" data-target="#officialModal10">See Official</a>
            </div>
        </div>
    </div>
</div>

        <div class="row">
    <div class="col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1500">
        <div class="officials-card text-center">
            <img src="assets/img/officialman.png" alt="Barangay Official 2" class="official-img">
            <h4>Hon. Roger Garcia Alegre</h4>
            <p>Barangay Captain of Tarong</p>
            <a href="#" data-toggle="modal" data-target="#officialModal11" class="small-text">See Official</a>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1600">
        <div class="officials-card text-center">
            <img src="assets/img/officialman.png" alt="Barangay Official 2" class="official-img">
            <h4>Hon. Alen Gido Chavez</h4>
            <p>Barangay Captain of Tugas</p>
            <a href="#" data-toggle="modal" data-target="#officialModal12" class="small-text">See Official</a>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1700">
        <div class="officials-card text-center">
            <img src="assets/img/officialman.png" alt="Barangay Official 2" class="official-img">
            <h4>Hon. Salvador Marfa Villaruel</h4>
            <p>Barangay Captain of Talangnan</p>
            <a href="#" data-toggle="modal" data-target="#officialModal13" class="small-text">See Official</a>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1800">
        <div class="officials-card text-center">
            <img src="assets/img/officialman.png" alt="Barangay Official 2" class="official-img">
            <h4>Hon. Jerry Solomon Caranzo</h4>
            <p>Barangay Captain of Pili</p>
            <a href="#" data-toggle="modal" data-target="#officialModal14" class="small-text">See Official</a>
        </div>
    </div>
</div>
<!-- modal for officials -->
 <!-- Modal -->
 <div class="modal fade" id="officialModal" tabindex="-1" role="dialog" aria-labelledby="officialModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background: #f8f9fa; border-radius: 8px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
            <!-- Modal Header -->
            <div class="modal-header" style="background: linear-gradient(to right, #b22222, #800000); color: #fff; padding: 15px; text-align: center;">
                <h5 class="modal-title w-100" id="officialModalLabel" style="font-weight: bold; letter-spacing: 1px;">Barangay Officials</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="row">
                    <!-- Punong Barangay Section -->
                    <div class="col-md-6">
                        <div style="background: linear-gradient(to bottom, #f0f0f0, #e9ecef); padding: 20px; border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Punong Barangay</h6>
                            <p class="text-center" style="color: #444; font-size: 16px; margin-bottom: 20px;">Floreto Pacaña Batayola</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444; font-size: 14px;">
                                <li>Villamor M. Batayola II</li>
                                <li>Rolando E. Oftana</li>
                                <li>Roldan S. Caratao</li>
                                <li>Heracleo M. Cotejo</li>
                                <li>Jed Allen M. Ducay</li>
                                <li>Niño Athriu A. Espina</li>
                                <li>Primitivo S. Maspara</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Officials Section -->
                    <div class="col-md-6">
                        <div style="background: linear-gradient(to bottom, #f0f0f0, #e9ecef); padding: 20px; border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">SK Chairman</h6>
                            <p class="text-center" style="color: #444; font-size: 16px; margin-bottom: 20px;">Reynaldo V. Pasaylo</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #444; font-size: 14px;">
                                <li>Jomuel B. Bacolod</li>
                                <li>Edgar Espina</li>
                                <li>Kenneth C. Laurente</li>
                                <li>Aljun Sedurifa</li>
                                <li>Virceneil N. Alob</li>
                                <li>Elcid P. Seares</li>
                                <li>Kyle M. Bautista</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer" style="background-color: #f8f9fa;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 5px; padding: 10px 20px;">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- 2 -->
<div class="modal fade" id="officialModal2" tabindex="-1" role="dialog" aria-labelledby="officialModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="border: 1px solid #ccc; border-radius: 8px; background-color: #fdfdfd;">
            <div class="modal-header text-center" style="background-color: #870000; color: #fff; padding: 20px; border-bottom: 4px solid #f0f0f0;">
                <h5 class="modal-title w-100 font-weight-bold" id="officialModalLabel">Barangay Officials</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <div class="row">
                    <!-- Barangay Officials Section -->
                    <div class="col-md-6 mb-3">
                        <div class="officials-section shadow-sm" style="background-color: #f8f9fa; padding: 15px; border-radius: 8px; border: 1px solid #ddd;">
                            <h6 class="text-center font-weight-bold mb-3" style="color: #343a40;">Punong Barangay</h6>
                            <p class="text-center font-italic" style="color: #495057;">Rowenna Bacolod Tayo</p>
                            <h6 class="text-center font-weight-bold mt-4 mb-3" style="color: #343a40;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #495057; font-size: 14px;">
                                <li>Juvy S. LocayLocay</li>
                                <li>Wilson P. Medallo</li>
                                <li>Arlene F. Almodiel</li>
                                <li>Ronald A. Ferrer</li>
                                <li>Zenaida T. Malaay</li>
                                <li>Leo P. Dela Cruz</li>
                                <li>Antonio Jore Alob</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Officials Section -->
                    <div class="col-md-6">
                        <div class="officials-section shadow-sm" style="background-color: #f8f9fa; padding: 15px; border-radius: 8px; border: 1px solid #ddd;">
                            <h6 class="text-center font-weight-bold mb-3" style="color: #343a40;">SK Chairman</h6>
                            <p class="text-center font-italic" style="color: #495057;">Jhacell Fernandez Benignos</p>
                            <h6 class="text-center font-weight-bold mt-4 mb-3" style="color: #343a40;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #495057; font-size: 14px;">
                                <li>Ryan A. Pasaylo</li>
                                <li>Johnro V. Dela Fuente</li>
                                <li>Faith Macabenta</li>
                                <li>Rysa Kate V. Escaran</li>
                                <li>Jarol Aronales</li>
                                <li>Kobi Jabes U. Ilosorio</li>
                                <li>Marilyn B. Bautro</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center" style="background-color: #f8f9fa; border-top: 1px solid #ddd;">
                <button type="button" class="btn btn-secondary px-4 py-2" data-dismiss="modal" style="border-radius: 5px; font-size: 14px;">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- 3 -->
<div class="modal fade" id="officialModal3" tabindex="-1" role="dialog" aria-labelledby="officialModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="border: 1px solid #ccc; border-radius: 8px; background-color: #fdfdfd;">
            <div class="modal-header text-center" style="background-color: #870000; color: #fff; padding: 20px; border-bottom: 4px solid #f0f0f0;">
                <h5 class="modal-title w-100 font-weight-bold" id="officialModalLabel">Barangay Officials</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <div class="row">
                    <!-- Barangay Officials Section -->
                    <div class="col-md-6 mb-3">
                        <div class="officials-section shadow-sm" style="background-color: #f8f9fa; padding: 15px; border-radius: 8px; border: 1px solid #ddd;">
                            <h6 class="text-center font-weight-bold mb-3" style="color: #343a40;">Punong Barangay</h6>
                            <p class="text-center font-italic" style="color: #495057;">Neil D. Caratao</p>
                            <h6 class="text-center font-weight-bold mt-4 mb-3" style="color: #343a40;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #495057; font-size: 14px;">
                                <li>Junril G. Postrero</li>
                                <li>Kevin G. Bacolod</li>
                                <li>Josephine M. Oftana</li>
                                <li>Romeo A. Medallo</li>
                                <li>Nestor B. Roxas</li>
                                <li>Roberto A. Umbao</li>
                                <li>Elpidio B. Mancio</li>
                            </ul>
                        </div>
                    </div>
                        <div class="col-md-6">
                        <div class="officials-section shadow-sm" style="background-color: #f8f9fa; padding: 15px; border-radius: 8px; border: 1px solid #ddd;">
                            <h6 class="text-center font-weight-bold mb-3" style="color: #343a40;">SK Chairman</h6>
                            <p class="text-center font-italic" style="color: #495057;">April Rose Gahi</p>
                            <h6 class="text-center font-weight-bold mt-4 mb-3" style="color: #343a40;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #495057; font-size: 14px;">
                                <li>Ervin G. Yee</li>
                                <li>Grace Star B. Medallo</li>
                                <li>Marilou S. Lawan</li>
                                <li>Glenell Grande</li>
                                <li>Ian Jude R. Tayo</li>
                                <li>Sophie D. Manto</li>
                                <li>Rusthea S. Alolor</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center" style="background-color: #f8f9fa; border-top: 1px solid #ddd;">
                <button type="button" class="btn btn-secondary px-4 py-2" data-dismiss="modal" style="border-radius: 5px; font-size: 14px;">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- 4 -->
<div class="modal fade" id="officialModal4" tabindex="-1" role="dialog" aria-labelledby="officialModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="border: 1px solid #ccc; border-radius: 8px; background-color: #fdfdfd;">
            <div class="modal-header text-center" style="background-color: #870000; color: #fff; padding: 20px; border-bottom: 4px solid #f0f0f0;">
                <h5 class="modal-title w-100 font-weight-bold" id="officialModalLabel">Barangay Officials</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <div class="row">
                    <!-- Barangay Officials Section -->
                    <div class="col-md-6 mb-3">
                        <div class="officials-section shadow-sm" style="background-color: #f8f9fa; padding: 15px; border-radius: 8px; border: 1px solid #ddd;">
                            <h6 class="text-center font-weight-bold mb-3" style="color: #343a40;">Punong Barangay</h6>
                            <p class="text-center font-italic" style="color: #495057;">Magdalina B. Marollano</p>
                            <h6 class="text-center font-weight-bold mt-4 mb-3" style="color: #343a40;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #495057; font-size: 14px;">
                                <li>Tita C. Ilosorio</li>
                                <li>Edwin P. Bautro</li>
                                <li>Felix B. LocayLocay</li>
                                <li>Leonora M. Cabasag</li>
                                <li>Joe Carlo N. Villacarlos</li>
                                <li>Allan B. Marollano</li>
                                <li>Eupeniano P. Bautro Jr.</li>
                            </ul>
                        </div>
                    </div>
                    <!-- SK Officials Section -->
                    <div class="col-md-6">
                        <div class="officials-section shadow-sm" style="background-color: #f8f9fa; padding: 15px; border-radius: 8px; border: 1px solid #ddd;">
                            <h6 class="text-center font-weight-bold mb-3" style="color: #343a40;">SK Chairman</h6>
                            <p class="text-center font-italic" style="color: #495057;">Yama S. Desamparado</p>
                            <h6 class="text-center font-weight-bold mt-4 mb-3" style="color: #343a40;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #495057; font-size: 14px;">
                                <li>Rico B. Cena</li>
                                <li>Jeam I. Batoy</li>
                                <li>Renato L. Seville Jr.</li>
                                <li>Judy Ann B. Descartin</li>
                                <li>Marven A. Batoy</li>
                                <li>Emelyn Kuan Dela Pena</li>
                                <li>Ever John D. Ilosorio</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center" style="background-color: #f8f9fa; border-top: 1px solid #ddd;">
                <button type="button" class="btn btn-secondary px-4 py-2" data-dismiss="modal" style="border-radius: 5px; font-size: 14px;">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- 5 -->
<div class="modal fade" id="officialModal5" tabindex="-1" role="dialog" aria-labelledby="officialModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="border: 1px solid #ccc; border-radius: 8px; background-color: #fdfdfd;">
            <div class="modal-header text-center" style="background-color: #870000; color: #fff; padding: 20px; border-bottom: 4px solid #f0f0f0;">
                <h5 class="modal-title w-100 font-weight-bold" id="officialModalLabel">Barangay Officials</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <div class="row">
                    <!-- Barangay Officials Section -->
                    <div class="col-md-6 mb-3">
                        <div class="officials-section shadow-sm" style="background-color: #f8f9fa; padding: 15px; border-radius: 8px; border: 1px solid #ddd;">
                            <h6 class="text-center font-weight-bold mb-3" style="color: #343a40;">Punong Barangay</h6>
                            <p class="text-center font-italic" style="color: #495057;">Dolores D. Bastusbatusan</p>
                            <h6 class="text-center font-weight-bold mt-4 mb-3" style="color: #343a40;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #495057; font-size: 14px;">
                                <li>Marineth D. Olingay</li>
                                <li>Glennmar J. Cueva</li>
                                <li>Francisco I. Batiancila</li>
                                <li>Jiona C. Moradas</li>
                                <li>Joaness A. Cervantes</li>
                                <li>Luis M. Visagar Jr.</li>
                                <li>Rafael B. Baulita</li>
                            </ul>
                        </div>
                    </div>
                    <!-- SK Officials Section -->
                    <div class="col-md-6">
                        <div class="officials-section shadow-sm" style="background-color: #f8f9fa; padding: 15px; border-radius: 8px; border: 1px solid #ddd;">
                            <h6 class="text-center font-weight-bold mb-3" style="color: #343a40;">SK Chairman</h6>
                            <p class="text-center font-italic" style="color: #495057;">Runel Bausin Gigante</p>
                            <h6 class="text-center font-weight-bold mt-4 mb-3" style="color: #343a40;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #495057; font-size: 14px;">
                                <li>Genevie B. Mulle</li>
                                <li>Naicee C. Cervantes</li>
                                <li>Jackie Alexis Z. Mulle</li>
                                <li>Rogelio M. Baulita Jr.</li>
                                <li>Lhuwella Cueva</li>
                                <li>Ryan A. Gopong</li>
                                <li>John Mark D. Escala</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center" style="background-color: #f8f9fa; border-top: 1px solid #ddd;">
                <button type="button" class="btn btn-secondary px-4 py-2" data-dismiss="modal" style="border-radius: 5px; font-size: 14px;">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- 6 -->
<div class="modal fade" id="officialModal6" tabindex="-1" role="dialog" aria-labelledby="officialModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="border: 1px solid #ccc; border-radius: 8px; background-color: #fdfdfd;">
            <div class="modal-header text-center" style="background-color: #870000; color: #fff; padding: 20px; border-bottom: 4px solid #f0f0f0;">
                <h5 class="modal-title w-100 font-weight-bold" id="officialModalLabel">Barangay Officials</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <div class="row">
                    <!-- Barangay Officials Section -->
                    <div class="col-md-6 mb-3">
                        <div class="officials-section shadow-sm" style="background-color: #f8f9fa; padding: 15px; border-radius: 8px; border: 1px solid #ddd;">
                            <h6 class="text-center font-weight-bold mb-3" style="color: #343a40;">Punong Barangay</h6>
                            <p class="text-center font-italic" style="color: #495057;">Joevic S. Villaceran</p>
                            <h6 class="text-center font-weight-bold mt-4 mb-3" style="color: #343a40;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #495057; font-size: 14px;">
                                <li>Ma. Lucia Q. Niedo</li>
                                <li>Luis A. Santillan</li>
                                <li>Maura S. Pastiteo</li>
                                <li>Romeo E. Muller Jr.</li>
                                <li>Romeo D. Cena</li>
                                <li>Eduardo V. Giganto</li>
                                <li>Maria Joyce V. Durias</li>
                            </ul>
                        </div>
                    </div>
                    <!-- SK Officials Section -->
                    <div class="col-md-6">
                        <div class="officials-section shadow-sm" style="background-color: #f8f9fa; padding: 15px; border-radius: 8px; border: 1px solid #ddd;">
                            <h6 class="text-center font-weight-bold mb-3" style="color: #343a40;">SK Chairman</h6>
                            <p class="text-center font-italic" style="color: #495057;">Nathaniel V. Moradas</p>
                            <h6 class="text-center font-weight-bold mt-4 mb-3" style="color: #343a40;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #495057; font-size: 14px;">
                                <li>Cilcres S. Seville</li>
                                <li>Johna F. Santillan</li>
                                <li>Jessa Mae S. Quezon</li>
                                <li>John Michael A. Bausin</li>
                                <li>Ford C. Cervantes Jr.</li>
                                <li>Regeline M. Despi</li>
                                <li>Kyla Marie G. Arranguez</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center" style="background-color: #f8f9fa; border-top: 1px solid #ddd;">
                <button type="button" class="btn btn-secondary px-4 py-2" data-dismiss="modal" style="border-radius: 5px; font-size: 14px;">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- 7 -->
<div class="modal fade" id="officialModal7" tabindex="-1" role="dialog" aria-labelledby="officialModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="border: 1px solid #ccc; border-radius: 8px; background-color: #fdfdfd;">
            <div class="modal-header text-center" style="background-color: #870000; color: #fff; padding: 20px; border-bottom: 4px solid #f0f0f0;">
                <h5 class="modal-title w-100 font-weight-bold" id="officialModalLabel">Barangay Officials</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <div class="row">
                    <!-- Barangay Officials Section -->
                    <div class="col-md-6 mb-3">
                        <div class="officials-section shadow-sm" style="background-color: #f8f9fa; padding: 15px; border-radius: 8px; border: 1px solid #ddd;">
                            <h6 class="text-center font-weight-bold mb-3" style="color: #343a40;">Punong Barangay</h6>
                            <p class="text-center font-italic" style="color: #495057;">Jesus V. Villacarlos</p>
                            <h6 class="text-center font-weight-bold mt-4 mb-3" style="color: #343a40;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #495057; font-size: 14px;">
                                <li>Richard D. Santillan</li>
                                <li>Daniel L. Ofqeuria</li>
                                <li>Dindo C. Parochel</li>
                                <li>Rogelio D. Gilbuela</li>
                                <li>Vicente D. Cena</li>
                                <li>Justino S. Despi</li>
                                <li>Cristita S. Vicoy</li>
                            </ul>
                        </div>
                    </div>
                    <!-- SK Officials Section -->
                    <div class="col-md-6">
                        <div class="officials-section shadow-sm" style="background-color: #f8f9fa; padding: 15px; border-radius: 8px; border: 1px solid #ddd;">
                            <h6 class="text-center font-weight-bold mb-3" style="color: #343a40;">SK Chairman</h6>
                            <p class="text-center font-italic" style="color: #495057;">John Wilfred Dela Pena</p>
                            <h6 class="text-center font-weight-bold mt-4 mb-3" style="color: #343a40;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #495057; font-size: 14px;">
                                <li>Johanna N. Dela Pena</li>
                                <li>Alphie F. Cordova</li>
                                <li>Matthew D. Mulle</li>
                                <li>Jeric Desuyo</li>
                                <li>John Paul S. Despi</li>
                                <li>Jean Mery Gold Dela Fuente</li>
                                <li>Jester U. Batusbatusan</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center" style="background-color: #f8f9fa; border-top: 1px solid #ddd;">
                <button type="button" class="btn btn-secondary px-4 py-2" data-dismiss="modal" style="border-radius: 5px; font-size: 14px;">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- 8 -->
 <!-- Modal -->
<div class="modal fade" id="officialModal8" tabindex="-1" role="dialog" aria-labelledby="officialModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background-color: #f8f9fa; border-radius: 8px;">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: #b22222; color: #fff; text-align: center; padding: 15px;">
                <h5 class="modal-title w-100 text-center" id="officialModalLabel">Barangay Officials</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="row">
                    <!-- Punong Barangay Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Punong Barangay</h6>
                            <p class="text-center" style="color: #444;">Rexiber Santillan Villaceran</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                                <li>Eric S. Despi</li>
                                <li>Emelita M. Forsuelo</li>
                                <li>Analina A. Santillan</li>
                                <li>Rosalino S. Forrosuelo</li>
                                <li>Virgie M. Villaceran</li>
                                <li>Norma S. Jimenez</li>
                                <li>Bartolome D. Mansueto</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Chairman Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">SK Chairman</h6>
                            <p class="text-center" style="color: #444;">Alviniel Alolor Giganto</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                                <li>Tricia Mae G. Caranao</li>
                                <li>Renante O. Ducay</li>
                                <li>Jade Lawrence D. Enero</li>
                                <li>Jericho Despi</li>
                                <li>Aljun Y. Placencia</li>
                                <li>Felix L. Abellanosa Jr.</li>
                                <li>Marvin D. Sarabia</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 5px;">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- 9 -->
<div class="modal fade" id="officialModal9" tabindex="-1" role="dialog" aria-labelledby="officialModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background-color: #f8f9fa; border-radius: 8px;">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: #b22222; color: #fff; text-align: center; padding: 15px;">
                <h5 class="modal-title w-100 text-center" id="officialModalLabel">Barangay Officials</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="row">
                    <!-- Punong Barangay Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Punong Barangay</h6>
                            <p class="text-center" style="color: #444;">Basilio Sinday Ducay</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                                <li>Lourdes M. Aniban</li>
                                <li>Eric M. Mansueto</li>
                                <li>Eduardo M. Tinga</li>
                                <li>Orlando D. Lim</li>
                                <li>Creselda D. Mansueto</li>
                                <li>Romeo G. Buhayan</li>
                                <li>Alfredo V. Ducay</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Chairperson Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">SK Chairperson</h6>
                            <p class="text-center" style="color: #444;">Joylaine Marie Dela Cruz</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                                <li>Jasper Despi</li>
                                <li>Mark James Ofianga</li>
                                <li>Clifford Sarabia</li>
                                <li>Alex Macario</li>
                                <li>Versil Villarino</li>
                                <li>Edryl Villacarlos</li>
                                <li>Brex Umbao</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 5px;">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- 10 -->
<div class="modal fade" id="officialModal10" tabindex="-1" role="dialog" aria-labelledby="officialModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background-color: #f8f9fa; border-radius: 8px;">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: #b22222; color: #fff; text-align: center; padding: 15px;">
                <h5 class="modal-title w-100 text-center" id="officialModalLabel">Barangay Officials</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="row">
                    <!-- Punong Barangay Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Punong Barangay</h6>
                            <p class="text-center" style="color: #444;">Pedro Bacolod Maru</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                                <li>Elmer A. Ducay</li>
                                <li>Ruel A. Batuigas</li>
                                <li>Johnny T. Duran</li>
                                <li>Erlinda D. Cataquez</li>
                                <li>Arnold U. Abello</li>
                                <li>Jose Jimeo P. Abello</li>
                                <li>Renita V. Maru</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Chairperson Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">SK Chairperson</h6>
                            <p class="text-center" style="color: #444;">Joshua Ungon Estellore</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                                <li>Aldwin G. Abello</li>
                                <li>Arnel S. Aropo</li>
                                <li>Kenjie Destroza</li>
                                <li>Aira V. Tendido</li>
                                <li>Janin T. Escala</li>
                                <li>Caren Jhoy T. Despi</li>
                                <li>Joesher C. Cervantes</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 5px;">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- 11 -->
<div class="modal fade" id="officialModal11" tabindex="-1" role="dialog" aria-labelledby="officialModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background-color: #f8f9fa; border-radius: 8px;">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: #b22222; color: #fff; text-align: center; padding: 15px;">
                <h5 class="modal-title w-100 text-center" id="officialModalLabel">Barangay Officials</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="row">
                    <!-- Punong Barangay Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Punong Barangay</h6>
                            <p class="text-center" style="color: #444;">Roger Garcia Alegre</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                                <li>Maricel M. Desuyo</li>
                                <li>Marlyn F. Alon</li>
                                <li>Rogelio B. Clemente</li>
                                <li>Romeo G. Chavez</li>
                                <li>Renante A. Chavez</li>
                                <li>Euberto J. Cabaling</li>
                                <li>Reymando T. Escarro</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Chairperson Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">SK Chairperson</h6>
                            <p class="text-center" style="color: #444;">Gregorio Giganto Ofianga Jr.</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                                <li>Dennis O. Ungon</li>
                                <li>Kiah Bacolod</li>
                                <li>Aljun C. Forrosuello</li>
                                <li>Louisee Ann T. Jupia</li>
                                <li>Margie G. Villacarlos</li>
                                <li>Allysa Joy D. Reboton</li>
                                <li>John Paul M. Rasonable</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 5px;">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- 12 -->
<div class="modal fade" id="officialModal12" tabindex="-1" role="dialog" aria-labelledby="officialModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background-color: #f8f9fa; border-radius: 8px;">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: #b22222; color: #fff; text-align: center; padding: 15px;">
                <h5 class="modal-title w-100 text-center" id="officialModalLabel">Barangay Officials</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="row">
                    <!-- Punong Barangay Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Punong Barangay</h6>
                            <p class="text-center" style="color: #444;">Alen Gido Chavez</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                                <li>Marissa C. Tayactac</li>
                                <li>Jeiann M. Marfa</li>
                                <li>Gemma E. Maru</li>
                                <li>Marcos E. Boltron</li>
                                <li>Brendo A. Batasin-in</li>
                                <li>Roberto E. Potayre</li>
                                <li>Lino A. Chavez</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Chairperson Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">SK Chairperson</h6>
                            <p class="text-center" style="color: #444;">James Clarence C. Rosell</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                                <li>Ma. Amifaith T. Rayco</li>
                                <li>Archie B. Chavez</li>
                                <li>Justine A. Alzate</li>
                                <li>Ramil S. Bautro Jr.</li>
                                <li>Christian E. Maru</li>
                                <li>John Lynded L. Patria</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 5px;">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- 13 -->
<div class="modal fade" id="officialModal13" tabindex="-1" role="dialog" aria-labelledby="officialModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background-color: #f8f9fa; border-radius: 8px;">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: #b22222; color: #fff; text-align: center; padding: 15px;">
                <h5 class="modal-title w-100 text-center" id="officialModalLabel">Barangay Officials</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="row">
                    <!-- Punong Barangay Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Punong Barangay</h6>
                            <p class="text-center" style="color: #444;">Salvador Marfa Villaruel Jr</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                                <li>Arthur N. Layese</li>
                                <li>Andy Val G. Honofre</li>
                                <li>Lauro B. Batasin-in</li>
                                <li>Ralph Kevin Quiamco</li>
                                <li>Maria Ernie F. Reyes</li>
                                <li>Maria Liza Lim Bacolod</li>
                                <li>William R. Macawili</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Chairperson Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">SK Chairperson</h6>
                            <p class="text-center" style="color: #444;">Jeam Nazed A. Burgos</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                                <li>Aaron O. Denaga</li>
                                <li>Joffer D. Abano</li>
                                <li>Julie Ann H. Albaciete</li>
                                <li>Jason Cahutay</li>
                                <li>Joan Palomar</li>
                                <li>Perly Batiancila</li>
                                <li>John Miel I. Barco</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 5px;">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- 14 -->
<div class="modal fade" id="officialModal14" tabindex="-1" role="dialog" aria-labelledby="officialModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background-color: #f8f9fa; border-radius: 8px;">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: #b22222; color: #fff; text-align: center; padding: 15px;">
                <h5 class="modal-title w-100 text-center" id="officialModalLabel">Barangay Officials</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="row">
                    <!-- Punong Barangay Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Punong Barangay</h6>
                            <p class="text-center" style="color: #444;">Jerry Solomon Caranzo</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                                <li>Sofio C. Gido Jr.</li>
                                <li>Jimmy G. Cahutay</li>
                                <li>Bernardo O. Oflas</li>
                                <li>Gemma C. Gilbuela/li>
                                <li>Erwin B. Corridor</li>
                                <li>Cristina S. Caranzo</li>
                                <li>Maria Lezel Despi Hyer</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Chairperson Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">SK Chairperson</h6>
                            <p class="text-center" style="color: #444;">Ritchie Santillan Sinday</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                                <li>Fatima T. Agot</li>
                                <li>Gemmalyn Ducay</li>
                                <li>Juniel M. Cahutay</li>
                                <li>Joshua M. Bacolody</li>
                                <li>Mary Jean N. Paragsa</li>
                                <li>James Ryan D. Ilustrisimo</li>
                                <li>Rico U. Magallanes</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 5px;">Close</button>
            </div>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
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
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>
