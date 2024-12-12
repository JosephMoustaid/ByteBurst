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
    <title>Edit Post</title>
    <!-- fontawesome icons -->  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- my css (scss)-->
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
    <!--cookie alert js and css-->
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
    <!-- Link to favicon -->
    <link rel="icon" type="image/x-icon" href="../images/favicon-logo3.png">
    <!-- Optionally, provide additional sizes for better compatibility -->
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-logo3.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon-logo3.png">
    <!-- Some browsers also support specifying a shortcut icon for desktop -->
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon-logo3.png">
</head>
<body id="editPost-body">
    <h1>Edit Post</h1>
    <a href="javascript:void(0)" class="goBack" onclick="goBack();">
        Go back <i class="bi bi-arrow-left"></i>
    </a>
    <br>
    <br>
    <div class="editPost-container container">
        
        <?php
            include_once("../backend/admin.php");
            $post = searchPostById($_GET['id']);
        ?>
        
        <form class="updatePost-from row" action="updatePost.php" method="post">
            <div class="col-xxs-12 col-xs-12 col-sm-5 col-md-5 col-lg-5">
                <div class="container">
                    <div class="row">
                        <input class="col-xxs-12 col-xs-12 col-sm-12 col-md-12 col-lg-12"  type="hidden" id="id_article" name="id_article" value="<?php echo $post['id_article']; ?>"> 
                        <label class="col-xxs-2 col-xs-2 col-sm-2 col-md-2 col-lg-2" for="title">Title :</label>
                        <input class="col-xxs-10 col-xs-10 col-sm-10 col-md-10 col-lg-10" type="text" id="title" name="title" value="<?php echo $post['title']; ?>"> 
                        <label class="col-xxs-2 col-xs-2 col-sm-2 col-md-2 col-lg-2" for="categorie">Category :</label>
                        <select class="col-xxs-10 col-xs-10 col-sm-10 col-md-10 col-lg-10" name="categorie" id="categorie">
                            <option value="politics" <?php if ($post['categorie'] == 'politics') echo 'selected'; ?>>Politics</option>
                            <option value="tech" <?php if ($post['categorie'] == 'tech') echo 'selected'; ?>>Tech</option>
                            <option value="sport" <?php if ($post['categorie'] == 'sport') echo 'selected'; ?>>Sport</option>
                            <option value="justice" <?php if ($post['categorie'] == 'justice') echo 'selected'; ?>>Justice</option>
                            <option value="world" <?php if ($post['categorie'] == 'world') echo 'selected'; ?>>World</option>
                            <option value="nature" <?php if ($post['categorie'] == 'nature') echo 'selected'; ?>>Nature</option>
                            <option value="environment" <?php if ($post['categorie'] == 'environment') echo 'selected'; ?>>Environment</option>
                            <option value="AI" <?php if ($post['categorie'] == 'AI') echo 'selected'; ?>>AI</option>
                            <option value="science" <?php if ($post['categorie'] == 'science') echo 'selected'; ?>>Science</option>
                            <option value="education" <?php if ($post['categorie'] == 'education') echo 'selected'; ?>>Education</option>
                            <option value="health" <?php if ($post['categorie'] == 'health') echo 'selected'; ?>>Health</option>
                        </select>

                    </div>
                </div>
            </div>
            <div class="col-xxs-12 col-xs-12 col-sm-7 col-md-7 col-lg-7">
                <div class="container">
                    <div class="row">
                        <label class="col-xxs-12 col-xs-12 col-sm-12 col-md-12 col-lg-12" for="content">Content:</label>
                        <textarea class="col-xxs-12 col-xs-12 col-sm-12 col-md-12 col-lg-12" id="content" name="content"><?php echo $post['content']; ?></textarea>
                    </div>
                </div>
            </div>
            <input class="col-xxs-12 col-xs-12 col-sm-12 col-md-12 col-lg-12" type="submit" value="Update Post">
        </form>

    </div>
</body>
<script src="../javascript/goBack.js"></script>
</html>
