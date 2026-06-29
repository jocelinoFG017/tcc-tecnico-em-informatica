<?php
session_start();
include_once("../../../conexao/conexao.php");

$idCategoria = filter_input(INPUT_GET, 'idCategoria', FILTER_SANITIZE_NUMBER_INT);

if(!empty($idCategoria)){
    
    $sql = "DELETE FROM categoria WHERE idCategoria = '$idCategoria'";
    $resultado = mysqli_query($conn, $sql);

    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "<p style='color:green;'> Categoria excluida</p>";
        header("Location: /dashboard/produtos/categorias/index.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red;'> Categoria não excluida</p>";
        header("Location: /dashboard/produtos/categorias/index.php");
    }
}else{
    $_SESSION['msg'] = "<p style='color:red;'> Necessário selecionar uma categoria</p>";
    header("Location: /dashboard/produtos/categorias/index.php");
}
?>