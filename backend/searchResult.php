<?php
if(isset($_GET['search']) && !empty($_GET['search'])):
    $request=$_GET['search'];
elseif( isset($_GET['cetegorie']) && !empty($_GET['cetegorie']) ):
    $request=$_GET['cetegorie'];
endif;

$per_page = 10; // Number of posts per page

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page (can be obtained from the URL)
// Calculate the offset based on the current page and posts per page
$offset = ($page - 1) * $per_page;

if( isset($request) && !empty($request) ):
    include_once('../backend/databaseConnection.php');
    
    $search_query = '%' . $request . '%';

    $query = $db->prepare("SELECT * FROM post 
                        INNER JOIN article 
                        ON post.article_id = article.id_article
                        INNER JOIN publisher
                        ON article.publisher_id = publisher.id_publisher
                        INNER JOIN user
                        ON publisher.user_id = user.id_user
                        WHERE title LIKE :search_query OR content LIKE :search_query OR categorie LIKE :search_query
                        ORDER BY views DESC
                        ");
                        // LIMIT :per_page OFFSET :offset
    $query->bindParam(':search_query', $search_query, PDO::PARAM_STR);
    //$query->bindParam(':per_page', $per_page, PDO::PARAM_INT);
    //$query->bindParam(':offset', $offset, PDO::PARAM_INT);

    $query->execute();

    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    $total_records = $query->rowCount();

    $total_pages = ceil($total_records / $per_page);

    // Determine current page and offset
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $per_page;
    
    $sliced_result = array_slice($result, $offset, $per_page);

    /*
    // Display results
    foreach ($result as $row) {
        echo "<h2>{$row['title']}</h2>";
        echo "<p>{$row['content']}</p>";
        // Add more fields as needed
    }

    // Display pagination links
    echo "<div>";
    for ($i = 1; $i <= $total_pages; $i++) {
        echo "<a href='?page=$i'>$i</a> ";
    }
    echo "</div>";
    */

    if($query->rowCount() === 0) :
        echo '<h4>No article found<h4>';
    else :
    
        foreach($sliced_result as $post ):

            if (!function_exists('customAttribute')) {
                function customAttribute($element, $attributeName) {
                    $attr = $element->attributes->getNamedItem($attributeName);
                    return $attr ? $attr->nodeValue : '';
                }
            }
            $htmlContent = $post['content'];
            

            // Create a new DOMDocument
            
            $dom = new DOMDocument('1.0', 'UTF-8');

            // Load HTML string into DOMDocument
            @$dom->loadHTML($htmlContent);
            
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
            
            // Now, $firstImageSrc and $firstParagraph contain the required data
            /*
            echo '<img src="'.$firstImageSrc.'" alt="article image">';
            echo '<p>'.$firstParagraph.'</p>';
            */
           ?>
           
           <a href="../main pages/search.php?id=<?php echo $post['id_post']; ?>"  >
            <article class="main-article"> 
                    <div class="article-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-xxs-12 col-xs-6 col-sm-5 col-md-5 col-lg-6">
                                    <img src="<?php echo $firstImageSrc; ?>" alt="article image">
                                </div>
                                <div class="col-xxs-12 col-xs-6 col-sm-7 col-md-7 col-lg-6">
                                    <div class="container">
                                        <div class="row">
                                            <div class="search-result__body__article--large col-xxs-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <h4> <?php  echo $post['title']; ?> </h4>
                                                <h2 class="article-meta-data"><?php  echo $post['firstname'].' '.$post['lastname']; ?></h2> <h2 class="article-meta-data date" > <?php  echo $post['post_date']; ?></h2>
                                            </div>
                                            <div class="search-result__body__article--large col-xxs-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <?php echo '<p>'.$firstParagraph.'</p>'; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </article>
            </a>
           <?php 

        endforeach;


        // Display pagination links
        echo "<div class=\"pagination-links\">";
        for ($i = 1; $i <= $total_pages; $i++) {
            if($i>1) :
                echo ' - ';
            endif;
            echo "<a href='../main%20pages/search-result.php?search=".$request."&page=".$i."'>".$i."</a> ";
        } 
        echo "</div>";

    endif;
endif;
?>







