
<?php 
require_once 'head.php';
require_once 'functions.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha</title>
    <link rel="stylesheet" href="css/stylelogin.css"> 
</head>
<body style="background-image: url('img/img1fullclean.png'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 offset-sm-4">
                
                <div class="card">
                    <div class="card-header text-center">
                        Recuperar Senha
                    </div>
                    <div class="card-body">
                        <form method="post" class="form-group">
                            <label for="email">Informe seu E-mail</label>
                            <input type="email" name="email" required class="form-control" placeholder="Digite seu e-mail"><br>

                            <input type="submit" value="Recuperar" name="action" class="btn btn-success float-right"><br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (!empty($_POST) && $_POST['action'] == "Recuperar") {
        RecuperarSenha($_POST['email']);
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
s