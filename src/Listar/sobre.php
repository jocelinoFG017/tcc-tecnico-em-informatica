<?php
   include("../conexao/conexao.php");
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
    <!-- Font Awesome para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
    <?php include("../templates/header.php"); ?>
    <section class="py-5">
           <div class="container">
            <div class="text-center mb-4">

            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit pariatur voluptatibus mollitia quam, debitis incidunt ratione eveniet ipsa sequi cupiditate est expedita culpa iste, commodi nihil rerum, minus aliquam quia!</p>
            <p> Lorem Lorem Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos molestias quam tempore nostrum, voluptas quidem omnis veritatis, doloremque perferendis nihil odio at odit doloribus, qui culpa! Voluptatem beatae consequatur et! </p>
            </div>
            </div>      
</section>
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-4">
                <!-- <h2 class="fw-bold">Lista de Endereços</h2> -->
                <h3 class="text-uppercase text-muted">Nossos endereços presenciais</h3>
            </div>

            <div class="card shadow-sm border-0 p-4">
                <?php include("tabelaEndereco.php"); ?>
            </div>

            <div class="text-center mt-4">
                <a href="#">
                    <img src="../imagens/blog/socials.png" alt="Redes sociais" class="img-fluid" style="max-width:250px;">
                </a>
            </div>
        </div>
    </section>

    <?php include("../templates/footer.php"); ?>

    <!-- JS Bootstrap 5 (sem jQuery) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
