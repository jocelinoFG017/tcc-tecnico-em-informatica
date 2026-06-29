<?php
session_start();
include_once("../../conexao/conexao.php");

$idCidade = (int) $_POST['idCidade'];
$cidade   = mysqli_real_escape_string($conn, trim($_POST['cidade']));
$estadoId = (int) $_POST['estadoId'];

$sql = "UPDATE cidade SET
            nome = '$cidade',
            fk_idEstado = $estadoId
        WHERE idCidade = $idCidade";

if (mysqli_query($conn, $sql)) {
    $_SESSION['statusEdicao'] = true;
} else {
    $_SESSION['statusErro'] = true;
}

header("Location: /dashboard/cidades/index.php");
exit;
?>