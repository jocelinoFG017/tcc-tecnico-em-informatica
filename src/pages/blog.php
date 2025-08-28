<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blog | Ethernity</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
  <!-- <link href="../assets/css/main.css" rel="stylesheet"> -->
</head>
<body>
  <?php include("../templates/header.php");?>

  <section class="py-4">
    <div class="container">
      <div class="row">
        <!-- Sidebar -->
        <aside class="col-lg-3 mb-4">
          <div class="p-3 bg-light rounded">
            <h5>Curiosidades</h5>
            <div class="accordion" id="accordionCuriosidades">

              <!-- Sobre Gatos -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingGatos">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseGatos" aria-expanded="false">
                    Sobre Gatos
                  </button>
                </h2>
                <div id="collapseGatos" class="accordion-collapse collapse" data-bs-parent="#accordionCuriosidades">
                  <div class="accordion-body">
                    <ul class="list-unstyled mb-0">
                      <li><a href="#">Martin Dog</a></li>
                      <li><a href="#">Under Armour</a></li>
                      <li><a href="#">Adidas</a></li>
                      <li><a href="#">Puma</a></li>
                      <li><a href="#">ASICS</a></li>
                    </ul>
                  </div>
                </div>
              </div>

              <!-- Sobre Cachorros -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingCachorros">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCachorros" aria-expanded="false">
                    Sobre Cachorros
                  </button>
                </h2>
                <div id="collapseCachorros" class="accordion-collapse collapse" data-bs-parent="#accordionCuriosidades">
                  <div class="accordion-body">
                    <ul class="list-unstyled mb-0">
                      <li><a href="blog-cat.html">Sobre Gatos</a></li>
                      <li><a href="blog-dog.html">Sobre Cães</a></li>
                      <li><a href="blog-ave.html">Sobre Pássaros</a></li>
                      <li><a href="blog-rato.html">Sobre Roedores</a></li>
                      <li><a href="blog-pexe.html">Sobre Peixes</a></li>
                    </ul>
                  </div>
                </div>
              </div>

              <!-- Links simples -->
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <a class="accordion-button collapsed" href="#">Sobre Peixes</a>
                </h2>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <a class="accordion-button collapsed" href="#">Sobre Pássaros</a>
                </h2>
              </div>
            </div>

            <div class="mt-4 text-center">
              <img src="imagens/home/pexe.jpg" alt="Peixe" class="img-fluid rounded">
            </div>
          </div>
        </aside>

        <!-- Conteúdo -->
        <main class="col-lg-9">
          <div class="blog-post-area mb-5">
            <h2 class="text-center mb-4">Área do Blog</h2>

            <article class="mb-5">
              <h3>O destino dos Cães!</h3>
              <div class="mb-3 d-flex flex-wrap gap-3 align-items-center">
                <span><i class="fa fa-user"></i> Mac Doe</span>
                <span><i class="fa fa-clock-o"></i> 1:33 pm</span>
                <span><i class="fa fa-calendar"></i> DEC 5, 2013</span>
                <span class="text-warning">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-half-o"></i>
                </span>
              </div>

              <a href="#"><img src="imagens/blog/blog-one.jpg" alt="Blog" class="img-fluid mb-3 rounded"></a>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
              <p>Excepteur sint occaecat cupidatat non proident...</p>
              <p>Nemo enim ipsam voluptatem quia voluptas sit...</p>
              <p>Neque porro quisquam est qui dolorem ipsum...</p>

              <nav aria-label="Navegação do post">
                <ul class="pagination justify-content-end">
                  <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                  <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
                </ul>
              </nav>
            </article>

            <!-- Rating -->
            <div class="mb-4">
              <ul class="list-inline mb-2">
                <li class="list-inline-item fw-bold">Rate this item:</li>
                <li class="list-inline-item text-warning">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-o"></i>
                </li>
                <li class="list-inline-item text-muted">(6 votes)</li>
              </ul>
              <ul class="list-inline">
                <li class="list-inline-item">TAG:</li>
                <li class="list-inline-item"><a href="#" class="text-decoration-none">Pink</a></li>
                <li class="list-inline-item"><a href="#" class="text-decoration-none">T-Shirt</a></li>
                <li class="list-inline-item"><a href="#" class="text-decoration-none">Girls</a></li>
              </ul>
            </div>

            <!-- Social -->
            <div class="mb-4">
              <a href="#"><img src="imagens/blog/socials.png" alt="Socials" class="img-fluid"></a>
            </div>

            <!-- Comentário -->
            <div class="d-flex mb-4">
              <img src="imagens/blog/man-one.jpg" alt="User" class="me-3 rounded-circle" width="64">
              <div>
                <h5 class="mb-1">Annie Davis</h5>
                <p>Lorem ipsum dolor sit amet...</p>
                <div class="d-flex align-items-center gap-2">
                  <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  </ul>
                  <a class="btn btn-primary btn-sm ms-3" href="#">Other Posts</a>
                </div>
              </div>
            </div>

          </div>
        </main>
      </div>
    </div>
  </section>

  <?php include("../templates/footer.php")?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/main.js"></script>
</body>
</html>
