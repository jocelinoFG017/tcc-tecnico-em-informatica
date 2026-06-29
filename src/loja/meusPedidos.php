<?php
session_start();
include_once("../conexao/conexao.php");

// Verifica se usuário está logado
if(!isset($_SESSION['idUsuario'])){
    header("Location: ../Login/loginIndex.php");
    exit();
}

$idUsuario = $_SESSION['idUsuario'];

// Busca todos os pedidos finalizados do usuário
$sqlPedidos = "
    SELECT idPedido, dataCriacao, dataFinalizacao, status
    FROM pedido
    WHERE fk_idUsuario = $idUsuario AND status != 'carrinho'
    ORDER BY dataFinalizacao DESC
";
$resPedidos = mysqli_query($conn, $sqlPedidos);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Pedidos - Petshop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include_once("../templates/header.php"); ?>
<main>
<div class="container my-5">
    <h2 class="mb-4">Meus Pedidos</h2>

    <?php if(mysqli_num_rows($resPedidos) == 0): ?>
        <p>Você ainda não finalizou nenhum pedido.</p>
    <?php else: ?>
        <?php while($pedido = mysqli_fetch_assoc($resPedidos)): ?>
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-warning text-dark">
                    Pedido #<?php echo $pedido['idPedido']; ?> -
                    Status: <?php echo ucfirst($pedido['status']); ?> -
                    Finalizado em: <?php echo date('d/m/Y H:i', strtotime($pedido['dataFinalizacao'])); ?>
                </div>
                <div class="card-body">
                    <?php
                    // Busca os itens do pedido
                    $idPedidoAtual = $pedido['idPedido'];
                    $sqlItens = "
                        SELECT p.nome, p.foto, pi.quantidade, pi.precoUnitario
                        FROM pedido_item pi
                        INNER JOIN produto p ON pi.fk_idProduto = p.idProduto
                        WHERE pi.fk_idPedido = $idPedidoAtual
                    ";
                    $resItens = mysqli_query($conn, $sqlItens);

                    $totalPedido = 0;
                    while($item = mysqli_fetch_assoc($resItens)):
                        $subtotal = $item['quantidade'] * $item['precoUnitario'];
                        $totalPedido += $subtotal;
                    ?>
                        <div class="row mb-2 align-items-center">
                            <div class="col-md-2">
                                <img src="../../fotos/<?php echo htmlspecialchars($item['foto']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($item['nome']); ?>">
                            </div>
                            <div class="col-md-6">
                                <strong><?php echo htmlspecialchars($item['nome']); ?></strong>
                            </div>
                            <div class="col-md-2 text-center">
                                Qtd: <?php echo $item['quantidade']; ?>
                            </div>
                            <div class="col-md-2 text-end">
                                R$ <?php echo number_format($subtotal,2,",","."); ?>
                            </div>
                        </div>
                        <hr>
                    <?php endwhile; ?>
                    <h5 class="text-end">Total do Pedido: R$ <?php echo number_format($totalPedido,2,",","."); ?></h5>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>
</main>
<?php include_once("../templates/footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
