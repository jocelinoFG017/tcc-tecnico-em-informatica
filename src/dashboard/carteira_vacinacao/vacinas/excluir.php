<?php
include_once "../../../login/verificaAdmin.php";
include_once "../../../conexao/conexao.php";

$id = intval($_GET['id']);

$sql = "DELETE FROM vacina WHERE idVacina = $id";

mysqli_query($conn, $sql);

header("Location: index.php");
exit;