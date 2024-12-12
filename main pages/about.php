<?php
session_start();
$_SESSION['visit_count'] = isset($_SESSION['visit_count']) ? $_SESSION['visit_count'] + 1 : 1;
$_SESSION['loggedUser'] = isset($_SESSION['loggedUser']) ? $_SESSION['loggedUser'] : '';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Fonts -->
    <link rel="preload" href="https://theintercept.com/wp-content/themes/intercept/assets/fonts/TIActuBetaBold.woff2" as="font" type="font/woff2" crossorigin="">
    <link rel="preload" href="https://theintercept.com/wp-content/themes/intercept/assets/fonts/TIActuBetaHeavy.woff2" as="font" type="font/woff2" crossorigin="">
    <link rel="preload" href="https://theintercept.com/wp-content/themes/intercept/assets/fonts/TIActuBetaMonoRegular.woff2" as="font" type="font/woff2" crossorigin="">
    <link rel="preload" href="https://theintercept.com/wp-content/themes/intercept/assets/fonts/TI-Icons-2.woff2" as="font" type="font/woff2" crossorigin="">
    
    <!-- Link to favicon -->
    <link rel="icon" type="image/x-icon" href="../images/favicon-logo3.png">
    <!-- Optionally, provide additional sizes for better compatibility -->
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-logo3.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon-logo3.png">
    <!-- Some browsers also support specifying a shortcut icon for desktop -->
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon-logo3.png">

    
    <!-- fontawesome icons -->  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- my css (scss)-->
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
    <!--cookie alert js and css-->
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>

    <title>ByteBurst</title>
</head>
<body class="about-body" id="about-body">
    <?php include_once('../pages/nav.php'); ?>
    <div class="about-us" >
        <div>
            <div class="about-ByteBurst ">
                <h6>About</h6>
                <h2>About ByteBurst</h2>
                <p>
                <span>.............</span>
                Welcome to  <a href="../main pages/index"></a> ByteBurst, the definitive destination for technology enthusiasts, innovators,
                and knowledge seekers alike. At ByteBurst, we're more than just a news platform –
                we're a dynamic hub of insights, ideas, and inspiration, 
                designed to fuel your passion for all things tech.
                </p> <br> <br>
                <p>
                Our vision at ByteBurst is clear: to empower individuals like you with the knowledge
                and resources needed to thrive in today's fast-paced digital landscape.
                We believe that technology has the power to transform lives, drive innovation,
                and shape the future. That's why we're committed to providing you with accurate,
                reliable, and up-to-date information on the latest trends,
                breakthroughs, and developments in the world of technology.
                </p>
            </div>
            <div class="our-mission ">
                <h2>Our Mission</h2>
                <p> 
                    <span>.............</span>
                    Our mission at ByteBurst is simple: to empower our readers with knowledge and insights
                    that enable them to make informed decisions in an ever-evolving technological world. 
                    We believe in the importance of authenticity and transparency in journalism, and we are 
                    committed to delivering news and analysis that is free from bias, manipulation, or hidden agendas.
                </p>
            </div>
            <div class="why-byteburst ">
                <h2>Why Choose ByteBurst?</h2>
                <p>  
                <span>.............</span>
                With ByteBurst, you're not just getting news – you're getting a gateway to a world of knowledge,
                inspiration,and opportunity. From informative articles and in-depth analysis to practical 
                tips and tutorials, we're here to empower you to harness the full potential of technology and
                shape a brighter future for yourself and the world around you. So why settle for anything less? 
                Join us at ByteBurst and let's embark on this exciting journey together.
                </p>
            </div>
            <div class="contact-us reveal">
                <h2>Contact Us</h2>
                <div class="container">
                    <div class="row">
                        <div class="col-xxs-12 col-xs-12 col-sm-12 col-md-6 col-lg-6"></div>
                        <div class="col-xxs-12 col-xs-12 col-sm-12 col-md-6 col-lg-6"></div>
                        <div class="col-xxs-12 col-xs-12 col-sm-12 col-md-6 col-lg-6"></div>
                        <div class="col-xxs-12 col-xs-12 col-sm-12 col-md-6 col-lg-6"></div>
                        <div class="col-xxs-12 col-xs-12 col-sm-12 col-md-6 col-lg-6"></div>
                        <div class="col-xxs-12 col-xs-12 col-sm-12 col-md-6 col-lg-6"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php include_once('../pages/footer.php'); ?>
    <!--javascript files-->
    <script src="../javascript/navbar.js"></script>
    <script src="../javascript/theme.js"></script>
    <script src="../javascript/scrollAnimation.js"></script>
    <script src="../javascript/cookieAlert.js"></script>

</body>
</html>