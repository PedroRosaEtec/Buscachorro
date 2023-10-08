<?php
// Importar os arquivos necessários e definir variáveis
require_once './conect.php';
require_once 'functions.php';
require_once '../head.php';

$pagina = 'cadastrar_animal.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Cadastro de Cachorro</title>
</head>

<body>
    <h1>Cadastro de Cachorro</h1>
    <!-- Formulário HTML para cadastrar um cachorro -->
    <form action="" method="post" enctype="multipart/form-data">
        <p><label for="">Selecione o arquivo que deseja enviar!</label></p>

        <label for="Nome do animal">Digite o nome do animal:</label><br><br>
        <input type="text" name="nome_animal" placeholder="Digite o nome do animal"><br><br>

        <label for="Sexo">Sexo</label>
        <select name="sexo">
            <option value="1">Macho</option>
            <option value="2">Fêmea</option>
        </select><br><br>

        <label for="ponto referencia">Ponto de referencia</label>
        <input type="text" name="ponto_ref" required placeholder="Digite o ponto de referencia"><br><br>

        <label for="porte">Porte do animal</label>
        <select name="porte">
            <option value="1">Pequeno</option>
            <option value="2">Médio</option>
            <option value="3">Grande</option>
        </select>

        <label for="descrição">Descrição</label>
        <input type="text" name="descricao" placeholder="Digite a descrição"><br><br>

        <label for="cor">Cor do animal</label>
        <select name="cor">
            <option value="0">Selecione uma cor</option>
            <?php
            // Loop para preencher as opções de cor a partir do banco de dados
            $sql = 'SELECT * FROM tb_cor ORDER BY nm_cor ASC;';
            $res = $GLOBALS['con']->query($sql);

            // Loop while para percorrer todos os registros de cor
            while ($row = mysqli_fetch_assoc($res)) {
                $cd_cor = $row['cd_cor'];
                $nm_cor = $row['nm_cor'];
                echo '<option value="' . $cd_cor . '">' . $nm_cor . '</option>';
            }
            ?>
        </select><br><br>

        <label for="Raça">Raça</label>
        <select name="raca">
            <option value="0">Selecione uma raça</option>
            <?php
            // Loop para preencher as opções de raça a partir do banco de dados
            $sql = 'SELECT * FROM tb_raca ORDER BY nm_raca ASC;';
            $res = $GLOBALS['con']->query($sql);

            // Loop while para adicionar as opções de raça
            while ($row = mysqli_fetch_assoc($res)) {
                $cd_raca = $row['cd_raca'];
                $nm_raca = $row['nm_raca'];
                echo '<option value="' . $cd_raca . '">' . $nm_raca . '</option>';
            }
            ?>
        </select><br><br><br><br>
        <input type="file" name="imagem" required>

        <input type="submit" name="action" value="Cadastrar">
    </form>
</body>

</html>

<?php
// Processar os dados do formulário quando o formulário for enviado
if (!empty($_POST)) {
    if ($_POST['action'] == "Cadastrar") {
        // Verificar a extensão do arquivo de imagem
        $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);

        // Verificar se a extensão é válida
        if ($extensao == "png" || $extensao == "jpg" || $extensao == "jpeg" || $extensao == "jfif" || $extensao == "webp") {
            $uploaddir = "img/";

            // Definir a extensão correta para a imagem
            if ($extensao == "jpeg" || $extensao == "jfif" || $extensao == "webp") {
                $ext = strtolower(substr($_FILES['imagem']['name'], -5));
            } else if ($extensao == "png" || $extensao == "jpg") {
                $ext = strtolower(substr($_FILES['imagem']['name'], -4));
            }

            // Gerar um nome único para a imagem
            $imagem = md5(date("d-m-y-h-i-s") . $_FILES['imagem']['name']) . $ext;
            $uploadfile = $uploaddir . basename($imagem);

            // Mover o arquivo de imagem para o diretório de upload
            move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadfile);

            // Chamar a função CadastrarAnimal com os dados do formulário
            CadastrarAnimal(
                $_POST['nome_animal'],
                $_SESSION['id'],
                $pagina,
                $imagem,
                $_POST['raca'],
                $_POST['sexo'],
                $_POST['descricao'],
                $_POST['ponto_ref'],
                $_POST['porte'],
                $_POST['cor'],
            );
        }
    } else {
        echo "Extensão não permitida!";
    }
}
?>
