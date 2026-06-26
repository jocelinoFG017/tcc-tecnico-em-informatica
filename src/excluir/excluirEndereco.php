<?php
session_start();
include("../conexao/conexao.php");

$idEndereco = filter_input(INPUT_GET, 'idEndereco', FILTER_SANITIZE_NUMBER_INT);

if(!empty($idEndereco)){
    
    $sql = "DELETE FROM endereco WHERE idEndereco = '$idEndereco'";
    $resultado = mysqli_query($conn, $sql);

    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "<p style='color:green;'> Endereco excluido</p>";
        header("Location: ../../Dashboard/enderecos.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red;'> Endereco não excluido</p>";
        header("Location: ../../Dashboard/enderecos.php");
    }
}else{
    $_SESSION['msg'] = "<p style='color:red;'> Necessário selecionar um Endereco</p>";
    header("Location: ../../Dashboard/enderecos.php");
}
?>