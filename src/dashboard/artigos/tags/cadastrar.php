<?php
    session_start();
    include("../../../conexao/conexao.php");


    $nomeTag = mysqli_real_escape_string($conn, trim($_POST['nome']));

    $sql = "INSERT INTO tag(nome)
            VALUES('$nomeTag')";
    
    if($conn->query($sql) === TRUE){
        $_SESSION['statusCadastro'] = true;
    }
    $conn->close();
    header('Location: /dashboard/artigos/tags/index.php');
    exit;
?>