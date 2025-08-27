<?php
   include("conexao/conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Home | ETERNITY</title>
      <!-- Links do CSS-->
      <link href="css/main.css" rel="stylesheet">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/font-awesome.min.css" rel="stylesheet">
      <link href="css/prettyPhoto.css" rel="stylesheet">
      <link href="css/price-range.css" rel="stylesheet">
      <link href="css/animate.css" rel="stylesheet">
      <link href="css/responsive.css" rel="stylesheet">
      <link rel="shortcut icon" href="../imagens/ico/favicon.ico">
      <!-- Somente estilizacao e fotos-->
      <link href="css/photos.css" rel="stylesheet">
      <!-- Chamada das imagens/icones-->
      <link rel="apple-touch-icon-precomposed" sizes="144x144" href="imagens/ico/apple-touch-icon-144-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="imagens/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="imagens/ico/apple-touch-icon-72-precomposed.png">
      <link rel="apple-touch-icon-precomposed" href="imagens/ico/apple-touch-icon-57-precomposed.png">
   </head>
   <!--END HEAD-->
   <body>
      <?php include("templates/header.php"); ?>
      <section id="slider">
         <!--slider-->
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                     <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                     </ol>
                     <div class="carousel-inner">
                        <div class="item active">
                           <div class="col-sm-6">
                              <h1><span>C</span>ACHORROS</h1>
                              <h2>Curiosidades</h2>
                              <p>Um cachorro adulto tem 42 dentes. O olfato canino é 1 milhão de vezes melhor do que o dos humanos.  </p>
                              <button type="button" class="btn btn-default get">Ver Mais</button>
                           </div>
                           <div class="col-sm-6">
                              <img src="../imagens/home/doguinho.jpg" class="anuncio img-responsive" alt="" />
                           </div>
                        </div>
                        <div class="item">
                           <div class="col-sm-6">
                              <h1><span>P</span>ÁSSAROS</h1>
                              <h2>Curiosidades</h2>
                              <p>" Um dia ele se alimenta, outro dia ele voa, mas o dia mais bonito é o dia em que o canário canta ."jo_gar</p>
                              <button type="button" class="btn btn-default get">Ver Mais</button>
                           </div>
                           <div class="col-sm-6">
                              <img src="../imagens/home/bird.jpg" class="girl img-responsive" alt="" />
                              <!--<img src="imagens/home/pricing.png"  class="pricing" alt="" />-->
                           </div>
                        </div>
                        <div class="item">
                           <div class="col-sm-6">
                              <h1><span>G</span>ATOS</h1>
                              <h2>Curiosidades</h2>
                              <p>Os gatos têm cerca de 100 sons vocais ao contrário dos cães que apresentam apenas 10. </p>
                              <button type="button" class="btn btn-default get">Ver Mais</button>
                           </div>
                           <div class="col-sm-6">
                              <img src="../imagens/home/cat.jpg" class="cat img-responsive" alt="" />
                           </div>
                        </div>
                     </div>
                     <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                     <i class="fa fa-angle-left"></i>
                     </a>
                     <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                     <i class="fa fa-angle-right"></i>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--/slider-->
      <!--categorias-->
      <section>
         <div class="container">
            <div class="row">
               <div class="col-sm-12 padding-right">
                  <div class="features_items">
                     <!--features_items-->
                     <div class="category-tab2">
                        <!--category-tab-->
                        <div class="col-sm-12">
                           <ul class="nav nav-tabs">
                              <h4 class="title " style="text-align:center;">Em Destaque</h4>
                           </ul>
                        </div>
                     </div>
                     <?php
                        $sql2 = mysqli_query($conn, "SELECT * FROM produto ORDER BY idProduto DESC LIMIT 0, 8;");
                        while ($produto = mysqli_fetch_object($sql2)){ 
                     ?>
                     <div class="col-sm-3">
                        <div class="product-image-wrapper">
                           <div class="single-products">
                              <div class="productinfo text-center">
                                 <?php echo "<img src='../fotos/".$produto->foto."' alt='Foto de exibição' /><br />";?>
                                 <?php echo " <h2>R$ " . $produto->preco . "</h2>";?>
                                 <?php echo "" . $produto->nome . "";?>
                                 <a href="../Blog/detalhesProduto.php" class="btn btn-default add-to-cart" > Detalhes do Produto</a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php } ?>
                     <!-- A duplicata de registros começa/termina aqui, é necessário criar/adicionar,
                      registros diferente a partir daqui, pois está pegando os mesmos item de MAIS VENDIDOS -->

                     <div class="category-tab2">
                        <!--category-tab-->
                        <div class="col-sm-12">
                           <ul class="nav nav-tabs">
                              <h4 class="title " style="text-align:center;">Mais Vendidos</h4>
                           </ul>
                        </div>
                     </div>
                     <?php
                        $sql2 = mysqli_query($conn, "SELECT * FROM produto ORDER BY idProduto LIMIT 0, 8;");
                        while ($produto = mysqli_fetch_object($sql2)){
                     ?>
                     <div class="col-sm-3">
                        <div class="product-image-wrapper">
                           <div class="single-products">
                              <div class="productinfo text-center">
                                 <?php echo "<img src='../fotos/".$produto->foto."' alt='Foto de exibição' /><br />";?>
                                 <?php echo " <h2>R$ " . $produto->preco . "</h2>";?>
                                 <?php echo "" . $produto->nome . "";?>
                                 <a href="../Blog/detalhesProduto.php" class="btn btn-default add-to-cart" > Detalhes do Produto</a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php } ?>
                  </div>
                  <!--features_items-->
                  <div class="category-tab">
                     <!--category-tab-->
                     <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                           <li class="active"><a href="#tshirt" data-toggle="tab">brinquedos</a></li>
                           <li><a href="#sunglass" data-toggle="tab">Casinhas</a></li>
                           <li><a href="#kids" data-toggle="tab">Aquarios</a></li>
                           <li><a href="#poloshirt" data-toggle="tab">Potes</a></li>
                        </ul>
                     </div>
                     <div class="tab-content">
                        <div class="tab-pane fade active in" id="tshirt" >
                           <div class="col-sm-3">
                              <div class="product-image-wrapper">
                                 <div class="single-products">
                                    <div class="productinfo text-center">
                                       <img src="../imagens/home/kind.jpg" style=" height: 90%; width: 75%;" alt="" />
                                       <h2>R$ 35.00</h2>
                                       <p>Brinquedo de Pelúcia Chalesco Crocodilo</p>
                                       <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-3">
                              <div class="product-image-wrapper">
                                 <div class="single-products">
                                    <div class="productinfo text-center">
                                       <img src="../imagens/home/kind.jpg" style=" height: 90%; width: 75%;" alt="" />
                                       <h2>R$32.09</h2>
                                       <p>Brinquedo de Pelúcia Chalesco Crocodilo</p>
                                       <a href="product-details.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-3">
                              <div class="product-image-wrapper">
                                 <div class="single-products">
                                    <div class="productinfo text-center">
                                       <img src="../imagens/home/kind.jpg" style=" height: 90%; width: 75%;" alt="" />
                                       <h2>R$30.00</h2>
                                       <p>Brinquedo de Pelúcia Chalesco Crocodilo</p>
                                       <a href="product-details.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-3">
                              <div class="product-image-wrapper">
                                 <div class="single-products">
                                    <div class="productinfo text-center">
                                       <img src="../imagens/home/kind.jpg" style=" height: 90%; width: 75%;" alt="" />
                                       <h2>R$31.00</h2>
                                       <p>Brinquedo de Pelúcia Chalesco Crocodilo</p>
                                       <a href="product-details.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="sunglass" >
                           <div class="col-sm-3">
                              <div class="product-image-wrapper">
                                 <div class="single-products">
                                    <div class="productinfo text-center">
                                       <img src="../imagens/home/casinha.jpg" style=" height: 90%; width: 75%;" alt="" />
                                       <h2>R$49.78</h2>
                                       <p>Casinha preta</p>
                                       <a href="product-details.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-3">
                              <div class="product-image-wrapper">
                                 <div class="single-products">
                                    <div class="productinfo text-center">
                                       <img src="../imagens/home/casinha.jpg" style=" height: 90%; width: 75%;" alt="" />
                                       <h2>R$49.78</h2>
                                       <p>Casinha preta</p>
                                       <a href="product-details.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-3">
                              <div class="product-image-wrapper">
                                 <div class="single-products">
                                    <div class="productinfo text-center">
                                       <img src="../imagens/home/casinha.jpg" style=" height: 90%; width: 75%;" alt="" />
                                       <h2>R$49.90</h2>
                                       <p>Casinha preta</p>
                                       <a href="product-details.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-3">
                              <div class="product-image-wrapper">
                                 <div class="single-products">
                                    <div class="productinfo text-center">
                                       <img src="../imagens/home/casinha.jpg" style=" height: 90%; width: 75%;" alt="" />
                                       <h2>R$49.78</h2>
                                       <p>Casinha preta</p>
                                       <a href="product-details.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="kids" >
                           <div class="col-sm-3">
                              <div class="product-image-wrapper">
                                 <div class="single-products">
                                    <div class="productinfo text-center">
                                       <img src="../imagens/home/aquario.jpg" style=" height: 90%; width: 75%;" alt="" />
                                       <h2>R$7.49</h2>
                                       <p>Aquario Aquaterráreo</p>
                                       <a href="product-details.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-3">
                              <div class="product-image-wrapper">
                                 <div class="single-products">
                                    <div class="productinfo text-center">
                                       <img src="../imagens/home/aquario.jpg" style=" height: 90%; width: 75%;" alt="" />
                                       <h2>R$7.49</h2>
                                       <p>Aquario Aquaterráreo</p>
                                       <a href="product-details.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-3">
                              <div class="product-image-wrapper">
                                 <div class="single-products">
                                    <div class="productinfo text-center">
                                       <img src="../imagens/home/aquario.jpg" style=" height: 90%; width: 75%;" alt="" />
                                       <h2>R$7.49</h2>
                                       <p>Aquario Aquaterráreo</p>
                                       <a href="product-details.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-3">
                              <div class="product-image-wrapper">
                                 <div class="single-products">
                                    <div class="productinfo text-center">
                                       <img src="../imagens/home/aquario.jpg" style=" height: 90%; width: 75%;" alt="" />
                                       <h2>R$7.49</h2>
                                       <p>Aquario Aquaterráreo</p>
                                       <a href="product-details.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="poloshirt" >
                           <div class="col-sm-3">
                              <div class="product-image-wrapper">
                                 <div class="single-products">
                                    <div class="productinfo text-center">
                                       <img src="../imagens/home/pote.jpg" style=" height: 90%; width: 75%;" alt="" />
                                       <h2>R$37.50</h2>
                                       <p>Porta Ração Petz Azul 1kg</p>
                                       <a href="product-details.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-3">
                              <div class="product-image-wrapper">
                                 <div class="single-products">
                                    <div class="productinfo text-center">
                                       <img src="../imagens/home/pote.jpg" style=" height: 90%; width: 75%;" alt="" />
                                       <h2>R$44.44</h2>
                                       <p>Porta Ração Petz Azul 1kg</p>
                                       <a href="product-details.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-3">
                              <div class="product-image-wrapper">
                                 <div class="single-products">
                                    <div class="productinfo text-center">
                                       <img src="../imagens/home/pote.jpg" style=" height: 90%; width: 75%;" alt="" />
                                       <h2>R$43.54</h2>
                                       <p>Porta Ração Petz Azul 1kg</p>
                                       <a href="product-details.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-3">
                              <div class="product-image-wrapper">
                                 <div class="single-products">
                                    <div class="productinfo text-center">
                                       <img src="../imagens/home/pote.jpg" style=" height: 90%; width: 75%;" alt="" />
                                       <h2>R$34.24</h2>
                                       <p>Porta Ração Petz Azul 1kg</p>
                                       <a href="product-details.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!--/category-tab-->
               </div>
            </div>
         </div>
      </section>
      <?php include("templates/footer.php");?>
      <script src="js/jquery.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/price-range.js"></script>
      <script src="js/jquery.prettyPhoto.js"></script>
      <script src="js/main.js"></script>
   </body>
</html>