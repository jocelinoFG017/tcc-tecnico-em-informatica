<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta - Carteira de Vacinação Animal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <style>

        body{
            background:linear-gradient(135deg,#0d6efd,#4dabf7);
            min-height:100vh;
        }

        .register-card{
            border:none;
            border-radius:20px;
            overflow:hidden;
            box-shadow:0 20px 40px rgba(0,0,0,.18);
        }

        .left-side{
            background:#0d6efd;
            color:#fff;
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
            padding:50px;
            text-align:center;
        }

        .left-side i{
            font-size:70px;
            margin-bottom:20px;
        }

        .right-side{
            background:#fff;
            padding:45px;
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

        @media(max-width:768px){

            .left-side{
                display:none;
            }

            .right-side{
                padding:30px;
            }

        }

    </style>

</head>

<body>

<?php include("../../includes/header.php"); ?>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="card register-card">

                <div class="row g-0">

                    <div class="col-md-5 left-side">

                        <i class="fa-solid fa-paw"></i>

                        <h2>Carteira de Vacinação Animal</h2>

                        <p class="mt-3">

                            Cadastre-se gratuitamente e acompanhe a vacinação dos seus animais em qualquer lugar.

                        </p>

                    </div>

                    <div class="col-md-7 right-side">

                        <div class="text-center mb-4">

                            <h3 class="fw-bold">Criar Conta</h3>

                            <p class="text-muted">

                                Preencha os dados abaixo para começar.

                            </p>

                        </div>

                        <form action="processarCadastro.php" method="POST">

                            <div class="mb-3">

                                <label class="form-label">Nome Completo</label>

                                <div class="input-group">

                                    <span class="input-group-text">

                                        <i class="fa fa-user"></i>

                                    </span>

                                    <input
                                        type="text"
                                        class="form-control"
                                        name="nome"
                                        id="nome"
                                        placeholder="Digite seu nome"
                                        required>

                                </div>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">E-mail</label>

                                <div class="input-group">

                                    <span class="input-group-text">

                                        <i class="fa fa-envelope"></i>

                                    </span>

                                    <input
                                        type="email"
                                        class="form-control"
                                        name="login"
                                        id="login"
                                        placeholder="email@exemplo.com"
                                        required>

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
                                        class="form-control"
                                        id="senha"
                                        name="senha"
                                        placeholder="Digite sua senha"
                                        required>

                                    <button
                                        type="button"
                                        class="btn btn-outline-secondary"
                                        id="mostrarSenha">

                                        <i class="fa fa-eye"></i>

                                    </button>

                                </div>

                            </div>

                            <div class="form-check mb-4">

                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    id="termos"
                                    required>

                                <label class="form-check-label">

                                    Aceito os <a href="#">Termos de Uso</a>

                                </label>

                            </div>

                            <div class="d-grid">

                                <button
                                    class="btn btn-primary"
                                    type="submit">

                                    <i class="fa-solid fa-user-plus"></i>

                                    Criar Conta

                                </button>

                            </div>

                            <div class="divider">

                                <span>OU</span>

                            </div>

                            <div class="d-grid">

                                <a href="../login/googleLogin.php" class="btn btn-danger">

                                    <i class="fab fa-google"></i>

                                    Continuar com Google

                                </a>

                            </div>

                            <p class="text-center mt-4">

                                Já possui uma conta?

                                <a href="../../login/loginIndex.php">

                                    Entrar

                                </a>

                            </p>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<?php include("../../includes/footer.php"); ?>

<script>

const senha=document.getElementById("senha");
const btn=document.getElementById("mostrarSenha");

btn.onclick=function(){

    if(senha.type==="password"){

        senha.type="text";
        btn.innerHTML='<i class="fa fa-eye-slash"></i>';

    }else{

        senha.type="password";
        btn.innerHTML='<i class="fa fa-eye"></i>';

    }

}

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>