<?php

if(isset($_COOKIE['logged_in']))
    // Clear the login cookie
    setcookie("logged_in", false, time() - 3600, "/"); // Expire immediately

    // Redirect to login page
    header("Location: index.php");
    exit;

?>


