<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Ethernity</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/cssflex.css">
</head>
<body>
    <?php include("../templates/header.php"); ?>
<main>
<section class="container my-5">
    <h1 class="text-center mb-4">Perguntas Frequentes</h1>
    <p class="text-center mb-5">
        Aqui você encontra respostas para as dúvidas mais comuns sobre a <strong>Ethernity</strong> e nossos serviços. 
        Se não encontrar a resposta, entre em contato conosco!
    </p>

    <div class="accordion" id="faqAccordion">

        <!-- Pergunta 1 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Quais são os horários de funcionamento da Ethernity?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Nosso petshop funciona de segunda a sexta, das 08:30 às 12:00 e das 13:30 às 18:00. Aos sábados, atendemos em horário reduzido, mediante agendamento.
                </div>
            </div>
        </div>

        <!-- Pergunta 2 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Como posso comprar produtos online?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Você pode comprar diretamente pelo nosso site ou entrar em contato pelo WhatsApp para finalizar o pedido. Aceitamos pagamentos via PIX, cartão de crédito e débito.
                </div>
            </div>
        </div>

        <!-- Pergunta 3 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Vocês entregam produtos em domicílio?
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Sim! Realizamos entregas em domicílio para pedidos feitos online ou via WhatsApp, com agendamento prévio e taxa de entrega variável de acordo com a localização.
                </div>
            </div>
        </div>

        <!-- Pergunta 4 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Posso cancelar ou trocar um pedido?
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Sim, você pode solicitar o cancelamento ou troca de produtos dentro de 7 dias após a compra. Entre em contato conosco para orientação sobre devoluções e reembolsos.
                </div>
            </div>
        </div>

    </div>
</section>
</main>
<?php include("../templates/footer.php"); ?>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
