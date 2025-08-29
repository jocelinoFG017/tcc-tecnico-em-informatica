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
      <title>Artigos - Dash</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
      <meta name="description" content="Build whatever layout you need with our Architect framework.">
      <meta name="msapplication-tap-highlight" content="no">
      <link href="../Dashboard/main.css" rel="stylesheet">
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
                           Formulário de cadastro de Artigos
                           <div class="page-title-subheading">Visualize e cadastre novos artigos aqui.
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
                     <span>Listar Artigos</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
                     <span>Adicionar Artigo</span>
                     </a>
                  </li>
               </ul>
               <div class="tab-content">
                  <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                     <div class="main-card mb-3 card">
                        <div class="card-body">
                           <h5 class="card-title">Tabela de Artigos</h5>
                           <div class="col-lg-12">
                              <?php include("../Listar/tabelaArtigo.php");?>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
                     <div class="main-card mb-3 card">
                        <div class="card-body">
                           <h5 class="card-title">Formulário de Cadastro de Artigos</h5>
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
                           <form action="../Cadastrar/cadastroArtigo.php" method="POST" enctype="multipart/form-data">
                              <div class="form-row">
                                 <div class="col-md-8">
                                    
                                    <div class="position-relative row form-group">
                                       <label for="exampleEmail" class="col-sm-3 col-form-label">Título</label>
                                       <div class="col-sm-10"><input required name="titulo" id ="titulo" placeholder="Informe o titulo de seu artigo" type="text" class="form-control"></div>
                                    </div>
                                    <div class="position-relative row form-group">
                                       <label for="exampleEmail" class="col-sm-3 col-form-label">Texto</label>
                                       <div class="col-sm-10">
                                          <textarea name="texto" id="texto" placeholder="Escreva aqui seu artigo" class="form-control" rows="8"></textarea>
                                       </div>
                                    </div>
                                    <div class="position-relative row form-group">
                                       <label for="exampleEmail" class="col-sm-3 col-form-label">Autor</label>
                                       <div class="col-sm-10"><input required name="autor" id ="autor" placeholder="Informe o autor" type="text" class="form-control"></div>
                                    </div>
                                    <div class="position-relative row form-group">
                                       <label for="exampleEmail" class="col-sm-3 col-form-label">TAG</label>
                                       <div class="col-sm-10"><input required name="tag" id ="tag" placeholder="Informe a tag" type="text" class="form-control"></div>
                                    </div>
                                     <div class="position-relative row form-group">
                                       <label for="exampleEmail" class="col-sm-3 col-form-label">TAG 2</label>
                                       <div class="col-sm-10"><input name="tag2" id ="tag2" placeholder="Informe a tag2" type="text" class="form-control"></div>
                                    </div>
                                     <div class="position-relative row form-group">
                                       <label for="exampleEmail" class="col-sm-3 col-form-label">TAG 3</label>
                                       <div class="col-sm-10"><input name="tag3" id ="tag3" placeholder="Informe a tag3" type="text" class="form-control"></div>
                                    </div>
                                  <div class="position-relative row form-group ">
                                    <label for="exampleFile" class="col-sm-2 col-form-label">Imagem</label>
                                    <div class="col-sm-10"><input name="foto" id="foto" type="file" class="form-control-file">
                                       <small class="form-text text-muted ">Procure e anexe a imagem aqui</small>
                                    </div>
                                 </div>
                                    <div class="col-sm-10 offset-sm-2">
                                       <button type="submit" name="cadastrar" class="mb-2 mr-2 btn btn-primary">Cadastrar</button>
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
      <script type="text/javascript" src="../Dashboard/assets/scripts/main.js"></script>]

      <script src="../assets/ckeditor/build/ckeditor.js"></script>
      <script>
      ClassicEditor
         .create(document.querySelector('#texto'))
         .catch(error => {
            console.error(error);
         });
      </script>
   </body>
</html>