<?php

session_start();
if(!empty($_SESSION['id'])){
    $_SESSION['id'];
    $_SESSION['nome'];
}
else{
    header("Location: logoff.php");
}
// require head e outras coisas tbm

require_once './conect.php';
require_once 'functions.php';

$pagina = 'cadastrar_animal.php';

?>

<!DOCTYPE html>
<html>

<head>
    <title>Cadastro de Cachorro</title>
</head>

<body>
    <h1>Cadastro de Cachorro</h1>

    <!-- Terminar de fazer o resto do formulários!!!! -->

    <form action="" method="post" enctype="multipart/form-data">
        <p><label for="">Selecione o arquivo que deseja enviar!</label></p>

        <label for="Nome do animal">Digite o nome do animal:</label><br><br>
        <input type="text" name="nome_animal" placeholder="Digite o nome do animal"><br><br>

        <!-- <select name="sexo">
        <label for="Sexo do animal">Escola o sexo do animal</label><br><br>
            <option value="m">Macho</option>
            <option value="f">Femêa</option>
        </select><br><br> 

        No Caso de cor e raça devera ser coloca um loop de repetição para puxar todos os dados do banco de dados para o html
    
    -->

        <input type="file" name="imagem" required>

        <input type="submit" name="action" value="Cadastrar">
    </form>
</body>

</html>

<?php

if (!empty($_POST)) {
    if ($_POST['action'] == "Cadastrar") {
        $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);

        if ($extensao == "png" || $extensao == "jpg" || $extensao == "jpeg" || $extensao == "jfif" || $extensao == "webp") {
            $uploaddir = "img/";

            if ($extensao == "jpeg" || $extensao == "jfif" || $extensao == "webp") {

                $ext = strtolower(substr($_FILES['imagem']['name'], -5));

            } else if ($extensao == "png" || $extensao == "jpg") {
                $ext = strtolower(substr($_FILES['imagem']['name'], -4));
            }

            $imagem = md5(date("d-m-y-h-i-s") . $_FILES['imagem']['name']) . $ext;
            $uploadfile = $uploaddir . basename($imagem);
            move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadfile);

            CadastrarAnimal(
                $_POST['nome_animal'],
                $_SESSION['id'],
                $pagina,
                $imagem
            );
            
        }
    }else{
        echo "Extensao nao permitida!";
    }
}
?>