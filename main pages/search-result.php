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
    <title>ByteBurst</title>
</head>
<body class="search-result-page__body">
    <?php include_once('../pages/nav.php'); ?>
    <?php include_once('../backend/databaseConnection.php'); ?>
    <div class="article-searched">
            <div class="page-sec named-section">         
                <?php include_once('../backend/searchResult.php'); ?>  
        <!--
                            <article class="main-article"> 
                                <div class="article-content">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xxs-12 col-xs-6 col-sm-5 col-md-5 col-lg-6">
                                                <img src="https://theintercept.com/wp-content/uploads/2023/06/GettyImages-1498284448-top-trump.jpg?w=1536" alt="">
                                            </div>
                                            <div class="col-xxs-12 col-xs-6 col-sm-7 col-md-7 col-lg-6">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="search-result__body__article--large col-xxs-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <h4>Don’t Compare Donald Trump to Reality Winner. He’s No Whistleblower.</h4>
                                                            <h2 class="article-meta-data">James risen</h2> <h2 class="article-meta-data date" >- June, 25 2023</h2>
                                                        </div>
                                                        <div class="search-result__body__article--large col-xxs-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <p>Kathleen Rice, at the time a House member from New York,
                                                                sent a criminal referral to the FBI in 2021.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="main-article"> 
                                <div class="article-content">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xxs-12 col-xs-6 col-sm-5 col-md-5 col-lg-6">
                                                <img src="https://theintercept.com/wp-content/uploads/2023/12/GettyImages-112181344.jpg?fit=1024%2C512" alt="">
                                            </div>
                                             <div class="col-xxs-12 col-xs-6 col-sm-7 col-md-7 col-lg-6">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="search-result__body__article--large col-xxs-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <h4>I Calculated How Much of My Money the U.S. Sent to Kill Palestinians. You Can Too.</h4>
                                                            <h2 class="article-meta-data">James risen</h2> <h2 class="article-meta-data date" >- June, 25 2023</h2>
                                                        </div>
                                                        <div class="search-result__body__article--large col-xxs-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <p>Kathleen Rice, at the time a House member from New York,
                                                                sent a criminal referral to the FBI in 2021.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="main-article"> 
                                <div class="article-content">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xxs-12 col-xs-6 col-sm-5 col-md-5 col-lg-6">
                                                <img src="https://theintercept.com/wp-content/uploads/2023/07/deconstructed-inflation-price-control-hero.jpg?w=768" alt="">
                                            </div>
                                            <div class="col-xxs-12 col-xs-6 col-sm-7 col-md-7 col-lg-6">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="search-result__body__article--large col-xxs-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <h4>PRICE CONTROLS: AN INFLATION SOLUTION THAT DOESN’T SCREW WORKERS</h4>
                                                            <h2 class="article-meta-data">James risen</h2> <h2 class="article-meta-data date" >- June, 25 2023</h2>
                                                        </div>
                                                        <div class="search-result__body__article--large col-xxs-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <p>Kathleen Rice, at the time a House member from New York,
                                                                sent a criminal referral to the FBI in 2021.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="main-article"> 
                                <div class="article-content">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xxs-12 col-xs-6 col-sm-5 col-md-5 col-lg-6">
                                                <img src="https://theintercept.com/wp-content/uploads/2023/06/GettyImages-1498284448-top-trump.jpg?w=1536" alt="">
                                            </div>
                                            <div class="col-xxs-12 col-xs-6 col-sm-7 col-md-7 col-lg-6">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="search-result__body__article--large col-xxs-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <h4>Don’t Compare Donald Trump to Reality Winner. He’s No Whistleblower.</h4>
                                                            <h2 class="article-meta-data">James risen</h2> <h2 class="article-meta-data date" >- June, 25 2023</h2>
                                                        </div>
                                                        <div class="search-result__body__article--large col-xxs-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <p>Kathleen Rice, at the time a House member from New York,
                                                                sent a criminal referral to the FBI in 2021.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="main-article"> 
                                <div class="article-content">
                                    <div class="container">
                                        <div class="row ">
                                            <div class="col-xxs-12 col-xs-6 col-sm-5 col-md-5 col-lg-6">
                                                <img src="https://theintercept.com/wp-content/uploads/2023/06/GettyImages-1498284448-top-trump.jpg?w=1536" alt="">
                                            </div>
                                            <div class="col-xxs-12 col-xs-6 col-sm-7 col-md-7 col-lg-6 article-description">
                                                <div class="container">
                                                    <div class="row " >
                                                        <div class="search-result__body__article--large col-xxs-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <h4>Don’t Compare Donald Trump to Reality Winner. He’s No Whistleblower.</h4>
                                                            <h2 class="article-meta-data">James risen</h2><h2 class="article-meta-data date" >- June, 25 2023</h2>
                                                        </div>
                                                        <div class="search-result__body__article--large col-xxs-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <p>Kathleen Rice, at the time a House member from New York,
                                                                sent a criminal referral to the FBI in 2021.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </article>
        -->
                        
            </div>
    </div>
    <?php include_once('../pages/footer.php'); ?>
    <!--my javascript files-->
    <script src="../javascript/navbar.js"></script>
    <script src="../javascript/theme.js"></script>
    <script src="../javascript/cookieAlert.js"></script>

</body>
</html>