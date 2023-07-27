<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    setcookie("username" , NULL, time() - 3600, "/"); // 1 hour ago cookie expiry
    setcookie("token"    , NULL, time() - 3600, "/"); // 1 hour ago cookie expiry
    setcookie("user-type", NULL, time() - 3600, "/"); // 1 hour ago cookie expiry

    // Redirect to home page
    header("Location: " . "index.php", true, 301);
    exit();
}

?>