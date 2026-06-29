<?php
    session_start();
    include_once "../../../conexao/conexao.php";


    $nomeCategoria = mysqli_real_escape_string($conn, trim($_POST['nome']));
    $descricaoCategoria = mysqli_real_escape_string($conn, trim($_POST['descricao']));

    $sql = "INSERT INTO categoria(nome, descricao)
            VALUES('$nomeCategoria', '$descricaoCategoria')";

    if($conn->query($sql) === TRUE){
        $_SESSION['statusCadastro'] = true;
    }
    $conn->close();
    header('Location: /dashboard/produtos/categorias/index.php');
    exit;
?>