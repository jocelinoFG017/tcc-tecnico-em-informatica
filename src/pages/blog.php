<?php
include("../conexao/conexao.php");

// Consulta todos os artigos
$query = "SELECT * FROM artigo ORDER BY idArtigo DESC";
$result = mysqli_query($conn, $query);

$artigos = [];
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_object($result)) {
        $artigos[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blog | Ethernity</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link rel="stylesheet" href="../assets/css/cssflex.css">
</head>
<body>
  <?php include("../templates/header.php");?>

<main>
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
          </div>
        </aside>

        <!-- Conteúdo -->
        <div class="col-lg-9">
          <div class="blog-post-area mb-5">
            <h2 class="text-center mb-4">Área do Blog</h2>

            <?php if(count($artigos) > 0): ?>
              <?php foreach($artigos as $artigo): ?>
                <article class="mb-5">
                  <h3><?php echo htmlspecialchars($artigo->titulo); ?></h3>
                  <div class="mb-3 d-flex flex-wrap gap-3 align-items-center">
                    <span><i class="fas fa-user"></i> <?php echo htmlspecialchars($artigo->autor); ?></span>
                    <span><i class="far fa-clock"></i> <?php echo htmlspecialchars($artigo->hora_publicacao); ?></span>
                    <span><i class="far fa-calendar-alt"></i> <?php echo date('d/m/Y', strtotime($artigo->data_publicacao)); ?></span>

                  </div>

                  <p><?php echo htmlspecialchars($artigo->texto); ?></p>

                  <nav aria-label="Navegação do post">
                    <ul class="pagination justify-content-end">
                      <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                      <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
                    </ul>
                  </nav>

                  <!-- Tags -->
                  <div class="mb-4">
                    <ul class="list-inline">
                      <li class="list-inline-item">TAG:</li>
                      <li class="list-inline-item"><a href="#" class="text-decoration-none"><?php echo htmlspecialchars($artigo->tag); ?></a></li>
                    </ul>
                  </div>
                </article>
              <?php endforeach; ?>
            <?php else: ?>
              <p>Nenhum artigo encontrado.</p>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php include("../templates/footer.php")?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/main.js"></script>
</body>
</html>
