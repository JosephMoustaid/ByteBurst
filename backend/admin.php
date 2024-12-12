<?php
include_once("../backend/databaseConnection.php");
include_once("../backend/mainPageArticles.php");

function getAllUsers(){
    global $db;
    $query = $db->prepare("SELECT * FROM user ");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getAllPublishers(){
    global $db;
    $query = $db->prepare("SELECT  * FROM user INNER JOIN publisher ON user_id=id_user");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getAllPosts(){
    global $db;
    $query = $db->prepare("SELECT  * FROM post INNER JOIN article ON post.article_id = article.id_article ORDER BY post_date DESC ");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    for($i=0;$i<sizeof($result);$i++):
        $firstImage=extractFirstImageSrcFromContent($result[$i]['content']);
        $result[$i]['firstImage']=$firstImage;
        unset($result[$i]['content']);
    endfor;

    
    return $result;
}


function searchUser($name){
    global $db;
    $query = $db->prepare("SELECT * FROM user where firstname like ? or lastname like ?");
    $query->execute(['%'.$name.'%','%'.$name.'%']);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function searchPublisher($name){
    global $db;
    $query = $db->prepare("SELECT  * FROM user INNER JOIN publisher ON user_id=id_user where firstname like ? or lastname like ?");
    $query->execute(['%'.$name.'%','%'.$name.'%']);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function searchPost($title){
    global $db;
    $query = $db->prepare("SELECT  * FROM post INNER JOIN article ON post.article_id = article.id_article where title like ?  ORDER BY post_date DESC  ");
    $query->execute(['%'.$title.'%']);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function searchPostById($id){
    global $db;
    $id = (int)$id;
    $query = $db->prepare("SELECT  * FROM post 
    INNER JOIN article ON article_id = id_article 
    INNER JOIN publisher ON id_publisher=publisher_id 
    INNER JOIN user ON id_user=user_id
    where article_id= ? ORDER BY post_date DESC ");
    $query->execute([$id]);
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function deleteUser(int $id){
    global $db;
    $query = $db->prepare("DELETE FROM publisher WHERE user_id= ?");
    $query->execute([$id]);
    $query = $db->prepare("DELETE FROM user WHERE id_user= ?");
    $query->execute([$id]);
    return $query->rowCount();
}

function deletePost(int $id){
    global $db;
    $query = $db->prepare("DELETE FROM post WHERE article_id= ?");
    $query->execute([$id]);
    $query = $db->prepare("DELETE FROM article WHERE id_article= ?");
    $query->execute([$id]);
    return $query->rowCount();
}

function countPosts(){
    global $db;
    $query = $db->prepare("SELECT count(*) as total from post");
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}

function countUsers(){
    global $db;
    $query = $db->prepare("SELECT count(*) as total from user");
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}

function countViews(){
    global $db;
    $query = $db->prepare("SELECT SUM(views) as total from post");
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}

function countPublishers(){
    global $db;
    $query = $db->prepare("SELECT count(*) as total from publisher");
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}
function updatePost($id, $title, $categorie, $content) {
    global $db;
    $query = $db->prepare("UPDATE article 
                           SET title = ?, 
                               categorie = ?, 
                               content = ? 
                           WHERE id_article = ?");
    $query->execute([$title, $categorie, $content, $id]);
    return $query->rowCount() == 1;
}

?>
