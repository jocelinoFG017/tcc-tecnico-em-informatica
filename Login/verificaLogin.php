<?php
    //session_status() === PHP_SESSION_ACTIVE ?: session_start();
    session_start();
    if(!$_SESSION['login']) {
        header('Location: ../Login/loginIndex.php');
        exit();
    }
    ?>
