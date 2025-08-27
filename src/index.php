<?php
    include("conexao/conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetShop Teste</title>
    <!-- CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/slider.css">
    <!-- Font Awesome para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>

<?php include("templates/header.php");?>

<section id="slider" class="mt-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div id="slider-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

                    <!-- Indicadores centralizados -->
                    <div class="carousel-indicators d-flex justify-content-center mb-4">
                        <button type="button" data-bs-target="#slider-carousel" data-bs-slide-to="0" class="active" 
                                style="background-color: #ff5722; width: 20px; height: 20px; border-radius: 50%;" 
                                aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#slider-carousel" data-bs-slide-to="1" 
                                style="background-color: #ff5722; width: 20px; height: 20px; border-radius: 50%;" 
                                aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#slider-carousel" data-bs-slide-to="2" 
                                style="background-color: #ff5722; width: 20px; height: 20px; border-radius: 50%;" 
                                aria-label="Slide 3"></button>
                    </div>

                    <!-- Slides -->
                    <div class="carousel-inner">
                        <!-- Slide 1 -->
                        <div class="carousel-item active">
                            <div class="row align-items-center">
                                <div class="col-md-6 text-start">
                                    <h1><span class="text-warning">C</span>ACHORROS</h1>
                                    <h2>Curiosidades</h2>
                                    <p>Um cachorro adulto tem 42 dentes. O olfato canino é 1 milhão de vezes melhor do que o dos humanos.</p>
                                    <button class="btn btn-warning">Ver Mais</button>
                                </div>
                                <div class="col-md-6 text-center">
                                    <img src="assets/imagens/home/doguinho.jpg" class="img-fluid" alt="Cachorro" />
                                </div>
                            </div>
                        </div>

                        <!-- Slide 2 -->
                        <div class="carousel-item">
                            <div class="row align-items-center">
                                <div class="col-md-6 text-start">
                                    <h1><span class="text-warning">P</span>ÁSSAROS</h1>
                                    <h2>Curiosidades</h2>
                                    <p>"Um dia ele se alimenta, outro dia ele voa, mas o dia mais bonito é o dia em que o canário canta." – jo_gar</p>
                                    <button class="btn btn-warning">Ver Mais</button>
                                </div>
                                <div class="col-md-6 text-center">
                                    <img src="assets/imagens/home/bird.jpg" class="img-fluid" alt="Pássaro" />
                                </div>
                            </div>
                        </div>

                        <!-- Slide 3 -->
                        <div class="carousel-item">
                            <div class="row align-items-center">
                                <div class="col-md-6 text-start">
                                    <h1><span class="text-warning">G</span>ATOS</h1>
                                    <h2>Curiosidades</h2>
                                    <p>Os gatos têm cerca de 100 sons vocais, ao contrário dos cães que apresentam apenas 10.</p>
                                    <button class="btn btn-warning">Ver Mais</button>
                                </div>
                                <div class="col-md-6 text-center">
                                    <img src="assets/imagens/home/cat.jpg" class="img-fluid" alt="Gato" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Controles -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#slider-carousel" data-bs-slide="prev" style="left: -50px;">
                        <span class="carousel-control-prev-icon bg-warning rounded-circle p-3" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#slider-carousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-warning rounded-circle p-3" aria-hidden="true"></span>
                        <span class="visually-hidden">Próximo</span>
                    </button>

                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container">

        <!-- =======================
             Filtros e Título
             ======================= -->
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
            <h4 class="fw-bold mb-2">Em Destaque</h4>
            <div class="d-flex gap-2 flex-wrap">
                <button class="btn btn-outline-primary btn-sm">Preço: Maior</button>
                <button class="btn btn-outline-primary btn-sm">Preço: Menor</button>
                <button class="btn btn-outline-primary btn-sm">Nome: A-Z</button>
                <button class="btn btn-outline-primary btn-sm">Nome: Z-A</button>
                <button class="btn btn-outline-primary btn-sm">Com Desconto</button>
            </div>
        </div>

        <!-- =======================
             Cards de Produtos
             ======================= -->
        <div class="row g-4">
            <?php
                $sql2 = mysqli_query($conn, "SELECT * FROM produto ORDER BY idProduto DESC LIMIT 0, 8;");
                while ($produto = mysqli_fetch_object($sql2)){ 
            ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm">
                    <div class="position-relative">
                        <img src="../fotos/<?php echo $produto->foto; ?>" class="card-img-top" alt="<?php echo $produto->nome; ?>">
                        
                        <?php // if($produto->novo) { ?>
                        <span class="badge bg-success position-absolute top-0 start-0 m-2">Novo Item</span>
                        <?php //} ?>
                        
                        <?php //if($produto->desconto > 0) { ?>
                        <!-- <span class="badge bg-danger position-absolute top-0 end-0 m-2">Desconto</span> -->
                        <?php // } ?>
                    </div>
                    <div class="card-body text-center d-flex flex-column">
                        <h5 class="card-title"><?php echo $produto->nome; ?></h5>
                        <?php //if($produto->desconto > 0) { ?>
                            <!-- <p class="text-muted mb-1"><s>R$ <?php //echo number_format($produto->preco,2,",","."); ?></s></p> -->
                            <!-- <p class="fw-bold text-danger mb-3">R$ <?php //echo number_format($produto->preco * (1-$produto->desconto/100),2,",","."); ?></p> -->
                        <?php //} else { ?>
                            <p class="fw-bold mb-3">R$ <?php echo number_format($produto->preco,2,",","."); ?></p>
                        <?php // } ?>
                        <a href="../Blog/detalhesProduto.php?id=<?php echo $produto->idProduto; ?>" class="btn btn-warning mt-auto">Detalhes do Produto</a>
                        <a href="../Blog/detalhesProduto.php?id=<?php echo $produto->idProduto; ?>" class="btn btn-warning mt-auto">Adicionar ao Carrinho</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

        <!-- =======================
             Mais Vendidos
             ======================= -->
        <h4 class="fw-bold mt-5 mb-4">Mais Vendidos</h4>
        <div class="row g-4">
            <?php
                $sql2 = mysqli_query($conn, "SELECT * FROM produto");
                while ($produto = mysqli_fetch_object($sql2)){
            ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm">
                    <div class="position-relative">
                        <img src="../fotos/<?php echo $produto->foto; ?>" class="card-img-top" alt="<?php echo $produto->nome; ?>">
                        
                        <?php //if($produto->novo) { ?>
                        <span class="badge bg-success position-absolute top-0 start-0 m-2">Novo Item</span>
                        <?php //} ?>
                        
                        <?php //if($produto->desconto > 0) { ?>
                        <!-- <span class="badge bg-danger position-absolute top-0 end-0 m-2">Desconto</span> -->
                        <?php //} ?>
                    </div>
                    <div class="card-body text-center d-flex flex-column">
                        <h5 class="card-title"><?php echo $produto->nome; ?></h5>
                        <?php //if($produto->desconto > 0) { ?>
                            <!-- <p class="text-muted mb-1"><s>R$ <?php //echo number_format($produto->preco,2,",","."); ?></s></p> -->
                            <!-- <p class="fw-bold text-danger mb-3">R$ <?php //echo number_format($produto->preco * (1-$produto->desconto/100),2,",","."); ?></p> -->
                        <?php //} else { ?>
                            <p class="fw-bold mb-3">R$ <?php echo number_format($produto->preco,2,",","."); ?></p>
                        <?php //} ?>
                        <a href="../Blog/detalhesProduto.php?id=<?php echo $produto->idProduto; ?>" class="btn btn-warning mt-auto">Detalhes do Produto</a>
                        <a href="../Blog/detalhesProduto.php?id=<?php echo $produto->idProduto; ?>" class="btn btn-warning mt-auto">Adicionar ao Carrinho</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

    </div>
</section>
<?php 
   include("templates/footer.php");
?>

<!-- JS do Bootstrap 5 (necessário para dropdown e menu mobile) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
