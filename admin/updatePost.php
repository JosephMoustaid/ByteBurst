<?php
    session_start();

    // Check if user is not logged in
    if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
        header('Location: index.html'); // Redirect to login page
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Post</title>
</head>
<body>
    <div class="update-status-container">
        <?php
        include_once("../backend/admin.php");

        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_article'], $_POST['title'], $_POST['categorie'], $_POST['content'])) {
            // Assuming updatePost() function returns true or false indicating success or failure
            $updated = updatePost((int)$_POST['id_article'], $_POST['title'], $_POST['categorie'], $_POST['content']);
            if($updated) {
                echo "<p>Post updated successfully!</p>";
            } else {
                echo "<p>Failed to update post.</p>";
            }
        } else {
            echo "<p>No data received for updating the post.</p>";
        }
        ?>
        <p><a href="editPost.php">Go back to Home Page</a></p>
    </div>
</body>
</html>
