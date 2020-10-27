<?php
    session_start();
    include("../conexao/conexao.php");

    $nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
    $descricao = mysqli_real_escape_string($conn,trim($_POST['descricao']));
    $marca = mysqli_real_escape_string($conn,trim($_POST['marca']));
    $quantidade = mysqli_real_escape_string($conn,trim($_POST['quantidade']));
    $preco = mysqli_real_escape_string($conn,trim($_POST['preco']));
    

    $sql = "SELECT count(*) as total FROM produto WHERE nome = '$nome'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    if($row['total'] == 1){
        $_SESSION['usuarioExiste'] = true;
        header('Location: ../Dashboard/produtos.php');
        exit;
    }

    $sql = "INSERT INTO produto (nome,descricao,marca,quantidade,preco) VALUES('$nome','$descricao','$marca','$quantidade','$preco')";

    if($conn->query($sql) === TRUE){
        $_SESSION['statusCadastro'] = true;
    
    }
    $conn->close();
    header('Location: ../Dashboard/produtos.php');
    exit;
?>