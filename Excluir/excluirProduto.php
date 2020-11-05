<?php
session_start();
include("../conexao/conexao.php");

$idProduto = filter_input(INPUT_GET, 'idProduto', FILTER_SANITIZE_NUMBER_INT);

if(!empty($idProduto)){
    
    $sql = "DELETE FROM produto WHERE idProduto = '$idProduto'";
    $resultado = mysqli_query($conn, $sql);

    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "<p style='color:green;'> Produto excluido</p>";
        header("Location: ../Dashboard/produtos.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red;'> Produto não excluido</p>";
        header("Location: ../Dashboard/produtos.php");
    }
}else{
    $_SESSION['msg'] = "<p style='color:red;'> Necessário selecionar um produto</p>";
    header("Location: ../Dashboard/produtos.php");
}
?>