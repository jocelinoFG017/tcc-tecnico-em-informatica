<?php
   session_start();
   ?>
<!Doctype html>
<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Cadastro| ETERNITY</title>
      <link href="../css/bootstrap.min.css" rel="stylesheet">
      <!--Responsavel pelos icones do site-->
      <link href="../css/font-awesome.min.css" rel="stylesheet">
      <link href="../css/main.css" rel="stylesheet">
      <!--Responsavel pela responsividade do site-->
      <link href="../css/responsive.css" rel="stylesheet">
      <!-- Somente estilizacao e fotos-->
      <link href="../css/photos.css" rel="stylesheet">

      <link rel="shortcut icon" href="imagens/ico/favicon.ico">
      <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../imagens/ico/apple-touch-icon-144-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../imagens/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../imagens/ico/apple-touch-icon-72-precomposed.png">
      <link rel="apple-touch-icon-precomposed" href="../imagens/ico/apple-touch-icon-57-precomposed.png">
   </head>
   <!--fim head-->
   <body>
      <?php include("../Header/header.php"); ?>
      <section id="form">
         <div class="container">
            <div class="row">
               <div class="col-sm-6 col-sm-offset-3">
                  <div class="login-form">
                     <!--login form-->
                     <h2>Cadastrar</h2>
                     <?php
                        if(isset($_SESSION['statusCadastro'])):
                        ?>
                     <div class="notification is-danger">
                        <p>Cadastro efetuado</p>
                     </div>
                     <?php
                        endif;
                        unset($_SESSION['statusCadastro']);
                        ?>

                        
                        <!-- asdasd-->
                     <?php
                        if(isset($_SESSION['usuarioExiste'])):
                        ?>
                     <div class="notification is-danger">
                        <p>ERRO: login já existe</p>
                     </div>
                     <?php
                        endif;
                        unset($_SESSION['usuarioExiste']);
                        ?>


                     <form action="cadastro.php" method="POST">
                        <!-- forma de envio é o post, que vai chamar o cadastrar.php-->    
                        <div class="blank-arrow">
                           <label>Nome:</label><input required type="text" name="nome" placeholder="Informe seu nome"><br>
                        </div><div class="blank-arrow">
                           <label>Login:</label><input required type="text" name="login" placeholder="Informe seu login"><br>
                        </div>
                        <div class="blank-arrow">
                           <label>Senha:</label><input required type="password" name="senha" placeholder="Informe sua senha"><br>
                        </div>
                        <button type="submit"  class="btn btn-default">Cadastrar</button>
                     </form>
                  </div>
                  <!--/login form-->
               </div>
            </div>
         </div>
      </section>	
      <?php include("../Footer/footer.php"); ?>
   </body>
   <script src="js/main.js"></script>
</html>