<!-- <<<<<<< HEAD -->
<!doctype html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscachorro</title>
    <!-- Inclua as bibliotecas do Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>
<!-- ======= -->
<?php

session_start();
if(!empty($_SESSION['id'])){
    $_SESSION['id'];
    $_SESSION['nome'];
}
else{
    header("Location: logoff.php");
}

?>
<head>


  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>bootstrap</title>
  
  <link rel="stylesheet" href="entrada_painel/css/style.css">
<!-- >>>>>>> fdeb941bc52a681c3eef468765d31bc588289d8a -->

    <!-- Seus estilos personalizados -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/carousel.css"> 

</head>
<body>
    <header>
        <img id="logo" src="img/logo2.png" alt="Logo">
        <div id="logo-text">Buscachorro</div>
        <div class="header-buttons">
            <div class="header-button"><a href="index.php">HOME</a></div>
            <div class="header-button"><a href="#">SOBRE-NÓS</a></div>
            <div class="header-button"><a href="#">CONTATO</a></div>
            <div class="header-button"><a href="login.php">CONECTE-SE</a></div>
            <div class="header-button"><a href="post.php">POST</a></div>
        </div>
    </header>
</body>
</html>