<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Officials - Bantayan</title>
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
    background-image: url('assets/img/green1.jpg'); /* Replace with the path to your image */
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
<section class="text-white text-center py-10" style="background: linear-gradient(to right, #91B294, #617C58);">
    <h1 class="text-4xl font-bold mb-3" style="color: white; font-family: 'Merriweather', serif;">Barangay Officials</h1>
    <p class="text-lg" style="color: white; font-family: 'Merriweather', serif;">Meet the dedicated leaders serving the community of Bantayan.</p>
</section>

<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Barangay Official 1 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1000">
                <img src="assets/img/officialman.png" alt="Barangay Official 1" class="official-img">
                <h4>Hon. Henry S. Santillan</h4>
                <p>Barangay Captain of Atop-Atop</p>
                <a href="#" class="small-text" data-toggle="modal" data-target="#officialModal">See Official</a>
            </div>
        </div>

        <!-- Barangay Official 2 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1200">
                <img src="assets/img/officialman.png" alt="Barangay Official 2" class="official-img">
                <h4>Hon. Vicente P. Duarte Jr.</h4>
                <p>Barangay Captain of Baigad</p>
                <a href="#" class="small-text" data-toggle="modal" data-target="#officialModal2">See Official</a>
            </div>
        </div>

        <!-- Barangay Official 3 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1400">
                <img src="assets/img/officialman.png" alt="Barangay Official 3" class="official-img">
                <h4>Hon. Elisio A. Villacarlos</h4>
                <p>Barangay Captain of Baod</p>
                <a href="#" class="small-text" data-toggle="modal" data-target="#officialModal3">See Official</a>
            </div>
        </div>

        <!-- Barangay Official 4 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1500">
                <img src="assets/img/officialman.png" alt="Barangay Official 4" class="official-img">
                <h4>Hon. Edmar Niño B. Layese</h4>
                <p>Barangay Captain of Binaobao</p>
                <a href="#" class="small-text" data-toggle="modal" data-target="#officialModal4">See Official</a>
            </div>
        </div>

        <!-- Barangay Official 5 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1600">
                <img src="assets/img/officialman.png" alt="Barangay Official 5" class="official-img">
                <h4>Hon. Wayne Philip C. Bihag</h4>
                <p>Barangay Captain of Botigues</p>
                <a href="#" class="small-text" data-toggle="modal" data-target="#officialModal5">See Official</a>
            </div>
        </div>

        <!-- Barangay Official 6 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1700">
                <img src="assets/img/officialman.png" alt="Barangay Official 6" class="official-img">
                <h4>Hon. Bernardino S. Kaquilala</h4>
                <p>Barangay Captain of Kabac</p>
                <a href="#" class="small-text" data-toggle="modal" data-target="#officialModal6">See Official</a>
            </div>
        </div>

        <!-- Barangay Official 7 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1800">
                <img src="assets/img/officialman.png" alt="Barangay Official 7" class="official-img">
                <h4>Hon. Nemesio D. Mansueto Jr.</h4>
                <p>Barangay Captain of Doong</p>
                <a href="#" class="small-text" data-toggle="modal" data-target="#officialModal7">See Official</a>
            </div>
        </div>

        <!-- Barangay Official 8 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1900">
                <img src="assets/img/officialman.png" alt="Barangay Official 8" class="official-img">
                <h4>Hon. Nelson A. Abello Sr.</h4>
                <p>Barangay Captain of Guiwanon</p>
                <a href="#" class="small-text" data-toggle="modal" data-target="#officialModal8">See Official</a>
            </div>
        </div>

        <!-- Barangay Official 9 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="2000">
                <img src="assets/img/officialwomen.png" alt="Barangay Official 9" class="official-img">
                <h4>Hon. Michelle U. Sumilhig</h4>
                <p>Barangay Captain of Hilotongan</p>
                <a href="#" class="small-text" data-toggle="modal" data-target="#officialModal9">See Official</a>
            </div>
        </div>

        <!-- Barangay Official 10 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="2100">
                <img src="assets/img/officialman.png" alt="Barangay Official 10" class="official-img">
                <h4>Hon. Jupiter Stalin M. Larida</h4>
                <p>Barangay Captain of Kabangbang</p>
                <a href="#" class="small-text" data-toggle="modal" data-target="#officialModal10">See Official</a>
            </div>
        </div>
    </div>
