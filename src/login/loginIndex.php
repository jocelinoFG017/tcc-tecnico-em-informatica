<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carteira de Vacinação Animal - Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <style>
        body{
            background: linear-gradient(135deg,#0d6efd,#4dabf7);
            min-height:100vh;
        }

        .login-card{
            border:none;
            border-radius:20px;
            overflow:hidden;
            box-shadow:0 20px 40px rgba(0,0,0,.18);
        }

        .login-left{
            background:#0d6efd;
            color:#fff;
            padding:60px 40px;
            display:flex;
            flex-direction:column;
            justify-content:center;
            text-align:center;
        }

        .login-left i{
            font-size:70px;
            margin-bottom:20px;
        }

        .login-left h2{
            font-weight:bold;
        }

        .login-right{
            padding:50px;
            background:#fff;
        }

        .form-control{
            height:50px;
            border-radius:10px;
        }

        .input-group-text{
            border-radius:10px 0 0 10px;
        }

        .btn{
            height:48px;
            border-radius:10px;
            font-weight:600;
        }

        .divider{
            display:flex;
            align-items:center;
            text-align:center;
            margin:25px 0;
        }

        .divider::before,
        .divider::after{
            content:'';
            flex:1;
            border-bottom:1px solid #ddd;
        }

        .divider span{
            padding:0 15px;
            color:#777;
            font-size:14px;
        }

        .card{
            transition:.3s;
        }

        .card:hover{
            transform:translateY(-3px);
        }

        @media(max-width:768px){

            .login-left{
                display:none;
            }

            .login-right{
                padding:30px;
            }

        }
    </style>

</head>

<body>

<?php include_once "../includes/header.php"; ?>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="card login-card">

                <div class="row g-0">

                    <!-- Lado esquerdo -->
                    <div class="col-md-5 login-left">

                        <i class="fa-solid fa-paw"></i>

                        <h2>Carteira de Vacinação Animal</h2>

                        <p class="mt-3">
                            Gerencie de forma simples e segura a vacinação dos seus animais.
                        </p>

                    </div>

                    <!-- Lado direito -->
                    <div class="col-md-7 login-right">

                        <div class="text-center mb-4">

                            <h3 class="fw-bold">Bem-vindo de volta</h3>

                            <p class="text-muted">
                                Faça login para acessar sua conta.
                            </p>

                        </div>

                        <?php if (isset($_SESSION['naoAutenticado'])): ?>

                            <div class="alert alert-danger">
                                <i class="fa-solid fa-circle-exclamation"></i>
                                Usuário ou senha incorretos.
                            </div>

                            <?php unset($_SESSION['naoAutenticado']); ?>

                        <?php endif; ?>

                        <?php if (isset($_SESSION['cadastro_sucesso'])) { ?>

                            <div class="alert alert-success">

                                <i class="fa-solid fa-circle-check"></i>

                                <?= $_SESSION['cadastro_sucesso']; ?>

                            </div>

                            <?php unset($_SESSION['cadastro_sucesso']); ?>

                        <?php } ?>

                        <form action="login.php" method="POST">

                            <div class="mb-3">

                                <label class="form-label">Usuário</label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="fa fa-user"></i>
                                    </span>

                                    <input
                                        type="text"
                                        name="login"
                                        id="login"
                                        required
                                        class="form-control"
                                        placeholder="Digite seu usuário">

                                </div>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">Senha</label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="fa fa-lock"></i>
                                    </span>

                                    <input
                                        type="password"
                                        name="senha"
                                        id="senha"
                                        required
                                        class="form-control"
                                        placeholder="Digite sua senha">

                                    <button
                                        class="btn btn-outline-secondary"
                                        type="button"
                                        id="mostrarSenha">

                                        <i class="fa-solid fa-eye"></i>

                                    </button>

                                </div>

                            </div>

                            <div class="d-flex justify-content-between mb-4">

                                <div class="form-check">

                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        id="lembrar">

                                    <label class="form-check-label" for="lembrar">

                                        Lembrar-me

                                    </label>

                                </div>

                                <a href="#" class="text-decoration-none">
                                    Esqueceu a senha?
                                </a>

                            </div>

                            <div class="d-grid">

                                <button
                                    class="btn btn-primary"
                                    name="entrar"
                                    value="entrar">

                                    <i class="fa-solid fa-right-to-bracket"></i>

                                    Entrar

                                </button>

                            </div>

                            <div class="divider">

                                <span>OU</span>

                            </div>

                            <div class="d-grid">

                                <a href="googleLogin.php" class="btn btn-danger">

                                    <i class="fab fa-google"></i>

                                    Entrar com Google

                                </a>

                            </div>

                            <p class="text-center mt-4">

                                Não possui uma conta?

                                <a href="/../usuario/contas/criarConta.php">

                                    Criar conta

                                </a>

                            </p>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<?php include_once "../includes/footer.php"; ?>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script>
const btn = document.getElementById("mostrarSenha");
const senha = document.getElementById("senha");

btn.addEventListener("click",()=>{

    if(senha.type==="password"){

        senha.type="text";
        btn.innerHTML='<i class="fa-solid fa-eye-slash"></i>';

    }else{

        senha.type="password";
        btn.innerHTML='<i class="fa-solid fa-eye"></i>';

    }

});
</script>

</body>
</html>