<nav class="navbar navbar-light bg-light shadow-sm px-3 border-bottom">

    <div class="d-flex align-items-center gap-2">

        <!-- LOGO -->
        <img src="../assets/imagens/home/nova_logo.png"
            alt="PetShop Logo"
            style="height: 45px;">

        <!-- HAMBÚRGUER -->
        <button id="toggleSidebar"
            class="btn btn-outline-secondary d-flex align-items-center justify-content-center"
            style="width: 42px; height: 42px;">

            <span id="iconMenu">☰</span>

        </button>

    </div>
    <!-- USER -->
    <div class="ms-auto d-flex align-items-center">

        <div class="dropdown">

            <button class="btn btn-light dropdown-toggle d-flex align-items-center gap-2"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false">

                <img src="assets/images/avatars/1.jpg"
                    class="rounded-circle"
                    width="38"
                    height="38">

                <div class="text-start d-none d-md-block">
                    <div class="fw-semibold text-dark">
                        <?php echo $_SESSION['nome']; ?>
                    </div>
                    <small class="text-muted">
                        <?php echo $_SESSION['nomeNivelAcesso']; ?>
                    </small>
                </div>

            </button>

            <ul class="dropdown-menu dropdown-menu-end shadow">

                <li>
                    <h6 class="dropdown-header">Conta</h6>
                </li>

                <li><a class="dropdown-item" href="#">User Account</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>

                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item text-danger" href="sair.php">
                        Sair
                    </a>
                </li>

            </ul>

        </div>

    </div>

</nav>