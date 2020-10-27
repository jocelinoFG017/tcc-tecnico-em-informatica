<?php
session_start();
include("../Login/verificaLogin.php");
?>
<h2>Olá <?php echo $_SESSION['login'];?></h2>
<h2><a href="sair.php"> Sair</a> </h2>