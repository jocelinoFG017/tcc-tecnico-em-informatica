<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras - Petshop</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/cssflex.css">
    <style>
        body { background-color: #f8f9fa; }
        .card-img-top { height: 150px; object-fit: cover; }
        .cart-summary { background-color: #fff; padding: 20px; border-radius: 8px; }
        .cart-item { margin-bottom: 15px; }
        @media (max-width: 768px) {
            .cart-summary { margin-top: 20px; }
        }
    </style>
</head>
<body>
    <?php include("../templates/header.php");?>
  <main>
      <div class="container my-5">
        <h2 class="mb-4">Seu Carrinho</h2>
        <div class="row">
            <!-- Produtos do Carrinho -->
            <div class="col-lg-8">
                <div class="cart-item card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Produto 1">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Ração para Cães Adultos</h5>
                                <p class="card-text">Quantidade: <input type="number" class="form-control d-inline w-auto" value="1" min="1"></p>
                                <p class="card-text"><strong>Preço: R$ 120,00</strong></p>
                                <button class="btn btn-danger btn-sm">Remover</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cart-item card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Produto 2">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Brinquedo para Gatos</h5>
                                <p class="card-text">Quantidade: <input type="number" class="form-control d-inline w-auto" value="2" min="1"></p>
                                <p class="card-text"><strong>Preço: R$ 45,00</strong></p>
                                <button class="btn btn-danger btn-sm">Remover</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Resumo do Pedido -->
            <div class="col-lg-4">
                <div class="cart-summary shadow-sm">
                    <h4>Resumo do Pedido</h4>
                    <hr>
                    <p>Subtotal: <span class="float-end">R$ 210,00</span></p>
                    <p>Frete: <span class="float-end">R$ 20,00</span></p>
                    <hr>
                    <h5>Total: <span class="float-end">R$ 230,00</span></h5>
                    <button class="btn btn-success w-100 mt-3">Finalizar Compra</button>
                    <button class="btn btn-secondary w-100 mt-2">Continuar Comprando</button>
                </div>
            </div>
        </div>
    </div>
  </main>
<?php include("../templates/footer.php");?>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
