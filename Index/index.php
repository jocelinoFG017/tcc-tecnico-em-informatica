

<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <!-- USAR O CARRINHO COMO LISTA DE DESEJOS  -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Titulo da pagina-->
      <title>Home | ETERNITY</title>
      <!-- Links do CSS-->
      <link href="../css/main.css" rel="stylesheet">
      <link href="../css/bootstrap.min.css" rel="stylesheet">
      <link href="../css/font-awesome.min.css" rel="stylesheet">
      <link href="../css/prettyPhoto.css" rel="stylesheet">
      <link href="../css/price-range.css" rel="stylesheet">
      <link href="../css/animate.css" rel="stylesheet">
      <link href="../css/responsive.css" rel="stylesheet">
      <link rel="shortcut icon" href="../imagens/ico/favicon.ico">
      <!-- Somente estilizacao e fotos-->
	<link href="../css/photos.css" rel="stylesheet">
      <!---->
      <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../imagens/ico/apple-touch-icon-144-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../imagens/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../imagens/ico/apple-touch-icon-72-precomposed.png">
      <link rel="apple-touch-icon-precomposed" href="../imagens/ico/apple-touch-icon-57-precomposed.png">
   </head>
   <!--END HEAD-->
   <body>
      <header id="header">
         <!--header-->
         <div class="header-middle">
            <!--header-meio-->
            <div class="container">
               <div class="row">
                  <div class="col-sm-4">
                     <div class="logo pull-left">
                        <a href="index.php"><img src="../imagens/home/logo.png" alt="" /></a><!--logo -->
                     </div>
                  </div>
                  <div class="col-sm-8">
                     <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                           <li><a href="#"><i class="fa fa-user"></i> Conta</a></li>
                           <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                           <li><a href="../Login/login.php"><i class="fa fa-lock"></i> Login</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--/header-meio-->
         <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
               <div class="row">
                  <div class="col-sm-9">
                     <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                     </div>
                     <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                           <li class="dropdown">
                              <a href="index.php">Início<i class="fa fa-angle-down"></i></a>
                              <ul role="menu" class="sub-menu">
                                 <li><a href="shop.html">Produtos</a></li>
                                 <li><a href="product-details.html">Detalhes Produto</a></li>
                                 <li><a href="checkout.html">Checkout</a></li>
                                 <li><a href="cart.html">Carrinho</a></li>
                              </ul>
                           </li>
                           <li class="dropdown">
                              <a href="blog.html">Blog<i class="fa fa-angle-down"></i></a>
                              <ul role="menu" class="sub-menu">
                                 <li><a href="blog-single.html">Blog Single</a></li>
                              </ul>
                           </li>
                           <li><a href="../Listar/contato.php">Contato</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <div class="search_box pull-right">
                        <input type="text" placeholder="Pesquisar"/><!--aqui fica a caixa de pesquisa do site-->
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--/header-bottom-->
      </header>
      <!--/header-->
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
                              <button type="button" class="btn btn-default get">Get it now</button>
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
                              <button type="button" class="btn btn-default get">Get it now</button>
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
                              <button type="button" class="btn btn-default get">Get it now</button>
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
                     <h2 class="title text-center">Em Destaque</h2>
                     <div class="col-sm-3">
                        <div class="product-image-wrapper">
                           <div class="single-products">
                              <div class="productinfo text-center">
                                 <img src="../imagens/home/zorro.jpg" alt="" />
                                 <h2>R$18.90</h2>
                                 <p>Ração Zorro Original</p>
                                 <a href="product-details.html" class="btn btn-default add-to-cart" > Detalhes do Produto</a>
                              </div>
                           </div>
                           <div class="choose">
                              <ul class="nav nav-pills nav-justified">
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-3">
                        <div class="product-image-wrapper">
                           <div class="single-products">
                              <div class="productinfo text-center">
                                 <img src="../imagens/home/zorroj.jpg" alt="" />
                                 <h2>R$24.49</h2>
                                 <p>Ração Zorro Filhote</p>
                                 <a href="product-details.html" class="btn btn-default add-to-cart"></i>Detalhes do Produto</a>
                              </div>
                           </div>
                           <div class="choose">
                              <ul class="nav nav-pills nav-justified">
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-3">
                        <div class="product-image-wrapper">
                           <div class="single-products">
                              <div class="productinfo text-center">
                                 <img src="../imagens/home/pedigree.jpg" alt="" />
                                 <h2>R$57.35</h2>
                                 <p>Ração Pedigree Adulto</p>
                                 <a href="product-details.html" class="btn btn-default add-to-cart"></i>Detalhes do Produto</a>
                              </div>
                           </div>
                           <div class="choose">
                              <ul class="nav nav-pills nav-justified">
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-3">
                        <div class="product-image-wrapper">
                           <div class="single-products">
                              <div class="productinfo text-center">
                                 <img src="../imagens/home/biscrock.jpg" alt="" />
                                 <h2>R$24.25</h2>
                                 <p>Ração Pedigree Biscrock</p>
                                 <a href="product-details.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                              </div>
                              <img src="../imagens/home/new.png" class="new" alt="" />
                           </div>
                           <div class="choose">
                              <ul class="nav nav-pills nav-justified">
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-3">
                        <div class="product-image-wrapper">
                           <div class="single-products">
                              <div class="productinfo text-center">
                                 <img src="../imagens/home/salada.jpg" alt="" />
                                 <h2>R$43.55</h2>
                                 <p>Ração Pedigree Carne e Vegetais </p>
                                 <a href="product-details.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                              </div>
                              <img src="../imagens/home/sale.png" class="new" alt="" />
                           </div>
                           <div class="choose">
                              <ul class="nav nav-pills nav-justified">
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-3">
                        <div class="product-image-wrapper">
                           <div class="single-products">
                              <div class="productinfo text-center">
                                 <img src="../imagens/home/biscrock2.jpg" alt="" />
                                 <h2>R$27.80</h2>
                                 <p>Ração pedigree tal</p>
                                 <a href="product-details.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                              </div>
                           </div>
                           <div class="choose">
                              <ul class="nav nav-pills nav-justified">
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-3">
                        <div class="product-image-wrapper">
                           <div class="single-products">
                              <div class="productinfo text-center">
                                 <img src="../imagens/home/biscrock2.jpg" alt="" />
                                 <h2>R$27.80</h2>
                                 <p>Ração pedigree tal</p>
                                 <a href="product-details.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                              </div>
                           </div>
                           <div class="choose">
                              <ul class="nav nav-pills nav-justified">
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-3">
                        <div class="product-image-wrapper">
                           <div class="single-products">
                              <div class="productinfo text-center">
                                 <img src="../imagens/home/biscrock2.jpg" alt="" />
                                 <h2>R$27.80</h2>
                                 <p>Ração pedigree tal</p>
                                 <a href="product-details.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                              </div>
                           </div>
                           <div class="choose">
                              <ul class="nav nav-pills nav-justified">
                              </ul>
                           </div>
                        </div>
                     </div>
                     <h2 class="title text-center">Mais Vendidos</h2>
                     <div class="col-sm-3">
                        <div class="product-image-wrapper">
                           <div class="single-products">
                              <div class="productinfo text-center">
                                 <img src="../imagens/home/zorro.jpg" alt="" />
                                 <h2>R$18.90</h2>
                                 <p>Ração Zorro Original</p>
                                 <a href="product-details.html" class="btn btn-default add-to-cart" > Detalhes do Produto</a>
                              </div>
                           </div>
                           <div class="choose">
                              <ul class="nav nav-pills nav-justified">
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-3">
                        <div class="product-image-wrapper">
                           <div class="single-products">
                              <div class="productinfo text-center">
                                 <img src="../imagens/home/zorro.jpg" alt="" />
                                 <h2>R$18.90</h2>
                                 <p>Ração Zorro Original</p>
                                 <a href="product-details.html" class="btn btn-default add-to-cart" > Detalhes do Produto</a>
                              </div>
                           </div>
                           <div class="choose">
                              <ul class="nav nav-pills nav-justified">
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-3">
                        <div class="product-image-wrapper">
                           <div class="single-products">
                              <div class="productinfo text-center">
                                 <img src="../imagens/home/zorro.jpg" alt="" />
                                 <h2>R$18.90</h2>
                                 <p>Ração Zorro Original</p>
                                 <a href="product-details.html" class="btn btn-default add-to-cart" > Detalhes do Produto</a>
                              </div>
                           </div>
                           <div class="choose">
                              <ul class="nav nav-pills nav-justified">
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-3">
                        <div class="product-image-wrapper">
                           <div class="single-products">
                              <div class="productinfo text-center">
                                 <img src="../imagens/home/zorro.jpg" alt="" />
                                 <h2>R$18.90</h2>
                                 <p>Ração Zorro Original</p>
                                 <a href="product-details.html" class="btn btn-default add-to-cart" > Detalhes do Produto</a>
                              </div>
                           </div>
                           <div class="choose">
                              <ul class="nav nav-pills nav-justified">
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-3">
                        <div class="product-image-wrapper">
                           <div class="single-products">
                              <div class="productinfo text-center">
                                 <img src="../imagens/home/zorro.jpg" alt="" />
                                 <h2>R$18.90</h2>
                                 <p>Ração Zorro Original</p>
                                 <a href="product-details.html" class="btn btn-default add-to-cart" > Detalhes do Produto</a>
                              </div>
                           </div>
                           <div class="choose">
                              <ul class="nav nav-pills nav-justified">
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-3">
                        <div class="product-image-wrapper">
                           <div class="single-products">
                              <div class="productinfo text-center">
                                 <img src="../imagens/home/zorro.jpg" alt="" />
                                 <h2>R$18.90</h2>
                                 <p>Ração Zorro Original</p>
                                 <a href="product-details.html" class="btn btn-default add-to-cart" > Detalhes do Produto</a>
                              </div>
                           </div>
                           <div class="choose">
                              <ul class="nav nav-pills nav-justified">
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-3">
                        <div class="product-image-wrapper">
                           <div class="single-products">
                              <div class="productinfo text-center">
                                 <img src="../imagens/home/zorro.jpg" alt="" />
                                 <h2>R$18.90</h2>
                                 <p>Ração Zorro Original</p>
                                 <a href="product-details.html" class="btn btn-default add-to-cart" > Detalhes do Produto</a>
                              </div>
                           </div>
                           <div class="choose">
                              <ul class="nav nav-pills nav-justified">
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-3">
                        <div class="product-image-wrapper">
                           <div class="single-products">
                              <div class="productinfo text-center">
                                 <img src="../imagens/home/zorro.jpg" alt="" />
                                 <h2>R$18.90</h2>
                                 <p>Ração Zorro Original</p>
                                 <a href="product-details.html" class="btn btn-default add-to-cart" > Detalhes do Produto</a>
                              </div>
                           </div>
                           <div class="choose">
                              <ul class="nav nav-pills nav-justified">
                              </ul>
                           </div>
                        </div>
                     </div>
                     
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
                                       <img src="../imagens/home/far.jpg" alt="" />
                                       <h2>R$ 5.00</h2>
                                       <p>Filhote parcialmente vivo</p>
                                       <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-3">
                              <div class="product-image-wrapper">
                                 <div class="single-products">
                                    <div class="productinfo text-center">
                                       <img src="../imagens/home/far.jpg" alt="" />
                                       <h2>R$32.09</h2>
                                       <p>Filhote parcialmente vivo</p>
                                       <a href="product-details.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-3">
                              <div class="product-image-wrapper">
                                 <div class="single-products">
                                    <div class="productinfo text-center">
                                       <img src="../imagens/home/far.jpg" alt="" />
                                       <h2>R$30.00</h2>
                                       <p>Filhote parcialmente vivo</p>
                                       <a href="product-details.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-3">
                              <div class="product-image-wrapper">
                                 <div class="single-products">
                                    <div class="productinfo text-center">
                                       <img src="../imagens/home/far.jpg" alt="" />
                                       <h2>R$17.00</h2>
                                       <p>Filhote parcialmente vivo</p>
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
                                       <img src="../imagens/home/far.jpg" alt="" />
                                       <h2>R$28.78</h2>
                                       <p>Easy Polo Black Edition</p>
                                       <a href="product-details.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-3">
                              <div class="product-image-wrapper">
                                 <div class="single-products">
                                    <div class="productinfo text-center">
                                       <img src="../imagens/home/far.jpg" alt="" />
                                       <h2>R$100.10</h2>
                                       <p>Easy Polo Black Edition</p>
                                       <a href="product-details.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-3">
                              <div class="product-image-wrapper">
                                 <div class="single-products">
                                    <div class="productinfo text-center">
                                       <img src="../imagens/home/far.jpg" alt="" />
                                       <h2>R$49.90</h2>
                                       <p>Easy Polo Black Edition</p>
                                       <a href="product-details.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-3">
                              <div class="product-image-wrapper">
                                 <div class="single-products">
                                    <div class="productinfo text-center">
                                       <img src="../imagens/home/far.jpg" alt="" />
                                       <h2>R$5.60</h2>
                                       <p>Easy Polo Black Edition</p>
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
                                       <img src="../imagens/home/far.jpg" alt="" />
                                       <h2>R$9.99</h2>
                                       <p>Easy Polo Black Edition</p>
                                       <a href="product-details.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-3">
                              <div class="product-image-wrapper">
                                 <div class="single-products">
                                    <div class="productinfo text-center">
                                       <img src="../imagens/home/far.jpg" alt="" />
                                       <h2>R$7.49</h2>
                                       <p>Easy Polo Black Edition</p>
                                       <a href="product-details.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-3">
                              <div class="product-image-wrapper">
                                 <div class="single-products">
                                    <div class="productinfo text-center">
                                       <img src="../imagens/home/far.jpg" alt="" />
                                       <h2>R$2.50</h2>
                                       <p>Easy Polo Black Edition</p>
                                       <a href="product-details.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-3">
                              <div class="product-image-wrapper">
                                 <div class="single-products">
                                    <div class="productinfo text-center">
                                       <img src="../imagens/home/far.jpg" alt="" />
                                       <h2>R$20.40</h2>
                                       <p>Easy Polo Black Edition</p>
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
                                       <img src="../imagens/home/far.jpg" alt="" />
                                       <h2>R$37.50</h2>
                                       <p>Easy Polo Black Edition</p>
                                       <a href="product-details.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-3">
                              <div class="product-image-wrapper">
                                 <div class="single-products">
                                    <div class="productinfo text-center">
                                       <img src="../imagens/home/far.jpg" alt="" />
                                       <h2>R$44.44</h2>
                                       <p>Easy Polo Black Edition</p>
                                       <a href="product-details.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-3">
                              <div class="product-image-wrapper">
                                 <div class="single-products">
                                    <div class="productinfo text-center">
                                       <img src="../imagens/home/far.jpg" alt="" />
                                       <h2>R$43.54</h2>
                                       <p>Easy Polo Black Edition</p>
                                       <a href="product-details.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detalhes do Produto</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-3">
                              <div class="product-image-wrapper">
                                 <div class="single-products">
                                    <div class="productinfo text-center">
                                       <img src="../imagens/home/far.jpg" alt="" />
                                       <h2>R$34.24</h2>
                                       <p>Easy Polo Black Edition</p>
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
	 
	<?php
	include("../Footer/footer.php");
	 ?>
      <!--Rodapé-->
      <script src="../js/jquery.js"></script>
      <script src="../js/bootstrap.min.js"></script>
      <script src="../js/jquery.scrollUp.min.js"></script>
      <script src="../js/price-range.js"></script>
      <script src="../js/jquery.prettyPhoto.js"></script>
      <script src="../js/main.js"></script>
   </body>
</html>

