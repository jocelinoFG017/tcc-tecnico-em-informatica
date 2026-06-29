<?php
include_once("../login/verificaLogin.php");
include_once("../conexao/conexao.php");

// Verifica se é administrador
if (!isset($_SESSION['nomeNivelAcesso']) || strtolower($_SESSION['nomeNivelAcesso']) != 'administrador') {
    header('Location: ../login/loginIndex.php');
    exit();
}

$sql = "SELECT COUNT(*) AS total FROM usuario";
$result = mysqli_query($conn, $sql);
$totalUsuarios = mysqli_fetch_assoc($result);

$sql2 = "SELECT COUNT(*) AS total FROM produto";
$result2 = mysqli_query($conn, $sql2);
$totalProdutos = mysqli_fetch_assoc($result2);


$sql3 = "SELECT COUNT(*) AS total FROM artigo";
$result3 = mysqli_query($conn, $sql3);
$totalArtigos = mysqli_fetch_assoc($result3);


$sqlArtigos = "
    SELECT 
        artigo.titulo,
        usuario.nome AS autor
    FROM artigo
    INNER JOIN usuario 
        ON usuario.idUsuario = artigo.fk_idUsuario
    ORDER BY artigo.idArtigo DESC
";

$resultArtigos = mysqli_query($conn, $sqlArtigos);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Painel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<?php include_once "../includes/headerDash.php"; ?>
<?php include_once("sidebar/sidebar.php"); ?>

<div id="content" class="content">

    <!-- Cabeçalho -->
    <div class="p-3 border-bottom bg-light d-flex justify-content-between align-items-center">
        <div>
            <h4 class="mb-0 d-flex align-items-center gap-2">
                <i class="fa-solid fa-chart-line text-primary"></i>
                Dashboard Analítica
            </h4>
            <small class="text-muted">
                Aqui estão reunidos todos os dados principais do sistema.
            </small>
        </div>
    </div>

    <div class="container-fluid p-3">

        <!-- Cards -->
        <div class="row g-4">

            <div class="col-md-4">
                <div class="card shadow-sm border-start border-primary border-4 h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Total de Usuários</h6>
                            <h2 class="fw-bold mb-0"><?= $totalUsuarios['total']; ?></h2>
                        </div>
                        <i class="fa-solid fa-users fa-3x text-primary opacity-75"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-start border-success border-4 h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Produtos</h6>
                            <h2 class="fw-bold mb-0"><?= $totalProdutos['total']; ?></h2>
                        </div>
                        <i class="fa-solid fa-box fa-3x text-success opacity-75"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-start border-warning border-4 h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Artigos</h6>
                            <h2 class="fw-bold mb-0"><?= $totalArtigos['total']; ?></h2>
                        </div>
                        <i class="fa-solid fa-newspaper fa-3x text-warning opacity-75"></i>
                    </div>
                </div>
            </div>

        </div>

        <!-- gráficos -->
        <div class="row mt-4">
            <div class="col-lg-6">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            Artigos Publicados
                        </div>

                        <div class="card-body">
                            <ul class="list-group list-group-flush mt-2">
                                <?php while ($row = mysqli_fetch_assoc($resultArtigos)) { ?>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span><?= $row['titulo']; ?></span>
                                        <small class="text-muted"><?= $row['autor']; ?></small>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        Relatórios
                    </div>
                    <div class="card-body">
                        <canvas id="line-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const sidebar = document.getElementById("sidebar");
    const content = document.getElementById("content");
    const icon = document.getElementById("iconMenu");
    const btn = document.getElementById("toggleSidebar");

    let isOpen = true;

    if (btn) {
        icon.innerHTML = "☰";

        btn.addEventListener("click", function() {
            isOpen = !isOpen;
            sidebar.classList.toggle("closed");
            content.classList.toggle("expanded");
            icon.innerHTML = isOpen ? "☰" : "✖";
        });
    }
</script>

</html>