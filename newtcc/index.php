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
                            <button type="button" class="btn btn-primary mt-auto" data-toggle="modal"
                                data-target="#visitar<?php echo $dados['cd_animal']; ?>">
                                Visitar
                            </button>
                        </div>
                    </div>
                </div>




                <!-- Modal para visitar o animal -->


                <div class="modal fade" id="visitar<?php echo $dados['cd_animal']; ?>">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    <?php echo $dados['nm_animal']; ?>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <!-- <label for="foto"></label> -->

                                <img class="card-img-top" height="180" width="287"
                                    src="<?php echo 'painel-cliente/img_animais/' . $dados['url_imagem']; ?>"
                                    alt="Imagem do animal">
                                <?php echo $dados['nm_animal']; ?>

                                <p class="card-text">
                                <?php echo $dados['descricao']; ?>
                            </p>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            </div>
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