<?php
if($_POST['firstname'] && isset($_POST['firstname'] ) && !empty($_POST['firstname'] ) &&
    $_POST['lastname'] && isset($_POST['lastname'] ) && !empty($_POST['lastname'] ) &&
    $_POST['birthdate'] && isset($_POST['birthdate'] ) && !empty($_POST['birthdate'] ) &&
    $_POST['gender'] && isset($_POST['gender'] ) && !empty($_POST['gender'] ) &&
    $_POST['email'] && isset($_POST['email'] ) && !empty($_POST['email'] ) &&
    $_POST['password'] && isset($_POST['password'] ) && !empty($_POST['password'] )  ):

    $newUser=array($_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['birthdate'],
                   $_POST['password'],$_POST['gender']);


    include_once("../backend/databaseConnection.php");
    $query=$db->prepare("INSERT INTO user(firstname,lastname,email,birthdate,password,gender) VALUES (?,?,?,?,?,?)" ) ;
    $query->execute($newUser);

    if($query->rowCount() !== 1):
        echo 'there was a problem creating your account';    
    else :
        echo 'your account was created and added succesfully';
        $_SESSION['loggedUser']=$_POST['email'];


        // creating the cookie
        include_once("../backend/databaseConnection.php");
        $query2 = $db->query("SELECT * FROM user ORDER BY id_user DESC LIMIT 1");
        $query2->execute();
        $new_user = $query->fetch(PDO::FETCH_ASSOC);
        // Set cookie to remember the user for 1 year
        $user_id = $new_user[1]['id_user'];
        $expiration_time = time() + (365 * 24 * 60 * 60); 
        setcookie("user_id", $user_id, $expiration_time, "/");
        setcookie("logged_user", $_POST['email'], $expiration_time, "/");

        // Redirect the user to another page after setting the cookie
        header("Location: ../main pages/index.php");
        exit(); // Make sure to exit after redirecting

    endif;

endif;
?>