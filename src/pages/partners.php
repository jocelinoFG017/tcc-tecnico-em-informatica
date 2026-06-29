<?php
// Exemplo de parceiros (pode vir do banco de dados depois)
$parceiros = [
    [
        'nome' => 'Red Salet Studios',
        'logo' => '../../assets/imagens/parceiros/gameStudio.png',
        'link' => 'https://github.com/jocelinoFG017'
    ],
    [
        'nome' => 'J2G Development',
        'logo' => '../../assets/imagens/parceiros/softwareDev.png',
        'link' => 'https://github.com/jocelinoFG017'
    ],
];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Parceiros | Loja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/cssflex.css">
</head>
<body>
    <?php include_once("../templates/header.php"); ?>
<main class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Nossos Parceiros</h2>
        <div class="row g-4 justify-content-center">
            <?php foreach($parceiros as $parceiro): ?>
                <div class="col-12 col-sm-6 col-lg-3 d-flex justify-content-center">
                    <div class="card h-100 text-center shadow-sm" style="width: 100%; max-width: 250px;">
                        <img src="<?php echo $parceiro['logo']; ?>" class="card-img-top p-3" alt="<?php echo htmlspecialchars($parceiro['nome']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($parceiro['nome']); ?></h5>
                            <a href="<?php echo $parceiro['link']; ?>" target="_blank" class="btn btn-primary btn-sm mt-2">Visitar Site</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>


    <?php include_once("../templates/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>