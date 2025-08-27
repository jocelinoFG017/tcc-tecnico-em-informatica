<?php
   include("../conexao/conexao.php");
   ?>
<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Contato| Eternity</title>
      <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
      <!--Responsavel pelos icones do site-->
      <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
      <link href="../assets/css/main.css" rel="stylesheet">
      <!--Responsavel pela responsividade do site-->
      <link href="../assets/css/responsive.css" rel="stylesheet">
      <!-- Somente estilizacao e fotos-->
      <link href="../assets/css/photos.css" rel="stylesheet">
      <link rel="shortcut icon" href="../images/ico/favicon.ico">
      <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/images/ico/apple-touch-icon-144-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/images/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/images/ico/apple-touch-icon-72-precomposed.png">
      <link rel="apple-touch-icon-precomposed" href="../assets/images/ico/apple-touch-icon-57-precomposed.png">
   </head>
   <!--/head-->
   <body>
      <?php include("../templates/header.php"); ?>
      <section>
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <div class="blog-post-area">
                     <h2 class="title text-center">Lista de Endereços</h2>
                     <h3 style="text-align:center;text-transform:uppercase;">Nossos endereços presenciais</h3>
                     <div class="single-blog-post">
                        <!--Inicio tabela de enderecos-->
                        <?php
                           include("tabelaEndereco.php");
                           ?>
                     </div>
                  </div>
                  <!--/blog-post-area-->
                  <div class="socials-share">
                     <a href=""><img src="../imagens/blog/socials.png" alt=""></a>
                  </div>
                  <!--/socials-share-->
               </div>
            </div>
         </div>
      </section>
      <?php include("../templates/footer.php"); ?>
      <script src="../js/jquery.js"></script>
      <script src="../js/price-range.js"></script>
      <script src="../js/jquery.scrollUp.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
      <script src="../js/jquery.prettyPhoto.js"></script>
      <script src="../js/main.js"></script>
   </body>
</html>