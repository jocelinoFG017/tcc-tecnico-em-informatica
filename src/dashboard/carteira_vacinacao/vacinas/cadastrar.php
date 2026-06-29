<?php
include_once "../../../login/verificaAdmin.php";
include_once "../../../conexao/conexao.php";

if (isset($_POST['cadastrar'])) {

    $nome = mysqli_real_escape_string($conn, $_POST['nome']);

    $sql = "INSERT INTO vacina (nome) VALUES ('$nome')";

    mysqli_query($conn, $sql);

    header("Location: index.php");
    exit;
}