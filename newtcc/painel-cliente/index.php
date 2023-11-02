<?php
require_once("header.php");
require_once("navigation.php");

?>
<body>
    <div class="container">


    <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
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
                    <div class="card">
                        <img class="card-img-top" src="<?php echo 'img_animais/' . $dados['url_imagem']; ?>"
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