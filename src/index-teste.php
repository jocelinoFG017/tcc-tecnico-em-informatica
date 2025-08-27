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


<!-- JS do Bootstrap 5 (necessário para dropdown e menu mobile) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
