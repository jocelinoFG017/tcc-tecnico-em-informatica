<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetShop Login</title>
    <!-- CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- Font Awesome para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
   <body>
      <?php include("../templates/header.php");?>

     <main>
       <div class="container d-flex align-items-center justify-content-center min-vh-100">
         <div class="col-md-6 col-lg-4">
            <div class="card shadow-lg p-4">
               <h4 class="text-center text-uppercase mb-4">Formulário de Login</h4>

               <?php if(isset($_SESSION['naoAutenticado'])): ?>
                  <div class="alert alert-danger" role="alert">
                     ERRO: Usuário ou senha inválidos
                  </div>
               <?php 
                  endif; 
                  unset($_SESSION['naoAutenticado']); 
               ?>

               <!-- Formulário de Login -->
               <form method="POST" action="login.php">
                  <div class="mb-3">
                     <label for="login" class="form-label">Login:</label>
                     <input required type="text" name="login" id="login" class="form-control" placeholder="Informe seu login">
                  </div>
                  <div class="mb-3">
                     <label for="senha" class="form-label">Senha:</label>
                     <input required type="password" name="senha" id="senha" class="form-control" placeholder="Informe sua senha">
                  </div>
                  <div class="d-grid">
                     <button type="submit" value="entrar" id="entrar" name="entrar" class="btn btn-primary">
                        <i class="fa fa-sign-in"></i> Login
                     </button>
                  </div>
                  <p class="text-center mt-3 message">
                     Não está cadastrado? <a href="../Listar/criarConta.php">Crie uma conta</a>
                  </p>
               </form>
               <!-- Final Formulário -->
            </div>
         </div>
      </div>
     </main>

      <?php include("../templates/footer.php");?>

      <script src="../assets/js/bootstrap.bundle.min.js"></script>
      <script src="../assets/js/login.js"></script>
   </body>
</html>
