<?php
session_start();
include("../conexao/conexao.php");

// Se não estiver logado, manda pro login
if(!isset($_SESSION['login'])) {
    header('Location: ../Login/loginIndex.php');
    exit();
}

// Dados do usuário logado
$nome = $_SESSION['nome'];
$nivel = $_SESSION['nomeNivelAcesso'];
$idUsuario = $_SESSION['idUsuario'] ?? null; // opcional, caso queira já salvar na sessão

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Conta - <?php echo $nome; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h1 class="mb-4">Olá, <?php echo htmlspecialchars($nome); ?>!</h1>
    <p><strong>Nível de acesso:</strong> <?php echo htmlspecialchars($nivel); ?></p>

    <div class="row">
        <!-- Perfil -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Meu Perfil</h5>
                    <p class="card-text">Visualize e edite seus dados pessoais.</p>
                    <a href="editarPerfil.php" class="btn btn-primary btn-sm">Editar Perfil</a>
                </div>
            </div>
        </div>

        <!-- Meus pedidos -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Meus Pedidos</h5>
                    <p class="card-text">Acompanhe os pedidos já feitos e o status do carrinho.</p>
                    <a href="meusPedidos.php" class="btn btn-success btn-sm">Ver Pedidos</a>
                </div>
            </div>
        </div>

        <!-- Só aparece se for admin -->
        <?php if($nivel === "Administrador"): ?>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Painel Administrativo</h5>
                    <p class="card-text">Acesse o gerenciamento de produtos, usuários e pedidos.</p>
                    <a href="../Dashboard/painel.php" class="btn btn-warning btn-sm">Ir para o Painel</a>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <div class="mt-4">
        <a href="../Login/logout.php" class="btn btn-outline-danger">Sair</a>
    </div>
</div>
</body>
</html>
