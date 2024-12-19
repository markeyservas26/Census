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
    background-image: url('assets/img/blue.jpg'); /* Replace with the path to your image */
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
        <a href="index.php" style="color: black; margin-left: -10px;">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">Bantayan</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="about_municipality1.php">About Bantayan Municipality</a></li>
          <li><a class="dropdown-item" href="municipality_mayor1.php">Bantayan Municipality Mayor</a></li>
          <li><a class="dropdown-item" href="barangay_officials1.php">Bantayan Barangay Officials</a></li>
          <li><a class="dropdown-item" href="municipality_profile1.php">Bantayan Municipality Profile</a></li>
          <li><a class="dropdown-item" href="history_bantayan.php">Bantayan History</a></li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">Madridejos</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="about_municipality.php">About Madridejos Municipality</a></li>
          <li><a class="dropdown-item" href="municipality_mayor.php">Madridejos Municipality Mayor</a></li>
          <li><a class="dropdown-item" href="barangay_officials.php">Madridejos Barangay Officials</a></li>
          <li><a class="dropdown-item" href="municipality_profile.php">Madridejos Municipality Profile</a></li>
          <li><a class="dropdown-item" href="history_madridejos.php">Madridejos History</a></li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">Santa Fe</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="about_municipality2.php">About Santa Fe Municipality</a></li>
          <li><a class="dropdown-item" href="municipality_mayor2.php">Santa Fe Municipality Mayor</a></li>
          <li><a class="dropdown-item" href="barangay_officials2.php">Santa Fe Barangay Officials</a></li>
          <li><a class="dropdown-item" href="municipality_profile2.php">Santa Fe Municipality Profile</a></li>
          <li><a class="dropdown-item" href="history_santafe.php">Santa Fe History</a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="schedule.php" style="color: black; margin-left: -10px;">Schedule</a>
      </li>
      <li class="nav-item">
        <a href="about_us.php" style="color: black; margin-left: -10px;">About Us</a>
      </li>
    </ul>
  </div>
</nav>


  <!-- Desktop Navigation Menu (will be hidden on smaller screens) -->
  <nav id="navmenu" class="navmenu d-none d-md-flex" style="position: absolute; top: 25px; right: 10px; z-index: 1000; padding: 10px;">
    <ul class="d-flex gap-3">
      <li><a href="index.php" style="color: white; text-decoration: none;">Home</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">Bantayan</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="about_municipality1.php">About Bantayan Municipality</a></li>
          <li><a class="dropdown-item" href="municipality_mayor1.php">Bantayan Municipality Mayor</a></li>
          <li><a class="dropdown-item" href="barangay_officials1.php">Bantayan Barangay Officials</a></li>
          <li><a class="dropdown-item" href="municipality_profile1.php">Bantayan Municipality Profile</a></li>
          <li><a class="dropdown-item" href="history_bantayan.php">Bantayan History</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">Madridejos</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="about_municipality.php">About Madridejos Municipality</a></li>
          <li><a class="dropdown-item" href="municipality_mayor.php">Madridejos Municipality Mayor</a></li>
          <li><a class="dropdown-item" href="barangay_officials.php">Madridejos Barangay Officials</a></li>
          <li><a class="dropdown-item" href="municipality_profile.php">Madridejos Municipality Profile</a></li>
          <li><a class="dropdown-item" href="history_madridejos.php">Madridejos History</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">Santa Fe</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="about_municipality2.php">About Santa Fe Municipality</a></li>
          <li><a class="dropdown-item" href="municipality_mayor2.php">Santa Fe Municipality Mayor</a></li>
          <li><a class="dropdown-item" href="barangay_officials2.php">Santa Fe Barangay Officials</a></li>
          <li><a class="dropdown-item" href="municipality_profile2.php">Santa Fe Municipality Profile</a></li>
          <li><a class="dropdown-item" href="history_santafe.php">Santa Fe History</a></li>
        </ul>
      </li>
      <li><a href="schedule.php" style="color: white; text-decoration: none;">Schedule</a></li>
      <li><a href="about_us.php" style="color: white; text-decoration: none;">About Us</a></li>
    </ul>
  </nav>
</header>
<br>
<br>
<br>
<br>
<section class="text-white text-center py-10" style="background: linear-gradient(to right, #D8D2C6, #E6E0D5);">
    <h1 class="text-4xl font-bold mb-3" style="color: white; font-family: 'Merriweather', serif;">Barangay Officials</h1>
    <p class="text-lg" style="color: white; font-family: 'Merriweather', serif;">Meet the dedicated leaders serving the community of Santa Fe.</p>
</section>

