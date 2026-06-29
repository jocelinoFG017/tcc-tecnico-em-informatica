<?php
session_start();
include_once "../conexao/conexao.php";

// Verifica se usuário está logado
if(!isset($_SESSION['idUsuario'])){
    header("Location: ../Login/loginIndex.php");
    exit();
}

$idUsuario = $_SESSION['idUsuario'];

// Busca pedido em status 'carrinho'
$sqlPedido = "SELECT idPedido FROM pedido WHERE fk_idUsuario = $idUsuario AND status = 'carrinho' LIMIT 1";
$resPedido = mysqli_query($conn, $sqlPedido);

if(mysqli_num_rows($resPedido) == 0){
    header("Location: carrinho.php");
    exit();
}

$pedido = mysqli_fetch_assoc($resPedido);
$idPedido = $pedido['idPedido'];

// Processa pagamento simulado
if(isset($_POST['pagar'])){
    // Aqui você integraria um gateway de pagamento real
    $sqlAtualiza = "UPDATE pedido SET status='pago', dataFinalizacao=NOW() WHERE idPedido=$idPedido";
    mysqli_query($conn, $sqlAtualiza);

    // Redireciona para meusPedidos com sucesso
    header("Location: meusPedidos.php?pagamento=1");
    exit();
}

// Busca itens do carrinho para mostrar resumo
$sqlItens = "
    SELECT p.nome, p.foto, pi.quantidade, pi.precoUnitario
    FROM pedido_item pi
    INNER JOIN produto p ON pi.fk_idProduto = p.idProduto
    WHERE pi.fk_idPedido = $idPedido
";
$resItens = mysqli_query($conn, $sqlItens);

$subtotal = 0;
$itensCarrinho = [];
while($item = mysqli_fetch_assoc($resItens)){
    $item['subtotal'] = $item['quantidade'] * $item['precoUnitario'];
    $subtotal += $item['subtotal'];
    $itensCarrinho[] = $item;
}

$frete = 20; 
$total = $subtotal + $frete;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Checkout - Petshop</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include_once("../templates/header.php"); ?>
<main>
<div class="container my-5">
    <h2>Checkout</h2>
    <?php if(count($itensCarrinho) == 0): ?>
        <p>Seu carrinho está vazio.</p>
        <a href="produtosLista.php" class="btn btn-secondary mt-3">Voltar para Produtos</a>
    <?php else: ?>
        <div class="row">
            <!-- Itens do Pedido -->
            <div class="col-lg-8">
                <?php foreach($itensCarrinho as $item): ?>
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="../../fotos/<?php echo htmlspecialchars($item['foto']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($item['nome']); ?>">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5><?php echo htmlspecialchars($item['nome']); ?></h5>
                                    <p>Quantidade: <?php echo $item['quantidade']; ?></p>
                                    <p>Preço unitário: R$ <?php echo number_format($item['precoUnitario'],2,",","."); ?></p>
                                    <p>Subtotal: R$ <?php echo number_format($item['subtotal'],2,",","."); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Resumo do Pedido -->
            <div class="col-lg-4">
                <div class="card shadow-sm p-3">
                    <h4>Resumo</h4>
                    <hr>
                    <p>Subtotal: <span class="float-end">R$ <?php echo number_format($subtotal,2,",","."); ?></span></p>
                    <p>Frete: <span class="float-end">R$ <?php echo number_format($frete,2,",","."); ?></span></p>
                    <hr>
                    <h5>Total: <span class="float-end">R$ <?php echo number_format($total,2,",","."); ?></span></h5>

                    <!-- Formulário de Pagamento -->
                    <form method="POST" class="mt-3">
                        <label for="pagamento" class="form-label">Forma de pagamento (simulado)</label>
                        <select name="pagamento" id="pagamento" class="form-select mb-3">
                            <option value="pix">PIX</option>
                            <option value="boleto">Boleto</option>
                            <option value="cartao">Cartão de Crédito</option>
                        </select>
                        <button type="submit" name="pagar" class="btn btn-success w-100">Pagar</button>
                        <a href="produtosLista.php" class="btn btn-secondary w-100 mt-2">Continuar Comprando</a>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
</main>
<?php include_once("../templates/footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
