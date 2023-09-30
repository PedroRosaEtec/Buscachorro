<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <form action="" method="post">



        </form>
    </body>
</html>

<?php

strtolower(pathinfo("arquivo.jpg", PATHINFO_EXTENSION));

if(!empty($_FILES['arquivo'])){
    $arquivo = $_FILES['arquivo'];

    if($arquivo['error']){
        die("Falha ao enviar o arquivo");
    }
    if($arquivo['size'] > 2097152){
        die("Arquivo muito grande! Tamanho maximo permitido: 2MB!");
    }

  $diretorio = "fotos_animais/";

    $nome_arquivo = $arquivo['name'];

    $novo_nome_arquivo = uniqid();
    $extensao_arquivo = strtolower(pathinfo($nome_arquivo, PATHINFO_EXTENSION));

    if($extensao_arquivo != "jpg" && $extensao_arquivo != "png"){
        die("Extensão não permitida!");
    }

    $upload_true = move_uploaded_file($arquivo['tmp_name'], $diretorio . $novo_nome_arquivo . "." . $extensao_arquivo);

    $nome_com_extensao =   $novo_nome_arquivo . "." . $extensao_arquivo;

    if($upload_true){
        //echo "Upload efetuado com sucesso! <a target = '_blanck' href='fotos_animais/$nome_com_extensao'>Clique aqui para acessa-lo!</a>";

        $sql = '
        INSERT INTO tb_foto set
        url_imagem = "'.$nome_com_extensao.'",
        
        ';
    }
    else{
        echo "Deu ruim!";
    }

}
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
        <input type="text" name="nome_animal" placeholder="Digite o nome do animal(se souber)"><br><br>

        <label for="Sexo do animal">Escola o sexo do animal</label><br><br>
        <!-- <select name="sexo">
            <option value="m">Macho</option>
            <option value="f">Femêa</option>
        </select><br><br> -->

        <input type="text" name="sexo_animal" placeholder="Digite o sexo do animal(se souber)"><br><br><br>

        <input type="file" name="arquivo">
        <input type="submit" value="Cadastrar" name="upload">
    </form>
</body>
</html>
