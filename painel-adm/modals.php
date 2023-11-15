<?php
require_once '../validar.php';
require_once '../conect.php';

$sql = '
            SELECT cd_animal, nm_animal, descricao, url_imagem
            FROM tb_animal AS an
            INNER JOIN tb_foto AS ft ON an.cd_animal = ft.id_animal;
            ';

$res = $GLOBALS['con']->query($sql);
while ($dados = mysqli_fetch_assoc($res)) {

    ?>


    <div class="modal fade" id="btnDeletar<?php echo $dados['cd_animal']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <?php echo $dados['nm_animal']; ?>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <img class="card-img-top" height="400" width="500"
                        src="<?php echo 'painel-cliente/img_animais/' . $dados['url_imagem']; ?>" alt="Imagem do animal">
                    <h3>
                        <label for="nome do animal">Nome do Animal:</label><br>
                        <?php echo $dados['nm_animal']; ?>
                        <?php echo $dados['cd_animal']; ?>
                    </h3>

                    <p class="card-text">
                        <?php echo $dados['descricao']; ?>
                    </p>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button class="btn btn-danger excluir" data-toggle="modal" data-target="#excluir"
                        cd="<?php echo $e['cd_animal']; ?>" title="excluir">
                        <i class="bi bi-trash3"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <?php
}
?>



<div class="modal fade" id="btnEditar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Título do Modal</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Conteúdo do modal vai aqui.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Salvar Mudanças</button>
            </div>
        </div>
    </div>
</div>