<?php
include_once("../../../conexao/conexao.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $idMarca  = (int) $_POST["idMarca"];
    $nome     = mysqli_real_escape_string($conn, $_POST["nome"]);

    $sql = "UPDATE marca SET
                nome = '$nome'
            WHERE idMarca = '$idMarca'";

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