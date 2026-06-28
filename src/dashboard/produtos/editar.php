<?php
include("../../conexao/conexao.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $idProduto  = (int) $_POST["idProduto"];
    $nome       = mysqli_real_escape_string($conn, $_POST["nome"]);
    $descricao  = mysqli_real_escape_string($conn, $_POST["descricao"]);
    $idMarca    = (int) $_POST["marca"];
    $quantidade = (int) $_POST["quantidade"];
    $preco      = str_replace(",", ".", $_POST["preco"]);

    $sql = "UPDATE produto SET
                nome = '$nome',
                descricao = '$descricao',
                fk_idMarca = '$idMarca',
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