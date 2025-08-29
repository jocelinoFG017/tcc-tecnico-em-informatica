<?php
include("conexao/conexao.php");
session_start(); // inicia a sessão para verificar login
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetShop Teste</title>
    <!-- CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/slider.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>

<?php include("templates/header.php"); ?>

<section id="slider" class="mt-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div id="slider-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                    <div class="carousel-indicators d-flex justify-content-center mb-4">
                        <?php for($i=0;$i<3;$i++): ?>
                        <button type="button" data-bs-target="#slider-carousel" data-bs-slide-to="<?= $i ?>" 
                                class="<?= $i===0?'active':'' ?>" 
                                style="background-color: #ff5722; width: 20px; height: 20px; border-radius: 50%;" 
                                aria-label="Slide <?= $i+1 ?>"></button>
                        <?php endfor; ?>
                    </div>

                    <div class="carousel-inner">
                        <?php
                        $sql_artigos = mysqli_query($conn, "SELECT * FROM artigo ORDER BY idArtigo DESC LIMIT 3");
                        $primeiro = true;
                        while($artigo = mysqli_fetch_object($sql_artigos)):
                        ?>
                        <div class="carousel-item <?= $primeiro?'active':'' ?>">
                            <?php $primeiro=false; ?>
                            <div class="row align-items-center">
                                <div class="col-md-6 text-start">
                                    <h1><?= $artigo->tag ?></h1>
                                    <h2>Curiosidade</h2>
                                    <p><?= $artigo->texto ?></p>
                                    <a href="pages/blog.php?id=<?= $artigo->idArtigo ?>" class="btn btn-warning">Ver Mais</a>
                                </div>
                                <div class="col-md-6 text-center">
                                    <img src="fotos/<?= $artigo->foto ?>" class="img-fluid" alt="<?= $artigo->titulo ?>" />
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#slider-carousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-warning rounded-circle p-3"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#slider-carousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-warning rounded-circle p-3"></span>
                        <span class="visually-hidden">Próximo</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
            <h4 class="fw-bold mb-2">Em Destaque</h4>
        </div>

        <div class="row g-4">
            <?php
            $sql_produtos = mysqli_query($conn, "SELECT * FROM produto ORDER BY idProduto DESC LIMIT 0,8");
            while($produto = mysqli_fetch_object($sql_produtos)):
                $adicionar_link = isset($_SESSION['idUsuario']) 
                                  ? "../Listar/carrinho.php?add={$produto->idProduto}" 
                                  : "../Login/loginIndex.php";
            ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm">
                    <img src="../fotos/<?= $produto->foto ?>" class="card-img-top" alt="<?= $produto->nome ?>">
                    <div class="card-body text-center d-flex flex-column">
                        <h6 class="card-title"><?= $produto->nome ?></h6>
                        <p class="fw-bold mb-3">R$ <?= number_format($produto->preco,2,",",".") ?></p>
                        <a href="../Listar/produtoDetalhes.php?add=<?= $produto->idProduto ?>" class="btn btn-outline-primary btn-sm mb-2">Detalhes</a>
                        <a href="<?= $adicionar_link ?>" class="btn btn-warning mt-auto">
                            <?= isset($_SESSION['idUsuario']) ? 'Adicionar ao Carrinho' : 'Login para Comprar' ?>
                        </a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<?php include("templates/footer.php"); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
