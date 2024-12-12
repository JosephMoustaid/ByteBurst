

<?php
if( isset($_POST['email'] ) && !empty($_POST['email'] ) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) &&
    $_POST['password'] && isset($_POST['password'] ) && !empty($_POST['password'] ) ):

    $userData=array($_POST['email'] , $_POST['password']);

    include_once("../backend/databaseConnection.php");
    $query=$db->prepare("SELECT * FROM user WHERE email = ? and password = ? ") ;
    $query->execute($userData);
    $userData=$query->fetchAll(PDO::FETCH_ASSOC);

    if($query->rowCount() !== 1):
        echo 'account not found , please try again';
    elseif($query->rowCount() === 1):
        echo 'login successful';
        $_SESSION['loggedUser']=$_POST['email'];
        
        // Set cookie to remember the user for 1 year
        $user_id = $userData[0]['id_user'];
        $expiration_time = time() + (365 * 24 * 60 * 60); 
        setcookie("user_id", $user_id, $expiration_time, "/");
        setcookie("logged_user", $_POST['email'], $expiration_time, "/");


        // Redirect the user to another page after setting the cookie
        header("Location: ../main pages/index.php");
        exit(); // Make sure to exit after redirecting
    endif;

endif;
?>


