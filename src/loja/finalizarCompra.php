<?php
session_start();
include_once "../conexao/conexao.php";

// Verifica se usuário está logado
if(!isset($_SESSION['idUsuario'])){
    header("Location: ../Login/loginIndex.php");
    exit();
}

$idUsuario = $_SESSION['idUsuario'];

// Busca o pedido com status 'carrinho'
$sqlPedido = "SELECT idPedido FROM pedido WHERE fk_idUsuario = $idUsuario AND status = 'carrinho' LIMIT 1";
$resPedido = mysqli_query($conn, $sqlPedido);

if(mysqli_num_rows($resPedido) == 0){
    // Não existe carrinho para finalizar
    header("Location: carrinho.php");
    exit();
}

$pedido = mysqli_fetch_assoc($resPedido);
$idPedido = $pedido['idPedido'];

// Atualiza o status do pedido para 'finalizado' e define dataFinalizacao
$sqlFinalizar = "UPDATE pedido 
                 SET status = 'finalizado', dataFinalizacao = NOW() 
                 WHERE idPedido = $idPedido";
mysqli_query($conn, $sqlFinalizar);

// Redireciona para página de confirmação ou meus pedidos
header("Location: meusPedidos.php?finalizado=1");
exit();
?>
