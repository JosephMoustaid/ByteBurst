<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        img{
            width: 100%;
            height: auto;
            margin: 20px 0;
        }
    </style>
    <title>Confirmation</title>
</head>
<body class="bg-dark w-50 " style="margin: 100px auto; color:azure;">
    
    <?php 
            $articleInserted=(isset($_POST['publisher']) && !empty($_POST['publisher']) &&
                isset($_POST['article-title']) && !empty($_POST['article-title'])  &&
                isset($_POST['categorie']) && !empty($_POST['categorie']) &&
                isset($_POST['article-content']) && !empty($_POST['article-content']) 
                ) ;
            $rowcount;
           if($articleInserted) :
                   include_once('../backend/databaseConnection.php');
                   $newArticle=array($_POST['categorie'],1,$_POST['article-title'],$_POST['article-content']);
                   $query=$db->prepare("INSERT INTO article(categorie,publisher_id,title,content) VALUES (?,?,?,?)");
                   $query->execute($newArticle);
                   $rowcount=$query->rowCount();
                   if($rowcount != 1 ):
                       echo "article non inséré";
                   elseif ($rowcount == 1 ) :
                       echo "article inséré";
                   endif; 
           endif;
    ?>

    

<?php 
     // HERE WE USE THE CHECK VARIABLES IN AN IF STATEMENT TO EITHOR CONTINUE , OR GET THE USER TO GO BACK AND CORRECT THE PROBLEM
    if ( ! $rowcount ) : ?>
    
        <a href="javascript:history.back();">Go Back to correct the issue</a>
        <?php 
 
            echo (!isset($_POST['publisher'])  )? "* you have to include the publisher *  \n" : "" ;
            echo( !isset($_POST['article-title']) ) ? "* you have to include the article's title *  \n" : "" ;
            echo( !isset($_POST['categorie']) ) ? "* you have to include the categorie *  \n" : "" ;
            echo( !isset($_POST['article-content']) ) ? "* you have to include the article content*  \n" : "" ;

            echo (empty($_POST['publisher'])  )? "*the publisher must not be empty *  \n" : "" ;
            echo( empty($_POST['article-title']) ) ? "* the publisher must not be empty *  \n" : "" ;
            echo( empty($_POST['categorie']) ) ? "* the publisher must not be empty  *  \n" : "" ;
            echo( empty($_POST['article-content']) ) ? "* the publisher must not be empty *  \n" : "" ;

        ?>

    <?php else :?>

        <?php if($articleInserted):?>
            <?php
                $query2=$db->prepare("SELECT id_article , title ,  categorie, content  FROM article WHERE id_article = (SELECT MAX(id_article) FROM article) ");
                $query2->execute();
                $result = $query2->fetch(PDO::FETCH_ASSOC);            
            ?>
    
            <div>
                    <strong>Article uploaded successfully👌👍</strong>
                    <hr>
                    
                    <h5>File meta data  :</h5>
                    <ul>
                        <li>article id : <p> <?php echo $result['id_article']; ?> </p></li>
                        <li>title : <p> <?php echo $result['title']; ?> </p></li>
                        <li>categorie : <p> <?php echo $result['categorie']; ?> </p></li>
                        <li>content : 
                            <div>
                                <?php echo $result['content']; ?>
                            </div>
                        </li>
                    </ul>
                    <hr>         
            </div>
        <?php else :?>
            <div>
                <strong>No Errors but image wasn't moved</strong>  
            </div>
        <?php endif;?>

    <?php  endif; ?>
    <a href="javascript:void(0)" class="goBack" onclick="goBack();">
        Go back <i class="bi bi-arrow-left"></i>
    </a>
    <script src="../javascript/goBack.js"></script>

</body>
</html>
