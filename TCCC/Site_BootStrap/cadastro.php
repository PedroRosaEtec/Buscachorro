<?php
require_once 'head.php'; // Importe o código do header e as estilizações
require_once 'functions.php'; // Importe suas funções PHP

if (!empty($_POST) && $_POST['action'] == "Cadastrar") {
    CadastrarUsuario($_POST['nome'], $_POST['email'], $_POST['senha']);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu Site - Cadastro</title>
    <link rel="stylesheet" href="css/stylelogin.css"> <!-- Adicione esta linha para importar o CSS -->
</head>
<body  style="background-image: url('img/img1fullclean.png'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;">>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 offset-sm-4">
                <!--CARD PARA CADASTRO COM MODAL-->
                <div class="card">
                    <div class="card-header text-center">
                        Cadastro
                    </div>
                    <div class="card-body">
                        <form method="post" class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" required class="form-control" placeholder="Digite seu nome"><br>

                            <label for="email">E-mail</label>
                            <input type="email" name="email" required class="form-control" placeholder="Digite seu E-mail"><br>


                            <label for="senha">Telefone</label>
                            <input type="number" name="telefone" required class="form-control" placeholder="Digite seu telefone" required><br>

                            <label for="senha">Senha</label>
                            <input type="password" name="senha" required class="form-control" placeholder="Digite sua senha" required><br>

                            <input type="submit" value="Cadastrar" name="action" class="btn btn-success float-right"><br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once 'footer.php'; // Importe o footer ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
