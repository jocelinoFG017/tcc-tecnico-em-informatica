<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta - Petshop</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/cssflex.css">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 12px;
        }
        .google-btn {
            background-color: #4285F4;
            color: #fff;
        }
        .google-btn:hover {
            background-color: #357ae8;
            color: #fff;
        }
        .form-label { font-weight: 500; }
    </style>
</head>
<body>
    <?php include("../templates/header.php");?>
    
<main>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7 col-sm-9">
                <div class="card shadow-sm p-4">
                    <h3 class="text-center mb-4">Criar Conta</h3>

                    <!-- Formulário de cadastro -->
                    <form>
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control" id="nome" placeholder="Seu nome" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="email@exemplo.com" required>
                        </div>

                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="senha" placeholder="********" required>
                        </div>

                        <div class="mb-3">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="tel" class="form-control" id="telefone" placeholder="(00) 00000-0000">
                        </div>

                        <div class="mb-3">
                            <label for="endereco" class="form-label">Endereço</label>
                            <input type="text" class="form-control" id="endereco" placeholder="Rua, número, bairro">
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="termos" required>
                            <label class="form-check-label" for="termos">Aceito os <a href="#">termos de uso</a></label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Criar Conta</button>
                    </form>

                    <hr class="my-4">

                    <!-- Login com Google (não funcional) -->
                    <button class="btn google-btn w-100 mb-2">
                        <i class="bi bi-google me-2"></i> Continuar com Google
                    </button>

                    <p class="text-center mt-3">Já tem conta? <a href="../Login/loginIndex.php">Entrar</a></p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include("../templates/footer.php");?>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons (para ícone do Google) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</body>
</html>
