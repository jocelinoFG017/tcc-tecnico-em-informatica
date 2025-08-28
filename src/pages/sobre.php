<?php
   include("../conexao/conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre | Ethernity</title>
    <!-- CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/slider.css">
    <!-- Font Awesome para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
    <?php include("../templates/header.php"); ?>
    <section class="py-5">
           <div class="container">
                <div class="text-center mb-4">
<section id="sobre" style="max-width: 900px; margin: 40px auto; padding: 20px; font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <h2 style="font-size: 2em; margin-bottom: 15px; text-align: center; color: #444;">Sobre a Ethernity</h2>
    
    <p>Fundada em <strong>2017</strong>, a <strong>Ethernity</strong> nasceu com o propósito de oferecer muito mais do que produtos para pets: criamos um espaço dedicado ao cuidado, carinho e bem-estar dos seus melhores amigos.</p>
    
    <p>Desde o início, acreditamos que cada animalzinho merece atenção especial, por isso trabalhamos para reunir em nossa lojinha/petshop uma seleção de produtos de qualidade, que aliam segurança, conforto e diversão.</p>
    
    <p>Na <strong>Ethernity</strong>, você encontra tudo o que precisa para tornar a vida do seu pet mais saudável e feliz — desde rações, acessórios e brinquedos até itens de higiene e cuidados. Nossa missão é facilitar o dia a dia de quem ama os animais, oferecendo atendimento próximo e dedicado, além de novidades que acompanham as necessidades de cada fase da vida do seu companheiro.</p>
    
    <p>Mais do que uma petshop, somos apaixonados por fortalecer laços de amor entre pessoas e seus pets. Aqui, cada detalhe é pensado para que você e seu bichinho tenham sempre a melhor experiência.</p>
    
    <p style="font-weight: bold; text-align: center; margin-top: 20px; font-size: 1.1em;">
        Seja bem-vindo à família <span style="color: #e67e22;">Ethernity</span> 🐾✨
    </p>
</section>
<section id="mapa" style="max-width: 900px; margin: 40px auto; padding: 20px; font-family: Arial, sans-serif; color: #333;">
    <h2 style="font-size: 2em; margin-bottom: 15px; text-align: center; color: #444;">Onde Estamos</h2>
    
    <p style="text-align: center; margin-bottom: 20px;">
        Nos localizamos em um ponto de fácil acesso, para que você e seu pet possam nos visitar com tranquilidade.
    </p>

    <div style="width: 100%; height: 400px; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3500.7651746141646!2d-55.997334123791354!3d-28.666749075646127!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9455c7ba7ce643bf%3A0xb7b30effe324da39!2sFederal%20Institute%20Farroupilha%20-%20Campus%20S%C3%A3o%20Borja!5e0!3m2!1sen!2sbr!4v1756386370880!5m2!1sen!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            
    </div>
</section>
               
                </div>
            </div>      
</section>
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-4">
                <!-- <h2 class="fw-bold">Lista de Endereços</h2> -->
                <h3 class="text-uppercase text-muted">Nossos endereços presenciais</h3>
            </div>

            <div class="card shadow-sm border-0 p-4">
                <?php include("../Listar/tabelas/tabelaEndereco.php"); ?>
            </div>

            
        </div>
    </section>

    <?php include("../templates/footer.php"); ?>

    <!-- JS Bootstrap 5 (sem jQuery) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
