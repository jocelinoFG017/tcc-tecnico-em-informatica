<?php
session_start();
include("../../login/verificaLogin.php");
include("../../conexao/conexao.php");
?>
<!doctype html>
<html lang="pt-br">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Dashboard - Artigos</title>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
   <link rel="stylesheet" href="../styles.css">
</head>

<body>

  <?php include("../../includes/headerDash.php"); ?>

   <div class="d-flex">
      <?php include("../sidebar/sidebar.php"); ?>

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

            <a href="../../pdfs/enderecopdf.php" class="btn btn-info">
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
                     <?php include("tabela.php"); ?>
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

                     <form action="cadastrar.php" method="POST" enctype="multipart/form-data">

                        <div class="mb-3">
                           <label class="form-label">Título</label>
                           <input name="titulo" class="form-control"
                           placeholder="Insira um título">
                        </div>

                        <div class="mb-3">
                           <label class="form-label">Texto</label>
                           <textarea name="texto" id="texto" class="form-control" rows="6" placeholder="Insira o texto"></textarea>
                        </div>

                        <div class="row">
                           <div class="col-md-6 mb-3">
                              <label class="form-label">Autor</label>
                              <input name="autor" class="form-control"
                              placeholder="Insira o Autor">
                           </div>

                           <div class="col-md-6 mb-3">
                              <label class="form-label">Tag</label>
                              <input name="tag" class="form-control"
                              placeholder="Insira a Tag">
                           </div>

                           <div class="col-md-6 mb-3">
                              <label class="form-label">Tag 2</label>
                              <input name="tag2" class="form-control"
                              placeholder="Insira a Tag 2">
                           </div>

                           <div class="col-md-6 mb-3">
                              <label class="form-label">Tag 3</label>
                              <input name="tag3" class="form-control"
                              placeholder="Insira a Tag 3">
                           </div>

                           <div class="col-12 mb-3">
                              <label class="form-label">Imagem</label>
                              <input type="file" name="foto" class="form-control">
                           </div>
                        </div>

                        <button type="submit" name="cadastrar" class="btn btn-primary">
                           Cadastrar
                        </button>

                     </form>

                  </div>
               </div>
            </div>

         </div>

      </div>
   </div>
   <div class="modal fade" id="modalExcluir" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-sm">
         <div class="modal-content border-0 shadow-lg rounded-4">

            <div class="modal-header bg-danger text-white">
               <h5 class="modal-title">
                  <i class="fa-solid fa-triangle-exclamation me-2"></i>
                  Confirmar exclusão
               </h5>

               <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
               <p>Tem certeza que deseja excluir este artigo?</p>
               <p class="text-danger small">Esta ação não poderá ser desfeita.</p>
            </div>

            <div class="modal-footer border-0 d-flex justify-content-between">
               <button class="btn btn-outline-secondary" data-bs-dismiss="modal">
                  Cancelar
               </button>

               <a id="btnExcluirConfirmado" class="btn btn-danger">
                  Excluir
               </a>
            </div>

         </div>
      </div>
   </div>
   <div class="modal fade" id="modalEditar" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-lg">
         <div class="modal-content border-0 shadow-lg rounded-4">

            <form method="POST" action="editar.php">

               <div class="modal-header bg-primary text-white">
                  <h5 class="modal-title">
                     <i class="fa-solid fa-pen me-2"></i>
                     Editar Artigo
                  </h5>

                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
               </div>

               <div class="modal-body">

                  <input type="hidden" name="idArtigo" id="modal-idArtigo">

                  <div class="row g-3">

                     <div class="col-12">
                        <label class="form-label">Título</label>
                        <input id="modal-titulo" name="titulo" class="form-control" required>
                     </div>

                     <div class="col-12">
                        <label class="form-label">Autor</label>
                        <input id="modal-autor" name="autor" class="form-control">
                     </div>

                     <div class="col-md-4">
                        <label class="form-label">Tag</label>
                        <input id="modal-tag" name="tag" class="form-control">
                     </div>

                     <div class="col-md-4">
                        <label class="form-label">Tag 2</label>
                        <input id="modal-tag2" name="tag2" class="form-control">
                     </div>

                     <div class="col-md-4">
                        <label class="form-label">Tag 3</label>
                        <input id="modal-tag3" name="tag3" class="form-control">
                     </div>

                     <div class="col-12">
                        <label class="form-label">Data de Publicação</label>
                        <input type="date"
                           id="modal-data"
                           name="data_publicacao"
                           class="form-control">
                     </div>

                  </div>

               </div>

               <div class="modal-footer border-0 d-flex justify-content-between">
                  <button type="button"
                     class="btn btn-outline-secondary"
                     data-bs-dismiss="modal">
                     Cancelar
                  </button>

                  <button class="btn btn-primary">
                     Salvar
                  </button>
               </div>

            </form>

         </div>
      </div>
   </div>


   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   <script src="../assets/js/sidebar.js"></script>
</body>

</html>