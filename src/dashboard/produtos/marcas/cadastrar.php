<?php
    session_start();
    include_once "../../../conexao/conexao.php";


    $nomeMarca = mysqli_real_escape_string($conn, trim($_POST['nome']));

    $sql = "INSERT INTO marca(nome)
            VALUES('$nomeMarca')";
    
    if($conn->query($sql) === TRUE){
        $_SESSION['statusCadastro'] = true;
    }
    $conn->close();
    header('Location: /dashboard/produtos/marcas/index.php');
    exit;
?>