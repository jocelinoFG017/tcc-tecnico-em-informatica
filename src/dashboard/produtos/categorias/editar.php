<?php
include("../../../conexao/conexao.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $idCategoria  = (int) $_POST["idCategoria"];
    $nome     = mysqli_real_escape_string($conn, $_POST["nome"]);
    $descricao = mysqli_real_escape_string($conn, $_POST["descricao"]);

    $sql = "UPDATE categoria SET
                nome = '$nome',
                descricao = '$descricao'
            WHERE idCategoria = '$idCategoria'";

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