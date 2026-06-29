<?php
session_start();
include_once "../conexao/conexao.php";

// Verifica se usuário está logado
if(!isset($_SESSION['idUsuario'])){
    header("Location: ../login/loginIndex.php");
    exit();
}

$idUsuario = $_SESSION['idUsuario'];

// ----------------------
// Adicionar produto ao carrinho
// ----------------------
if(isset($_GET['add'])){
    $idProduto = (int)$_GET['add'];

    // Verifica se já existe um pedido com status 'carrinho' para este usuário
    $sqlPedido = "SELECT idPedido FROM pedido WHERE fk_idUsuario = $idUsuario AND status = 'carrinho' LIMIT 1";
    $resPedido = mysqli_query($conn, $sqlPedido);

    if(mysqli_num_rows($resPedido) > 0){
        $pedido = mysqli_fetch_assoc($resPedido);
        $idPedido = $pedido['idPedido'];
    } else {
        // Cria novo pedido
        $sqlNovoPedido = "INSERT INTO pedido (fk_idUsuario) VALUES ($idUsuario)";
        mysqli_query($conn, $sqlNovoPedido);
        $idPedido = mysqli_insert_id($conn);
    }

    // Verifica se o produto já está no carrinho
    $sqlItem = "SELECT idPedidoItem, quantidade FROM pedido_item WHERE fk_idPedido = $idPedido AND fk_idProduto = $idProduto LIMIT 1";
    $resItem = mysqli_query($conn, $sqlItem);

    if(mysqli_num_rows($resItem) > 0){
        // Atualiza quantidade
        $item = mysqli_fetch_assoc($resItem);
        $novaQtd = $item['quantidade'] + 1;
        $sqlUpdate = "UPDATE pedido_item SET quantidade = $novaQtd WHERE idPedidoItem = ".$item['idPedidoItem'];
        mysqli_query($conn, $sqlUpdate);
    } else {
        // Pega o preço do produto
        $sqlProduto = "SELECT preco, nome, foto FROM produto WHERE idProduto = $idProduto LIMIT 1";
        $resProduto = mysqli_query($conn, $sqlProduto);
        $produto = mysqli_fetch_assoc($resProduto);

        $preco = $produto['preco'];
        $nome = $produto['nome'];
        $foto = $produto['foto'];

        // Insere item no pedido
        $sqlInsert = "INSERT INTO pedido_item (fk_idPedido, fk_idProduto, quantidade, precoUnitario) 
                      VALUES ($idPedido, $idProduto, 1, $preco)";
        mysqli_query($conn, $sqlInsert);
    }

    // Redireciona para o carrinho
    header("Location: carrinho.php");
    exit();
}

// ----------------------
// Busca itens do carrinho
// ----------------------
$sqlCarrinho = "
    SELECT pi.idPedidoItem, p.nome, p.foto, pi.quantidade, pi.precoUnitario
    FROM pedido_item pi
    INNER JOIN pedido pe ON pi.fk_idPedido = pe.idPedido
    INNER JOIN produto p ON pi.fk_idProduto = p.idProduto
    WHERE pe.fk_idUsuario = $idUsuario AND pe.status = 'carrinho'
";
$resCarrinho = mysqli_query($conn, $sqlCarrinho);

// Calcula subtotal
$subtotal = 0;
$itensCarrinho = [];
while($row = mysqli_fetch_assoc($resCarrinho)){
    $row['subtotal'] = $row['quantidade'] * $row['precoUnitario'];
    $subtotal += $row['subtotal'];
    $itensCarrinho[] = $row;
}

// Pode definir frete fixo ou calculado
$frete = 20; 
$total = $subtotal + $frete;


// ----------------------
// Remover item do carrinho
// ----------------------
if(isset($_GET['remove'])){
    $idPedidoItem = (int)$_GET['remove'];

    // Deleta apenas se o item pertencer a um pedido do usuário logado
    $sqlDelete = "
        DELETE pi FROM pedido_item pi
        INNER JOIN pedido pe ON pi.fk_idPedido = pe.idPedido
        WHERE pi.idPedidoItem = $idPedidoItem AND pe.fk_idUsuario = $idUsuario AND pe.status = 'carrinho'
    ";
    mysqli_query($conn, $sqlDelete);

    // Redireciona para evitar reenvio
    header("Location: carrinho.php");
    exit();
}

// ----------------------
// Atualizar quantidade do item
// ----------------------
if(isset($_POST['atualizar'])){
    $idPedidoItem = (int)$_POST['idPedidoItem'];
    $novaQtd = (int)$_POST['quantidade'];

    if($novaQtd < 1) $novaQtd = 1; // evita zero ou negativo

    // Atualiza apenas se o item pertencer a um pedido do usuário logado
    $sqlUpdate = "
        UPDATE pedido_item pi
        INNER JOIN pedido pe ON pi.fk_idPedido = pe.idPedido
        SET pi.quantidade = $novaQtd
        WHERE pi.idPedidoItem = $idPedidoItem AND pe.fk_idUsuario = $idUsuario AND pe.status = 'carrinho'
    ";
    mysqli_query($conn, $sqlUpdate);

    // Redireciona para evitar reenvio do formulário
    header("Location: carrinho.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras - Petshop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
<?php include_once "../includes/header.php";?>
<main>
<div class="container my-5">
    <h2 class="mb-4">Seu Carrinho</h2>
    <div class="row">
        <!-- Produtos do Carrinho -->
        <div class="col-lg-8">
            <?php if(count($itensCarrinho) == 0): ?>
                <p>Seu carrinho está vazio.</p>
            <?php else: ?>
                <?php foreach($itensCarrinho as $item): ?>
                    <div class="cart-item card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="../../fotos/<?php echo htmlspecialchars($item['foto']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($item['nome']); ?>">
                                <a href="carrinho.php?remove=<?php echo $item['idPedidoItem']; ?>" class="btn btn-danger btn-sm">Remover</a>

                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($item['nome']); ?></h5>
                                    <form method="POST" action="carrinho.php" class="d-flex align-items-center">
                                        <input type="hidden" name="idPedidoItem" value="<?php echo $item['idPedidoItem']; ?>">
                                        <input type="number" name="quantidade" class="form-control w-auto me-2" value="<?php echo $item['quantidade']; ?>" min="1">
                                        <button type="submit" name="atualizar" class="btn btn-primary btn-sm">Atualizar</button>
                                    </form>

                                    <p class="card-text"><strong>Preço unitário: R$ <?php echo number_format($item['precoUnitario'],2,",","."); ?></strong></p>
                                    <p class="card-text"><strong>Subtotal: R$ <?php echo number_format($item['subtotal'],2,",","."); ?></strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Resumo do Pedido -->
        <div class="col-lg-4">
            <div class="cart-summary shadow-sm p-3">
                <h4>Resumo do Pedido</h4>
                <hr>
                <p>Subtotal: <span class="float-end">R$ <?php echo number_format($subtotal,2,",","."); ?></span></p>
                <p>Frete: <span class="float-end">R$ <?php echo number_format($frete,2,",","."); ?></span></p>
                <hr>
                <h5>Total: <span class="float-end">R$ <?php echo number_format($total,2,",","."); ?></span></h5>
                <?php if(count($itensCarrinho) > 0): ?>
                    <a href="../loja/checkout.php" class="btn btn-success w-100 mt-3">Finalizar Compra</a>
                <?php endif; ?>
                <a href="../listar/produtoLista.php" class="btn btn-secondary w-100 mt-2">Continuar Comprando</a>
            </div>
        </div>
    </div>
</div>
</main>
<?php include_once "../includes/footer.php";?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
