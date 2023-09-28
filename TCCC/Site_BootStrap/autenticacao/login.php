<?php
require_once 'head.php'; // Importe o código do header e as estilizações
require_once 'functions.php'; // Importe suas funções PHP
require_once 'footer.php'; // Importe o footer

if (!empty($_POST) && $_POST['action'] == "Entrar") {
    ValidarLogin($_POST['email'], $_POST['senha']);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu Site - Login</title>
    <link rel="stylesheet" href="css/stylelogin.css"> 
</head>
<body  style="background-image: url('img/img1fullclean.png'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 offset-sm-4">
                <!--CARD PARA LOGIN -->
                <div class="card">
                    <div class="card-header text-center">
                        Login
                    </div>
                    <div class="card-body">
                        <form method="post" class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" required class="form-control" placeholder="Digite seu email"><br>

                            <label for="senha">Senha</label>
                            <input type="password" name="senha" required class="form-control" placeholder="Digite sua senha"><br>

                            <input type="submit" value="Entrar" name="action" class="btn btn-success float-right"><br><br>

                            <div class="card-footer text-center">
                                Ainda não é cadastrado?
                                <a href="cadastro.php">Clique aqui!</a>
                                <a href="recuperarSenha.php">Esqueceu a senha?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php  ?>
</body>
</html>
