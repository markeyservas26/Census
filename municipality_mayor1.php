<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Municipality Mayor - Bantayan</title>
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
            background: linear-gradient(to right, #91B294, #617C58);
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
<section class="hero-section" data-aos="fade-up" data-aos-duration="1000">
    <h1 style="color: white; font-family: 'Merriweather', serif;">Meet the Honorable Mayor</h1>
</section>

<!-- Biography Section -->
<div class="card-wrapper">
    <div class="card" data-aos="fade-up" data-aos-duration="1200">
        <img src="assets/img/mayors1.png" alt="Mayor's Photo" class="card-img-top">
            <h2>Hon. Arthur E .Despi</h2>
            <p class="text-muted" style="font-family: 'Merriweather', serif;">Municipal Mayor of Bantayan</p>
            <p style="font-family: 'Merriweather', serif;">Arthur E. Despi, the esteemed Mayor of Bantayan, Cebu, hails from a family deeply intertwined with the island's rich history and development. His lineage traces back to his parents, Diego Abello and Candelaria Abello y Causing, who made significant contributions to Bantayan’s cultural and recreational growth. Among their most notable achievements was the establishment of the D.C. Abello Theater in the 1950s. This iconic venue served as a vibrant center for community gatherings and entertainment during the golden age of Filipino cinema, featuring celebrated stars like Fernando Poe Jr. Although the theater ceased operations in the 1980s and was demolished in 2015, its legacy remains an integral part of Bantayan’s cultural heritage.</p>
            <p style="font-family: 'Merriweather', serif;">Mayor Despi’s leadership reflects a deep appreciation for Bantayan’s traditions and a commitment to its progress. Bantayan, the largest municipality on Bantayan Island, is renowned for its rich cultural heritage, pristine beaches, and thriving agricultural and fishing industries. The island is also home to significant historical landmarks, including the Sts. Peter and Paul Parish Church, a 19th-century architectural masterpiece that stands as a testament to the town’s enduring legacy.</p>
            <p style="font-family: 'Merriweather', serif;">As a visionary leader, Mayor Despi continues to uphold Bantayan’s heritage while fostering sustainable growth and development for the community. His efforts ensure that Bantayan remains a cherished haven for both residents and visitors, blending history, culture, and natural beauty.</p>
         </div>
</div>

<section class="text-white text-center py-10" style="background: linear-gradient(to right, #91B294, #617C58); ">
    <h1 class="text-4xl font-bold mb-3" style="color: white; font-family: 'Merriweather', serif;">Elected Officials</h1>
</section>

<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Barangay Official 1 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1000">
                <img src="assets/img/officialman.png" alt="Barangay Official 1" class="official-img">
                <h4>HON. ARTHUR E. DESPI</h4>
                <p>Mayor</p>
            </div>
        </div>

        <!-- Barangay Official 2 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1200">
                <img src="assets/img/officialman.png" alt="Barangay Official 2" class="official-img">
                <h4>HON. ANTONIO Y. MONTEMAR</h4>
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
                <h4>HON. ORLANDO F. LAYESE</h4>
                <p>SB Member</p>
            </div>
        </div>

        <!-- Barangay Official 2 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1200">
                <img src="assets/img/officialman.png" alt="Barangay Official 2" class="official-img">
                <h4>HON. MARKHAM Y. MANSUETO</h4>
                <p>SB Member</p>
            </div>
        </div>
        <!-- Barangay Official 2 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1200">
                <img src="assets/img/officialman.png" alt="Barangay Official 2" class="official-img">
                <h4>HON. JEFFREY Q. BARRETTO</h4>
                <p>SB Member</p>
            </div>
        </div>
        <!-- Barangay Official 2 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1200">
                <img src="assets/img/officialman.png" alt="Barangay Official 2" class="official-img">
                <h4>HON. EDWIN D. DELDIG</h4>
                <p>SB Member</p>
            </div>
        </div>
</div>
<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Barangay Official 1 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1000">
                <img src="assets/img/officialwomen.png" alt="Barangay Official 1" class="official-img">
                <h4>HON. JANET M. HUBAHIB</h4>
                <p>SB Member</p>
            </div>
        </div>

        <!-- Barangay Official 2 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1200">
                <img src="assets/img/officialman.png" alt="Barangay Official 2" class="official-img">
                <h4>HON. MIGUEL ANGELO O. PACHECO</h4>
                <p>SB Member</p>
            </div>
        </div>
        <!-- Barangay Official 2 -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1200">
                <img src="assets/img/officialman.png" alt="Barangay Official 2" class="official-img">
                <h4>HON. LEOPOLDO A. UMBAO</h4>
                <p>SB Member</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="officials-card text-center" data-aos="fade-up" data-aos-duration="1200">
                <img src="assets/img/officialman.png" alt="Barangay Official 2" class="official-img">
                <h4>HON. APPOLO A. CESA</h4>
                <p>SB Member</p>
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
