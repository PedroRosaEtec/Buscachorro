<?php

require_once "header.php";
require_once "navigation.php";

?>

<body>
    <div class="container">
        <div class="row">
            <div class="class-sm-12 text-center">
                <?php
                $sql = '
                select nm_animal,
                descricao ,
                url_imagem
                from
                tb_animal as an
                inner join tb_foto as ft on an.cd_animal = ft.id_animal;
                ';

                $res = $GLOBALS['con']->query($sql);
                
                while ($dados = mysqli_fetch_assoc($res))

                if ($res->num_rows > 0) {
                    ?>
                    

                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="
                        
                        <?php
                            $path_animal = $dados['url_imagem'];
                            echo "src='$path_animal'"
                        ?>" alt="Imagem do cachorro">
                        <div class="card-body">
                            <h5 class="card-title">

                                <?php
                                $nm_animal = $dados['nm_animal'];
                                echo"$nm_animal";
                                ?>
                            
                            </h5>
                            <p class="card-text">
                                <?php 
                                    $descricao = $dados['descricao'] ;
                                    echo "$descricao";
                                ?> 
                            </p>
                            <a href="#" class="btn btn-primary">Visitar</a>
                        </div>
                    </div>

                    <?php
                }
                ?>

            </div>
        </div>
    </div>
</body>