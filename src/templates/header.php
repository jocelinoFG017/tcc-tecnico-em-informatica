<header class="sticky-top">
    <!-- Navbar principal -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="../index.php">
                <img src="../assets/imagens/home/nova_logo.png" alt="PetShop Logo" style="height: 60px;">
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
                        <a class="nav-link dropdown-toggle" href="#" id="homeDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Início
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="homeDropdown">
                            <li><a class="dropdown-item" href="../Blog/shop.php">Produtos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../Blog/blog.php">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="../Listar/sobre.php">Sobre</a></li>
                </ul>

                <!-- Menu à direita -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-user"></i> Conta</a></li>
                    <li class="nav-item"><a class="nav-link" href="checkout.html"><i class="fa fa-shopping-cart"></i> Carrinho</a></li>
                    <li class="nav-item"><a class="nav-link" href="../Login/loginIndex.php"><i class="fa fa-lock"></i> Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
