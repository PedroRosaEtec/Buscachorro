<?php
require_once "header.php";
require_once "navigation.php";
?>

<link rel="stylesheet" type="text/css" href="Style.css">

<body>

<div class="centered-card">
        <div class="card">
            <div class="card-image">
                <figure class="image is-4by3">
                    <img src="./img/sobre.jpg" alt="Placeholder image" width="100%" height="auto">
                </figure>
            </div>
            <div class="card-content">
                <div class="media">
                    <div class="media-left">
                        <figure class="image is-48x48">
                            <img src="./img/logo.png" alt="Placeholder image" width="48" height="48">
                        </figure>
                    </div>
                    <div class="media-content">
                        <p class="title is-4">Buscachorro</p>
                        <p class="subtitle is-6">Cada minuto conta quando um animal está desaparecido, e os riscos que eles enfrentam são significativos. Portanto, serviços como "Buscachorro" desempenham um papel crucial ao fornecer uma plataforma e recursos para ajudar os proprietários a reunir-se com seus animais de estimação perdidos.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <?php
            $sql = '
        SELECT nm_animal, descricao, url_imagem
        FROM tb_animal AS an
        INNER JOIN tb_foto AS ft ON an.cd_animal = ft.id_animal;
        ';

            $res = $GLOBALS['con']->query($sql);

            while ($dados = mysqli_fetch_assoc($res)) {
                ?>

                <div class="col-md-3 mb-3">
                    <div class="card border-primary">
                        <img class="card-img-top" src="<?php echo 'painel-cliente/img_animais/' . $dados['url_imagem']; ?>"
                            alt="Imagem do animal">

                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $dados['nm_animal']; ?>
                            </h5>
                            <p class="card-text">
                                <?php echo $dados['descricao']; ?>
                            </p>
                            <a href="#" class="btn btn-primary">Visitar</a>
                        </div>
                    </div>
                </div>


                <?php
            }
            ?>
        </div>
    </div>

</body>
