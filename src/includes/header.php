<header class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="/../index.php">
                <img src="/../../assets/images/home/nova_logo.png" alt="PetShop Logo" style="height: 60px;">
            </a>

            <!-- Botão toggler mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarMain">
                <!-- Menu à esquerda -->
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="../../index.php" id="homeDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Início
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="homeDropdown">
                            <li><a class="dropdown-item" href="/../listar/produtoLista.php">Produtos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/../pages/blog.php">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="/../pages/sobre.php">Sobre</a></li>
                    <li class="nav-item"><a class="nav-link" href="/../listar/contato.php">Contato</a></li>
                </ul>

                <!-- Menu à direita -->
                <ul class="navbar-nav ms-auto">
                    <?php if (isset($_SESSION['idUsuario'])): ?>
                        <!-- Usuário logado -->
                        <li class="nav-item"><a class="nav-link" href="../listar/carrinho.php"><i class="fa fa-shopping-cart"></i> Carrinho</a></li>
                        <li class="nav-item"><a class="nav-link" href="../loja/minhaConta.php"><i class="fa fa-user"></i> Minha Conta</a></li>
                    <?php else: ?>
                        <!-- Usuário não logado -->
                        <li class="nav-item"><a class="nav-link" href="/../login/loginIndex.php"><i class="fa fa-lock"></i> Login</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