</div>

        <div class="row">
    <div class="col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1500">
        <div class="officials-card text-center">
            <img src="assets/img/officialwomen.png" alt="Barangay Official 2" class="official-img">
            <h4>Hon. Gloria A. Igot</h4>
            <p>Barangay Captain of Kampingganon</p>
            <a href="#" data-toggle="modal" data-target="#officialModal11" class="small-text">See Official</a>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1600">
        <div class="officials-card text-center">
            <img src="assets/img/officialman.png" alt="Barangay Official 2" class="official-img">
            <h4>Hon. Jose T. Sevilleno</h4>
            <p>Barangay Captain of Kangkaibe</p>
            <a href="#" data-toggle="modal" data-target="#officialModal12" class="small-text">See Official</a>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1700">
        <div class="officials-card text-center">
            <img src="assets/img/officialman.png" alt="Barangay Official 2" class="official-img">
            <h4>Hon. Orlando B. Alico Jr.</h4>
            <p>Barangay Captain of Lipayran</p>
            <a href="#" data-toggle="modal" data-target="#officialModal13" class="small-text">See Official</a>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1800">
        <div class="officials-card text-center">
            <img src="assets/img/officialwomen.png" alt="Barangay Official 2" class="official-img">
            <h4>Hon. Epifania B. Pastoriza</h4>
            <p>Barangay Captain of Luyongbaybay</p>
            <a href="#" data-toggle="modal" data-target="#officialModal14" class="small-text">See Official</a>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1800">
        <div class="officials-card text-center">
            <img src="assets/img/officialwomen.png" alt="Barangay Official 2" class="official-img">
            <h4>Hon. Melona L. Batolbatol</h4>
            <p>Barangay Captain of Mojon</p>
            <a href="#" data-toggle="modal" data-target="#officialModal15" class="small-text">See Official</a>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1800">
        <div class="officials-card text-center">
            <img src="assets/img/officialman.png" alt="Barangay Official 2" class="official-img">
            <h4>Hon. Jesus P. Batobalonos</h4>
            <p>Barangay Captain of Obo-ob</p>
            <a href="#" data-toggle="modal" data-target="#officialModal16" class="small-text">See Official</a>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1800">
        <div class="officials-card text-center">
            <img src="assets/img/officialwomen.png" alt="Barangay Official 2" class="official-img">
            <h4>Hon. Visitacion P. Wenes</h4>
            <p>Barangay Captain of Patao</p>
            <a href="#" data-toggle="modal" data-target="#officialModal17" class="small-text">See Official</a>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1800">
        <div class="officials-card text-center">
            <img src="assets/img/officialman.png" alt="Barangay Official 2" class="official-img">
            <h4>Hon. Roldan V. Ducay</h4>
            <p>Barangay Captain of Putian</p>
            <a href="#" data-toggle="modal" data-target="#officialModal18" class="small-text">See Official</a>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1800">
        <div class="officials-card text-center">
            <img src="assets/img/officialman.png" alt="Barangay Official 2" class="official-img">
            <h4>Hon. Peter N. Ysulan</h4>
            <p>Barangay Captain of Sillon</p>
            <a href="#" data-toggle="modal" data-target="#officialModal19" class="small-text">See Official</a>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1800">
        <div class="officials-card text-center">
            <img src="assets/img/officialman.png" alt="Barangay Official 2" class="official-img">
            <h4>Songko! No barangay official's found!</h4>
            <p>Barangay Captain of Songko</p>
            <a href="#" data-toggle="modal" data-target="#officialModal20" class="small-text">See Official</a>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1800">
        <div class="officials-card text-center">
            <img src="assets/img/officialman.png" alt="Barangay Official 2" class="official-img">
            <h4>Hon. Clifford A. May</h4>
            <p>Barangay Captain of Suba</p>
            <a href="#" data-toggle="modal" data-target="#officialModal21" class="small-text">See Official</a>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1800">
        <div class="officials-card text-center">
            <img src="assets/img/officialman.png" alt="Barangay Official 2" class="official-img">
            <h4>Hon. Alberto S. Gierran</h4>
            <p>Barangay Captain of Sulangan</p>
            <a href="#" data-toggle="modal" data-target="#officialModal22" class="small-text">See Official</a>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1800">
        <div class="officials-card text-center">
            <img src="assets/img/officialwomen.png" alt="Barangay Official 2" class="official-img">
            <h4>Hon. Maria C. Gallardo</h4>
            <p>Barangay Captain of Tamiao</p>
            <a href="#" data-toggle="modal" data-target="#officialModal23" class="small-text">See Official</a>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1800">
        <div class="officials-card text-center">
            <img src="assets/img/officialman.png" alt="Barangay Official 2" class="official-img">
        <h4>Hon. Claudio I. Quinapondan</h4>
            <p>Barangay Captain of Bantigue</p>
            <a href="#" data-toggle="modal" data-target="#officialModal24" class="small-text">See Official</a>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1800">
        <div class="officials-card text-center">
            <img src="assets/img/officialwomen.png" alt="Barangay Official 2" class="official-img">
        <h4>Hon. Ana Eva S. Alvaras</h4>
            <p>Barangay Captain of Ticad</p>
            <a href="#" data-toggle="modal" data-target="#officialModal25" class="small-text">See Official</a>
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
                            <p class="text-center" style="color: #444; font-size: 16px; margin-bottom: 20px;">Henry S. Santillan</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444; font-size: 14px;">
                                <li>Rose Mae D. Duba</li>
                                <li>Alfedo A. Almohallas</li>
                                <li>Jay-Ann M. Dela Peña</li>
                                <li>Cerila M. Desales</li>
                                <li>Felomina E. Ariola</li>
                                <li>Felix D. Desabille</li>
                                <li>Benjamin N. Ribo</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Officials Section -->
                    <div class="col-md-6">
                        <div style="background: linear-gradient(to bottom, #f0f0f0, #e9ecef); padding: 20px; border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">SK Chairman</h6>
                            <p class="text-center" style="color: #444; font-size: 16px; margin-bottom: 20px;">Albert John N. Suazo</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #444; font-size: 14px;">
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
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
                            <p class="text-center font-italic" style="color: #495057;">Vincente P. Duarte Jr.</p>
                            <h6 class="text-center font-weight-bold mt-4 mb-3" style="color: #343a40;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #495057; font-size: 14px;">
                                <li>Dexter V. Ybañez</li>
                                <li>Antionio M. Cartajena Sr.</li>
                                <li>Mary Jean Escaña</li>
                                <li>Rex P. Villanueva</li>
                                <li>Marina E. Arriesgado</li>
                                <li>Ana Mae A. Alontaga</li>
                                <li>Manuel C. Salvado</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Officials Section -->
                    <div class="col-md-6">
                        <div class="officials-section shadow-sm" style="background-color: #f8f9fa; padding: 15px; border-radius: 8px; border: 1px solid #ddd;">
                            <h6 class="text-center font-weight-bold mb-3" style="color: #343a40;">SK Chairman</h6>
                            <p class="text-center font-italic" style="color: #495057;">Jianne Margarett M. Forrosuelo</p>
                            <h6 class="text-center font-weight-bold mt-4 mb-3" style="color: #343a40;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #495057; font-size: 14px;">
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
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
                            <p class="text-center font-italic" style="color: #495057;">Elisio A. Villacarlos</p>
                            <h6 class="text-center font-weight-bold mt-4 mb-3" style="color: #343a40;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #495057; font-size: 14px;">
                            <li>Perla M. Forrosuelo</li>
    <li>Jovencio S. Polo Jr.</li>
    <li>Gina P. Alontaga</li>
    <li>Agapita D. Manapo</li>
    <li>Antonio C. Caraos</li>
    <li>Nelson Q. Larida</li>
    <li>Esmeralda F. Descartin</li>
                            </ul>
                        </div>
                    </div>
                        <div class="col-md-6">
                        <div class="officials-section shadow-sm" style="background-color: #f8f9fa; padding: 15px; border-radius: 8px; border: 1px solid #ddd;">
                            <h6 class="text-center font-weight-bold mb-3" style="color: #343a40;">SK Chairman</h6>
                            <p class="text-center font-italic" style="color: #495057;">Gerardo F. Mata Jr.</p>
                            <h6 class="text-center font-weight-bold mt-4 mb-3" style="color: #343a40;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #495057; font-size: 14px;">
                            <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
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
                            <p class="text-center font-italic" style="color: #495057;">Edmar Niño B. Layese</p>
                            <h6 class="text-center font-weight-bold mt-4 mb-3" style="color: #343a40;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #495057; font-size: 14px;">
                            <li>Raymond Louie V. Menchavez</li>
    <li>Myrna L. Desamparado</li>
    <li>Eugene B. Batuigas</li>
    <li>Joselito L. Batuigas</li>
    <li>Nilda Y. Eayte</li>
    <li>Jayson L. Maribao</li>
                            </ul>
                        </div>
                    </div>
                    <!-- SK Officials Section -->
                    <div class="col-md-6">
                        <div class="officials-section shadow-sm" style="background-color: #f8f9fa; padding: 15px; border-radius: 8px; border: 1px solid #ddd;">
                            <h6 class="text-center font-weight-bold mb-3" style="color: #343a40;">SK Chairman</h6>
                            <p class="text-center font-italic" style="color: #495057;">-</p>
                            <h6 class="text-center font-weight-bold mt-4 mb-3" style="color: #343a40;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #495057; font-size: 14px;">
                            <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                            
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
                            <p class="text-center font-italic" style="color: #495057;">Wayne Philip C. Bihag</p>
                            <h6 class="text-center font-weight-bold mt-4 mb-3" style="color: #343a40;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #495057; font-size: 14px;">
                            <li>Dohnel A. Ompad</li>
    <li>Jose Allan P. Aloria</li>
    <li>Ma Socorro D. Cordova</li>
    <li>Amelito C. Ompad</li>
    <li>Milabel A. Cañete</li>
    <li>Harold E. Cesa</li>
    <li>Orland C. Bancolita</li>
                            </ul>
                        </div>
                    </div>
                    <!-- SK Officials Section -->
                    <div class="col-md-6">
                        <div class="officials-section shadow-sm" style="background-color: #f8f9fa; padding: 15px; border-radius: 8px; border: 1px solid #ddd;">
                            <h6 class="text-center font-weight-bold mb-3" style="color: #343a40;">SK Chairman</h6>
                            <p class="text-center font-italic" style="color: #495057;">Ydrian C. Nonay</p>
                            <h6 class="text-center font-weight-bold mt-4 mb-3" style="color: #343a40;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #495057; font-size: 14px;">
                            <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                            
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
                            <p class="text-center font-italic" style="color: #495057;">Bernardino S. Kaquilala</p>
                            <h6 class="text-center font-weight-bold mt-4 mb-3" style="color: #343a40;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #495057; font-size: 14px;">
                            <li>Mercedes D. Ducay</li>
    <li>John Rey G. Mulle</li>
    <li>Leonardo D. Villaceran</li>
    <li>Leoniel J. Bataluna</li>
    <li>Roberto M. Zapa</li>
    <li>Roger S. Ofianga</li>
    <li>Darwin P. Tidoso</li>
                            </ul>
                        </div>
                    </div>
                    <!-- SK Officials Section -->
                    <div class="col-md-6">
                        <div class="officials-section shadow-sm" style="background-color: #f8f9fa; padding: 15px; border-radius: 8px; border: 1px solid #ddd;">
                            <h6 class="text-center font-weight-bold mb-3" style="color: #343a40;">SK Chairman</h6>
                            <p class="text-center font-italic" style="color: #495057;">Angelica D. Mulle</p>
                            <h6 class="text-center font-weight-bold mt-4 mb-3" style="color: #343a40;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #495057; font-size: 14px;">
                            <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
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
                            <p class="text-center font-italic" style="color: #495057;">Nemesio D. Mansueto Jr.</p>
                            <h6 class="text-center font-weight-bold mt-4 mb-3" style="color: #343a40;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #495057; font-size: 14px;">
                            <li>Amando C. Layon</li>
    <li>Renato S. Escala</li>
    <li>Ronquillo F. Marollano</li>
    <li>Israel B. Deiserto</li>
    <li>Reynaldo A. Garcia</li>
    <li>Tobias N. Seares</li>
    <li>Edgardo P. Ejes</li>
                            </ul>
                        </div>
                    </div>
                    <!-- SK Officials Section -->
                    <div class="col-md-6">
                        <div class="officials-section shadow-sm" style="background-color: #f8f9fa; padding: 15px; border-radius: 8px; border: 1px solid #ddd;">
                            <h6 class="text-center font-weight-bold mb-3" style="color: #343a40;">SK Chairman</h6>
                            <p class="text-center font-italic" style="color: #495057;">Joyce A. Marollano</p>
                            <h6 class="text-center font-weight-bold mt-4 mb-3" style="color: #343a40;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #495057; font-size: 14px;">
                            <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
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
                            <p class="text-center" style="color: #444;">Michelle U. Sumilhig</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>Martineta N. Paclibar</li>
    <li>Roger S. Escala</li>
    <li>Shiela Susana R. Paclibar</li>
    <li>Panchovilla F. Escala Sr.</li>
    <li>Magdavena S. Despi</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Chairman Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">SK Chairman</h6>
                            <p class="text-center" style="color: #444;">Panchovilla S. Escala Jr.</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
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
                            <p class="text-center" style="color: #444;">Nelson A. Abello Sr.</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>Aristeo B. Abello</li>
    <li>Janice G. Desamparado</li>
    <li>Sheila R. Ylagan</li>
    <li>Mariano M. Ybañez</li>
    <li>Buenaventura V. Cueva</li>
    <li>Pedro G. Ferandez</li>
    <li>Jed Erol M. Nemenzo</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Chairperson Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">SK Chairperson</h6>
                            <p class="text-center" style="color: #444;">Neil Brian V. Dela Peña</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
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
                            <p class="text-center" style="color: #444;">Jupiter Stalin M. Larida</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>Virginia S. Seville</li>
    <li>Nelive M. Espina</li>
    <li>Julito F. Cordova</li>
    <li>Jeffrey A. Lerida</li>
    <li>Violeta M. Miñoza</li>
    <li>Daniel A. Desucatan</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Chairperson Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">SK Chairperson</h6>
                            <p class="text-center" style="color: #444;">Clarrize Ann Marie G. Garcia</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
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
                            <p class="text-center" style="color: #444;">Gloria A. Igot</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>Ernesto D. Hingoyon</li>
    <li>Emilia T. Dela Cerna</li>
    <li>Angiela S. Santilan</li>
    <li>Edgar A. Cena Sr.</li>
    <li>Marciana A. Desucatan</li>
    <li>Delfin D. Reyes</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Chairperson Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">SK Chairperson</h6>
                            <p class="text-center" style="color: #444;">Teddy D. Mansueto</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
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
                            <p class="text-center" style="color: #444;">Jose T. Sevilleno</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>Timoteo C. Jadulco</li>
    <li>Jose Reidgel F. Seares</li>
    <li>Leo A. Bacolod</li>
    <li>Senon R. Sevilleno</li>
    <li>Evelyn S. Seares</li>
    <li>Carmelo P. Besana</li>
    <li>Antonio F. Pasco</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Chairperson Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">SK Chairperson</h6>
                            <p class="text-center" style="color: #444;">Leah Lyn V. Garcia</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
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
                            <p class="text-center" style="color: #444;">Orlando V. Alico Jr.</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>Nida S. Sayas</li>
    <li>Joshua P. Batuigas</li>
    <li>Orven B. Alico</li>
    <li>Roxanne B. Responde</li>
    <li>Amado Manuel M. Mabugat</li>
    <li>Celso F. Paglinawan</li>
    <li>Marivel B. Bucaling</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Chairperson Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">SK Chairperson</h6>
                            <p class="text-center" style="color: #444;">James Bryan G. Lopez</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
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
                            <p class="text-center" style="color: #444;">Epifania B. Pastoriza</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>Melanie A. Menchavez</li>
    <li>Winefredo P. Baruc</li>
    <li>Bonifacio A. Zapa</li>
    <li>Joseph B. Ariola</li>
    <li>Ritchie P. Niez</li>
    <li>Encarnacion C. Ybanez</li>
    <li>Norma G. Lastimoso</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Chairperson Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">SK Chairperson</h6>
                            <p class="text-center" style="color: #444;">-</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 15 -->
