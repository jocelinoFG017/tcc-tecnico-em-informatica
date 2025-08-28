<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog | Ethernity</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
  <link href="../assets/css/prettyPhoto.css" rel="stylesheet">
  <link href="../assets/css/animate.css" rel="stylesheet">
  <link href="../assets/css/main.css" rel="stylesheet">
  <link href="../assets/css/responsive.css" rel="stylesheet">
  <link href="../assets/css/photos.css" rel="stylesheet">
  <link rel="shortcut icon" href="images/ico/favicon.ico">
</head>
<body>
  <?php include("../templates/header.php");?>

  <section class="py-4">
    <div class="container">
      <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
          <div class="left-sidebar">
            <h2>Curiosidades</h2>

            <div class="accordion" id="accordionExample">
              <!-- Sobre Gatos -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    Sobre Gatos
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <ul class="list-unstyled">
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
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Sobre Cachorros
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <ul class="list-unstyled">
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

            <div class="shipping text-center mt-4">
              <img src="imagens/home/pexe.jpg" alt="" class="img-fluid rounded" />
            </div>
          </div>
        </div>

        <!-- Conteúdo -->
        <div class="col-md-9">
          <div class="blog-post-area">
            <h2 class="title text-center">Área do Blog</h2>
            <div class="single-blog-post">
              <h3>O destino dos Cães !</h3>
              <div class="post-meta mb-3">
                <ul class="list-inline">
                  <li class="list-inline-item"><i class="fa fa-user"></i> Mac Doe</li>
                  <li class="list-inline-item"><i class="fa fa-clock-o"></i> 1:33 pm</li>
                  <li class="list-inline-item"><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                </ul>
                <span class="text-warning">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-half-o"></i>
                </span>
              </div>
              <a href="">
                <img src="imagens/blog/blog-one.jpg" alt="" class="img-fluid mb-3">
              </a>

              <p>Lorem ipsum dolor sit amet... </p>
              <p>Excepteur sint occaecat cupidatat... </p>
              <p>Nemo enim ipsam voluptatem... </p>
              <p>Neque porro quisquam est... </p>

              <!-- Navegação -->
              <nav aria-label="Navegação do post">
                <ul class="pagination justify-content-end">
                  <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                  <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
                </ul>
              </nav>
            </div>
          </div>

          <!-- Rating -->
          <div class="rating-area my-4">
            <ul class="list-inline">
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
          <div class="socials-share mb-4">
            <a href=""><img src="imagens/blog/socials.png" alt=""></a>
          </div>

          <!-- Comentário -->
          <div class="media d-flex mb-4">
            <img class="me-3 rounded" src="imagens/blog/man-one.jpg" alt="">
            <div class="media-body">
              <h4 class="mt-0">Annie Davis</h4>
              <p>Lorem ipsum dolor sit amet...</p>
              <div class="blog-socials">
                <ul class="list-inline">
                  <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                </ul>
                <a class="btn btn-primary btn-sm" href="#">Other Posts</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include("../templates/footer.php")?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/jquery.js"></script>
  <script src="../assets/js/jquery.prettyPhoto.js"></script>
  <script src="../assets/js/main.js"></script>
</body>
</html>
