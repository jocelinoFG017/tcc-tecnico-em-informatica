<?php
    session_start();
    include("../conexao/conexao.php");

    $nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
    $login = mysqli_real_escape_string($conn,trim($_POST['login']));
    $senha = mysqli_real_escape_string($conn,trim(md5($_POST['senha'])));

    $sql = "SELECT count(*) as total FROM usuario WHERE login = '$login'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    if($row['total'] == 1){
        $_SESSION['usuarioExiste'] = true;
        header('Location: ../Dashboard/usuarios.php'); 
        exit;
    }

    $sql = "INSERT INTO usuario (nome, login, senha) VALUES('$nome','$login','$senha')";

    if($conn->query($sql) === TRUE){
        $_SESSION['statusCadastro'] = true;
    
    }
    $conn->close();
    header('Location: ../Dashboard/usuarios.php'); 
    exit;
?>