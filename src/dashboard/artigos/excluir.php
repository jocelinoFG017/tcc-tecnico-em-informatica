<?php
session_start();
include_once "../../conexao/conexao.php";

$idArtigo = filter_input(INPUT_GET, 'idArtigo', FILTER_SANITIZE_NUMBER_INT);

if(!empty($idArtigo)){
    
    $sql = "DELETE FROM artigo WHERE idArtigo = '$idArtigo'";
    $resultado = mysqli_query($conn, $sql);

    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "<p style='color:green;'> Artigo excluido</p>";
        header("Location: /dashboard/artigos/index.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red;'> Artigo não excluido</p>";
        header("Location: /dashboard/artigos/index.php");
    }
}else{
    $_SESSION['msg'] = "<p style='color:red;'> Necessário selecionar um artigo</p>";
    header("Location: /dashboard/artigos/index.php");
}
