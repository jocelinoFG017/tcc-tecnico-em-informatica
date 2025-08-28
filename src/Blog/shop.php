<?php
include("../conexao/conexao.php");

// Paginação
$limit = 8; 
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Filtros
$where = " WHERE 1=1 ";

// Busca por nome
if (!empty($_GET['busca'])) {
    $busca = mysqli_real_escape_string($conn, $_GET['busca']);
    $where .= " AND nome LIKE '%$busca%' ";
}

// Filtro por categoria
if (!empty($_GET['categoria'])) {
    $categoria = mysqli_real_escape_string($conn, $_GET['categoria']);
    $where .= " AND categoria = '$categoria' ";
}

// Ordenação
$order = " ORDER BY idProduto DESC ";
if (!empty($_GET['ordenar'])) {
    if ($_GET['ordenar'] == "preco") $order = " ORDER BY preco ASC ";
    if ($_GET['ordenar'] == "nome") $order = " ORDER BY nome ASC ";
    if ($_GET['ordenar'] == "desconto") $order = " ORDER BY desconto DESC ";
}

// Query principal
$sql = mysqli_query($conn, "SELECT * FROM produto $where $order LIMIT $offset, $limit");

// Total de produtos para paginação
$totalQuery = mysqli_query($conn, "SELECT COUNT(*) as total FROM produto $where");
$totalData = mysqli_fetch_assoc($totalQuery);
$total = $totalData['total'];
$totalPages = ceil($total / $limit);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Loja PetShop - Produtos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<?php
include("../templates/header.php");
?>
<div class="container-fluid">
  <div class="row">
    
    <!-- Menu lateral -->
    <aside class="col-md-3 col-lg-2 bg-white p-3 border-end">
      <h5 class="mb-3">Categorias</h5>
      <ul class="list-group">
        <?php 
        $categorias = ["Cachorro","Gato","Peixe","Roedores","Brinquedos","Acessórios","Rações","Vitaminas","Vacinas"];
        foreach($categorias as $cat){ ?>
          <a href="?categoria=<?php echo $cat; ?>" class="list-group-item list-group-item-action <?php if(isset($_GET['categoria']) && $_GET['categoria']==$cat) echo 'active'; ?>">
            <?php echo $cat; ?>
          </a>
        <?php } ?>
      </ul>
    </aside>

    <!-- Conteúdo principal -->
    <main class="col-md-9 col-lg-10 p-4">

      <!-- Barra de busca e filtros -->
      <form method="GET" class="row g-2 mb-4">
        <div class="col-md-4">
          <input type="text" name="busca" class="form-control" placeholder="Buscar produto..." value="<?php echo $_GET['busca'] ?? ''; ?>">
        </div>
        <div class="col-md-3">
          <select name="ordenar" class="form-select">
            <option value="">Ordenar por...</option>
            <option value="preco" <?php if(($_GET['ordenar']??'')=='preco') echo 'selected'; ?>>Preço</option>
            <option value="nome" <?php if(($_GET['ordenar']??'')=='nome') echo 'selected'; ?>>Nome</option>
            <option value="desconto" <?php if(($_GET['ordenar']??'')=='desconto') echo 'selected'; ?>>Desconto</option>
          </select>
        </div>
        <div class="col-md-2">
          <button class="btn btn-warning w-100">Filtrar</button>
        </div>
      </form>

      <!-- Lista de produtos -->
      <div class="row g-4">
        <?php while ($produto = mysqli_fetch_object($sql)){ ?>
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 shadow-sm">
              <div class="position-relative">
                <img src="../fotos/<?php echo $produto->foto; ?>" class="card-img-top" alt="<?php echo $produto->nome; ?>">
                <?php //if($produto->desconto > 0) { ?>
                  <!-- <span class="badge bg-danger position-absolute top-0 end-0 m-2">-<?php //echo $produto->desconto; ?>%</span> -->
                <?php //} ?>
              </div>
              <div class="card-body text-center d-flex flex-column">
                <h6 class="card-title"><?php echo $produto->nome; ?></h6>
                <p class="fw-bold mb-3">R$ <?php echo number_format($produto->preco,2,",","."); ?></p>
                <a href="../Blog/detalhesProduto.php?id=<?php echo $produto->idProduto; ?>" class="btn btn-outline-primary btn-sm mb-2">Detalhes</a>
                <a href="../Blog/carrinho.php?add=<?php echo $produto->idProduto; ?>" class="btn btn-warning btn-sm mt-auto">Adicionar ao Carrinho</a>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>

      <!-- Paginação -->
      <nav class="mt-4">
        <ul class="pagination justify-content-center">
          <?php for($i=1;$i<=$totalPages;$i++){ ?>
            <li class="page-item <?php if($i==$page) echo 'active'; ?>">
              <a class="page-link" href="?page=<?php echo $i; ?>&busca=<?php echo $_GET['busca'] ?? ''; ?>&categoria=<?php echo $_GET['categoria'] ?? ''; ?>&ordenar=<?php echo $_GET['ordenar'] ?? ''; ?>">
                <?php echo $i; ?>
              </a>
            </li>
          <?php } ?>
        </ul>
      </nav>

    </main>
  </div>
</div>
<?php
include("../templates/footer.php");
?>
</body>
</html>