<div class="modal fade" id="officialModal15" tabindex="-1" role="dialog" aria-labelledby="officialModalLabel" aria-hidden="true">
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
                            <p class="text-center" style="color: #444;">Meluna L. BatolBatol</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>Mac Lester R. Villarino</li>
    <li>Romeo B. Layao</li>
    <li>Ma. Rina M. Ramas</li>
    <li>Lemuel Rey P. Deo</li>
    <li>Pascual S. Layao</li>
    <li>Florentino N. Limbaga Sr.</li>
    <li>Maria Luz V. Batayola</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Chairperson Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">SK Chairperson</h6>
                            <p class="text-center" style="color: #444;">Niño RAY O. Fuentes</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 16 -->
<div class="modal fade" id="officialModal16" tabindex="-1" role="dialog" aria-labelledby="officialModalLabel" aria-hidden="true">
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
                            <p class="text-center" style="color: #444;">Jesus P. Batobalonos</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>Roxan M. Descatiar</li>
    <li>Maria P. Abello</li>
    <li>Mareche L. Barrite</li>
    <li>Pedro A. Sarraga</li>
    <li>Rolando S. Abello</li>
    <li>Rufino V. Canayong</li>
    <li>Maribeth A. Suyko</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Chairperson Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">SK Chairperson</h6>
                            <p class="text-center" style="color: #444;">-</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 17 -->
