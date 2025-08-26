<?php
    session_start();
    include("../conexao/conexao.php");
    // vars que serao cadastrados no banco
    $idEndereco = mysqli_real_escape_string($conn,trim($_POST['idEndereco']));
    $bairro = mysqli_real_escape_string($conn,trim($_POST['bairro']));
    $rua = mysqli_real_escape_string($conn,trim($_POST['rua']));
    $numero = mysqli_real_escape_string($conn,trim($_POST['numero']));
    $cidadeId = mysqli_real_escape_string($conn, trim($_POST['cidadeId'])); //fk
    $estadoId = mysqli_real_escape_string($conn, trim($_POST['estadoId'])); //fk
    $telefone = mysqli_real_escape_string($conn,trim($_POST['telefone']));
   
    //$idEstado = mysqli_real_escape_string($conn,trim($_POST['idEstado']));  //fk
   //$idPais = mysqli_real_escape_string($conn,trim($_POST['idPais']));      //fk
   
    //consulta no banco de dados
    $sql = "SELECT  COUNT(*) AS total FROM endereco AS en
        JOIN cidade AS c ON en.cidadeId = c.idCidade
        -- JOIN estado AS est ON en.idEstado = est.idEstado
        --JOIN pais AS pai ON en.idPais = pai.idPais
        WHERE idEndereco = '$idEndereco'";

    $result =mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    if($row['total'] == 1){
        $_SESSION['usuarioExiste'] = true;
        header('Location: ../Dashboard/enderecos.php');
        exit;
    }

    $sql = "INSERT INTO endereco(bairro, rua, numero, cidadeId,estadoId, telefone)
            VALUES('$bairro', '$rua', '$numero', '$cidadeId', '$estadoId' , '$telefone')";
    
    if($conn->query($sql) === TRUE){
        $_SESSION['statusCadastro'] = true;
    }
    $conn->close();
    header('Location: ../Dashboard/enderecos.php');
    exit;
?>