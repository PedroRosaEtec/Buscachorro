<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="email" name = "email" required>
        <input type="submit" value="Recuperar" name = "action">
    </form>

    <?php
    if(!empty($_POST) && $_POST['action'] == "Recuperar")
        RecuperarSenha($_POST['email'])


    ?>
</body>
</html>