<?php
    session_start();
    include("../conexao/conexao.php");

    if(empty($_POST['login']) || empty($_POST['senha'])){
        header('Location: ../Login/loginIndex.php');
        exit();
    }
    $login = mysqli_real_escape_string($conn, $_POST['login']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);
    //$nome =  mysqli_real_escape_string($conn, $_POST['nome']);

    $query = "SELECT idUsuario, nome FROM usuario WHERE login = '{$login}' AND senha = md5('{$senha}')";
    $result = mysqli_query($conn, $query);
    $row = mysqli_num_rows($result);

    if($row == 1) {
        $usuario = mysqli_fetch_assoc($result);

        $_SESSION['login'] = $login;
        $_SESSION['nome'] = $usuario['nome'];
        header('Location: ../Dashboard/painel.php');
        exit();
    }else{
        $_SESSION['naoAutenticado'] = true;
        header('Location: ../Login/loginIndex.php');
    }
?>