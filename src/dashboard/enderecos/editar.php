<?php
include_once "../../conexao/conexao.php";

$idEndereco = $_POST['idEndereco'];
$bairro     = $_POST['bairro'];
$rua        = $_POST['rua'];
$numero     = $_POST['numero'];
$telefone   = $_POST['telefone'];
$cidadeId   = $_POST['cidadeId'];

$sql = "UPDATE endereco SET
            bairro = '$bairro',
            rua = '$rua',
            numero = '$numero',
            telefone = '$telefone',
            fk_idCidade = '$cidadeId'
        WHERE idEndereco = '$idEndereco'";

mysqli_query($conn, $sql);

header("Location: index.php");
exit;