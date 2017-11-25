<?php session_start(); ?>
<?php
    session_unset($_SESSION);
    session_destroy();
    header("Location: login.php?error=false");
    exit();
?>