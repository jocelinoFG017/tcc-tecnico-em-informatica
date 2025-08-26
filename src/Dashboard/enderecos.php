

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
      <title>Endereco - Dash</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
      <meta name="description" content="Build whatever layout you need with our Architect framework.">
      <meta name="msapplication-tap-highlight" content="no">
      <!--
         =========================================================
         * ArchitectUI HTML Theme Dashboard - v1.0.0
         =========================================================
         * Product Page: https://dashboardpack.com
         * Copyright 2019 DashboardPack (https://dashboardpack.com)
         * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
         =========================================================
         * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
         -->
      <link href="../Dashboard/main.css" rel="stylesheet">
   </head>
   <body>
      <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
         <?php include("../Header/headerDash.php");?>
         <div class="ui-theme-settings">
            <button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
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
                              <div class="theme-settings-swatches">
                                 <div class="swatch-holder bg-primary switch-header-cs-class" data-class="bg-primary header-text-light">
                                 </div>
                                 <div class="swatch-holder bg-secondary switch-header-cs-class" data-class="bg-secondary header-text-light">
                                 </div>
                                 <div class="swatch-holder bg-success switch-header-cs-class" data-class="bg-success header-text-dark">
                                 </div>
                                 <div class="swatch-holder bg-info switch-header-cs-class" data-class="bg-info header-text-dark">
                                 </div>
                                 <div class="swatch-holder bg-warning switch-header-cs-class" data-class="bg-warning header-text-dark">
                                 </div>
                                 <div class="swatch-holder bg-danger switch-header-cs-class" data-class="bg-danger header-text-light">
                                 </div>
                                 <div class="swatch-holder bg-light switch-header-cs-class" data-class="bg-light header-text-dark">
                                 </div>
                                 <div class="swatch-holder bg-dark switch-header-cs-class" data-class="bg-dark header-text-light">
                                 </div>
                                 <div class="swatch-holder bg-focus switch-header-cs-class" data-class="bg-focus header-text-light">
                                 </div>
                                 <div class="swatch-holder bg-alternate switch-header-cs-class" data-class="bg-alternate header-text-light">
                                 </div>
                                 <div class="divider">
                                 </div>
                                 <div class="swatch-holder bg-vicious-stance switch-header-cs-class" data-class="bg-vicious-stance header-text-light">
                                 </div>
                                 <div class="swatch-holder bg-midnight-bloom switch-header-cs-class" data-class="bg-midnight-bloom header-text-light">
                                 </div>
                                 <div class="swatch-holder bg-night-sky switch-header-cs-class" data-class="bg-night-sky header-text-light">
                                 </div>
                                 <div class="swatch-holder bg-slick-carbon switch-header-cs-class" data-class="bg-slick-carbon header-text-light">
                                 </div>
                                 <div class="swatch-holder bg-asteroid switch-header-cs-class" data-class="bg-asteroid header-text-light">
                                 </div>
                                 <div class="swatch-holder bg-royal switch-header-cs-class" data-class="bg-royal header-text-light">
                                 </div>
                                 <div class="swatch-holder bg-warm-flame switch-header-cs-class" data-class="bg-warm-flame header-text-dark">
                                 </div>
                                 <div class="swatch-holder bg-night-fade switch-header-cs-class" data-class="bg-night-fade header-text-dark">
                                 </div>
                                 <div class="swatch-holder bg-sunny-morning switch-header-cs-class" data-class="bg-sunny-morning header-text-dark">
                                 </div>
                                 <div class="swatch-holder bg-tempting-azure switch-header-cs-class" data-class="bg-tempting-azure header-text-dark">
                                 </div>
                                 <div class="swatch-holder bg-amy-crisp switch-header-cs-class" data-class="bg-amy-crisp header-text-dark">
                                 </div>
                                 <div class="swatch-holder bg-heavy-rain switch-header-cs-class" data-class="bg-heavy-rain header-text-dark">
                                 </div>
                                 <div class="swatch-holder bg-mean-fruit switch-header-cs-class" data-class="bg-mean-fruit header-text-dark">
                                 </div>
                                 <div class="swatch-holder bg-malibu-beach switch-header-cs-class" data-class="bg-malibu-beach header-text-light">
                                 </div>
                                 <div class="swatch-holder bg-deep-blue switch-header-cs-class" data-class="bg-deep-blue header-text-dark">
                                 </div>
                                 <div class="swatch-holder bg-ripe-malin switch-header-cs-class" data-class="bg-ripe-malin header-text-light">
                                 </div>
                                 <div class="swatch-holder bg-arielle-smile switch-header-cs-class" data-class="bg-arielle-smile header-text-light">
                                 </div>
                                 <div class="swatch-holder bg-plum-plate switch-header-cs-class" data-class="bg-plum-plate header-text-light">
                                 </div>
                                 <div class="swatch-holder bg-happy-fisher switch-header-cs-class" data-class="bg-happy-fisher header-text-dark">
                                 </div>
                                 <div class="swatch-holder bg-happy-itmeo switch-header-cs-class" data-class="bg-happy-itmeo header-text-light">
                                 </div>
                                 <div class="swatch-holder bg-mixed-hopes switch-header-cs-class" data-class="bg-mixed-hopes header-text-light">
                                 </div>
                                 <div class="swatch-holder bg-strong-bliss switch-header-cs-class" data-class="bg-strong-bliss header-text-light">
                                 </div>
                                 <div class="swatch-holder bg-grow-early switch-header-cs-class" data-class="bg-grow-early header-text-light">
                                 </div>
                                 <div class="swatch-holder bg-love-kiss switch-header-cs-class" data-class="bg-love-kiss header-text-light">
                                 </div>
                                 <div class="swatch-holder bg-premium-dark switch-header-cs-class" data-class="bg-premium-dark header-text-light">
                                 </div>
                                 <div class="swatch-holder bg-happy-green switch-header-cs-class" data-class="bg-happy-green header-text-light">
                                 </div>
                              </div>
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
                              <div class="theme-settings-swatches">
                                 <div class="swatch-holder bg-primary switch-sidebar-cs-class" data-class="bg-primary sidebar-text-light">
                                 </div>
                                 <div class="swatch-holder bg-secondary switch-sidebar-cs-class" data-class="bg-secondary sidebar-text-light">
                                 </div>
                                 <div class="swatch-holder bg-success switch-sidebar-cs-class" data-class="bg-success sidebar-text-dark">
                                 </div>
                                 <div class="swatch-holder bg-info switch-sidebar-cs-class" data-class="bg-info sidebar-text-dark">
                                 </div>
                                 <div class="swatch-holder bg-warning switch-sidebar-cs-class" data-class="bg-warning sidebar-text-dark">
                                 </div>
                                 <div class="swatch-holder bg-danger switch-sidebar-cs-class" data-class="bg-danger sidebar-text-light">
                                 </div>
                                 <div class="swatch-holder bg-light switch-sidebar-cs-class" data-class="bg-light sidebar-text-dark">
                                 </div>
                                 <div class="swatch-holder bg-dark switch-sidebar-cs-class" data-class="bg-dark sidebar-text-light">
                                 </div>
                                 <div class="swatch-holder bg-focus switch-sidebar-cs-class" data-class="bg-focus sidebar-text-light">
                                 </div>
                                 <div class="swatch-holder bg-alternate switch-sidebar-cs-class" data-class="bg-alternate sidebar-text-light">
                                 </div>
                                 <div class="divider">
                                 </div>
                                 <div class="swatch-holder bg-vicious-stance switch-sidebar-cs-class" data-class="bg-vicious-stance sidebar-text-light">
                                 </div>
                                 <div class="swatch-holder bg-midnight-bloom switch-sidebar-cs-class" data-class="bg-midnight-bloom sidebar-text-light">
                                 </div>
                                 <div class="swatch-holder bg-night-sky switch-sidebar-cs-class" data-class="bg-night-sky sidebar-text-light">
                                 </div>
                                 <div class="swatch-holder bg-slick-carbon switch-sidebar-cs-class" data-class="bg-slick-carbon sidebar-text-light">
                                 </div>
                                 <div class="swatch-holder bg-asteroid switch-sidebar-cs-class" data-class="bg-asteroid sidebar-text-light">
                                 </div>
                                 <div class="swatch-holder bg-royal switch-sidebar-cs-class" data-class="bg-royal sidebar-text-light">
                                 </div>
                                 <div class="swatch-holder bg-warm-flame switch-sidebar-cs-class" data-class="bg-warm-flame sidebar-text-dark">
                                 </div>
                                 <div class="swatch-holder bg-night-fade switch-sidebar-cs-class" data-class="bg-night-fade sidebar-text-dark">
                                 </div>
                                 <div class="swatch-holder bg-sunny-morning switch-sidebar-cs-class" data-class="bg-sunny-morning sidebar-text-dark">
                                 </div>
                                 <div class="swatch-holder bg-tempting-azure switch-sidebar-cs-class" data-class="bg-tempting-azure sidebar-text-dark">
                                 </div>
                                 <div class="swatch-holder bg-amy-crisp switch-sidebar-cs-class" data-class="bg-amy-crisp sidebar-text-dark">
                                 </div>
                                 <div class="swatch-holder bg-heavy-rain switch-sidebar-cs-class" data-class="bg-heavy-rain sidebar-text-dark">
                                 </div>
                                 <div class="swatch-holder bg-mean-fruit switch-sidebar-cs-class" data-class="bg-mean-fruit sidebar-text-dark">
                                 </div>
                                 <div class="swatch-holder bg-malibu-beach switch-sidebar-cs-class" data-class="bg-malibu-beach sidebar-text-light">
                                 </div>
                                 <div class="swatch-holder bg-deep-blue switch-sidebar-cs-class" data-class="bg-deep-blue sidebar-text-dark">
                                 </div>
                                 <div class="swatch-holder bg-ripe-malin switch-sidebar-cs-class" data-class="bg-ripe-malin sidebar-text-light">
                                 </div>
                                 <div class="swatch-holder bg-arielle-smile switch-sidebar-cs-class" data-class="bg-arielle-smile sidebar-text-light">
                                 </div>
                                 <div class="swatch-holder bg-plum-plate switch-sidebar-cs-class" data-class="bg-plum-plate sidebar-text-light">
                                 </div>
                                 <div class="swatch-holder bg-happy-fisher switch-sidebar-cs-class" data-class="bg-happy-fisher sidebar-text-dark">
                                 </div>
                                 <div class="swatch-holder bg-happy-itmeo switch-sidebar-cs-class" data-class="bg-happy-itmeo sidebar-text-light">
                                 </div>
                                 <div class="swatch-holder bg-mixed-hopes switch-sidebar-cs-class" data-class="bg-mixed-hopes sidebar-text-light">
                                 </div>
                                 <div class="swatch-holder bg-strong-bliss switch-sidebar-cs-class" data-class="bg-strong-bliss sidebar-text-light">
                                 </div>
                                 <div class="swatch-holder bg-grow-early switch-sidebar-cs-class" data-class="bg-grow-early sidebar-text-light">
                                 </div>
                                 <div class="swatch-holder bg-love-kiss switch-sidebar-cs-class" data-class="bg-love-kiss sidebar-text-light">
                                 </div>
                                 <div class="swatch-holder bg-premium-dark switch-sidebar-cs-class" data-class="bg-premium-dark sidebar-text-light">
                                 </div>
                                 <div class="swatch-holder bg-happy-green switch-sidebar-cs-class" data-class="bg-happy-green sidebar-text-light">
                                 </div>
                              </div>
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
                                 <?php include("../Listar/tabelaEndereco.php");?>
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
                                    <div class="col-sm-10"><input required name="numero" placeholder="Informe seu numero ex:(55)55 9 9323-9923" type="text" class="form-control"></div>
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
                                    <div class="col-md-5">
                                                    <div class="position-relative form-group"><label required class="">Cidade</label><input name="cidadeId" type="text" class="form-control"></div>
                                                </div>
                                                
                                                <div class="position-relative form-group">
                                                       <label class="">Estado</label>
                                                       <select type="select" name="estadoId" class="custom-select">
                                          <option>Selecione o Estado</option>
                                          <?php 
                                             $resultEstado = "SELECT * FROM estado";
                                             $resultadoEstado = mysqli_query($conn, $resultEstado);
                                             while($rowEstado = mysqli_fetch_assoc($resultadoEstado)) { ?>

                                                <option value="<?php echo $rowEstado['idEstado']; ?>"><?php echo $rowEstado['nome'];?>
                                                </option><?php 
                                            }
                                          ?>
                                      </select>
                                                      </div>
                                                </div>
                                               
                                          
                 

                                 <div class="position-relative row form-group">
                                    <label for="exampleEmail" class="col-sm-3 col-form-label">Telefone</label>
                                    <div class="col-sm-10"><input required name="telefone" placeholder="Informe seu telefone" type="text" class="form-control"></div>
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
   </body>
</html>

