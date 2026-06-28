<?php
include("../../../conexao/conexao.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $idTag  = (int) $_POST["idTag"];
    $nome     = mysqli_real_escape_string($conn, $_POST["nome"]);

    $sql = "UPDATE tag SET
                nome = '$nome'
            WHERE idTag = '$idTag'";

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