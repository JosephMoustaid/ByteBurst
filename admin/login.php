<!-- login.php -->
<?php
session_start();

// Dummy user credentials (replace with your actual authentication logic)
$valid_username = "admin";
$valid_password = "U9&eA#vPz6@Q3x5R8%J2*wL7@K9#N";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate username and password
    if ($username === $valid_username && $password === $valid_password) {
        // Authentication successful
        $_SESSION["authenticated"] = true;
        header("Location: admin.php");
        exit();
    } else {
        // Authentication failed
        ?>
        <div class="message-window" style="color: black; font-size:16px;">
            <div class="message-header-failed ">Failed</div>
            <div class="message-body">User name or password are not valid.</div>
            <div class="message-footer">
                <button class="close-btn" onclick="closeMessageWindow()">Close</button>
            </div>
        </div>
        <script src="../javascript/message_window.js"></script>
    <?php
    }
}
?>
