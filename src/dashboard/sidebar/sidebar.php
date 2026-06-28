<div id="sidebar" class="sidebar bg-dark text-white p-3">

    <!-- UTILITÁRIOS -->
    <div class="section-label">Utilitários</div>

    <ul class="nav flex-column mb-3">

        <li class="nav-item">
            <a href="/dashboard/painel.php" class="nav-link text-white">
                <i class="fa-solid fa-gauge"></i>
                <span class="text-label">Dashboard</span>
            </a>
        </li>

    </ul>

    <!-- CONTROLE -->
    <div class="section-label">Controle</div>

    <ul class="nav flex-column mb-3">

        <li class="nav-item">
            <a href="painel.php" class="nav-link text-white">
                <i class="fa-solid fa-pen-to-square"></i>
                <span class="text-label">Posts do Blog</span>
            </a>
        </li>

    </ul>

    <!-- CADASTROS -->
    <div class="section-label">Cadastros</div>

    <ul class="nav flex-column mb-3">

        <li class="nav-item">
            <a href="/dashboard/usuarios/index.php" class="nav-link text-white active">
                <i class="fa-solid fa-users"></i>
                <span class="text-label">Usuários</span>
            </a>
        </li>

        <!-- ENDEREÇOS (COM INDICADOR DE SUBMENU) -->
        <li class="nav-item">

            <a class="nav-link text-white submenu-parent d-flex align-items-center"
                data-bs-toggle="collapse"
                href="#menuEnderecos">

                <i class="fa-solid fa-location-dot"></i>

                <span class="text-label flex-grow-1">
                    Endereços
                </span>

                <i class="fa-solid fa-chevron-down toggle-icon"></i>

            </a>

            <div class="collapse ps-3" id="menuEnderecos">

                <a href="/dashboard/enderecos/index.php" class="nav-link text-white submenu-text">
                    <i class="fa-solid fa-map-pin"></i>
                    <span>Cadastrar Endereços</span>
                </a>

                <a href="/dashboard/cidades/index.php" class="nav-link text-white submenu-text">
                    <i class="fa-solid fa-city"></i>
                    <span>Cadastrar Cidades</span>
                </a>

            </div>

        </li>
        <li class="nav-item">

            <a class="nav-link text-white submenu-parent d-flex align-items-center"
                data-bs-toggle="collapse"
                href="#menuProdutos">

                <i class="fa-solid fa-box"></i>

                <span class="text-label flex-grow-1">
                    Produtos
                </span>

                <i class="fa-solid fa-chevron-down toggle-icon"></i>

            </a>

            <div class="collapse ps-3" id="menuProdutos">

                <a href="/dashboard/produtos/index.php" class="nav-link text-white submenu-text">
                    <i class="fa-solid fa-box"></i>
                    <span>Cadastrar Produtos</span>
                </a>

                <a href="/dashboard/produtos/marcas/index.php" class="nav-link text-white submenu-text">
                    <i class="fa-solid fa-tag"></i>
                    <span>Cadastrar Marcas</span>
                </a>
                <a href="/dashboard/produtos/categorias/index.php" class="nav-link text-white submenu-text">
                    <i class="fa-solid fa-tags"></i>
                    <span>Cadastrar Categorias</span>
                </a>

            </div>

        </li>

        <li class="nav-item">

            <a class="nav-link text-white submenu-parent d-flex align-items-center"
                data-bs-toggle="collapse"
                href="#menuArtigos">

                <i class="fa-solid fa-newspaper"></i>

                <span class="text-label flex-grow-1">
                    Blog
                </span>

                <i class="fa-solid fa-chevron-down toggle-icon"></i>

            </a>

            <div class="collapse ps-3" id="menuArtigos">

                <a href="/dashboard/artigos/index.php" class="nav-link text-white submenu-text">
                    <i class="fa-solid fa-newspaper"></i>
                    <span>Cadastrar Artigos</span>
                </a>

                <a href="/dashboard/artigos/tags/index.php" class="nav-link text-white submenu-text">
                    <i class="fa-solid fa-hashtag"></i>
                    <span>Cadastrar Tags</span>
                </a>

            </div>

        </li>
    </ul>

</div>