<?php
include_once "../../../conexao/conexao.php";
include_once "../../../login/verificaAdmin.php";

if (isset($_POST['cadastrar'])) {

    $nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
    $especie = mysqli_real_escape_string($conn, trim($_POST['especie']));
    $raca = mysqli_real_escape_string($conn, trim($_POST['raca']));
    $data_nascimento = $_POST['data_nascimento'];
    $fk_idUsuario = (int) $_POST['usuario'];

    // 1. INSERE O ANIMAL
    $sqlAnimal = "INSERT INTO animal 
        (nome, especie, raca, data_nascimento, fk_idUsuario)
        VALUES 
        ('$nome', '$especie', '$raca', '$data_nascimento', $fk_idUsuario)";

    $resultadoAnimal = mysqli_query($conn, $sqlAnimal);

    if ($resultadoAnimal) {

        // 2. PEGA ID DO ANIMAL CRIADO
        $idAnimal = mysqli_insert_id($conn);

        // 3. CRIA CARTEIRA AUTOMATICAMENTE
        $sqlCarteira = "INSERT INTO carteira_vacinacao 
            (fk_idAnimal, data_criacao)
            VALUES 
            ($idAnimal, NOW())";

        mysqli_query($conn, $sqlCarteira);

        // 4. REDIRECIONA
        header("Location: index.php");
        exit();

    } else {
        echo "Erro ao cadastrar animal.";
    }
}
?>