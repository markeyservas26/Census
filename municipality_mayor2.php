<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Municipality Mayor - Madridejos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>


<!-- Main CSS File -->
<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;500;700&display=swap" rel="stylesheet">
<link href="assets/css/main.css" rel="stylesheet">
<link href="queenie.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

<style>
        body {
            background-color: #f0f4f8;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
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
    font-size: 12px;
    font-weight: bold;
    margin: 10px 0;
}

.officials-card p {
    font-size: 14px;
    color: #555;
}

        .hero-section {
            background: linear-gradient(to right, #D8D2C6, #E6E0D5);

            color: white;
            text-align: center;
            padding: 80px 0;
        }
        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .hero-section p {
            font-size: 1.2rem;
            margin-bottom: 40px;
        }
        .card-wrapper {
            display: flex;
            justify-content: center;
            padding: 50px;
            background-color: #fff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            max-width: 1100px;
            margin: -50px auto 0 auto;
            z-index: 2;
        }
        .card {
            text-align: center;
            border: none;
            border-radius: 12px;
            padding: 40px;
            width: 150%;
            background-color: transparent;
        }
        .card-img-top {
            width: 220px;
            height: 220px;
            object-fit: cover;
            margin-bottom: 20px;
            margin: 0 auto 20px; /* Centers the image horizontally */
            display: block; /* Ensures the image behaves as a block element */
        }
        .card h2 {
            font-size: 2rem;
            font-weight: 700;
            color: #FF3F34;
            margin-bottom: 10px;
        }
        .card p {
            font-size: 1.1rem;
            color: #555;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .card .text-muted {
            font-size: 1.1rem;
            color: #888;
        }
        .card-footer {
            margin-top: 20px;
            font-size: 1rem;
            color: #888;
        }
        .card-footer a {
            text-decoration: none;
            color: #FF3F34;
            font-weight: bold;
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

    /* For smaller screens like mobile */
    @media (max-width: 767px) {
        .hero-section h1 {
            font-size: 1.5rem; /* Smaller header on mobile */
            margin-right: 10px;
            text-align: center;
        }

        .card-wrapper {
            margin-top: -10px;
            max-width: 100%;
        }


        .card h2 {
            font-size: 1.5rem; /* Smaller name font */
        }

        .card p {
            font-size: 1rem; /* Smaller text for better readability */
        }

        .card-img-top {
            width: 100%; /* Make image responsive on mobile */
            height: auto;
        }
    }

    /* For medium screens (tablets) */
    @media (min-width: 768px) and (max-width: 991px) {
        .hero-section h1 {
            font-size: 2rem; /* Adjust header size for tablets */
        }

        .card-wrapper {
            margin-top: 30px;
        }

        .card h2 {
            font-size: 1.8rem; /* Adjust name font for tablet screens */
        }

        .card p {
            font-size: 1.1rem; /* Slightly larger text for readability */
        }
    }

    /* For larger screens (desktops) */
    @media (min-width: 992px) {
        .hero-section h1 {
            font-size: 2.5rem; /* Large header on desktop */
        }

        .card h2 {
            font-size: 2rem; /* Keep name font larger on desktop */
        }

        .card p {
            font-size: 1.2rem; /* Maintain large font for readability */
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

<header id="header" class="header fixed-top d-flex align-items-center" style="height: 80px;">
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
        <li><a href="index.php">Home</a></li>
        
         <!-- Bantayan Dropdown -->
         <li class="dropdown">
            <a href="#"  class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Bantayan</a>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item enhanced-dropdown-item" href="about_municipality1.php">About Bantayan Municipality</a></li>
<li><a class="dropdown-item enhanced-dropdown-item" href="municipality_mayor1.php">Bantayan Municipality Mayor</a></li>
<li><a class="dropdown-item enhanced-dropdown-item" href="barangay_officials1.php">Bantayan Barangay Officials</a></li>
<li><a class="dropdown-item enhanced-dropdown-item" href="municipality_profile1.php">Bantayan Municipality Profile</a></li>
<li><a class="dropdown-item enhanced-dropdown-item" href="history_bantayan.php">Bantayan History</a></li>
            </ul>
        </li>
        
        <!-- Madridejos Dropdown -->
        <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Madridejos</a>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item enhanced-dropdown-item" href="about_municipality.php">About Madridejos Municipality</a></li>
        <li><a class="dropdown-item enhanced-dropdown-item" href="municipality_mayor.php">Madridejos Municipality Mayor</a></li>
        <li><a class="dropdown-item enhanced-dropdown-item" href="barangay_officials.php">Mandridejos Barangay Officials</a></li>
        <li><a class="dropdown-item enhanced-dropdown-item" href="municipality_profile.php">Madridejos Municipality Profile</a></li>
        <li><a class="dropdown-item enhanced-dropdown-item" href="history_madridejos.php">Madridejos History</a></li>
    </ul>
</li>

        
          <!-- Santafe Dropdown -->
          <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Santa Fe</a>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item enhanced-dropdown-item" href="about_municipality2.php">About Santa Fe Municipality</a></li>
        <li><a class="dropdown-item enhanced-dropdown-item" href="municipality_mayor2.php">Santa Fe Municipality Mayor</a></li>
        <li><a class="dropdown-item enhanced-dropdown-item" href="barangay_officials2.php">Santa Fe Barangay Officials</a></li>
        <li><a class="dropdown-item enhanced-dropdown-item" href="municipality_profile2.php">Santa Fe Municipality Profile</a></li>
        <li><a class="dropdown-item enhanced-dropdown-item" href="history_santafe.php">Santa Fe History</a></li>
    </ul>
</li>

        <li><a href="schedule.php">Schedule</a></li>
        <li><a href="about_us.php">About Us</a></li>
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
<br>
<br>
<br>
<section class="hero-section" data-aos="fade-up" data-aos-duration="1000">
    <h1 style="color: white; font-family: 'Merriweather', serif;">Meet the Honorable Mayor</h1>
</section>

<!-- Biography Section -->
<div class="card-wrapper">
    <div class="card" data-aos="fade-up" data-aos-duration="1200">
        <img src="assets/img/mayors3.png" alt="Mayor's Photo" class="card-img-top">
            <h2>Hon. Ithamar P. Espinosa</h2>
            <p class="text-muted" style="font-family: 'Merriweather', serif;">Municipal Mayor of Santa Fe, Cebu</p>
            <p style="font-family: 'Merriweather', serif;">Mayor Ithamar P. Espinosa's public service journey began with a deep commitment to his community. Prior to becoming mayor, he served in various roles, including as a former Barangay Captain, where his leadership skills were honed. His passion for community development and governance led him to seek higher office.</p>
            <p style="font-family: 'Merriweather', serif;">In 2022, he was elected as the Municipal Mayor of Santa Fe, bringing his vision of progress and sustainable development to the forefront. His administration focuses on enhancing infrastructure, education, and healthcare services for the residents of Santa Fe.</p>
            <p style="font-family: 'Merriweather', serif;">As mayor, he has initiated various key projects aimed at improving the quality of life for the people of Santa Fe, including modernizing local facilities and improving local tourism to boost economic growth.</p>
            <p style="font-family: 'Merriweather', serif;">Mayor Espinosa is committed to making Santa Fe a model of growth and inclusivity, ensuring that all sectors of the community benefit from his leadership.</p>
    </div>
</div>


<section class="text-white text-center py-10" style="background: linear-gradient(to right, #D8D2C6, #E6E0D5); ">
    <h1 class="text-4xl font-bold mb-3" style="color: white; font-family: 'Merriweather', serif;">Elected Officials</h1>
</section>

<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Barangay Official 1 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1000">
                <img src="assets/img/officialman.png" alt="Barangay Official 1" class="official-img">
                <h4>HON. ITHAMAR P. ESPINOSA</h4>
                <p>Mayor</p>
            </div>
        </div>

        <!-- Barangay Official 2 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1200">
                <img src="assets/img/officialwomen.png" alt="Barangay Official 2" class="official-img">
                <h4>HON. MARY GRELEIGH P. CABRERA</h4>
                <p>Vice Mayor</p>
            </div>
        </div>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Barangay Official 1 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1000">
                <img src="assets/img/officialman.png" alt="Barangay Official 1" class="official-img">
                <h4>HON. RYAN JAMES G. FARIOLEN</h4>
                <p>SB Member</p>
            </div>
        </div>

        <!-- Barangay Official 2 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1200">
                <img src="assets/img/officialman.png" alt="Barangay Official 2" class="official-img">
                <h4>HON. JAMES PHILIP P. LAO</h4>
                <p>SB Member</p>
            </div>
        </div>

        <!-- Barangay Official 3 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1200">
                <img src="assets/img/officialman.png" alt="Barangay Official 3" class="official-img">
                <h4>HON. DINDO G. ZASPA</h4>
                <p>SB Member</p>
            </div>
        </div>

        <!-- Barangay Official 4 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1200">
                <img src="assets/img/officialwomen.png" alt="Barangay Official 4" class="official-img">
                <h4>HON. FROLINE G. BATAYCAN</h4>
                <p>SB Member</p>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Barangay Official 5 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1000">
                <img src="assets/img/officialman.png" alt="Barangay Official 5" class="official-img">
                <h4>HON. FRANCIS KELVIN E. MONDEJAR</h4>
                <p>SB Member</p>
            </div>
        </div>

        <!-- Barangay Official 6 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1200">
                <img src="assets/img/officialman.png" alt="Barangay Official 6" class="official-img">
                <h4>HON. REY CONSTANCIO G. CATALUÑA JR.</h4>
                <p>SB Member</p>
            </div>
        </div>

        <!-- Barangay Official 7 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1200">
                <img src="assets/img/officialman.png" alt="Barangay Official 7" class="official-img">
                <h4>HON. JOANES PAULO M. ESGANA</h4>
                <p>SB Member</p>
            </div>
        </div>

        <!-- Barangay Official 8 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1200">
                <img src="assets/img/officialman.png" alt="Barangay Official 8" class="official-img">
                <h4>HON. WILFREDO E. BATOBALONOS SR.</h4>
                <p>SB Member</p>
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
<script>
    AOS.init();
</script>
<?php
include 'footer.php';
?>
</body>
</html>
