<?php
session_start();
include("../conexao/conexao.php");

$idUsuario = filter_input(INPUT_GET, 'idUsuario', FILTER_SANITIZE_NUMBER_INT);

if(!empty($idUsuario)){
    
    $sql = "DELETE FROM usuario WHERE idUsuario = '$idUsuario'";
    $resultado = mysqli_query($conn, $sql);

    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "<p style='color:green;'> Usuario excluido</p>";
        header("Location: ../Dashboard/usuarios.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red;'> Usuario não excluido</p>";
        header("Location: ../Dashboard/usuarios.php");
    }
}else{
    $_SESSION['msg'] = "<p style='color:red;'> Necessário selecionar um usuario</p>";
    header("Location: ../Dashboard/usuarios.php");
}
?>