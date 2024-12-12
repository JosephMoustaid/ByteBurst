<?php
// Start the session
session_start();

// Session's variables
$_SESSION['visit_count'] = isset($_SESSION['visit_count']) ? $_SESSION['visit_count'] + 1 : 1;
$_SESSION['loggedUser'] = isset($_SESSION['loggedUser']) ? $_SESSION['loggedUser'] : '';

// Check if the logged_user cookie exists
if(isset($_COOKIE['logged_user'])) {
    // Set the loggedUser session variable if not already set
    if(!isset($_SESSION['loggedUser'])) {
        $_SESSION['loggedUser'] = $_COOKIE['logged_user'];
    }
}

// Check if the user_id cookie exists
if(isset($_COOKIE['user_id'])) {
    // Set the user_id session variable
    $_SESSION['user_id'] = $_COOKIE['user_id'];
}

// Error reporting
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
    
    <!-- ByteBurst Meta data-->
    <meta name="description" content="Welcome to  ByteBurst, the definitive destination for technology enthusiasts, innovators,
                and knowledge seekers alike. At ByteBurst, we're more than just a news platform –
                we're a dynamic hub of insights, ideas, and inspiration, 
                designed to fuel your passion for all things tech.">


    <!-- Other meta tags and head elements -->
    <meta property="og:title" content="ByteBurst">
    <meta property="og:description" content=escription" content="Welcome to  ByteBurst, the definitive destination for technology enthusiasts, innovators,
                and knowledge seekers alike. At ByteBurst, we're more than just a news platform –
                we're a dynamic hub of insights, ideas, and inspiration, 
                designed to fuel your passion for all things tech.">
    <meta property="og:image" content="../images/preview.png">
    <!-- Optionally, you can specify the type of content -->
    <meta property="og:type" content="news">
    <meta property="og:type" content="articles">
    <meta property="og:type" content="tips">
    <meta property="og:type" content="feautures">
    <!-- Optionally, you can specify the URL of the page -->
    <meta property="og:url" content=".">


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
    <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    

    <title>ByteBurst</title>
