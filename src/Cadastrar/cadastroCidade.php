<?php
    session_start();
    include("../conexao/conexao.php");


    $nomeCidade = mysqli_real_escape_string($conn, trim($_POST['cidade']));
    $idEstado = mysqli_real_escape_string($conn,trim($_POST['estadoId'])); //fk

    $sql = "INSERT INTO cidade(nome, idEstado)
            VALUES('$nomeCidade', '$idEstado')";
    
    if($conn->query($sql) === TRUE){
        $_SESSION['statusCadastro'] = true;
    }
    $conn->close();
    header('Location: ../Dashboard/cidades.php');
    exit;
?>