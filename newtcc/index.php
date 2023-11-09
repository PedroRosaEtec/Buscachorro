<?php
require_once "header.php";
require_once "navigation.php";
?>

<link rel="stylesheet" type="text/css" href="style.css">

<body>
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

                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="card h-100 d-flex flex-column">
                        <img class="card-img-top" height="180" width="287"
                            src="<?php echo 'painel-cliente/img_animais/' . $dados['url_imagem']; ?>"
                            alt="Imagem do animal">

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">
                                <?php echo $dados['nm_animal']; ?>
                            </h5>
                            <p class="card-text">
                                <?php echo $dados['descricao']; ?>
                            </p>
                            <button type="button" class="btn btn-primary mt-auto" data-toggle="modal"
                                data-target="#visitar">
                                Visitar
                            </button>
                        </div>
                    </div>
                </div>




                <?php
            }
            ?>
        </div>
    </div>


    <!-- Modal para visitar o animal -->


    <div class="modal fade" id="visitar">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Título do Modal</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

</body>