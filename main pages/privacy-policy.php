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
    <!-- fontawesome icons -->  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- my css (scss)-->
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">

    <!-- Link to favicon -->
    <link rel="icon" type="image/x-icon" href="../images/favicon-logo3.png">
    <!-- Optionally, provide additional sizes for better compatibility -->
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-logo3.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon-logo3.png">
    <!-- Some browsers also support specifying a shortcut icon for desktop -->
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon-logo3.png">

    
    <!--cookie alert js and css-->
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>

    <title>ByteBurts</title>
</head>
<body class="about-body" id="about-body">
    <?php include_once('../pages/nav.php'); ?>
    <div class="about-us" >
        <div>
            <div class="terms-of-use ">
                <h6>Privacy Policy</h6>
                <h2>Privacy Policy for Byteburst</h2>
                <p>
                    <span>.............</span>
                    This Privacy Policy describes how Byteburst collects, uses, and protects the personal information you provide on our website <a href="../main pages/index.php">ByteBurst</a>.
                </p><br> <br>
            </div>
            <div class="info-collection">
                <h2>Information Collection and Use </h2>
                <p> 
                    <span>.............</span>
                    We do not collect any personal information from you unless you voluntarily provide it to us
                    through forms or other input fields on our website. The information we collect may include:
                    <br>
                    We will only use this information to provide you with the services offered on our website 
                    and to communicate with you regarding your use of the website.
                </p>
                <br> <br>
                <ul>
                    <li>Personal details such as name and email address.</li>
                    <li>User-generated content, such as blog posts or comments.</li>
                </ul>
            </div>
            <div class="date-protection reveal">
                <h2>Data Protection</h2>
                <p>  
                <span>.............</span>
                We take the security of your personal information seriously and employ reasonable 
                measures to protect it from unauthorized access, disclosure, alteration, or destruction.
                <br>
                However, please be aware that no method of transmission over the internet or electronic 
                storage is 100% secure, and we cannot guarantee absolute security.
                </p>
            </div>
            <div class="data-sharing reveal">
                <h2>Data Sharing</h2>
                <p>  
                <span>.............</span>
                We do not share your personal information with any third parties. Your data will only be 
                accessible to authorized personnel who require access to perform their duties related to
                operating the website.
                </p>
            </div>
            <div class="cookies reveal" id="cookies">
                <h2>Cookies</h2>
                <p>  
                <span>.............</span>
                We may use cookies to enhance your experience on our website. 
                <br>
                You can choose to accept or decline cookies. Most web browsers automatically accept cookies,
                but you can usually modify your browser setting to decline cookies if you prefer. 
                <br>
                Please note that declining cookies may prevent you from taking full advantage of the website.
                </p>
            </div>
            <div class="changes reveal">
                <h2>Changes to This Privacy Policy</h2>
                <p>  
                <span>.............</span>
                We reserve the right to update or modify this Privacy Policy at any time without prior notice. 
                <br>
                Any changes will be effective immediately upon posting the revised Privacy Policy on our website.
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
