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
    <title>Article publishement</title>
</head>
<body class="publish-form-page__body sign-up-form-page__body">
    <div class="container sign-up" id="container">
        <div class="form-container sign-in-container">
            <form action="" method="POST" onsubmit="validateForm()">
                <img src="../images/Screenshot 2023-12-31 142934.png" class="logo" alt="ByteBurst" srcset="">
                <?php // echo $_SESSION['loggedUser'];
                // echo $_SESSION['visit_count'];?>
                <h1>Sign in</h1>
                <span>or use your account</span>
                <input type="email" name="email" id="email" placeholder="Email "  !important/>
                <input type="password" name="password" id="password" placeholder="Password"  !important/>
                <a href="../forms/sign-up.php">Don't have an account ? Create one</a>
                <button>Sign In</button>
                <br>
                <a href="javascript:void(0)" class="goBack" onclick="goBack();">
                    Go back <i class="bi bi-arrow-left"></i>
                </a>
            </form>
            <?php include_once("../backend/loginAccount.php"); ?>
        </div>
    </div>
    <script src="../javascript/goBack.js"></script>
    <script src="../javascript/sign-in-Validation.js"></script>
</body>


</html>