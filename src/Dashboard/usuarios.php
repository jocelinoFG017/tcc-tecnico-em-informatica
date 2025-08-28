<?php
   session_start();
   include("../Login/verificaLogin.php");
   ?>
<!doctype html>
<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta http-equiv="Content-Language" content="en">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <title>Usuários - Dash</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
      <meta name="description" content="Build whatever layout you need with our Architect framework.">
      <meta name="msapplication-tap-highlight" content="no">
      <link href="./main.css" rel="stylesheet">
    
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
         <div class="ui-theme-settings">
            
            <i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
            </button>
            <div class="theme-settings__inner">
               <div class="scrollbar-container">
                  <div class="theme-settings__options-wrapper">
                     <h3 class="themeoptions-heading">Layout Options
                     </h3>
                     <div class="p-3">
                        <ul class="list-group">
                           <li class="list-group-item">
                              <div class="widget-content p-0">
                                 <div class="widget-content-wrapper">
                                    <div class="widget-content-left mr-3">
                                       <div class="switch has-switch switch-container-class" data-class="fixed-header">
                                          <div class="switch-animate switch-on">
                                             <input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="widget-content-left">
                                       <div class="widget-heading">Fixed Header
                                       </div>
                                       <div class="widget-subheading">Makes the header top fixed, always visible!
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </li>
                           <li class="list-group-item">
                              <div class="widget-content p-0">
                                 <div class="widget-content-wrapper">
                                    <div class="widget-content-left mr-3">
                                       <div class="switch has-switch switch-container-class" data-class="fixed-sidebar">
                                          <div class="switch-animate switch-on">
                                             <input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="widget-content-left">
                                       <div class="widget-heading">Fixed Sidebar
                                       </div>
                                       <div class="widget-subheading">Makes the sidebar left fixed, always visible!
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </li>
                           <li class="list-group-item">
                              <div class="widget-content p-0">
                                 <div class="widget-content-wrapper">
                                    <div class="widget-content-left mr-3">
                                       <div class="switch has-switch switch-container-class" data-class="fixed-footer">
                                          <div class="switch-animate switch-off">
                                             <input type="checkbox" data-toggle="toggle" data-onstyle="success">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="widget-content-left">
                                       <div class="widget-heading">Fixed Footer
                                       </div>
                                       <div class="widget-subheading">Makes the app footer bottom fixed, always visible!
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </li>
                        </ul>
                     </div>
                     <h3 class="themeoptions-heading">
                        <div>
                           Header Options
                        </div>
                        <button type="button" class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-header-cs-class" data-class="">
                        Restore Default
                        </button>
                     </h3>
                     <div class="p-3">
                        <ul class="list-group">
                           <li class="list-group-item">
                              <h5 class="pb-2">Choose Color Scheme
                              </h5>
                              
                           </li>
                        </ul>
                     </div>
                     <h3 class="themeoptions-heading">
                        <div>Sidebar Options</div>
                        <button type="button" class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-sidebar-cs-class" data-class="">
                        Restore Default
                        </button>
                     </h3>
                     <div class="p-3">
                        <ul class="list-group">
                           <li class="list-group-item">
                              <h5 class="pb-2">Choose Color Scheme
                              </h5>
                           </li>
                        </ul>
                     </div>
                     <h3 class="themeoptions-heading">
                        <div>Main Content Options</div>
                        <button type="button" class="btn-pill btn-shadow btn-wide ml-auto active btn btn-focus btn-sm">Restore Default
                        </button>
                     </h3>
                     <div class="p-3">
                        <ul class="list-group">
                           <li class="list-group-item">
                              <h5 class="pb-2">Page Section Tabs
                              </h5>
                              <div class="theme-settings-swatches">
                                 <div role="group" class="mt-2 btn-group">
                                    <button type="button" class="btn-wide btn-shadow btn-primary btn btn-secondary switch-theme-class" data-class="body-tabs-line">
                                    Line
                                    </button>
                                    <button type="button" class="btn-wide btn-shadow btn-primary active btn btn-secondary switch-theme-class" data-class="body-tabs-shadow">
                                    Shadow
                                    </button>
                                 </div>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
               <div class="app-header__logo">
                  <div class="logo-src">LOGO </div>
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
            <div class="app-main__outer">
               <div class="app-main__inner">
                  <div class="app-page-title">
                     <div class="page-title-wrapper">
                        <div class="page-title-heading">
                           <div class="page-title-icon">
                              <i class="pe-7s-user text-success">
                              </i>
                           </div>
                           <div>
                              Formulário de cadastro de usuários
                              <div class="page-title-subheading">Visualize e cadastre novos usuários aqui. </div>
                           </div>
                        </div>
                        <div class="page-title-actions">
                           <div class="d-inline-block dropdown">
                              <a href="../pdfs/usuariopdf.php" target="_blank">
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
                        <span>Listar Usuários</span>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
                        <span>Adicionar Usuário</span>
                        </a>
                     </li>
                   
                  </ul>
                  <div class="tab-content">
                     <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                        <div class="main-card mb-3 card">
                           <div class="card-body">
                              <h5 class="card-title">Tabela de Usuários</h5>
                              <div class="col-lg-12">
                                 <?php include("../Listar/tabelaUsuario.php");?>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
                        <div class="main-card mb-3 card">
                           <div class="card-body">
                              <h5 class="card-title">Formulário de Cadastro de Usuário</h5>
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
                              <form action="../Cadastrar/cadastroUsuario.php" method="POST">
                                 <div class="position-relative row form-group">
                                    <label for="exampleEmail" class="col-sm-2 col-form-label">Nome: </label>
                                    <div class="col-sm-10"><input required name="nome" id="nome" placeholder="Nome(ex:Joao da silva)" type="text" class="form-control"></div>
                                 </div>
                                 <div class="position-relative row form-group">
                                    <label for="exampleEmail" class="col-sm-2 col-form-label">Email:</label>
                                    <div class="col-sm-10"><input required name="login" id="login" placeholder="Email (ex:joaoSilva@email.com)" type="text" class="form-control"></div>
                                 </div>
                                 <div class="position-relative row form-group">
                                    <label for="examplePassword" class="col-sm-2 col-form-label">Senha:</label>
                                    <div class="col-sm-10"><input required name="senha" id="senha" placeholder="Senha(faça uma senha forte com numeros e letras)" type="password" class="form-control"></div>
                                 </div>
                                 <div class="position-relative row form-check">
                                    <div class="col-sm-10 offset-sm-2">
                                       <button type="submit" class="mb-2 mr-2 btn btn-primary">Cadastrar</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      
      <script type="text/javascript" src="./assets/scripts/main.js"></script>

