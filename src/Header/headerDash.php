<div class="app-header header-shadow">
   <!--
      <div class="app-header__logo">
      <h6>Logo</h6>
      <div class="header__pane ml-auto">
         <div>
            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
            <span class="hamburger-box">
            <span class="hamburger-inner"></span>
            </span>
            </button>
         </div>
      </div>
   </div> -->
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
   <div class="app-header__content">
      <div class="app-header-left">
         <ul class="header-menu nav">
            <li class="nav-item">
               <a href="javascript:void(0);" class="nav-link">
                  <i class="nav-link-icon fa fa-database"> </i>
                  <h5><?php echo $_SESSION['login'];?></h5>
               </a>
            </li>
         </ul>
      </div>
      <div class="app-header-right">
         <div class="header-btn-lg pr-0">
            <div class="widget-content p-0">
               <div class="widget-content-wrapper">
                  <div class="widget-content-left">
                     <div class="btn-group">
                        <button type="button" tabindex="0" class="dropdown-item"><a href="sair.php">Sair</a></button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>