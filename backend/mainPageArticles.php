<?php
// Separate database connection logic into a separate file
include_once("../backend/databaseConnection.php");


Function customAttribute($element, $attributeName) {
    $attr = $element->attributes->getNamedItem($attributeName);
    return $attr ? $attr->nodeValue : '';
}

// Function to execute a database query with error handling
function executeQuery($query, $params = []) {
    global $db;
    try {
        $statement = $db->prepare($query);
        $statement->execute($params);
        return $statement->fetchAll();
    } catch (PDOException $e) {
        // Handle database errors
        echo "Error: " . $e->getMessage();
        return [];
    }
}

// Function to retrieve the four most recent posts by category
function get4PostsByCategory(string $category) {
    $query = "SELECT * FROM post 
              INNER JOIN article ON post.article_id = article.id_article
              INNER JOIN publisher ON article.publisher_id = publisher.id_publisher
              INNER JOIN user ON publisher.user_id = user.id_user
              WHERE categorie LIKE ? 
              ORDER BY  post_date ASC 
              LIMIT 4";
    return executeQuery($query, ["%$category%"]);
}

// Function to retrieve the six most trending posts
function get6PostsMostTrending() {
    $query = "SELECT * FROM post 
              INNER JOIN article ON post.article_id = article.id_article
              INNER JOIN publisher ON article.publisher_id = publisher.id_publisher
              INNER JOIN user ON publisher.user_id = user.id_user
              ORDER BY post_date ASC 
              LIMIT 6";
    return executeQuery($query);
}

Function extractFirstImageSrcFromContent(string $content){
    $dom = new DOMDocument('1.0', 'UTF-8');
    // Load HTML string into DOMDocument
    @$dom->loadHTML($content);

    // Extracting the first image
    $images = $dom->getElementsByTagName('img');
    if ($images->length > 0) {
        $firstImage = $images->item(0);
        $firstImageSrc = customAttribute($firstImage, 'src');
    } else {
        $firstImageSrc = ''; // Set a default value if no image is found
    }
    return $firstImageSrc;
}

Function extractFirstParagraphFromContent(string $content){
    $dom = new DOMDocument('1.0', 'UTF-8');
    // Load HTML string into DOMDocument
    @$dom->loadHTML($content);

    // Extracting the first paragraph
    $paragraphs = $dom->getElementsByTagName('p');
    if ($paragraphs->length > 0) {
        $firstParagraph = $paragraphs->item(0)->nodeValue;
    } else {
        $firstParagraph = ''; // Set a default value if no paragraph is found
    }
    return $firstParagraph;
}


?>
