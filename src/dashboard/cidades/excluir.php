<?php
session_start();
include("../../conexao/conexao.php");

if (isset($_GET['idCidade'])) {

    $idCidade = (int) $_GET['idCidade'];

    $sql = "DELETE FROM cidade WHERE idCidade = $idCidade";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['statusExclusao'] = true;
    } else {
        $_SESSION['statusErro'] = true;
    }

}

header("Location: /dashboard/cidades/index.php");
exit;
?>