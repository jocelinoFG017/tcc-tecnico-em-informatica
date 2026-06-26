<?php
session_start();
include("../Login/verificaLogin.php");
include("../conexao/conexao.php");
?>
<!doctype html>
<html lang="pt-br">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Dashboard - Artigos</title>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
   <link rel="stylesheet" href="styles.css">
</head>

<body>

   <?php include("../templates/headerDash.php"); ?>

   <div class="d-flex">
      <?php include("Sidebar/sidebar.php"); ?>

      <!-- CONTEÚDO -->
      <div id="content" class="content flex-grow-1">

         <!-- HEADER DA PÁGINA -->
         <div class="p-3 border-bottom bg-light d-flex justify-content-between align-items-center">
            <div>
               <h4 class="mb-0 d-flex align-items-center gap-2">
                  <i class="fa-solid fa-newspaper text-primary"></i>
                  Formulário de cadastro de Artigos
               </h4>
               <small class="text-muted">Visualize e cadastre novos artigos aqui.</small>
            </div>

            <a href="../pdfs/enderecopdf.php" class="btn btn-info">
               <i class="fas fa-file-pdf me-1"></i> PDF
            </a>
         </div>

         <!-- TABS -->
         <ul class="nav nav-tabs px-3 mt-3">
            <li class="nav-item">
               <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#listar">
                  Listar Artigos
               </button>
            </li>
            <li class="nav-item">
               <button class="nav-link" data-bs-toggle="tab" data-bs-target="#adicionar">
                  Adicionar Artigo
               </button>
            </li>
         </ul>

         <!-- CONTENT -->
         <div class="tab-content p-3">

            <!-- LISTAR -->
            <div class="tab-pane fade show active" id="listar">
               <div class="card">
                  <div class="card-body">
                     <h5 class="card-title">Tabela de Artigos</h5>
                     <?php include("../Listar/tabelaArtigo.php"); ?>
                  </div>
               </div>
            </div>

            <!-- FORM -->
            <div class="tab-pane fade" id="adicionar">
               <div class="card">
                  <div class="card-body">

                     <h5 class="card-title">Cadastro de Artigos</h5>

                     <?php if (isset($_SESSION['statusCadastro'])): ?>
                        <div class="alert alert-success">Cadastro efetuado</div>
                        <?php unset($_SESSION['statusCadastro']); ?>
                     <?php endif; ?>

                     <?php if (isset($_SESSION['usuarioExiste'])): ?>
                        <div class="alert alert-danger">Erro: já existe</div>
                        <?php unset($_SESSION['usuarioExiste']); ?>
                     <?php endif; ?>

                     <form action="../Cadastrar/cadastroArtigo.php" method="POST" enctype="multipart/form-data">

                        <div class="mb-3">
                           <label class="form-label">Título</label>
                           <input name="titulo" class="form-control" required>
                        </div>

                        <div class="mb-3">
                           <label class="form-label">Texto</label>
                           <textarea name="texto" id="texto" class="form-control" rows="6"></textarea>
                        </div>

                        <div class="row">
                           <div class="col-md-6 mb-3">
                              <label class="form-label">Autor</label>
                              <input name="autor" class="form-control" required>
                           </div>

                           <div class="col-md-6 mb-3">
                              <label class="form-label">Tag</label>
                              <input name="tag" class="form-control" required>
                           </div>

                           <div class="col-md-6 mb-3">
                              <label class="form-label">Tag 2</label>
                              <input name="tag2" class="form-control">
                           </div>

                           <div class="col-md-6 mb-3">
                              <label class="form-label">Tag 3</label>
                              <input name="tag3" class="form-control">
                           </div>

                           <div class="col-12 mb-3">
                              <label class="form-label">Imagem</label>
                              <input type="file" name="foto" class="form-control">
                           </div>
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
   <script src="assets/js/sidebar.js"></script>
</body>

</html>