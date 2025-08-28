<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato | Ethernity</title>
    <!-- CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/slider.css">
    <!-- Font Awesome para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
    <?php include("../templates/header.php"); ?>

<section id="contato" class="container my-5">
  <h2 class="text-center mb-4">Fale Conosco</h2>
  <p class="text-center mb-4">
    Preencha o formulário abaixo para entrar em contato com a <strong>Ethernity</strong>. 
    Responderemos o mais breve possível! 🐾
  </p>
  
  <form action="enviarContato.php" method="post" class="row g-3">
    
    <div class="col-12">
      <label for="nome" class="form-label">Nome</label>
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome" required>
    </div>
    
    <div class="col-12">
      <label for="email" class="form-label">E-mail</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail" required>
    </div>

    <div class="col-12">
      <label for="whatsapp" class="form-label">WhatsApp</label>
      <input type="tel" class="form-control" id="whatsapp" name="whatsapp" placeholder="(00) 00000-0000" required>
    </div>
    
    <div class="col-12">
      <label for="mensagem" class="form-label">Mensagem</label>
      <textarea class="form-control" id="mensagem" name="mensagem" rows="5" placeholder="Escreva sua mensagem" required></textarea>
    </div>

    <div class="col-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="aceite" name="aceite" required>
        <label class="form-check-label" for="aceite">
          Aceito ser contatado pela Ethernity com base nas informações fornecidas.
        </label>
      </div>
    </div>
    
    <div class="col-12 text-center">
      <button type="submit" class="btn btn-primary px-5">Enviar</button>
    </div>
    
  </form>
</section>

<script>
// Máscara simples para o campo WhatsApp
document.getElementById("whatsapp").addEventListener("input", function(e) {
    let valor = e.target.value.replace(/\D/g, ""); // Remove tudo que não for número
    
    if (valor.length > 11) valor = valor.substring(0, 11); // Limita em 11 dígitos
    
    if (valor.length <= 10) {
        // Formato fixo: (99) 9999-9999
        e.target.value = valor.replace(/(\d{2})(\d{4})(\d{0,4})/, "($1) $2-$3");
    } else {
        // Formato celular: (99) 99999-9999
        e.target.value = valor.replace(/(\d{2})(\d{5})(\d{0,4})/, "($1) $2-$3");
    }
});
</script>


<?php include("../templates/footer.php"); ?>
</body>
</html>