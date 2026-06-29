<?php
include_once("../../../login/verificaAdmin.php");
include_once("../../../conexao/conexao.php");

if (!isset($_POST['idAnimal'], $_POST['idVacina'])) {
    header("Location: index.php");
    exit;
}

$idAnimal = (int) $_POST['idAnimal'];
$idVacina = (int) $_POST['idVacina'];
$data_aplicacao = $_POST['data_aplicacao'] ?? null;
$proxima_dose = $_POST['proxima_dose'] ?? null;
$dose = mysqli_real_escape_string($conn, $_POST['dose'] ?? '');
$observacao = mysqli_real_escape_string($conn, $_POST['observacao'] ?? '');

# 1. garantir carteira do animal
$sqlCarteira = "SELECT idCarteira FROM carteira_vacinacao WHERE fk_idAnimal = $idAnimal";
$resCarteira = mysqli_query($conn, $sqlCarteira);
$carteira = mysqli_fetch_assoc($resCarteira);

if (!$carteira) {
    mysqli_query($conn, "INSERT INTO carteira_vacinacao (fk_idAnimal) VALUES ($idAnimal)");
    $idCarteira = mysqli_insert_id($conn);
} else {
    $idCarteira = $carteira['idCarteira'];
}

# 2. inserir aplicação da vacina
$sqlInsert = "INSERT INTO aplicacao_vacina 
    (fk_idCarteira, fk_idVacina, data_aplicacao, proxima_dose, dose, observacao)
VALUES 
    ($idCarteira, $idVacina, '$data_aplicacao', 
    " . ($proxima_dose ? "'$proxima_dose'" : "NULL") . ",
    '$dose',
    '$observacao')";

mysqli_query($conn, $sqlInsert);

# 3. voltar para carteira do animal
header("Location: index.php?animal=$idAnimal");
exit;