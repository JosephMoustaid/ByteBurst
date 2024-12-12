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
<body class="search-page__body">
    <?php include_once('../pages/nav.php'); ?>
    <div class="article-searched">
            <div class="page-sec named-section" >
                <div class="container">
                    <div class="row">
                        <div class="col-xxs-12 col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                            <?php 
                                if(isset($_GET['id']) && !empty($_GET['id'])) {
                                    include_once('../backend/databaseConnection.php');

                                    $query = $db->prepare("SELECT * FROM post 
                                                        INNER JOIN article 
                                                        ON post.article_id = article.id_article
                                                        INNER JOIN publisher
                                                        ON article.publisher_id = publisher.id_publisher
                                                        INNER JOIN user
                                                        ON publisher.user_id = user.id_user
                                                        WHERE id_post = ?");

                                    $id = (int)$_GET['id']; // Explicitly cast to integer

                                    $query->bindParam(1, $id, PDO::PARAM_INT);
                                    $query->execute(); // Execute the query

                                    $post = $query->fetchAll(PDO::FETCH_ASSOC);

                                    if($post) {
                                        Include_once('../backend/databaseConnection.php');

                                        $query2 = $db->prepare("UPDATE post SET views = views + 1 WHERE id_post = ?");
                                        $query2->bindParam(1, $id, PDO::PARAM_INT);
                                        $query2->execute(); // Execute the query

                                        ?>
                                         <article class="main-article"> 
                                            <div class="article-content">
                                                <h4><?php echo $post[0]['title'];  ?></h4>
                                                <h2><?php echo 'By '.$post[0]['firstname'].' '.$post[0]['lastname']; echo ' -  <i class="bi bi-eye"></i>  '.$post[0]['views'];?>  </h2>
                                                <h2></h2>
                                                <?php 
                                                    echo $post[0]['content'];  
                                                ?>
                                            </div>
                                         </article>
                                        <?php
                                    } else {
                                        echo '<h4>Article Not Found</h4>';
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    
    <div class="join-us" id="join-us">
        <div class="container">
            <div class="row">
                    <?php  include_once("../backend/2_most_trending.php"); ?> 
                    <div class="col-xxs-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 ">
                        <?php include_once("../forms/auto-email.php"); ?>   
                    </div>                             
            </div>
        </div>
    </div>
    <?php include_once('../pages/footer.php'); ?>
    <!--my javascript files-->
    <script src="../javascript/navbar.js"></script>
    <script src="../javascript/theme.js"></script>
    <script src="../javascript/cookieAlert.js"></script>

</body>
</html>