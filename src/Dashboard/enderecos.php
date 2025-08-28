<?php
   session_start();
   include("../Login/verificaLogin.php");
   include("../conexao/conexao.php");
   ?>
<!doctype html>
<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta http-equiv="Content-Language" content="en">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <title>Endereço - Dash</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
      <meta name="description" content="Build whatever layout you need with our Architect framework.">
      <meta name="msapplication-tap-highlight" content="no">
      <link href="../Dashboard/main.css" rel="stylesheet">
      <style>
         .modal {
         z-index: 2000; /* garante que fique acima de tudo */
         }
         .modal-backdrop {
         z-index: 1990;
         }
      </style>
   </head>
   <body>
      <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
      <?php include("../templates/headerDash.php");?>
     
      <div class="app-main">
         <div class="app-sidebar sidebar-shadow">
            <div class="app-header__logo">
               <div class="logo-src"></div>
               <div class="header__pane ml-auto">
                  <div>
                     <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                     <span class="hamburger-box">
                     <span class="hamburger-inner"></span>
                     </span>
                     </button>
                  </div>
               </div>
            </div>
            <div class="app-header__mobile-menu">
               <div>
                  <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                  <span class="hamburger-box">
                  <span class="hamburger-inner"></span>
                  </span>
                  </button>
               </div>
            </div>
            <div class="app-header__menu">
               <span>
               <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
               <span class="btn-icon-wrapper">
               <i class="fa fa-ellipsis-v fa-w-6"></i>
               </span>
               </button>
               </span>
            </div>
            <?php include("Sidebar/sidebar.php");?>
         </div>
         <!--pare aqui-->
         <div class="app-main__outer">
            <div class="app-main__inner">
               <div class="app-page-title">
                  <div class="page-title-wrapper">
                     <div class="page-title-heading">
                        <div class="page-title-icon">
                           <i class="pe-7s-graph text-success">
                           </i>
                        </div>
                        <div>
                           Formulário de cadastro de Endereços
                           <div class="page-title-subheading">Visualize e cadastre novos endereços aqui.
                           </div>
                        </div>
                     </div>
                     <div class="page-title-actions">
                        <div class="d-inline-block dropdown">
                           <a href="../pdfs/enderecopdf.php">
                           <button type="button" aria-haspopup="true" aria-expanded="false" class="btn-shadow btn btn-info">
                           <span class="btn-icon-wrapper pr-2 opacity-7">
                           <i class="fas fa-file-pdf"></i>
                           </span>PDF
                           </button></a>
                        </div>
                     </div>
                  </div>
               </div>
               <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                  <li class="nav-item">
                     <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                     <span>Listar Endereços</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
                     <span>ADD Novo Endereço</span>
                     </a>
                  </li>
               </ul>
               <div class="tab-content">
                  <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                     <div class="main-card mb-3 card">
                        <div class="card-body">
                           <h5 class="card-title">Tabela de Endereços</h5>
                           <div class="col-lg-12">
                              <?php include("../Listar/tabelas/tabelaEndereco.php");?>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
                     <div class="main-card mb-3 card">
                        <div class="card-body">
                           <h5 class="card-title">Formulário de Cadastro de Endereco</h5>
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
                           <!-- Aqui comeca o formulario-->
                           <form action="../Cadastrar/cadastroEndereco.php" method="POST">
                              <div class="form-row">
                                 <div class="col-md-3">
                                    <div class="position-relative row form-group">
                                       <label for="exampleEmail" class="col-sm-3 col-form-label">Bairro</label>
                                       <div class="col-sm-10"><input required name="bairro" placeholder="Informe seu bairro" type="text" class="form-control"></div>
                                    </div>
                                    <div class="position-relative row form-group">
                                       <label for="exampleEmail" class="col-sm-3 col-form-label">Rua</label>
                                       <div class="col-sm-10"><input required name="rua" placeholder="Informe sua rua" type="text" class="form-control"></div>
                                    </div>
                                    <div class="position-relative row form-group">
                                       <label for="exampleEmail" class="col-sm-3 col-form-label">Numero</label>
                                       <div class="col-sm-10"><input maxlength="14" name="numero" placeholder="Informe seu numero ex:(55)55 9 9323-9923" type="text" class="form-control"></div>
                                    </div>
                                    <div class="position-relative row form-group">
                                       <label for="exampleEmail" class="col-sm-3 col-form-label">Telefone</label>
                                       <div class="col-sm-10"><input  maxlength="14" name="telefone" placeholder="Informe seu telefone" type="text" class="form-control"></div>
                                    </div>
                                    <!--
                                       <div class="position-relative row form-group">
                                          <label for="exampleEmail" class="col-sm-2 col-form-label">Estado</label>
                                          <div class="col-sm-10"><input required name="idEstado" placeholder="Informe seu idEstado" type="text" class="form-control"></div>
                                       </div>
                                       
                                       <div class="position-relative row form-group">
                                          <label for="exampleEmail" class="col-sm-2 col-form-label">Pais</label>
                                          <div class="col-sm-10"><input required name="idPais" placeholder="Informe seu idPais)" type="text" class="form-control"></div>
                                       </div>
                                       -->
                                    <div class="position-relative form-group">
                                       <label>Estado</label>
                                       <select name="estadoId" id="estadoSelect" class="custom-select">
                                          <option value="">Selecione o Estado</option>
                                          <?php 
                                             $resultEstado = "SELECT * FROM estado ORDER BY nome";
                                             $resultadoEstado = mysqli_query($conn, $resultEstado);
                                             while($rowEstado = mysqli_fetch_assoc($resultadoEstado)) { ?>
                                          <option value="<?php echo $rowEstado['idEstado']; ?>">
                                             <?php echo $rowEstado['nome']; ?>
                                          </option>
                                          <?php } ?>
                                       </select>
                                    </div>
                                    <div class="position-relative form-group">
                                       <label>Cidade</label>
                                       <select name="cidadeId" id="cidadeSelect" class="custom-select">
                                          <option value="">Selecione a cidade</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="position-relative row form-check">
                                    <div class="col-sm-10 offset-sm-2">
                                       <button type="submit" class="mb-2 mr-2 btn btn-primary">Cadastrar</button>
                                    </div>
                                 </div>
                           </form>
                           <!-- Aqui termina o formulario -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script type="text/javascript" src="../Dashboard/assets/scripts/main.js"></script>
<!-- Modal de exclusão -->
<div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="modalExcluirLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalExcluirLabel">Confirmar Exclusão</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        Tem certeza que deseja excluir este endereço?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <a id="btnExcluirConfirmado" href="#" class="btn btn-danger">Excluir</a>
      </div>
    </div>
  </div>
</div>

      <script>
         document.getElementById('estadoSelect').addEventListener('change', function() {
             var estadoId = this.value;
             var cidadeSelect = document.getElementById('cidadeSelect');
         
             // Limpa o select e coloca mensagem de carregando
             cidadeSelect.innerHTML = '<option>Carregando...</option>';
         
             if(estadoId){
                 var xhr = new XMLHttpRequest();
                 xhr.open('GET', '../buscar/buscarCidades.php?estadoId=' + estadoId, true);
                 xhr.onload = function(){
                     if(this.status == 200){
                         cidadeSelect.innerHTML = this.responseText;
                     }
                 }
                 xhr.send();
             } else {
                 cidadeSelect.innerHTML = '<option value="">Selecione a cidade</option>';
             }
         });
      </script>
      <!-- Bootstrap 5 JS (inclui Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

   </body>
</html>
