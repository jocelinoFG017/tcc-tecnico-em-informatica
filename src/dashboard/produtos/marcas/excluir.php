<?php
session_start();
include("../../../conexao/conexao.php");

$idMarca = filter_input(INPUT_GET, 'idMarca', FILTER_SANITIZE_NUMBER_INT);

if(!empty($idMarca)){
    
    $sql = "DELETE FROM marca WHERE idMarca = '$idMarca'";
    $resultado = mysqli_query($conn, $sql);

    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "<p style='color:green;'> Marca excluida</p>";
        header("Location: /dashboard/produtos/marcas/index.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red;'> Marca não excluida</p>";
        header("Location: /dashboard/produtos/marcas/index.php");
    }
}else{
    $_SESSION['msg'] = "<p style='color:red;'> Necessário selecionar uma marca</p>";
    header("Location: /dashboard/produtos/marcas/index.php");
}
?>