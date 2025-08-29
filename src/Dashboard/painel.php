<?php
   include("../Login/verificaLogin.php"); 
   include("../conexao/conexao.php");
   
   // Verifica se é administrador
   if(!isset($_SESSION['nomeNivelAcesso']) || strtolower($_SESSION['nomeNivelAcesso']) != 'administrador'){
       header('Location: ../Login/loginIndex.php');
       exit();
   }
   
   $sql = "SELECT COUNT(*) AS total FROM usuario";
   $result = mysqli_query($conn, $sql);
   $totalUsuarios = mysqli_fetch_assoc($result);
   ?>
<!doctype html>
<html lang="ptbr">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta http-equiv="Content-Language" content="en">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <title>Analytics Dashboard - This is an example dashboard created using build-in elements and components.</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
      <meta name="description" content="This is an example dashboard created using build-in elements and components.">
      <meta name="msapplication-tap-highlight" content="no">
      <link href="./main.css" rel="stylesheet">
   </head>
   <body>
      <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
      <?php include("../templates/headerDash.php"); ?>
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
            <?php include("Sidebar/sidebar.php"); ?>
         </div>
         <div class="app-main__outer">
            <div class="app-main__inner">
               <div class="app-page-title">
                  <div class="page-title-wrapper">
                     <div class="page-title-heading">
                        <div class="page-title-icon">
                           <i class="pe-7s-car icon-gradient bg-mean-fruit">
                           </i>
                        </div>
                        <div>
                           Dashboard Analítica
                           <div class="page-title-subheading">Aqui estão reunidos todos os dados principais do sistema.
                           </div>
                        </div>
                     </div>
                     <div class="page-title-actions">
                        <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                        <i class="fa fa-star"></i>
                        </button>
                        <div class="d-inline-block dropdown">
                           <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                           <span class="btn-icon-wrapper pr-2 opacity-7">
                           <i class="fa fa-business-time fa-w-20"></i>
                           </span>
                           PDF
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6 col-xl-4">
                     <div class="card mb-3 widget-content bg-midnight-bloom">
                        <div class="widget-content-wrapper text-white">
                           <div class="widget-content-left">
                              <div class="widget-heading">Total de usuários</div>
                           </div>
                           <div class="widget-content-right">
                              <div class="widget-numbers text-white"><span> <?php echo $totalUsuarios['total'];?></span></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-xl-4">
                     <div class="card mb-3 widget-content bg-arielle-smile">
                        <div class="widget-content-wrapper text-white">
                           <div class="widget-content-left">
                              <div class="widget-heading">Clients</div>
                              <div class="widget-subheading">Total Clients Profit</div>
                           </div>
                           <div class="widget-content-right">
                              <div class="widget-numbers text-white"><span>$ 568</span></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-xl-4">
                     <div class="card mb-3 widget-content bg-grow-early">
                        <div class="widget-content-wrapper text-white">
                           <div class="widget-content-left">
                              <div class="widget-heading">Followers</div>
                              <div class="widget-subheading">People Interested</div>
                           </div>
                           <div class="widget-content-right">
                              <div class="widget-numbers text-white"><span>46%</span></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
                     <div class="card mb-3 widget-content bg-premium-dark">
                        <div class="widget-content-wrapper text-white">
                           <div class="widget-content-left">
                              <div class="widget-heading">Products Sold</div>
                              <div class="widget-subheading">Revenue streams</div>
                           </div>
                           <div class="widget-content-right">
                              <div class="widget-numbers text-warning"><span>$14M</span></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12 col-lg-6">
                     <div class="mb-3 card">
                        <div class="card-header-tab card-header-tab-animation card-header">
                           <div class="card-header-title">
                              <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                              Artigos Publicados
                           </div>
                           <ul class="nav">
                              <li class="nav-item"><a href="javascript:void(0);" class="active nav-link">Last</a></li>
                              <li class="nav-item"><a href="javascript:void(0);" class="nav-link second-tab-toggle">Current</a></li>
                           </ul>
                        </div>
                        <div class="card-body">
                           <div class="tab-content">
                              <div class="tab-pane fade show active" id="tabs-eg-77">
                                 <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                                    <div class="widget-chat-wrapper-outer">
                                       <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                          <canvas id="canvas"></canvas>
                                       </div>
                                    </div>
                                 </div>
                                 <h6 class="text-muted text-uppercase font-size-md opacity-5 font-weight-normal">Top Authors</h6>
                                 <div class="scroll-area-sm">
                                    <div class="scrollbar-container">
                                       <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                                          <li class="list-group-item">
                                             <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                   <div class="widget-content-left mr-3">
                                                      <img width="42" class="rounded-circle" src="assets/images/avatars/9.jpg" alt="">
                                                   </div>
                                                   <div class="widget-content-left">
                                                      <div class="widget-heading">Ella-Rose Henry</div>
                                                      <div class="widget-subheading">Web Developer</div>
                                                   </div>
                                                   <div class="widget-content-right">
                                                      <div class="font-size-xlg text-muted">
                                                         <small class="opacity-5 pr-1">$</small>
                                                         <span>129</span>
                                                         <small class="text-danger pl-2">
                                                         <i class="fa fa-angle-down"></i>
                                                         </small>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </li>
                                          <li class="list-group-item">
                                             <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                   <div class="widget-content-left mr-3">
                                                      <img width="42" class="rounded-circle" src="assets/images/avatars/5.jpg" alt="">
                                                   </div>
                                                   <div class="widget-content-left">
                                                      <div class="widget-heading">Ruben Tillman</div>
                                                      <div class="widget-subheading">UI Designer</div>
                                                   </div>
                                                   <div class="widget-content-right">
                                                      <div class="font-size-xlg text-muted">
                                                         <small class="opacity-5 pr-1">$</small>
                                                         <span>54</span>
                                                         <small class="text-success pl-2">
                                                         <i class="fa fa-angle-up"></i>
                                                         </small>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </li>
                                          <li class="list-group-item">
                                             <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                   <div class="widget-content-left mr-3">
                                                      <img width="42" class="rounded-circle" src="assets/images/avatars/4.jpg" alt="">
                                                   </div>
                                                   <div class="widget-content-left">
                                                      <div class="widget-heading">Vinnie Wagstaff</div>
                                                      <div class="widget-subheading">Java Programmer</div>
                                                   </div>
                                                   <div class="widget-content-right">
                                                      <div class="font-size-xlg text-muted">
                                                         <small class="opacity-5 pr-1">$</small>
                                                         <span>429</span>
                                                         <small class="text-warning pl-2">
                                                         <i class="fa fa-dot-circle"></i>
                                                         </small>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </li>
                                          <li class="list-group-item">
                                             <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                   <div class="widget-content-left mr-3">
                                                      <img width="42" class="rounded-circle" src="assets/images/avatars/3.jpg" alt="">
                                                   </div>
                                                   <div class="widget-content-left">
                                                      <div class="widget-heading">Ella-Rose Henry</div>
                                                      <div class="widget-subheading">Web Developer</div>
                                                   </div>
                                                   <div class="widget-content-right">
                                                      <div class="font-size-xlg text-muted">
                                                         <small class="opacity-5 pr-1">$</small>
                                                         <span>129</span>
                                                         <small class="text-danger pl-2">
                                                         <i class="fa fa-angle-down"></i>
                                                         </small>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </li>
                                          <li class="list-group-item">
                                             <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                   <div class="widget-content-left mr-3">
                                                      <img width="42" class="rounded-circle" src="assets/images/avatars/2.jpg" alt="">
                                                   </div>
                                                   <div class="widget-content-left">
                                                      <div class="widget-heading">Ruben Tillman</div>
                                                      <div class="widget-subheading">UI Designer</div>
                                                   </div>
                                                   <div class="widget-content-right">
                                                      <div class="font-size-xlg text-muted">
                                                         <small class="opacity-5 pr-1">$</small>
                                                         <span>54</span>
                                                         <small class="text-success pl-2">
                                                         <i class="fa fa-angle-up"></i>
                                                         </small>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12 col-lg-6">
                     <div class="mb-3 card">
                        <div class="card-header-tab card-header">
                           <div class="card-header-title">
                              <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"> </i>
                              Bandwidth Reports
                           </div>
                           <div class="btn-actions-pane-right">
                              <div class="nav">
                                 <a href="javascript:void(0);" class="border-0 btn-pill btn-wide btn-transition active btn btn-outline-alternate">Tab 1</a>
                                 <a href="javascript:void(0);" class="ml-1 btn-pill btn-wide border-0 btn-transition  btn btn-outline-alternate second-tab-toggle-alt">Tab 2</a>
                              </div>
                           </div>
                        </div>
                        <div class="tab-content">
                           <div class="tab-pane fade active show" id="tab-eg-55">
                              <div class="widget-chart p-3">
                                 <div style="height: 350px">
                                    <canvas id="line-chart"></canvas>
                                 </div>
                                 <div class="widget-chart-content text-center mt-5">
                                    <div class="widget-description mt-0 text-warning">
                                       <i class="fa fa-arrow-left"></i>
                                       <span class="pl-1">175.5%</span>
                                       <span class="text-muted opacity-8 pl-1">increased server resources</span>
                                    </div>
                                 </div>
                              </div>
                              <div class="pt-2 card-body">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="widget-content">
                                          <div class="widget-content-outer">
                                             <div class="widget-content-wrapper">
                                                <div class="widget-content-left">
                                                   <div class="widget-numbers fsize-3 text-muted">63%</div>
                                                </div>
                                                <div class="widget-content-right">
                                                   <div class="text-muted opacity-6">Generated Leads</div>
                                                </div>
                                             </div>
                                             <div class="widget-progress-wrapper mt-1">
                                                <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                   <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="63" aria-valuemin="0" aria-valuemax="100" style="width: 63%;"></div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="widget-content">
                                          <div class="widget-content-outer">
                                             <div class="widget-content-wrapper">
                                                <div class="widget-content-left">
                                                   <div class="widget-numbers fsize-3 text-muted">32%</div>
                                                </div>
                                                <div class="widget-content-right">
                                                   <div class="text-muted opacity-6">Submitted Tickers</div>
                                                </div>
                                             </div>
                                             <div class="widget-progress-wrapper mt-1">
                                                <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                   <div class="progress-bar bg-success" role="progressbar" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100" style="width: 32%;"></div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="widget-content">
                                          <div class="widget-content-outer">
                                             <div class="widget-content-wrapper">
                                                <div class="widget-content-left">
                                                   <div class="widget-numbers fsize-3 text-muted">71%</div>
                                                </div>
                                                <div class="widget-content-right">
                                                   <div class="text-muted opacity-6">Server Allocation</div>
                                                </div>
                                             </div>
                                             <div class="widget-progress-wrapper mt-1">
                                                <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                   <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100" style="width: 71%;"></div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="widget-content">
                                          <div class="widget-content-outer">
                                             <div class="widget-content-wrapper">
                                                <div class="widget-content-left">
                                                   <div class="widget-numbers fsize-3 text-muted">41%</div>
                                                </div>
                                                <div class="widget-content-right">
                                                   <div class="text-muted opacity-6">Generated Leads</div>
                                                </div>
                                             </div>
                                             <div class="widget-progress-wrapper mt-1">
                                                <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                   <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100" style="width: 41%;"></div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6 col-xl-4">
                     <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                           <div class="widget-content-wrapper">
                              <div class="widget-content-left">
                                 <div class="widget-heading">Total Orders</div>
                                 <div class="widget-subheading">Last year expenses</div>
                              </div>
                              <div class="widget-content-right">
                                 <div class="widget-numbers text-success">1896</div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-xl-4">
                     <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                           <div class="widget-content-wrapper">
                              <div class="widget-content-left">
                                 <div class="widget-heading">Products Sold</div>
                                 <div class="widget-subheading">Revenue streams</div>
                              </div>
                              <div class="widget-content-right">
                                 <div class="widget-numbers text-warning">$3M</div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-xl-4">
                     <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                           <div class="widget-content-wrapper">
                              <div class="widget-content-left">
                                 <div class="widget-heading">Followers</div>
                                 <div class="widget-subheading">People Interested</div>
                              </div>
                              <div class="widget-content-right">
                                 <div class="widget-numbers text-danger">45,9%</div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
                     <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                           <div class="widget-content-wrapper">
                              <div class="widget-content-left">
                                 <div class="widget-heading">Income</div>
                                 <div class="widget-subheading">Expected totals</div>
                              </div>
                              <div class="widget-content-right">
                                 <div class="widget-numbers text-focus">$147</div>
                              </div>
                           </div>
                           <div class="widget-progress-wrapper">
                              <div class="progress-bar-sm progress-bar-animated-alt progress">
                                 <div class="progress-bar bg-info" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: 54%;"></div>
                              </div>
                              <div class="progress-sub-label">
                                 <div class="sub-label-left">Expenses</div>
                                 <div class="sub-label-right">100%</div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script type="text/javascript" src="./assets/scripts/main.js"></script>
   </body>
</html>