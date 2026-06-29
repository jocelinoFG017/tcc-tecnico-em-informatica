<?php
session_start();
include_once "../conexao/conexao.php";

// Se não estiver logado, manda pro login
if(!isset($_SESSION['login'])) {
    header('Location: ../Login/loginIndex.php');
    exit();
}

// Dados do usuário logado
$nome = $_SESSION['nome'];
$nivel = $_SESSION['nomeNivelAcesso'];
$idUsuario = $_SESSION['idUsuario'] ?? null;

// Quantidade de pedidos e itens no carrinho
$sqlPedidos = mysqli_query($conn, "SELECT COUNT(*) as totalPedidos FROM pedido WHERE fk_idUsuario = $idUsuario AND status != 'carrinho'");
$totalPedidos = mysqli_fetch_assoc($sqlPedidos)['totalPedidos'] ?? 0;

$sqlCarrinho = mysqli_query($conn, "SELECT COUNT(*) as totalCarrinho FROM pedido_item pi INNER JOIN pedido pe ON pi.fk_idPedido = pe.idPedido WHERE pe.fk_idUsuario = $idUsuario AND pe.status = 'carrinho'");
$totalCarrinho = mysqli_fetch_assoc($sqlCarrinho)['totalCarrinho'] ?? 0;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Conta - <?php echo htmlspecialchars($nome); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/cssflex.css">
    <style>
        body { background-color: #f8f9fa; }
        .card-hover:hover { transform: translateY(-5px); box-shadow: 0 8px 20px rgba(0,0,0,0.15); transition: all 0.3s; }
        .stat { font-size: 2rem; font-weight: bold; color: #ffc107; }
        .btn-lg-custom { font-weight: bold; }
    </style>
</head>
<body>
<?php include_once "../includes/header.php"; ?>

<main class="container py-5">
    <div class="text-center mb-5">
        <h1>Bem-vindo(a), <?php echo htmlspecialchars($nome); ?>!</h1>
        <p class="text-muted">Nível de acesso: <strong><?php echo htmlspecialchars($nivel); ?></strong></p>
    </div>

    <div class="row g-4">

        <!-- Meu Perfil -->
        <div class="col-md-4">
            <div class="card shadow-sm card-hover h-100">
                <div class="card-body text-center">
                    <i class="fa fa-user fa-3x mb-3 text-primary"></i>
                    <h5 class="card-title">Meu Perfil</h5>
                    <p class="card-text">Visualize e edite seus dados pessoais.</p>
                    <a href="editarPerfil.php" class="btn btn-primary btn-sm btn-lg-custom">Editar Perfil</a>
                </div>
            </div>
        </div>

        <!-- Meus Pedidos -->
        <div class="col-md-4">
            <div class="card shadow-sm card-hover h-100">
                <div class="card-body text-center">
                    <i class="fa fa-box fa-3x mb-3 text-success"></i>
                    <h5 class="card-title">Meus Pedidos</h5>
                    <p class="card-text">Pedidos realizados: <span class="stat"><?php echo $totalPedidos; ?></span></p>
                    <a href="meusPedidos.php" class="btn btn-success btn-sm btn-lg-custom">Ver Pedidos</a>
                </div>
            </div>
        </div>

        <!-- Carrinho Atual -->
        <div class="col-md-4">
            <div class="card shadow-sm card-hover h-100">
                <div class="card-body text-center">
                    <i class="fa fa-shopping-cart fa-3x mb-3 text-warning"></i>
                    <h5 class="card-title">Carrinho</h5>
                    <p class="card-text">Itens no carrinho: <span class="stat"><?php echo $totalCarrinho; ?></span></p>
                    <a href="../Listar/carrinho.php" class="btn btn-warning btn-sm btn-lg-custom">Ver Carrinho</a>
                </div>
            </div>
        </div>

        <!-- Painel Administrativo -->
        <?php if($nivel === "Administrador"): ?>
        <div class="col-md-4">
            <div class="card shadow-sm card-hover h-100">
                <div class="card-body text-center">
                    <i class="fa fa-cogs fa-3x mb-3 text-danger"></i>
                    <h5 class="card-title">Painel Administrativo</h5>
                    <p class="card-text">Gerencie produtos, usuários e pedidos.</p>
                    <a href="../Dashboard/painel.php" class="btn btn-danger btn-sm btn-lg-custom">Ir para Painel</a>
                </div>
            </div>
        </div>
        <?php endif; ?>

    </div>

    <div class="text-center mt-5">
        <a href="../login/logout.php" class="btn btn-outline-danger btn-lg">Sair</a>
    </div>
</main>

<?php include_once "../includes/footer.php"; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
