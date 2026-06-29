<?php
    session_start();
    include_once("../../conexao/conexao.php");

    $nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
    $login = mysqli_real_escape_string($conn,trim($_POST['login']));
    $senha = mysqli_real_escape_string($conn,trim(md5($_POST['senha'])));
    $nivelAcesso = mysqli_real_escape_string($conn,trim($_POST['nivel_acesso']));

    $sql = "SELECT count(*) as total FROM usuario WHERE login = '$login'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    if($row['total'] == 1){
        $_SESSION['usuarioExiste'] = true;
        header('Location: /dashboard/usuarios/index.php'); 
        exit;
    }

    $sql = " INSERT INTO usuario( nome, login, senha, fk_idNivelAcesso)
            VALUES('$nome','$login','$senha', '$nivelAcesso') ";

    if($conn->query($sql) === TRUE){
        $_SESSION['statusCadastro'] = true;
    
    }
    $conn->close();
    header('Location: /dashboard/usuarios/index.php'); 
    exit;
?>