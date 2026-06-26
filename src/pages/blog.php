<?php
include("../conexao/conexao.php");

// Recebe o id do artigo via GET, se não houver pega o último artigo
$idAtual = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Consulta todos os artigos
$queryTodos = "SELECT * FROM artigo ORDER BY idArtigo DESC";
$resultTodos = mysqli_query($conn, $queryTodos);
$artigos = [];
$tags = [];

if ($resultTodos && mysqli_num_rows($resultTodos) > 0) {
    while ($row = mysqli_fetch_object($resultTodos)) {
        $artigos[] = $row;
        // Agrupar por tag principal
        $tag = $row->tag;
        if (!isset($tags[$tag])) {
            $tags[$tag] = [];
        }
        $tags[$tag][] = $row;
    }
}

// Se não recebeu id, pega o mais recente
if ($idAtual === 0 && count($artigos) > 0) {
    $idAtual = $artigos[0]->idArtigo;
}

// Consulta o artigo atual
$queryArtigo = "SELECT * FROM artigo WHERE idArtigo = $idAtual LIMIT 1";
$resultArtigo = mysqli_query($conn, $queryArtigo);
$artigoAtual = mysqli_fetch_object($resultArtigo);

// Artigo anterior e próximo
$queryAnterior = "SELECT idArtigo FROM artigo WHERE idArtigo < $idAtual ORDER BY idArtigo DESC LIMIT 1";
$resultAnterior = mysqli_query($conn, $queryAnterior);
$artigoAnterior = mysqli_fetch_object($resultAnterior);

$queryProximo = "SELECT idArtigo FROM artigo WHERE idArtigo > $idAtual ORDER BY idArtigo ASC LIMIT 1";
$resultProximo = mysqli_query($conn, $queryProximo);
$artigoProximo = mysqli_fetch_object($resultProximo);
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
<?php include("../includes/header.php");?>

<main>
  <section class="py-4">
    <div class="container">
      <div class="row">
        <!-- Sidebar -->
        <aside class="col-lg-3 mb-4">
          <div class="p-3 bg-light rounded">
            <h5>Curiosidades</h5>
            <div class="accordion" id="accordionCuriosidades">
              <?php $i = 0; ?>
              <?php foreach($tags as $tag => $artigosTag): ?>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading<?php echo $i; ?>">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i; ?>" aria-expanded="false">
                      <?php echo htmlspecialchars($tag); ?>
                    </button>
                  </h2>
                  <div id="collapse<?php echo $i; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionCuriosidades">
                    <div class="accordion-body">
                      <ul class="list-unstyled mb-0">
                        <?php foreach($artigosTag as $art): ?>
                          <li>
                            <a href="?id=<?php echo $art->idArtigo; ?>" class="<?php echo $art->idArtigo == $idAtual ? 'fw-bold text-primary' : ''; ?>">
                              <?php echo htmlspecialchars($art->titulo); ?>
                            </a>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                  </div>
                </div>
                <?php $i++; ?>
              <?php endforeach; ?>
            </div>
          </div>
        </aside>

        <!-- Conteúdo -->
        <div class="col-lg-9">
          <?php if($artigoAtual): ?>
          <article class="mb-5">
            <h2><?php echo htmlspecialchars($artigoAtual->titulo); ?></h2>
            <div class="mb-3 d-flex flex-wrap gap-3 align-items-center">
              <span><i class="fas fa-user"></i> <?php echo htmlspecialchars($artigoAtual->autor); ?></span>
              <span><i class="far fa-clock"></i> <?php echo htmlspecialchars($artigoAtual->hora_publicacao); ?></span>
              <span><i class="far fa-calendar-alt"></i> <?php echo date('d/m/Y', strtotime($artigoAtual->data_publicacao)); ?></span>
            </div>

            <p><?php echo nl2br(htmlspecialchars($artigoAtual->texto)); ?></p>

            <!-- Tags -->
            <div class="mb-4">
              <ul class="list-inline">
                <li class="list-inline-item">TAG:</li>
                <?php if($artigoAtual->tag): ?>
                  <li class="list-inline-item"><a href="#" class="text-decoration-none"><?php echo htmlspecialchars($artigoAtual->tag); ?></a></li>
                <?php endif; ?>
                <?php if($artigoAtual->tag2): ?>
                  <li class="list-inline-item"><a href="#" class="text-decoration-none"><?php echo htmlspecialchars($artigoAtual->tag2); ?></a></li>
                <?php endif; ?>
                <?php if($artigoAtual->tag3): ?>
                  <li class="list-inline-item"><a href="#" class="text-decoration-none"><?php echo htmlspecialchars($artigoAtual->tag3); ?></a></li>
                <?php endif; ?>
              </ul>
            </div>

            <!-- Navegação -->
            <nav aria-label="Navegação do post">
              <ul class="pagination justify-content-between">
                <li class="page-item <?php echo $artigoAnterior ? '' : 'disabled'; ?>">
                  <a class="page-link" href="<?php echo $artigoAnterior ? '?id='.$artigoAnterior->idArtigo : '#'; ?>">← Anterior</a>
                </li>
                <li class="page-item <?php echo $artigoProximo ? '' : 'disabled'; ?>">
                  <a class="page-link" href="<?php echo $artigoProximo ? '?id='.$artigoProximo->idArtigo : '#'; ?>">Próximo →</a>
                </li>
              </ul>
            </nav>
          </article>
          <?php else: ?>
            <p>Nenhum artigo encontrado.</p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
</main>

<?php include("../includes/footer.php")?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
