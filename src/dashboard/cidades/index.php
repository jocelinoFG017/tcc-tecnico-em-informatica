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
   <title>Dashboard - Cidades</title>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
   <link rel="stylesheet" href="../styles.css">

   <style>
      .tabela-fixa {
         table-layout: fixed;
         width: 100%;
      }

      .tabela-fixa td {
         overflow: hidden;
         text-overflow: ellipsis;
         white-space: nowrap;
      }
   </style>
</head>

<body>

   <?php include("../../templates/headerDash.php"); ?>
   <?php include("../sidebar/sidebar.php"); ?>

   <div id="content" class="content">

      <!-- HEADER DA PÁGINA -->
      <div class="d-flex justify-content-between align-items-center p-3 border-bottom bg-white">
         <div>
            <h4 class="mb-0 d-flex align-items-center gap-2">
               <i class="fa-solid fa-city text-primary"></i>
               Formulário de cadastro de Cidades
            </h4>
            <small class="text-muted">Visualize e cadastre novas cidades aqui.</small>
         </div>

         <a href="../../pdfs/enderecopdf.php" class="btn btn-info">
            <i class="fas fa-file-pdf me-1"></i> PDF
         </a>
      </div>

      <!-- TABS -->
      <ul class="nav nav-tabs px-3 mt-3">
         <li class="nav-item">
            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#listar">
               Listar Cidades
            </button>
         </li>

         <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#add">
               Adicionar Cidade
            </button>
         </li>
      </ul>

      <div class="tab-content p-3">

         <!-- LISTAR -->
         <div class="tab-pane fade show active" id="listar">

            <div class="card">
               <div class="card-body">

                  <h5 class="card-title">Tabela de Cidades</h5>

                  <!-- CONTAINER DA TABELA (AJAX) -->
                  <div id="tabela-container">
                     <?php include("tabela.php"); ?>
                  </div>

                  <!-- PAGINAÇÃO (AJAX) -->
                  <nav class="mt-3">
                     <ul class="pagination justify-content-center" id="paginacao"></ul>
                  </nav>

               </div>
            </div>

         </div>

         <!-- FORM -->
         <div class="tab-pane fade" id="add">
            <div class="card">
               <div class="card-body">

                  <h5 class="card-title">Cadastro de Cidade</h5>

                  <?php if (isset($_SESSION['statusCadastro'])): ?>
                     <div class="alert alert-success">Cadastro efetuado</div>
                  <?php unset($_SESSION['statusCadastro']);
                  endif; ?>

                  <?php if (isset($_SESSION['usuarioExiste'])): ?>
                     <div class="alert alert-danger">Erro: já existe</div>
                  <?php unset($_SESSION['usuarioExiste']);
                  endif; ?>

                  <form action="cadastrar.php" method="POST">

                     <div class="mb-3">
                        <label class="form-label">Estado</label>
                        <select name="estadoId" class="form-select" required>
                           <option value="">Selecione o Estado</option>
                           <?php
                           $resultEstado = "SELECT * FROM estado ORDER BY nome";
                           $resultadoEstado = mysqli_query($conn, $resultEstado);
                           while ($rowEstado = mysqli_fetch_assoc($resultadoEstado)) { ?>
                              <option value="<?= $rowEstado['idEstado']; ?>">
                                 <?= $rowEstado['nome']; ?>
                              </option>
                           <?php } ?>
                        </select>
                     </div>

                     <div class="mb-3">
                        <label class="form-label">Cidade</label>
                        <input type="text" name="cidade" class="form-control" required>
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

   <div class="modal fade" id="modalExcluir" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-sm">
         <div class="modal-content border-0 shadow-lg rounded-4">

            <div class="modal-header bg-danger text-white">
               <h5 class="modal-title">
                  <i class="fa-solid fa-triangle-exclamation me-2"></i>
                  Confirmar exclusão
               </h5>

               <button type="button"
                  class="btn-close btn-close-white"
                  data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
               <p>Tem certeza que deseja excluir esta cidade?</p>
               <p class="text-danger small">Esta ação não poderá ser desfeita.</p>
            </div>

            <div class="modal-footer border-0 d-flex justify-content-between">
               <button class="btn btn-outline-secondary"
                  data-bs-dismiss="modal">
                  Cancelar
               </button>

               <a id="btnExcluirConfirmado"
                  class="btn btn-danger">
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
                     <i class="fa-solid fa-city me-2"></i>
                     Editar Cidade
                  </h5>

                  <button type="button"
                     class="btn-close btn-close-white"
                     data-bs-dismiss="modal"></button>
               </div>

               <div class="modal-body">

                  <input type="hidden"
                     name="idCidade"
                     id="modal-idCidade">

                  <div class="row g-3">

                     <div class="col-md-6">
                        <label class="form-label">Cidade</label>
                        <input type="text"
                           name="cidade"
                           id="modal-cidade"
                           class="form-control"
                           required>
                     </div>

                     <div class="col-md-6">
                        <label class="form-label">Estado</label>

                        <select name="estadoId"
                           id="modal-estado"
                           class="form-select"
                           required>

                           <?php
                           $sqlEstado = "SELECT idEstado, nome FROM estado ORDER BY nome";
                           $resEstado = mysqli_query($conn, $sqlEstado);

                           while ($estado = mysqli_fetch_assoc($resEstado)) {
                              echo "<option value='{$estado['idEstado']}'>{$estado['nome']}</option>";
                           }
                           ?>

                        </select>

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

   <!-- Sidebar toggle (se você usa esse padrão global) -->
   <script src="../assets/js/sidebar.js"></script>
   <script>
      document.addEventListener("DOMContentLoaded", function() {

         function carregarTabela(pagina = 1) {
            fetch("tabela.php?pagina=" + pagina)
               .then(res => res.text())
               .then(data => {
                  document.getElementById("tabela-container").innerHTML = data;
               });
         }

         function carregarPaginacao() {
            fetch("buscarCidadesPaginacao.php")
               .then(res => res.text())
               .then(data => {
                  document.getElementById("paginacao").innerHTML = data;
               });
         }

         // clique na paginação
         document.addEventListener("click", function(e) {
            if (e.target.classList.contains("pagina-link")) {
               e.preventDefault();

               const pagina = e.target.getAttribute("data-pagina");
               carregarTabela(pagina);
            }
         });

         carregarTabela();
         carregarPaginacao();

      });
   </script>

   <script>
      document.addEventListener('DOMContentLoaded', function() {

         const modalExcluir = document.getElementById('modalExcluir');

         modalExcluir.addEventListener('show.bs.modal', function(event) {

            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');

            document.getElementById('btnExcluirConfirmado')
               .setAttribute('href', 'excluir.php?idCidade=' + id);

         });

      });
   </script>

   <script>
      document.addEventListener('DOMContentLoaded', function() {

         const modalEditar = document.getElementById('modalEditar');

         modalEditar.addEventListener('show.bs.modal', function(event) {

            const button = event.relatedTarget;

            modalEditar.querySelector('#modal-idCidade').value =
               button.getAttribute('data-id');

            modalEditar.querySelector('#modal-cidade').value =
               button.getAttribute('data-cidade');

            modalEditar.querySelector('#modal-estado').value =
               button.getAttribute('data-estado');

         });

      });
   </script>
</body>

</html>