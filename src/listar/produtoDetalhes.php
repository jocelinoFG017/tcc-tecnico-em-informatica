<?php
include_once "../conexao/conexao.php";
// Aqui você pode adicionar código para buscar os detalhes do produto no banco de dados usando o ID passado via GET
$produtoId = isset($_GET['add']) ? (int)$_GET['add'] : 0;
// Exemplo de consulta (ajuste conforme sua tabela e campos)
$query = mysqli_query($conn, "SELECT * FROM produto WHERE idProduto = $produtoId");
$produto = mysqli_fetch_object($query);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Loja PetShop - Detalhes do Produto</title>
  <!-- CSS do Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <!-- Font Awesome para ícones -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link rel="stylesheet" href="../assets/css/cssflex.css">
  <style>
    .product-gallery img {
      border-radius: 10px;
      cursor: pointer;
      transition: transform 0.3s;
    }

    .product-gallery img:hover {
      transform: scale(1.05);
    }

    .price {
      font-size: 1.8rem;
      font-weight: bold;
      color: #ffc107;
      /* amarelo destaque */
    }

    .btn-add-cart {
      background-color: #ffc107;
      color: #000;
      font-weight: bold;
    }

    .btn-add-cart:hover {
      background-color: #e0a800;
      color: #fff;
    }
  </style>
</head>


<body>
  <?php
  include_once("../includes/header.php");
  ?>
  <main>

    <!-- Container principal -->
    <div class="container py-5">
      <div class="row g-4">

        <!-- Galeria de imagens -->
        <div class="col-md-6">
          <div class="text-center mb-3">
            <img id="mainImage" src="https://via.placeholder.com/500" class="img-fluid rounded shadow" alt="Produto">
          </div>
          <div class="d-flex justify-content-center gap-2 product-gallery">
            <img src="../uploads/produtos/<?php echo $produto->foto; ?>" class="img-thumbnail" width="400" alt="<?php echo $produto->nome; ?>" onclick="trocarImagem(this)">
          </div>
        </div>

        <!-- Detalhes do produto -->
        <div class="col-md-6">
          <h2 class="fw-bold"><?php echo $produto->nome; ?></h2>
          <p class="text-muted"><?php echo $produto->descricao; ?></p>

          <p class="price"> <?php echo "R$" . number_format($produto->preco, 2, ",", "."); ?> </p>

          <!-- Seletor de quantidade -->
          <div class="d-flex align-items-center mb-3">
            <label for="quantidade" class="me-2 fw-bold">Quantidade:</label>
            <input type="number" id="quantidade" class="form-control w-25" value="1" min="1">
          </div>

          <!-- Botão de adicionar -->
          <form action="../listar/carrinho.php" method="GET" class="d-inline">
            <input type="hidden" name="add" value="<?php echo $produto->idProduto; ?>">
            <input type="hidden" name="quantidade" id="quantidadeInput" value="1">
            <button type="submit" class="btn btn-add-cart btn-lg">
              🛒 Adicionar ao Carrinho
            </button>
          </form>


          <!-- Informações extras -->
          <div class="mt-4">
            <h5 class="fw-bold">Informações do Produto</h5>
            <ul>
              <li>Marca: <?php echo $produto->marca; ?></li>
              <li>Indicado para: Cães Adultos</li>
              <li>Sabor: Carne e Vegetais</li>
              <li>Validade: 12 meses</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php
  include_once("../includes/footer.php");
  ?>

  <script>
    const quantidadeInput = document.getElementById('quantidade');
    const hiddenQtd = document.getElementById('quantidadeInput');

    quantidadeInput.addEventListener('input', () => {
      hiddenQtd.value = quantidadeInput.value;
    });
  </script>

</body>

</html>