<!-- Modal de exclusão (global) -->
<div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="modalExcluirLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content rounded-3 shadow">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="modalExcluirLabel">Confirmar exclusão</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        Tem certeza que deseja excluir este usuário? Esta ação não poderá ser desfeita.
      </div>
      <div class="modal-footer d-flex justify-content-between">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <a id="btnExcluirConfirmado" href="#" class="btn btn-danger">Excluir</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal Editar Usuário -->
<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="formEditarUsuario" method="POST" action="../crud/editar/salvarUsuario.php">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditarLabel">Editar Usuário</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="idUsuario" id="modal-idUsuario">

          <div class="mb-3">
            <label for="modal-nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" id="modal-nome" required>
          </div>

          <div class="mb-3">
            <label for="modal-login" class="form-label">Login</label>
            <input type="email" name="login" class="form-control" id="modal-login" required>
          </div>

          <div class="mb-3">
            <label for="modal-senha" class="form-label">Senha (deixe em branco para não alterar)</label>
            <input type="password" name="senha" class="form-control" id="modal-senha">
          </div>

          <div class="mb-3">
            <label for="modal-nivel" class="form-label">Nível de Acesso</label>
            <select name="fk_idNivelAcesso" class="form-select" id="modal-nivel" required>
              <?php
              $sqlNivel = "SELECT * FROM nivelacesso";
              $resNivel = mysqli_query($conn, $sqlNivel);
              while ($nivel = mysqli_fetch_assoc($resNivel)) {
                  echo "<option value='{$nivel['idNivelAcesso']}'>{$nivel['cargo']}</option>";
              }
              ?>
            </select>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


   </body>
</html>