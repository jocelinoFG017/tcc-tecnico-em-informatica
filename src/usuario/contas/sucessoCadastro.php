<?php
session_start();
if (!isset($_SESSION['cadastro_sucesso'])) {
    header("Location: ../../login/loginIndex.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro realizado</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card shadow-lg p-5 text-center">

        <h3 class="text-success mb-3">✔ Cadastro realizado com sucesso!</h3>

        <p class="mb-4">
            Agora você será redirecionado para a tela de login...
        </p>

        <div class="spinner-border text-primary mx-auto" role="status"></div>

    </div>
</div>

<script>
    setTimeout(() => {
        window.location.href = "../../login/loginIndex.php";
    }, 2500);
</script>

<?php unset($_SESSION['cadastro_sucesso']); ?>

</body>
</html>