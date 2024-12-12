<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();


// Expire the 'loggedUser' cookie
if (isset($_COOKIE['logged_user'])) {
    setcookie('logged_user', '', time() - 3600, '/');
}

// Expire the 'id' cookie
if (isset($_COOKIE['user_id'])) {
    setcookie('user_id', '', time() - 3600, '/');
}


// Redirect to another page after logout
header("Location: ../main pages/"); // Redirect to logout success page
exit();
?>