<div class="modal fade" id="officialModal17" tabindex="-1" role="dialog" aria-labelledby="officialModalLabel" aria-hidden="true">
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
                            <p class="text-center" style="color: #444;">Visitacion P. Wenes</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>Clive Z. Villacampa</li>
    <li>Garry R. Mata</li>
    <li>Jerome C. Mata</li>
    <li>Sherne D. Mata</li>
    <li>Cristian D. Ducay</li>
    <li>Santos A. Ducay</li>
    <li>Carlos C. Alota</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Chairperson Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">SK Chairperson</h6>
                            <p class="text-center" style="color: #444;">Joshua B. Garcia</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 18 -->
<div class="modal fade" id="officialModal18" tabindex="-1" role="dialog" aria-labelledby="officialModalLabel" aria-hidden="true">
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
                            <p class="text-center" style="color: #444;">Roldan V. Ducay</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>Raul K. Ybanez</li>
    <li>Mary Joey B. Santillan</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Chairperson Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">SK Chairperson</h6>
                            <p class="text-center" style="color: #444;">-</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 19 -->
<div class="modal fade" id="officialModal19" tabindex="-1" role="dialog" aria-labelledby="officialModalLabel" aria-hidden="true">
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
                            <p class="text-center" style="color: #444;">Peter N. Ysulan</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>Jovito A. Dela Peña</li>
    <li>Dominador U. Desales</li>
    <li>Roberto D. Mata Jr.</li>
    <li>Mark Jil D. Yhapon</li>
    <li>Felix R. Hubahib</li>
    <li>Imelda N. Caracena</li>
    <li>Nenita P. Adorniga</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Chairperson Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">SK Chairperson</h6>
                            <p class="text-center" style="color: #444;">Kennan Jared B. Sevillano</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 20 -->