</head>
<body class="main-page__body">
    <?php include_once('../pages/nav.php'); ?>

    <?php include_once("../backend/mainPageArticles.php") ?>
    
    <div class="page-sec trending" id="trending "> 
        <section>                
                <?php $result=get6PostsMostTrending(); ?>
                <?php for($i=0 ; $i<3 ; $i++): 
                
                    $content=$result[$i]['content']; 
                    $firstImageSrc=extractFirstImageSrcFromContent($content);
                    $firstParagraph=extractFirstParagraphFromContent($content);
                    $publisherFullName=$result[$i]['firstname'].' '.$result[$i]['lastname'];
                    $articleTitle=$result[$i]['title'];
                    ?>
                    <a href="../main pages/search.php?id=<?php echo $result[$i]['id_post']; ?>"> 
                        <article >
                            <img src="<?php echo $firstImageSrc ; ?>" alt="article-image">
                            <div class="article-content mostTrendingArticlesContent">
                                <h2><?php echo $publisherFullName ; ?></h2>
                                <h4><?php echo $articleTitle ; ?></h4>
                                <br>
                                <p> <?php echo $firstParagraph; ?></p>
                            </div>
                        </article>
                    </a>    
                <?php endfor; ?>
        </section> 
    </div>

    <div class="page-sec side-latest" id="side-latest">
        <section>
            <div class="latest">
                <h2>Latest</h2>
            </div>  
            <?php for($i=3 ; $i<6 ; $i++): 
                $content=$result[$i]['content']; 
                $firstImageSrc=extractFirstImageSrcFromContent($content);
                $firstParagraph=extractFirstParagraphFromContent($content);
                $publisherFullName=$result[$i]['firstname'].' '.$result[$i]['lastname'];
                $articleTitle=$result[$i]['title'];
                ?>
                <a href="../main pages/search.php?id=<?php echo $result[$i]['id_post']; ?>">
                <article class="<?php echo 'article'.($i-2) ; ?>">
                    <div class="line"></div>
                    <img src="<?php echo $firstImageSrc ; ?>" alt="article-image">
                    <br>
                    <div class="article-content overlay">
                        <div class="main-line"></div>
                        <h2><?php echo $publisherFullName ; ?></h2>
                        <h4><?php echo $articleTitle; ?></h4>   
                    </div>
                </article>
                </a>
            <?php endfor; ?>  
        </section>
    </div>

    <div class="page-sec important named-section reveal">
        <?php $result=get4PostsByCategory("politics"); ?>
        
        <h2 class="section-name">Politics</h2>
        <div class="container">
            <div class="row">
                <?php
                $content=$result[0]['content']; 
                $firstImageSrc=extractFirstImageSrcFromContent($content);
                $firstParagraph=extractFirstParagraphFromContent($content);
                $publisherFullName=$result[0]['firstname'].' '.$result[0]['lastname'];
                $articleTitle=$result[0]['title']; ?>
                <div class="col-xxs-12 col-xs-12 col-sm-12 col-md-7 col-lg-7" >
                    <a href="../main pages/search.php?id=<?php echo $result[0]['id_post']; ?>">
                        <article class="main-article">
                            <img src="<?php echo $firstImageSrc; ?>" alt="article-image">
                            <div class="article-content">
                                <h4><?php echo $articleTitle; ?></h4>
                                <h2><?php echo $publisherFullName; ?></h2>
                                <br>
                            </div>
                        </article>
                    </a>
                </div>

                

                <div class="col-xxs-12 col-xs-12 col-sm-12 col-md-5 col-lg-5 square-images">
                    <div class="row">

                        <?php for($i=1 ; $i<4 ; $i++): 
                    
                            $content=$result[$i]['content']; 
                            $firstImageSrc=extractFirstImageSrcFromContent($content);
                            $firstParagraph=extractFirstParagraphFromContent($content);
                            $publisherFullName=$result[$i]['firstname'].' '.$result[$i]['lastname'];
                            $articleTitle=$result[$i]['title'];
                            ?> 
                            <div class="col-xxs-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <a href="../main pages/search.php?id=<?php echo $result[$i]['id_post']; ?>">
                                    <article>
                                        <img src="<?php echo $firstImageSrc ; ?>" alt="article-image">
                                        <div class="article-content">
                                            <h4><?php echo $articleTitle; ?></h4>
                                            <h2><?php echo $publisherFullName ; ?></h2>
                                            <br>
                                        </div>
                                    </article>
                                </a>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-sec tech named-section reveal" id="tech">
        <?php $techResult=get4PostsByCategory("tech"); ?>
        
        <h2 class="section-name">Tech</h2>
        <div class="container">
            <div class="row">
                <?php
                if(!empty($techResult[0])):
                $content=$techResult[0]['content']; 
                $firstImageSrc=extractFirstImageSrcFromContent($content);
                $firstParagraph=extractFirstParagraphFromContent($content);
                $publisherFullName=$techResult[0]['firstname'].' '.$techResult[0]['lastname'];
                $articleTitle=$techResult[0]['title']; ?>
                <div class="col-xxs-12 col-xs-12 col-sm-12 col-md-7 col-lg-7" >
                    <a href="../main pages/search.php?id=<?php echo $techResult[0]['id_post']; ?>">
                        <article class="main-article">
                            <img src="<?php echo $firstImageSrc; ?>" alt="article-image">
                            <div class="article-content">
                                <h4><?php echo $articleTitle; ?></h4>
                                <h2><?php echo $publisherFullName; ?></h2>
                                <br>
                            </div>
                        </article>
                    </a>
                </div>

                

                <div class="col-xxs-12 col-xs-12 col-sm-12 col-md-5 col-lg-5 square-images" >
                    <div class="row">

                        <?php for($i=1 ; $i<4 ; $i++): 
                            $content=$techResult[$i]['content']; 
                            $firstImageSrc=extractFirstImageSrcFromContent($content);
                            $firstParagraph=extractFirstParagraphFromContent($content);
                            $publisherFullName=$techResult[$i]['firstname'].' '.$techResult[$i]['lastname'];
                            $articleTitle=$techResult[$i]['title'];
                            ?> 
                            <div class="col-xxs-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <a href="../main pages/search.php?id=<?php echo $techResult[$i]['id_post']; ?>">
                                    <article>
                                        <img src="<?php echo $firstImageSrc ; ?>" alt="article-image">
                                        <div class="article-content">
                                            <h4><?php echo $articleTitle; ?></h4>
                                            <h2><?php echo $publisherFullName ; ?></h2>
                                            <br>
                                        </div>
                                    </article>
                                </a>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="page-sec current-topic justice named-section reveal" id="justice">
        <?php $techResult=get4PostsByCategory("justice"); ?>
        
        <h2 class="section-name">Justice</h2>
        <div class="container">
            <div class="row">
                <?php
                if(!empty($techResult[0])):
                $content=$techResult[0]['content']; 
                $firstImageSrc=extractFirstImageSrcFromContent($content);
                $firstParagraph=extractFirstParagraphFromContent($content);
                $publisherFullName=$techResult[0]['firstname'].' '.$techResult[0]['lastname'];
                $articleTitle=$techResult[0]['title']; ?>
                <div class="col-xxs-12 col-xs-12 col-sm-12 col-md-7 col-lg-7" >
                    <a href="../main pages/search.php?id=<?php echo $techResult[0]['id_post']; ?>">
                        <article class="main-article">
                            <img src="<?php echo $firstImageSrc; ?>" alt="article-image">
                            <div class="article-content">
                                <h4><?php echo $articleTitle; ?></h4>
                                <h2><?php echo $publisherFullName; ?></h2>
                                <br>
                            </div>
                        </article>
                    </a>
                </div>

                

                <div class="col-xxs-12 col-xs-12 col-sm-12 col-md-5 col-lg-5 square-images">
                    <div class="row">

                        <?php for($i=1 ; $i<4 ; $i++): 
                            $content=$techResult[$i]['content']; 
                            $firstImageSrc=extractFirstImageSrcFromContent($content);
                            $firstParagraph=extractFirstParagraphFromContent($content);
                            $publisherFullName=$techResult[$i]['firstname'].' '.$techResult[$i]['lastname'];
                            $articleTitle=$techResult[$i]['title'];
                            ?> 
                            <div class="col-xxs-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <a href="../main pages/search.php?id=<?php echo $techResult[$i]['id_post']; ?>">
                                    <article>
                                        <img src="<?php echo $firstImageSrc ; ?>" alt="article-image">
                                        <div class="article-content">
                                            <h4><?php echo $articleTitle; ?></h4>
                                            <h2><?php echo $publisherFullName ; ?></h2>
                                            <br>
                                        </div>
                                    </article>
                                </a>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="page-sec current-topic2 Environememnt named-section reveal" id="environememnt">
        <?php $techResult=get4PostsByCategory("environnement"); ?>
        
        <h2 class="section-name">Environnememnt</h2>
        <div class="container">
            <div class="row">
                <?php
                if(!empty($techResult[0])):
                $content=$techResult[0]['content']; 
                $firstImageSrc=extractFirstImageSrcFromContent($content);
                $firstParagraph=extractFirstParagraphFromContent($content);
                $publisherFullName=$techResult[0]['firstname'].' '.$techResult[0]['lastname'];
                $articleTitle=$techResult[0]['title']; ?>
                <div class="col-xxs-12 col-xs-12 col-sm-12 col-md-7 col-lg-7" >
                    <a href="../main pages/search.php?id=<?php echo $techResult[0]['id_post']; ?>">
                        <article class="main-article">
                            <img src="<?php echo $firstImageSrc; ?>" alt="article-image">
                            <div class="article-content">
                                <h4><?php echo $articleTitle; ?></h4>
                                <h2><?php echo $publisherFullName; ?></h2>
                                <br>
                            </div>
                        </article>
                    </a>
                </div>

                

                <div class="col-xxs-12 col-xs-12 col-sm-12 col-md-5 col-lg-5 square-images">
                    <div class="row">

                        <?php for($i=1 ; $i<4 ; $i++): 
                            $content=$techResult[$i]['content']; 
                            $firstImageSrc=extractFirstImageSrcFromContent($content);
                            $firstParagraph=extractFirstParagraphFromContent($content);
                            $publisherFullName=$techResult[$i]['firstname'].' '.$techResult[$i]['lastname'];
                            $articleTitle=$techResult[$i]['title'];
                            ?> 
                            <div class="col-xxs-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <a href="../main pages/search.php?id=<?php echo $techResult[$i]['id_post']; ?>">
                                    <article>
                                        <img src="<?php echo $firstImageSrc ; ?>" alt="article-image">
                                        <div class="article-content">
                                            <h4><?php echo $articleTitle; ?></h4>
                                            <h2><?php echo $publisherFullName ; ?></h2>
                                            <br>
                                        </div>
                                    </article>
                                </a>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="page-sec most-searched-topics-helper named-section reveal" >
        <?php $techResult=get4PostsByCategory("world"); ?>
        
        <h2 class="section-name">World</h2>
        <div class="container">
            <div class="row">
                <?php
                if(!empty($techResult[0])):
                $content=$techResult[0]['content']; 
                $firstImageSrc=extractFirstImageSrcFromContent($content);
                $firstParagraph=extractFirstParagraphFromContent($content);
                $publisherFullName=$techResult[0]['firstname'].' '.$techResult[0]['lastname'];
                $articleTitle=$techResult[0]['title']; ?>
                <div class="col-xxs-12 col-xs-12 col-sm-12 col-md-7 col-lg-7" >
                    <a href="../main pages/search.php?id=<?php echo $techResult[0]['id_post']; ?>">
                        <article class="main-article">
                            <img src="<?php echo $firstImageSrc; ?>" alt="article-image">
                            <div class="article-content">
                                <h4><?php echo $articleTitle; ?></h4>
                                <h2><?php echo $publisherFullName; ?></h2>
                                <br>
                            </div>
                        </article>
                    </a>
                </div>

                

                <div class="col-xxs-12 col-xs-12 col-sm-12 col-md-5 col-lg-5 square-images">
                    <div class="row">

                        <?php for($i=1 ; $i<4 ; $i++): 
                            $content=$techResult[$i]['content']; 
                            $firstImageSrc=extractFirstImageSrcFromContent($content);
                            $firstParagraph=extractFirstParagraphFromContent($content);
                            $publisherFullName=$techResult[$i]['firstname'].' '.$techResult[$i]['lastname'];
                            $articleTitle=$techResult[$i]['title'];
                            ?> 
                            <div class="col-xxs-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <a href="../main pages/search.php?id=<?php echo $techResult[$i]['id_post']; ?>">
                                    <article>
                                        <img src="<?php echo $firstImageSrc ; ?>" alt="article-image">
                                        <div class="article-content">
                                            <h4><?php echo $articleTitle; ?></h4>
                                            <h2><?php echo $publisherFullName ; ?></h2>
                                            <br>
                                        </div>
                                    </article>
                                </a>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="join-us reveal">
        <div class="container">
            <div class="row">
                    <?php  include_once("../backend/2_most_trending.php"); ?>                     
            </div>
        </div>
        
    </div>
    <?php include_once('../pages/footer.php'); ?>
    <!--my javascript files-->
    <script src="../javascript/navbar.js"></script>
    <script src="../javascript/theme.js"></script>
    <script src="../javascript/scrollAnimation.js"></script>
    <script src="../javascript/cookieAlert.js"></script>
</body>
</html>