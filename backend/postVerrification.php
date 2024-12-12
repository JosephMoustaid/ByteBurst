<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- fontawesome icons -->  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- my css (scss)-->
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">    
    <title>Publish new</title>
</head>
<body class="publish-form-page__body " id="publish-form-page__body2" >
    
    
    <div class="publish publish2 " >
        <div id="test-display">

            <?php
                // verrification de section 1
                $publisher =$_POST['publisher'];
                $title =$_POST['title'];
                $categorie = $_POST['categorie'];
                
                $articleData=( isset($publisher) && isset($title) && isset($categorie ) && 
                            !empty($publisher) && !empty($title) && !empty($categorie ) );

                if ( $articleData ):
                    echo '<h5> article data(publisher - title - categorie) was passed correctly </h5>';
                else :
                    echo '<h5> article data(publisher - title - categorie) was not passed correctly </h5>';
                endif;

                $numImages =$_POST['numImages'];
                $numParagraphs =$_POST['numParagraphs'];
                
                
                echo "Number of images: $numImages<br>";
                echo "Number of paragraphs: $numParagraphs<br>";
                

                // verrification de section 2 : images
                $imagesVerrification=true;
                // we get the extenssion using the associatif array  : $fileInfo , and the key: extension
                $validExtensions=['png','jpeg','gif','jpg','heic','webp','avif'];    // here we make a table of valid file extensions to controll the user input file

                for($i=0;$i<$numImages ;$i++){

                    if(isset($_FILES['image'.($i+1)]) && $_FILES['image'.($i+1)]['size'] > 0){
                        $fileName = $_FILES['image'.($i+1)]['name'];
                        $fileInfo= pathinfo($fileName);     // phpinfo : returns an array of information about the file name specified 
                        $extension= $fileInfo['extension'];

                        $test= 
                        isset($_FILES['image'.($i+1)]) &&
                        !empty($_FILES['image'.($i+1)]) && 
                        $_FILES['image'.($i+1)]['size'] > 0 &&  $_FILES['image'.($i+1)]['size'] < 8000000 &&
                        $_FILES['image'.($i+1)]['name'] !== "" &&
                        $_FILES['image'.($i+1)]['error']===0 && 
                        in_array($extension,$validExtensions );
                    }
                    else{
                        $test= false;
                    }
                    
                    $imagesVerrification = $imagesVerrification && $test;

                    if( $test ):
                        echo '<div> image'.($i+1).' was passed correctly 👍</div>';
                    else :
                        echo '<div> image'.($i+1).' was not passed correctly 👎</div>';
                    endif;
                }
                if($imagesVerrification):
                    echo '<h5> > all images were passed correctly 👍</h5>';
                else :
                    echo '<h5> > images were not passed correctly 👎</h5>';
                endif;


                // verrification de section 3 : paragraphs
                $paragraphsVerrification=true;
                for($i=0;$i<$numParagraphs ;$i++){
                    $paragraphsVerrification =$paragraphsVerrification && isset($_POST['paragraph'.($i+1)])  && !empty($_POST['paragraph'.($i+1)]) ;
                    if(isset($_POST['paragraph'.($i+1)]) && !empty($_POST['paragraph'.($i+1)])):
                        echo '<div> paragraph'.($i+1).' was passed correctly 👍</div>';
                    else :
                        echo '<div> paragraph'.($i+1).' was not passed correctly 👎</div>';
                    endif;
                }
                if($paragraphsVerrification):
                    echo '<h5> > all paragraphs were passed correctly 👍</h5>';
                else :
                    echo '<h5> > paragraphs were not passed correctly 👎</h5>';
                endif;



                // Conclusion : if all good , insert everything , if not display go back to correct the issue
                $allGood=( $articleData && $imagesVerrification && $paragraphsVerrification );
                if( $allGood ):


                    $content="";
                    $j=0;
                    for($i=0 ;$i<$numParagraphs ;$i++ ){
                        if(isset($_FILES['image'.($j+1)]) && $i % 4==0):
                            $fileMoved=move_uploaded_file($_FILES['image'.($j+1)]['tmp_name'] , '../ImageBase/'.basename($_FILES['image'.($j+1)]['name']) );
                            $content =  $content.'<img src="../ImageBase/'.basename($_FILES['image'.($j+1)]['name']).'" alt="article-image">';
                            $j++;
                        endif;

                        $content =  $content.'<p>'.$_POST['paragraph'.($i+1)].'</p> <br>';
                    }
                    


                    include_once('../backend/databaseConnection.php');

                    $query3=$db->prepare("SELECT id_article FROM article WHERE title =? ");
                    $query3->execute(array($_POST['title']));
                    if($query3->rowCount() === 0):
                        $newArticle=array($_POST['categorie'],1,$_POST['title'],$content);
                        $query=$db->prepare("INSERT INTO article(categorie,publisher_id,title,content) VALUES (?,?,?,?)");
                        $query->execute($newArticle);
                        $rowcount=$query->rowCount();
                        if($rowcount != 1 ):
                            echo "<h5> article non inséré </h5>";
                        elseif ($rowcount == 1 ) :
                            echo "<h5> article inséré </h5>";
                            echo '<br> Here is your article : <br>';
                            $query2=$db->prepare("SELECT id_article , title ,  categorie, content  FROM article WHERE id_article = (SELECT MAX(id_article) FROM article) ");
                            $query2->execute();
                            $result = $query2->fetch(PDO::FETCH_ASSOC);


                            $query4=$db->prepare("INSERT INTO post(post_date	,post_time , views , article_id) VALUES (?,?,?,?)");
                            
                            $currentDate = date('Y-m-d');
                            $currentTime = date('H:i:s');

                            $query4->bindValue(1, $currentDate, PDO::PARAM_STR);
                            $query4->bindValue(2, $currentTime, PDO::PARAM_STR);
                            $query4->bindValue(3, 0, PDO::PARAM_INT);
                            $query4->bindValue(4, $result['id_article'], PDO::PARAM_INT);

                            $query4->execute();
                            
                            echo $result['content'];

                        endif; 

                    else:
                        echo "<h5> > article already exist in the data  base </h5>";
                    endif;
                    

                    
                else: 
                    echo '
                    <a href="javascript:void(0)" class="goBack" onclick="goBack();">
                        Go back <i class="bi bi-arrow-left"></i>
                    </a>';
                endif;
            ?>

        </div>
    </div>




    
    <?php include_once("../pages/footer.php") ?>
    <script src="../javascript/goBack.js"></script>
</body>
</html>


