<?php
include_once("../conexao/conexao.php");

// Recebe o id do artigo via GET, se não houver pega o último artigo
$idAtual = isset($_GET['id']) ? (int)$_GET['id'] : 0;

/*
|--------------------------------------------------------------------------
| SIDEBAR
|--------------------------------------------------------------------------
| Busca todos os artigos com suas respectivas tags
*/
$queryTodos = "
SELECT
    a.idArtigo,
    a.titulo,
    t.nome AS tag

FROM artigo a

LEFT JOIN artigo_tag at
    ON at.fk_idArtigo = a.idArtigo

LEFT JOIN tag t
    ON t.idTag = at.fk_idTag

ORDER BY
    t.nome,
    a.idArtigo DESC
";

$resultTodos = mysqli_query($conn, $queryTodos);

$artigos = [];
$tags = [];

if ($resultTodos && mysqli_num_rows($resultTodos) > 0) {

  while ($row = mysqli_fetch_object($resultTodos)) {

    $artigos[] = $row;

    $nomeTag = !empty($row->tag) ? $row->tag : "Sem categoria";

    if (!isset($tags[$nomeTag])) {
      $tags[$nomeTag] = [];
    }

    $tags[$nomeTag][] = $row;
  }
}

/*
|--------------------------------------------------------------------------
| Se não recebeu ID, pega o artigo mais recente
|--------------------------------------------------------------------------
*/

if ($idAtual === 0) {

  $queryUltimo = "
        SELECT idArtigo
        FROM artigo
        ORDER BY idArtigo DESC
        LIMIT 1
    ";

  $resultadoUltimo = mysqli_query($conn, $queryUltimo);

  if ($ultimo = mysqli_fetch_object($resultadoUltimo)) {
    $idAtual = $ultimo->idArtigo;
  }
}

/*
|--------------------------------------------------------------------------
| Artigo Atual
|--------------------------------------------------------------------------
*/

$queryArtigo = "
SELECT
    a.idArtigo,
    a.titulo,
    a.texto,
    a.imagem,
    a.data_publicacao,

    u.nome AS autor,

    GROUP_CONCAT(
        DISTINCT t.nome
        ORDER BY t.nome
        SEPARATOR ', '
    ) AS tags

FROM artigo a

INNER JOIN usuario u
    ON u.idUsuario = a.fk_idUsuario

LEFT JOIN artigo_tag at
    ON at.fk_idArtigo = a.idArtigo

LEFT JOIN tag t
    ON t.idTag = at.fk_idTag

WHERE a.idArtigo = $idAtual

GROUP BY
    a.idArtigo,
    a.titulo,
    a.texto,
    a.imagem,
    a.data_publicacao,
    u.nome

LIMIT 1
";

$resultArtigo = mysqli_query($conn, $queryArtigo);
$artigoAtual = mysqli_fetch_object($resultArtigo);

/*
|--------------------------------------------------------------------------
| Artigo anterior
|--------------------------------------------------------------------------
*/

$queryAnterior = "
SELECT
    idArtigo
FROM artigo
WHERE idArtigo < $idAtual
ORDER BY idArtigo DESC
LIMIT 1
";

$resultAnterior = mysqli_query($conn, $queryAnterior);
$artigoAnterior = mysqli_fetch_object($resultAnterior);

/*
|--------------------------------------------------------------------------
| Próximo artigo
|--------------------------------------------------------------------------
*/

$queryProximo = "
SELECT
    idArtigo
FROM artigo
WHERE idArtigo > $idAtual
ORDER BY idArtigo ASC
LIMIT 1
";

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

  <?php include_once "../includes/header.php"; ?>

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

                <?php foreach ($tags as $tag => $artigosTag): ?>

                  <div class="accordion-item">

                    <h2 class="accordion-header" id="heading<?= $i ?>">

                      <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapse<?= $i ?>">

                        <?= htmlspecialchars($tag) ?>

                      </button>

                    </h2>

                    <div
                      id="collapse<?= $i ?>"
                      class="accordion-collapse collapse"
                      data-bs-parent="#accordionCuriosidades">

                      <div class="accordion-body">

                        <ul class="list-unstyled mb-0">

                          <?php foreach ($artigosTag as $art): ?>

                            <li>

                              <a
                                href="?id=<?= $art->idArtigo ?>"
                                class="<?= $art->idArtigo == $idAtual ? 'fw-bold text-primary' : '' ?>">

                                <?= htmlspecialchars($art->titulo) ?>

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

            <?php if ($artigoAtual): ?>

              <article class="mb-5">

                <h2><?= htmlspecialchars($artigoAtual->titulo) ?></h2>

                <div class="mb-3 d-flex flex-wrap gap-3 align-items-center">

                  <span>
                    <i class="fas fa-user"></i>
                    <?= htmlspecialchars($artigoAtual->autor) ?>
                  </span>

                  <span>
                    <i class="far fa-calendar-alt"></i>

                    <?php
                    if (!empty($artigoAtual->data_publicacao)) {
                      echo date('d/m/Y', strtotime($artigoAtual->data_publicacao));
                    }
                    ?>

                  </span>

                </div>

                <?php if (!empty($artigoAtual->imagem)) { ?>

                  <img
                    src="../uploads/artigos/<?= htmlspecialchars($artigoAtual->imagem) ?>"
                    class="img-fluid rounded mb-4 mx-auto d-block"
                    alt="<?= htmlspecialchars($artigoAtual->titulo); ?>"
                    style="max-height: 150px; width: auto; object-fit: contain;">

                <?php } ?>

                <p><?= nl2br(htmlspecialchars($artigoAtual->texto)); ?></p>

                <!-- Tags -->

                <div class="mb-4">

                  <strong>Tags:</strong>

                  <?php

                  if (!empty($artigoAtual->tags)) {

                    $listaTags = explode(",", $artigoAtual->tags);

                    foreach ($listaTags as $tag) {

                  ?>

                      <span class="badge bg-primary me-1">

                        <?= htmlspecialchars(trim($tag)); ?>

                      </span>

                  <?php

                    }
                  }

                  ?>

                </div>

                <!-- Navegação -->

                <nav aria-label="Navegação">

                  <ul class="pagination justify-content-between">

                    <li class="page-item <?= $artigoAnterior ? '' : 'disabled' ?>">

                      <a
                        class="page-link"
                        href="<?= $artigoAnterior ? '?id=' . $artigoAnterior->idArtigo : '#' ?>">

                        ← Anterior

                      </a>

                    </li>

                    <li class="page-item <?= $artigoProximo ? '' : 'disabled' ?>">

                      <a
                        class="page-link"
                        href="<?= $artigoProximo ? '?id=' . $artigoProximo->idArtigo : '#' ?>">

                        Próximo →

                      </a>

                    </li>

                  </ul>

                </nav>

              </article>

            <?php else: ?>

              <div class="alert alert-warning">

                Nenhum artigo encontrado.

              </div>

            <?php endif; ?>

          </div>

        </div>

      </div>

    </section>

  </main>

  <?php include_once "../includes/footer.php"; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>