<?php
   include_once("../conexao/conexao.php");
   ?>
<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Usuários</title>
      <link href="../css/bootstrap.min.css" rel="stylesheet">
      <link href="../css/font-awesome.min.css" rel="stylesheet">
      <!--esse faz aparecer os fafa icon-->
      <link href="../css/dash2.css" rel="stylesheet">
      <!--<link href="css/main.css" rel="stylesheet">esse q da erro-->
      <style>
         .ad {
         position: absolute;
         width: 300px;
         height: 250px;
         border: 1px solid #ddd;
         left: 50%;
         transform: translateX(-50%);
         top: 250px;
         z-index: 10;
         }
         .ad .close {
         position: absolute;
         font-family: 'ionicons';
         width: 20px;
         height: 20px;
         color: #fff;
         background-color: #999;
         font-size: 20px;
         left: -20px;
         top: -1px;
         display: table-cell;
         vertical-align: middle;
         cursor: pointer;
         text-align: center;
         }
      </style>
      <script type="text/javascript">
         $(function() {
         	$('.close').click(function() {
         		$('.ad').css('display', 'none');
         	})
         })
      </script>
   </head>
   <body>
      <div class="header">
         <div class="logo">
            <i class="fa fa-renren"></i>
            <span>Eternity</span>
         </div>
         <a href="#" class="nav-trigger"><span></span></a>
      </div>
      <div class="side-nav">
         <div class="logo">
            <a href="adm.html">
            <span><i class="fa fa-renren"></i></span>
            <span>Eternity</span>
            </a>
         </div>
         <nav>
            <ul>
               <li>
                  <a href="usuarios2.php">
                  <span><i class="fa fa-user"></i></span>
                  <span>Usuários</span>
                  </a>
               </li>
               <li>
                  <a href="cadastrar.php">
                  <span><i class=" fa fa-user-plus"></i></span>
                  <span>Cadastrar</span>
                  </a>
               </li>
               <li class="active">
                  <a href="#">
                  <span><i class="fa fa-plug"></i></span>
                  <span>Gráfico</span>
                  </a>
               </li>
               <li class="active">
                  <a href="listarEndereco.php">
                  <span><i class="fa fa-plug"></i></span>
                  <span>Endereços</span>
                  </a>
               </li>
               <li>
                  <a href="sair.php">
                  <span><i class="fa fa-power-off" aria-hidden="true"></i></span>
                  <span>SAIR</span>
                  </a>
               </li>
            </ul>
         </nav>
      </div>
      <!--aqui acaba o menu lateral-->
      <div class="main-content">
         <div class="title">
            Seja bem-vindo, aqui você tem acesso aos endereços cadastrados
         </div>
         <div class="maina">
            <div class="widgete">
               <!--aqui fica aquele fundo branco desproporcional -->
               <div class="container theme-showcase" role="main">
                  <div class="page-header">
                     <h3><label class="glyphicon glyphicon-book"> </label> endereços </h3>
                  </div>
                  <div class="col-md-12">
                    <?php
                    include("tabelaEndereco.php");?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>

