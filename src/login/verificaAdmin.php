<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['login']) || empty($_SESSION['login'])) {
    header('Location: /../login/loginIndex.php');
    exit();
}

if (!isset($_SESSION['fk_idNivelAcesso']) || $_SESSION['fk_idNivelAcesso'] != 1) {
    header('Location: /../login/loginIndex.php');
    exit();
}
?>