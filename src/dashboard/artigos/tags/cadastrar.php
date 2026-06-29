<?php
    session_start();
    include_once "../../../conexao/conexao.php";


    $nomeTag = mysqli_real_escape_string($conn, trim($_POST['nome']));

    $sql = "INSERT INTO tag(nome)
            VALUES('$nomeTag')";
    
    if($conn->query($sql) === true){
        $_SESSION['statusCadastro'] = true;
    }
    $conn->close();
    header('Location: /dashboard/artigos/tags/index.php');
    exit;
