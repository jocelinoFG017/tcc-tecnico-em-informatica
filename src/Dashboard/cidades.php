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
   <title>Dashboard - Cidades</title>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
   <link rel="stylesheet" href="styles.css">
</head>

<body>

<?php include("../templates/headerDash_r.php"); ?>
<?php include("Sidebar/sidebar.php"); ?>

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

      <a href="../pdfs/enderecopdf.php" class="btn btn-info">
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

               <?php include("../Listar/tabelas/tabelaCidade.php"); ?>
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
               <?php unset($_SESSION['statusCadastro']); endif; ?>

               <?php if (isset($_SESSION['usuarioExiste'])): ?>
                  <div class="alert alert-danger">Erro: já existe</div>
               <?php unset($_SESSION['usuarioExiste']); endif; ?>

               <form action="../Cadastrar/cadastroCidade.php" method="POST">

                  <div class="mb-3">
                     <label class="form-label">Estado</label>
                     <select name="estadoId" class="form-select" required>
                        <option value="">Selecione o Estado</option>
                        <?php 
                           $resultEstado = "SELECT * FROM estado ORDER BY nome";
                           $resultadoEstado = mysqli_query($conn, $resultEstado);
                           while($rowEstado = mysqli_fetch_assoc($resultadoEstado)) { ?>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Sidebar toggle (se você usa esse padrão global) -->
<script>
   const sidebar = document.getElementById("sidebar");
   const content = document.getElementById("content");
   const icon = document.getElementById("iconMenu");
   const btn = document.getElementById("toggleSidebar");

   let isOpen = true;

   if (btn) {
      icon.innerHTML = "☰";

      btn.addEventListener("click", function () {
         isOpen = !isOpen;
         sidebar.classList.toggle("closed");
         content.classList.toggle("expanded");
         icon.innerHTML = isOpen ? "☰" : "✖";
      });
   }
</script>

</body>
</html>