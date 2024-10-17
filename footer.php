<!-- Add this line in your <head> section -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    .footer {
        background-color: #002147; /* Dark navy blue for a government feel */
        color: white; /* White text color */
        padding: 40px 20px; /* Padding around the footer */
        opacity: 0; /* Start invisible */
        transform: translateY(20px); /* Start slightly below */
        transition: opacity 1s ease, transform 1s ease; /* Animation transition */
    }

    .footer.visible {
        opacity: 1; /* Make visible */
        transform: translateY(0); /* Move to original position */
    }

    .footer-content {
        max-width: 1200px;
        margin: 0 auto;
        display: flex; /* Use flexbox to align items */
        flex-direction: column; /* Stack items vertically */
        align-items: center; /* Center items */
    }

    .footer-brand {
        display: flex;
        flex-direction: column; /* Stack items vertically */
        align-items: center; /* Center align items */
        margin-bottom: 10px; /* Space below the brand section */
    }

    .footer-logo {
        max-width: 100px;
        margin-bottom: 10px; /* Space between logo and title */
    }

    .footer-title {
        font-size: 2.5rem;
        font-weight: bold;
        color: white; /* Keep title white for contrast */
        margin: 0;
        padding: 0;
        text-align: center; /* Center title text */
    }

    .footer-text {
        font-size: 2.0rem;
        color: white; /* White color for text */
        margin: 10px 0; /* Space above and below the text */
        text-align: center; /* Center the text */
    }

    /* Centered contact info */
    .footer-info {
        text-align: center; /* Centers the email and contact info */
        margin-top: 10px; /* Adds space between text and contact info */
    }

    .footer-info p {
        font-size: 1.2rem;
        margin: 5px 0;
    }

    /* Social media links */
    .social-media {
        margin-top: 10px; /* Space above social media icons */
    }

    .social-icon {
        margin: 0 10px; /* Space between icons */
        font-size: 1.5rem; /* Icon size */
        text-decoration: none; /* Remove underline */
        transition: transform 0.3s; /* Transition effect for hover */
    }

    /* Specific colors for each icon */
    .social-icon.facebook {
        color: #3b5998; /* Facebook blue */
    }

    .social-icon.twitter {
        color: #1da1f2; /* Twitter light blue */
    }

    .social-icon.instagram {
        background: linear-gradient(45deg, #f36f6f, #fbc94e); /* Instagram gradient */
        -webkit-background-clip: text; /* Clip background to text */
        -webkit-text-fill-color: transparent; /* Make text transparent to show gradient */
    }

    .social-icon:hover {
        transform: scale(1.1); /* Slightly enlarge icon on hover */
    }

    .footer-description {
        font-size: 1rem;
        margin: 10px 0;
        text-align: center; /* Keeps the footer description centered */
    }
</style>

<footer class="footer" id="footer">
    <div class="container">
        <div class="footer-content">
            <!-- Brand section with logo and title -->
            <div class="footer-brand">
                <img src="admin/assets/img/transperlogo.png" alt="Bantayan Island Census Logo" class="footer-logo">
                <b><h3 class="footer-title">BANISCEN</h3></b>
            </div>

            <!-- Centered empowerment text -->
            <p class="footer-text">Empowering communities through data.</p>

            <!-- Centered contact info -->
            <div class="footer-info">
                <p>Email: contact@baniscen.com</p>
                <p>Contact No: +63 912 345 6789</p>
            </div>

            <!-- Social Media Icons -->
            <div class="social-media">
                <a href="https://www.facebook.com" class="social-icon facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com" class="social-icon twitter" target="_blank"><i class="fab fa-twitter"></i></a> <!-- X icon -->
                <a href="https://www.instagram.com" class="social-icon instagram" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <p class="footer-description">&copy; 2024 BIC | All rights reserved.</p>
    </div>
</footer>

<script>
    // JavaScript to add the visible class when scrolling to the footer
    window.addEventListener('scroll', function() {
        const footer = document.getElementById('footer');
        const footerPosition = footer.getBoundingClientRect().top;
        const screenPosition = window.innerHeight / 1.2; // Change this to adjust when it triggers

        if (footerPosition < screenPosition) {
            footer.classList.add('visible');
        }
    });
</script>



