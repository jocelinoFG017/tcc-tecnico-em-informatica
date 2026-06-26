<?php
session_start();
include("../Login/verificaLogin.php");
?>
<!doctype html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard - Produtos</title>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
   <link href="styles.css" rel="stylesheet">
</head>

<body>

   <!-- HEADER -->
   <?php include("../templates/headerDash_r.php"); ?>
   <!-- SIDEBAR -->
   <?php include("Sidebar/sidebar.php"); ?>

   <div class="d-flex">

      <!-- CONTEÚDO -->
      <div id="content" class="content flex-grow-1">

         <!-- HEADER DA PÁGINA -->
         <div class="p-3 border-bottom bg-light d-flex justify-content-between align-items-center">
            <div>
               <h4 class="mb-0 d-flex align-items-center gap-2">
                  <i class="fa-solid fa-box text-primary"></i>
                  Formulário de cadastro de produtos
               </h4>
               <small class="text-muted">Visualize e cadastre novos produtos aqui.</small>
            </div>

            <a href="../pdfs/produtopdf.php" target="_blank" class="btn btn-info">
               <i class="fas fa-file-pdf me-1"></i> PDF
            </a>
         </div>

         <!-- TABS -->
         <ul class="nav nav-tabs px-3 mt-3">
            <li class="nav-item">
               <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#listar">
                  Listar Produtos
               </button>
            </li>

            <li class="nav-item">
               <button class="nav-link" data-bs-toggle="tab" data-bs-target="#add">
                  Adicionar Produto
               </button>
            </li>
         </ul>

         <!-- CONTEÚDO TABS -->
         <div class="tab-content p-3">

            <!-- LISTAR -->
            <div class="tab-pane fade show active" id="listar">
               <div class="card">
                  <div class="card-body">
                     <h5 class="card-title">Tabela de Produtos</h5>

                     <?php include("../Listar/tabelaProduto.php"); ?>
                  </div>
               </div>
            </div>

            <!-- FORM -->
            <div class="tab-pane fade" id="add">
               <div class="card">
                  <div class="card-body">

                     <h5 class="card-title">Cadastro de Produtos</h5>

                     <?php if (isset($_SESSION['statusCadastro'])): ?>
                        <div class="alert alert-success">Cadastro efetuado</div>
                     <?php unset($_SESSION['statusCadastro']);
                     endif; ?>

                     <?php if (isset($_SESSION['usuarioExiste'])): ?>
                        <div class="alert alert-danger">Erro: já existe</div>
                     <?php unset($_SESSION['usuarioExiste']);
                     endif; ?>

                     <form action="../Cadastrar/cadastroProduto.php" method="POST" enctype="multipart/form-data">

                        <div class="mb-3">
                           <label class="form-label">Nome</label>
                           <input name="nome" class="form-control" required>
                        </div>

                        <div class="mb-3">
                           <label class="form-label">Descrição</label>
                           <input name="descricao" class="form-control" required>
                        </div>

                        <div class="mb-3">
                           <label class="form-label">Marca</label>
                           <input name="marca" class="form-control" required>
                        </div>

                        <div class="row">
                           <div class="col-md-6 mb-3">
                              <label class="form-label">Quantidade</label>
                              <input name="quantidade" class="form-control" required>
                           </div>

                           <div class="col-md-6 mb-3">
                              <label class="form-label">Preço</label>
                              <input name="preco" class="form-control" required>
                           </div>
                        </div>

                        <div class="mb-3">
                           <label class="form-label">Imagem</label>
                           <input type="file" name="foto" class="form-control">
                           <small class="text-muted">Envie a imagem do produto</small>
                        </div>

                        <button class="btn btn-primary">
                           Cadastrar
                        </button>

                     </form>

                  </div>
               </div>
            </div>

         </div>

      </div>

   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   <script>
      const sidebar = document.getElementById("sidebar");
      const content = document.getElementById("content");
      const icon = document.getElementById("iconMenu");
      const btn = document.getElementById("toggleSidebar");

      // estado inicial correto (sidebar começa ABERTO)
      let isOpen = true;

      // garante sincronização ao carregar página
      icon.innerHTML = "☰";

      btn.addEventListener("click", function() {

         isOpen = !isOpen;

         sidebar.classList.toggle("closed");
         content.classList.toggle("expanded");

         icon.innerHTML = isOpen ? "☰" : "✖";
      });
   </script>
</body>

</html>