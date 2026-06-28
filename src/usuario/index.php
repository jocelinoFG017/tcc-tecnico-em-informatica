<?php
session_start();
include("../login/verificaUsuario.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel do Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include("../includes/header.php"); ?>

<div class="container mt-5">

    <h3>Bem-vindo, <?= $_SESSION['nome']; ?> 👋</h3>

    <div class="row mt-4">

        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h5>Meus Artigos</h5>
                <p>Veja os artigos disponíveis</p>
                <a href="#" class="btn btn-primary">Acessar</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h5>Relatórios</h5>
                <p>Relatórios disponíveis para você</p>
                <a href="#" class="btn btn-primary">Ver</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h5>Meu Perfil</h5>
                <p>Editar seus dados</p>
                <a href="#" class="btn btn-primary">Perfil</a>
            </div>
        </div>

    </div>

</div>

<?php include("../includes/footer.php"); ?>

</body>
</html>