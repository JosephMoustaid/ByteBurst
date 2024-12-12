<?php
include_once("../backend/databaseConnection.php");

$most_trending_two=$db->prepare("SELECT * FROM post 
            INNER JOIN article 
            ON post.article_id = article.id_article
            INNER JOIN publisher
            ON article.publisher_id = publisher.id_publisher
            INNER JOIN user
            ON publisher.user_id = user.id_user
            ORDER BY views DESC
            LIMIT 2            ");
$most_trending_two->execute();
$two_trending = $most_trending_two->fetchAll(PDO::FETCH_ASSOC);

if($most_trending_two->rowCount() >=2) :
    foreach($two_trending as $post ):
        $htmlContent = $post['content'];
                
        // Create a new DOMDocument

        $dom = new DOMDocument('1.0', 'UTF-8');

        // Load HTML string into DOMDocument
        @$dom->loadHTML($htmlContent);
           
        
        if (!function_exists('customAttribute')) {
            function customAttribute($element, $attributeName) {
                $attr = $element->attributes->getNamedItem($attributeName);
                return $attr ? $attr->nodeValue : '';
            }
        }
        
        // Extracting the first image

       $images = $dom->getElementsByTagName('img');
       if ($images->length > 0) {
           $firstImage = $images->item(0);
           $firstImageSrc = customAttribute($firstImage, 'src');
       } else {
           $firstImageSrc = ''; // Set a default value if no image is found
       }

        // Extracting the first paragraph
        $paragraphs = $dom->getElementsByTagName('p');
        if ($paragraphs->length > 0) {
            $firstParagraph = $paragraphs->item(0)->nodeValue;
        } else {
            $firstParagraph = ''; // Set a default value if no paragraph is found
        }


        ?>
        
            <div class="card card2 col-xxs-12 col-xs-6 col-sm-6 col-md-6 col-lg-4" style="background-image: url('<?php echo './'.$firstImageSrc; ?>');">
                <a href="../main pages/search.php?id=<?php echo $post['id_post']; ?>">    
                    <div class="card-content">
                        <h2 class="card-title"> <?php echo $post["title"] ; ?> </h2>
                        <p class="card-description"><?php echo $firstParagraph; ?></p>
                    </div>
                </a>
            </div>


          
        <?php
    endforeach;
endif;
?>
<div class="col-xs-12 col-xxs-12 col-sm-12 col-md-12 col-lg-4">
    <?php include_once("../forms/auto-email.php"); ?>   
</div>        