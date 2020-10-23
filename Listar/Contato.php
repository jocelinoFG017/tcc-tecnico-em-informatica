<?php
include("../conexao/conexao.php");
$path = 'Listar/contato.php'
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<title>Contato| Eternity</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<!--Responsavel pelos icones do site-->
	<link href="../css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
	<!--Responsavel pela responsividade do site-->
	<link href="../css/responsive.css" rel="stylesheet">
	
	<!-- Somente estilizacao e fotos-->
	<link href="../css/photos.css" rel="stylesheet">
	
    <link rel="shortcut icon" href="../images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="../Index/index.php"><img src="../imagens/home/logo.png" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-user"></i> Conta</a></li>
								<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="../Login/login.php"><i class="fa fa-lock"></i> Login</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
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
								<li class="dropdown"><a href="../Index/index.php">Início<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Produtos</a></li>
										<li><a href="product-details.html">Product Details</a></li> 
										<li><a href="checkout.html">Checkout</a></li> 
										<li><a href="cart.html">Carrinho</a></li> 
                                    </ul>
								</li> 
								
								<li class="dropdown"><a href="blog.html" >Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
										<li><a href="blog-single.html" class="active">Blog Single</a></li>
                                    </ul>
								</li> 
								
								<li><a href="<?php parse_url($path) ;?> ">Contato</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Pesquisar"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
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
					</div><!--/blog-post-area-->
					<div class="socials-share">
						<a href=""><img src="../imagens/blog/socials.png" alt=""></a>
					</div><!--/socials-share-->
				</div>	
			</div>
		</div>
	</section>

	<?php include("../Footer/footer.php"); ?>

    <script src="../js/jquery.js"></script>
	<script src="../js/price-range.js"></script>
	<script src="../js/jquery.scrollUp.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>