<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Barangay Official 1 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1000">
                <img src="assets/img/officialwomen.png" alt="Barangay Official 1" class="official-img">
                <h4>Hon. Vilma A. Dawa</h4>
                <p>Barangay Captain of Hagdan</p>
                <a href="#" class="small-text" data-toggle="modal" data-target="#officialModal">See Official</a>
            </div>
        </div>

        <!-- Barangay Official 2 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1200">
                <img src="assets/img/officialman.png" alt="Barangay Official 2" class="official-img">
                <h4>Hon. Jenor E. Marabi</h4>
                <p>Barangay Captain of Hilantagaan</p>
                <a href="#" class="small-text" data-toggle="modal" data-target="#officialModal2">See Official</a>
            </div>
        </div>

        <!-- Barangay Official 3 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1400">
                <img src="assets/img/officialman.png" alt="Barangay Official 3" class="official-img">
                <h4>Hon. Marcos Gilbuena</h4>
                <p>Barangay Captain of Kinatarkan</p>
                <a href="#" class="small-text" data-toggle="modal" data-target="#officialModal3">See Official</a>
            </div>
        </div>

        <!-- Barangay Official 4 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1500">
                <img src="assets/img/officialman.png" alt="Barangay Official 4" class="official-img">
                <h4>No barangay official founded</h4>
                <p>Barangay Captain of Langob</p>
                <a href="#" class="small-text" data-toggle="modal" data-target="#officialModal4">See Official</a>
            </div>
        </div>

        <!-- Barangay Official 5 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1600">
                <img src="assets/img/officialman.png" alt="Barangay Official 5" class="official-img">
                <h4>Hon. Renato E. Saagundo</h4>
                <p>Barangay Captain of Maricaban</p>
                <a href="#" class="small-text" data-toggle="modal" data-target="#officialModal5">See Official</a>
            </div>
        </div>

        <!-- Barangay Official 6 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1700">
                <img src="assets/img/officialwomen.png" alt="Barangay Official 6" class="official-img">
                <h4>Hon. Mary Jean G. Dagatan</h4>
                <p>Barangay Captain of Okoy</p>
                <a href="#" class="small-text" data-toggle="modal" data-target="#officialModal6">See Official</a>
            </div>
        </div>

        <!-- Barangay Official 7 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1800">
                <img src="assets/img/officialman.png" alt="Barangay Official 7" class="official-img">
                <h4>Hon. Renato S. Bajalla</h4>
                <p>Barangay Captain of Poblacion</p>
                <a href="#" class="small-text" data-toggle="modal" data-target="#officialModal7">See Official</a>
            </div>
        </div>

        <!-- Barangay Official 8 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1900">
                <img src="assets/img/officialwomen.png" alt="Barangay Official 8" class="official-img">
                <h4>Hon. Madelyn C. Rayco</h4>
                <p>Barangay Captain of Balidbid</p>
                <a href="#" class="small-text" data-toggle="modal" data-target="#officialModal8">See Official</a>
            </div>
        </div>

        <!-- Barangay Official 9 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="2000">
                <img src="assets/img/officialwomen.png" alt="Barangay Official 9" class="official-img">
                <h4>Hon. Rafaelita E. Zaspa</h4>
                <p>Barangay Captain of Pooc</p>
                <a href="#" class="small-text" data-toggle="modal" data-target="#officialModal9">See Official</a>
            </div>
        </div>

        <!-- Barangay Official 10 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="2100">
                <img src="assets/img/officialman.png" alt="Barangay Official 10" class="official-img">
                <h4>Hon. Rogelito G. Cabrera</h4>
                <p>Barangay Captain of Talisay</p>
                <a href="#" class="small-text" data-toggle="modal" data-target="#officialModal10">See Official</a>
            </div>
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
                            <p class="text-center" style="color: #444; font-size: 16px; margin-bottom: 20px;">Vilma A. Dawa</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444; font-size: 14px;">
                            <li>Godofredo M. Medallo</li>
    <li>Maricel A. Villacarlos</li>
    <li>Lita O. Bacolod</li>
    <li>Joseph E. Oftana</li>
    <li>Ginda O. Osabel</li>
    <li>Rolando O. Villacarlos</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Officials Section -->
                    <div class="col-md-6">
                        <div style="background: linear-gradient(to bottom, #f0f0f0, #e9ecef); padding: 20px; border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">SK Chairman</h6>
                            <p class="text-center" style="color: #444; font-size: 16px; margin-bottom: 20px;">Geneveive O. Almonicar</p>

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
                            <p class="text-center font-italic" style="color: #495057;">Jenor E. Marabi</p>
                            <h6 class="text-center font-weight-bold mt-4 mb-3" style="color: #343a40;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #495057; font-size: 14px;">
                            <li>Edmar C. Derder</li>
    <li>William H. Marabi</li>
    <li>Abrado B. Carabio</li>
    <li>Renante P. Giducos</li>
    <li>Julieto B. Fariolen</li>
    <li>Ramil I. Derder</li>
    <li>Marnie G. Veliganio</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Officials Section -->
                    <div class="col-md-6">
                        <div class="officials-section shadow-sm" style="background-color: #f8f9fa; padding: 15px; border-radius: 8px; border: 1px solid #ddd;">
                            <h6 class="text-center font-weight-bold mb-3" style="color: #343a40;">SK Chairman</h6>
                            <p class="text-center font-italic" style="color: #495057;">Teodelyn G. Villabrelle</p>
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
                            <p class="text-center font-italic" style="color: #495057;">Marcos Gilbuena</p>
                            <h6 class="text-center font-weight-bold mt-4 mb-3" style="color: #343a40;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #495057; font-size: 14px;">
                            <li>Richard A. Velosis</li>
    <li>Junreb B. Manansala</li>
    <li>Allan D. Dejito</li>
    <li>Domingo G. Oftana</li>
    <li>Generosa D. Oftana</li>
                            </ul>
                        </div>
                    </div>
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
                            <p class="text-center font-italic" style="color: #495057;">-</p>
                            <h6 class="text-center font-weight-bold mt-4 mb-3" style="color: #343a40;">Kagawad</h6>
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
                            <p class="text-center font-italic" style="color: #495057;">Renato E. Saagundo</p>
                            <h6 class="text-center font-weight-bold mt-4 mb-3" style="color: #343a40;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #495057; font-size: 14px;">
                            <li>Celso T. Ilustrisimo</li>
                            <li>Recorlie I. Jumola</li>
                            </ul>
                        </div>
                    </div>
                    <!-- SK Officials Section -->
                    <div class="col-md-6">
                        <div class="officials-section shadow-sm" style="background-color: #f8f9fa; padding: 15px; border-radius: 8px; border: 1px solid #ddd;">
                            <h6 class="text-center font-weight-bold mb-3" style="color: #343a40;">SK Chairman</h6>
                            <p class="text-center font-italic" style="color: #495057;">Clyde Kirt Z. Cordova</p>
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
                            <p class="text-center font-italic" style="color: #495057;">Mary Jane G. Dagatan</p>
                            <h6 class="text-center font-weight-bold mt-4 mb-3" style="color: #343a40;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #495057; font-size: 14px;">
                            <li>Miraflor A. Illut</li>
    <li>Almamito L. Trencio</li>
    <li>Roy Adrian G. Fariolen</li>
    <li>Pedro H. Esgana</li>
    <li>Michael L. Nepangue</li>
    <li>Alfie P. Rayco</li>
    <li>Roger D. Desabille</li>
                            </ul>
                        </div>
                    </div>
                    <!-- SK Officials Section -->
                    <div class="col-md-6">
                        <div class="officials-section shadow-sm" style="background-color: #f8f9fa; padding: 15px; border-radius: 8px; border: 1px solid #ddd;">
                            <h6 class="text-center font-weight-bold mb-3" style="color: #343a40;">SK Chairman</h6>
                            <p class="text-center font-italic" style="color: #495057;">Jierold I. Gilbuena</p>
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
                            <p class="text-center font-italic" style="color: #495057;">Renato S. Bajalla</p>
                            <h6 class="text-center font-weight-bold mt-4 mb-3" style="color: #343a40;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #495057; font-size: 14px;">
                            <li>Judy Mae I. Pacinio</li>
    <li>Junrel G. Bataycan</li>
    <li>Jamesmer M. Ilustrisimo</li>
    <li>Mariano Jesus A. Giduquio</li>
    <li>Edwin D. Espinosa Sr.</li>
    <li>Lilian Z. Landao</li>
                            </ul>
                        </div>
                    </div>
                    <!-- SK Officials Section -->
                    <div class="col-md-6">
                        <div class="officials-section shadow-sm" style="background-color: #f8f9fa; padding: 15px; border-radius: 8px; border: 1px solid #ddd;">
                            <h6 class="text-center font-weight-bold mb-3" style="color: #343a40;">SK Chairman</h6>
                            <p class="text-center font-italic" style="color: #495057;">Marco Louise S. Oftana</p>
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
                            <p class="text-center" style="color: #444;">Madelyn C. Rayco</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>Joey A. Rojas</li>
    <li>Romeo I. Batindaan</li>
    <li>Almero G. Anciano</li>
    <li>Gabriel I. Ilustrisimo</li>
    <li>Jose O. Anciano</li>
    <li>Jenora B. Ochea</li>
    <li>Myla A. Destriza</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Chairman Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">SK Chairman</h6>
                            <p class="text-center" style="color: #444;">Myla Dodz P. Gilbuena</p>

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
                            <p class="text-center" style="color: #444;">Rafaelita E. Zaspa</p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>Floro P. Espinosa</li>
    <li>Rolando A. Espinosa</li>
    <li>Ruel L. Gilbuena</li>
    <li>Marianne S. Veliganio</li>
    <li>Luisito M. Espinosa</li>
                            </ul>
                        </div>
                    </div>

                    <!-- SK Chairperson Section -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: linear-gradient(to bottom, #f0f0f0, #e0e0e0); border-radius: 5px;">
                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">SK Chairperson</h6>
                            <p class="text-center" style="color: #444;">Josh Andrei F. Landao</p>

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
                            <p class="text-center" style="color: #444;">Rogelito G. Cabarera </p>

                            <h6 class="text-center font-weight-bold text-uppercase" style="color: #333;">Kagawad</h6>
                            <ul class="list-unstyled text-center" style="color: #444;">
                            <li>Edmundo P. Cabrera</li>
    <li>Rowena P. Lao</li>
    <li>Richard E. Ilustrisimo</li>
    <li>Renato G. Illut</li>
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
