<?php
include("../../conexao/conexao.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $idProduto   = $_POST["idProduto"];
    $nome        = $_POST["nome"];
    $descricao   = $_POST["descricao"];
    $marca       = $_POST["marca"];
    $quantidade  = $_POST["quantidade"];
    $preco       = $_POST["preco"];

    $sql = "UPDATE produto SET 
                nome = '$nome',
                descricao = '$descricao',
                marca = '$marca',
                quantidade = '$quantidade',
                preco = '$preco'
            WHERE idProduto = '$idProduto'";

    $resultado = mysqli_query($conn, $sql);

    if ($resultado) {
        header("Location: index.php?edit=ok");
        exit;
    } else {
        header("Location: index.php?edit=erro");
        exit;
    }
}
?>