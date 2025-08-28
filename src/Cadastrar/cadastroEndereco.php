<?php
    session_start();
    include("../conexao/conexao.php");
    // vars que serão cadastradas no banco
    $bairro = mysqli_real_escape_string($conn,trim($_POST['bairro']));
    $rua = mysqli_real_escape_string($conn,trim($_POST['rua']));
    $numero = mysqli_real_escape_string($conn,trim($_POST['numero']));
    $fk_idCidade = mysqli_real_escape_string($conn, trim($_POST['cidadeId'])); //fk
    $estadoId = mysqli_real_escape_string($conn, trim($_POST['estadoId'])); //fk
    $telefone = mysqli_real_escape_string($conn,trim($_POST['telefone']));

    $sql = "INSERT INTO endereco(bairro, rua, numero, telefone, fk_idCidade)
            VALUES('$bairro', '$rua', '$numero', '$telefone','$fk_idCidade')";
    
    if($conn->query($sql) === TRUE){
        $_SESSION['statusCadastro'] = true;
    }
    $conn->close();
    header('Location: ../Dashboard/enderecos.php');
    exit;
?>