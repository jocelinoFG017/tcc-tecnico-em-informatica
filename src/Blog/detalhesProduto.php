<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalhes do Produto - Eternity Petshop</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
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
      color: #ffc107; /* amarelo destaque */
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
    include("../templates/header.php");
?>
<!-- Container principal -->
<div class="container py-5">
  <div class="row g-4">

    <!-- Galeria de imagens -->
    <div class="col-md-6">
      <div class="text-center mb-3">
        <img id="mainImage" src="https://via.placeholder.com/500" class="img-fluid rounded shadow" alt="Produto">
      </div>
      <div class="d-flex justify-content-center gap-2 product-gallery">
        <img src="https://via.placeholder.com/150" class="img-thumbnail" width="100" onclick="trocarImagem(this)">
        <img src="https://via.placeholder.com/150/ffc107" class="img-thumbnail" width="100" onclick="trocarImagem(this)">
        <img src="https://via.placeholder.com/150/000000" class="img-thumbnail" width="100" onclick="trocarImagem(this)">
      </div>
    </div>

    <!-- Detalhes do produto -->
    <div class="col-md-6">
      <h2 class="fw-bold">Ração Premium Eternity</h2>
      <p class="text-muted">Ração balanceada e nutritiva para cães adultos, desenvolvida com ingredientes selecionados para a saúde e bem-estar do seu pet.</p>
      
      <p class="price">R$ 149,90</p>

      <!-- Seletor de quantidade -->
      <div class="d-flex align-items-center mb-3">
        <label for="quantidade" class="me-2 fw-bold">Quantidade:</label>
        <input type="number" id="quantidade" class="form-control w-25" value="1" min="1">
      </div>

      <!-- Botão de adicionar -->
      <button class="btn btn-add-cart btn-lg">
        🛒 Adicionar ao Carrinho
      </button>

      <!-- Informações extras -->
      <div class="mt-4">
        <h5 class="fw-bold">Informações do Produto</h5>
        <ul>
          <li>Peso: 10kg</li>
          <li>Indicado para: Cães Adultos</li>
          <li>Sabor: Carne e Vegetais</li>
          <li>Validade: 12 meses</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<?php
    include("../templates/footer.php");
?>
<script>
  function trocarImagem(img) {
    document.getElementById("mainImage").src = img.src;
  }
</script>

</body>
</html>
