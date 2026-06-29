<?php
    session_start();
    include_once "../../conexao/conexao.php";


    $nomeCidade = mysqli_real_escape_string($conn, trim($_POST['cidade']));
    $idEstado = mysqli_real_escape_string($conn,trim($_POST['estadoId'])); //fk

    $sql = "INSERT INTO cidade(nome, fk_idEstado)
            VALUES('$nomeCidade', '$idEstado')";
    
    if($conn->query($sql) === true){
        $_SESSION['statusCadastro'] = true;
    }
    $conn->close();
    header('Location: /dashboard/cidades/index.php');
    exit;
