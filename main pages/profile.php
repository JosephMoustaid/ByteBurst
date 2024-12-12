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
<body class="about-body profile-body" id="about-body">
    <?php include_once('../pages/nav.php'); ?>
    <div class="profile about-us" >
        <div>

            
            <div class="about-ByteBurst ">
                    <div class="container">
                        <h6>Profile</h6>  
                        <a href="../admin/logout.php" class="logout">Logout <i class="bi bi-box-arrow-left"></i></a>  
                    </div>
                    <br> 
                    <?php include_once("../backend/user.php"); 
                    $user = new User('','','','','',10000,'');
                    $user->getUserByEmail($_COOKIE['logged_user']);
                    ?>
                    <form action="./profile.php" method="POST">
                        <div class="input-container">
                            <h6>email : </h6>  <input style="background-color: #f0f0f0;" type="email" name="email" readonly value="<?php echo $user->getEmail();?>" placeholder="email ">
                        </div>
                        
                        <div class="input-container">
                            <h6>user id : </h6> <input style="background-color: #f0f0f0;" type="number" name="id" readonly value="<?php echo $user->getId();?>"  placeholder="id"> 
                        </div>

                        <div class="input-container">
                            <h6>first name : </h6> <input  type="text" name="firstname" value="<?php echo $user->getFirstName();?>" placeholder="first name">
                        </div>

                        <div class="input-container">
                            <h6>last name : </h6> <input type="text" name="lastname" value="<?php echo $user->getLastName();?>" placeholder="last name">
                        </div>

                        <div class="input-container">
                            <h6>birthdate : </h6> <input type="date" name="birthdate" value="<?php echo date('Y-m-d', strtotime($user->getBirthDate()));?>" placeholder="birthdate"> 
                        </div>

                        <div class="input-container">
                            <h6>gender : </h6> 
                            <select name="gender" id="gender" value="<?php echo $user->getgender();?>" >
                                <option value="male">male</option>
                                <option value="female">female</option>
                                <option value="other">other</option>
                                <option value="preferNotToSay">prefer not to say</option>
                            </select>
                        </div>  

                        <div class="input-container">
                            <input type="submit">
                        </div>
                    </form>
                <?php
                    if($_SERVER["REQUEST_METHOD"] == "POST"):
                    $user->setFirstName($_POST['firstname']);
                    $user->setLastName($_POST['lastname']);
                    $user->setGender($_POST['gender']);
                    $user->setBirthDate($_POST['birthdate']);
                    $updated= $user->saveUser();
                    if($updated):
                        ?>
                        <div class="message-window">
                            <div class="message-header">Success</div>
                            <div class="message-body">Your profile has been updated successfully.</div>
                            <div class="message-footer">
                                <button class="close-btn" onclick="closeMessageWindow()">Close</button>
                            </div>
                        </div>

                        <?php
                    endif;
                    endif;
                ?>

            </div>

        </div>
    </div>
    <?php include_once('../pages/footer.php'); ?>
    <!--javascript files-->
    <script src="../javascript/navbar.js"></script>
    <script src="../javascript/theme.js"></script>
    <script src="../javascript/scrollAnimation.js"></script>
    <script src="../javascript/cookieAlert.js"></script>
    <script src="../javascript/message_window.js"></script>
</body>
</html>