<div class="modal fade" id="officialModal20" tabindex="-1" role="dialog" aria-labelledby="officialModalLabel" aria-hidden="true">
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
                            <p class="text-center" style="color: #444;">-</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Chairperson Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">SK Chairperson</h6>
                            <p class="text-center" style="color: #444;">-</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 21 -->
<div class="modal fade" id="officialModal21" tabindex="-1" role="dialog" aria-labelledby="officialModalLabel" aria-hidden="true">
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
                            <p class="text-center" style="color: #444;">Clifford A. May</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>Leo Antonio E. Hubahib</li>
    <li>Jeffrey E. Giganto</li>
    <li>Edgar D. Layese</li>
    <li>Winston S. Orbeta</li>
    <li>Jose C. Agdon</li>
    <li>Jaime A. Gimenez</li>
    <li>Ramon E. Yaon</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Chairperson Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">SK Chairperson</h6>
                            <p class="text-center" style="color: #444;">Roque Earl A. Abello</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 22 -->
<div class="modal fade" id="officialModal22" tabindex="-1" role="dialog" aria-labelledby="officialModalLabel" aria-hidden="true">
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
                            <p class="text-center" style="color: #444;">Alberto S. Gierran</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Chairperson Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">SK Chairperson</h6>
                            <p class="text-center" style="color: #444;">-</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 23 -->
