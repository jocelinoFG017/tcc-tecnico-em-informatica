<?php
   session_start();
   ?>
<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta http-equiv="Content-Language" content="pt-br" />
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Login - Ethernity</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
      <meta name="description" content="Build whatever layout you need with our Architect framework." />
      <meta name="msapplication-tap-highlight" content="no" />
      <link href="../css/bootstrap.min.css" rel="stylesheet">
      <!--Responsavel pelos icones do site-->
      <link href="../css/font-awesome.min.css" rel="stylesheet">
      <link href="../css/main.css" rel="stylesheet">
      <link href="../css/login.css" rel="stylesheet">
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
   <body>
      <?php include("../Header/header.php");?>
      <div class="login-pagina">
         <h4 style="text-align:center; text-transform:uppercase;">Formulario de Login</h4>
         <div class="formulario">
            <?php
               if(isset($_SESSION['naoAutenticado'])):
               ?>
            <div class="card mb-3 widget-content bg-happy-green">
               <div class="alert alert-danger" role="alert">
                  <p>ERRO: Usuario ou senha inválidos</p>
               </div>
            </div>
            <?php
               endif;
               unset($_SESSION['naoAutencidado']);
               ?>
            <form class="login-formulario" action="login.php" method="POST">
               <div class="position-relative row form-group">
                  <label for="exampleEmail" >Login:</label>
                  <input required type="text" name="login" placeholder="Informe seu login" ><br>
               </div>
               <div class="position-relative row form-group">
                  <label for="exampleEmail">Senha:</label>
                  <input required type="password" name="senha" placeholder="Informe sua senha" ><br>
               </div>
               <button>login</button>
               <p class="message">Not registered? <a href="#">Create an account</a></p>
            </form>
         </div>
      </div>
      <?php include("../Footer/footer.php");?>
      <script src="../js/login.js"></script>
   </body>
</html>