<div class="modal fade" id="officialModal23" tabindex="-1" role="dialog" aria-labelledby="officialModalLabel" aria-hidden="true">
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
                            <p class="text-center" style="color: #444;">Maria C. Gallardo</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>Teresita C. Ponce</li>
    <li>Reymon N. Batain</li>
    <li>Leonardo V. De La Peña Jr</li>
    <li>Winlove Y. Bajarias</li>
    <li>Jose D. Desucatan Sr.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Chairperson Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">SK Chairperson</h6>
                            <p class="text-center" style="color: #444;">Mike Lhester Y. Bayon-on Jr.</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 24 -->
<div class="modal fade" id="officialModal24" tabindex="-1" role="dialog" aria-labelledby="officialModalLabel" aria-hidden="true">
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
                            <p class="text-center" style="color: #444;">Claudio I. Quinapondan</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>Jean Linda E. Tallmadge</li>
    <li>Juvani D. Talandron</li>
    <li>Maricel M. Mariblanca</li>
    <li>Crisostomo T. Manzanares Sr.</li>
    <li>Job Z. Carabio Jr.</li>
    <li>Loreto D. Destreza Sr</li>
    <li>Ernesto G. Cueva</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Chairperson Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">SK Chairperson</h6>
                            <p class="text-center" style="color: #444;">Rodvil S. Quezon</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 25 -->
<div class="modal fade" id="officialModal25" tabindex="-1" role="dialog" aria-labelledby="officialModalLabel" aria-hidden="true">
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
                            <p class="text-center" style="color: #444;">Ana Eva S. Almaras</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>Nona P. Barretto</li>
    <li>Jupiter R. Pescante</li>
    <li>Erle M. Andrino</li>
    <li>Rodrigo A. Derecho Jr.</li>
    <li>Rogelio S. Deocampo</li>
    <li>Ray Elmer B. Batiancila</li>
    <li>Shahani S. Tan</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Chairperson Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">SK Chairperson</h6>
                            <p class="text-center" style="color: #444;">-</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Councilors</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
                                <li>-</li>
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
