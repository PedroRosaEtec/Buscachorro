<?php
require_once("header.php");
require_once("navigation.php");
?>

<body>
    <div class="container">
        
        <div class="search-bar-container">
            <input type="text" class="form-control search-input" id="searchInput" placeholder="Pesquisar por nome...">
            <div class="filter-dropdown" id="filterDropdown">
             
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <div class="w-48">
                            <label for="sexo" class="form-label">Sexo</label>
                            <select class="form-select" name="sexo" required>
                                <option value="1">Macho</option>
                                <option value="2">Fêmea</option>
                            </select>
                        </div>
                        <div class="w-48">
                            <label for="cor" class="form-label">Cor do animal</label>
                            <select class="form-select" name="cor">
                                <option value="0">Selecione uma cor</option>
                                <?php
                                
                                $sql = 'SELECT * FROM tb_cor ORDER BY nm_cor ASC;';
                                $res = $GLOBALS['con']->query($sql);

                               
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $cd_cor = $row['cd_cor'];
                                    $nm_cor = $row['nm_cor'];
                                    echo '<option value="' . $cd_cor . '">' . $nm_cor . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <div class="w-48">
                            <label for="porte" class="form-label">Porte do animal</label>
                            <select class="form-select" name="porte" required>
                                <option value="1">Pequeno</option>
                                <option value="2">Médio</option>
                                <option value="3">Grande</option>
                            </select>
                        </div>
                        <div class="w-48">
                            <label for="raca" class="form-label">Raça</label>
                            <select class="form-select" name="raca">
                                <option value="0">Selecione uma raça</option>
                                <?php
                               
                                $sql = 'SELECT * FROM tb_raca ORDER BY nm_raca ASC;';
                                $res = $GLOBALS['con']->query($sql);

                                
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $cd_raca = $row['cd_raca'];
                                    $nm_raca = $row['nm_raca'];
                                    echo '<option value="' . $cd_raca . '">' . $nm_raca . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="text-center mt-4">Encontre seu animal!</h2>
        <hr>

        <div class="row">
            <?php
            $sql = '
            SELECT cd_animal, nm_animal, descricao, url_imagem
            FROM tb_animal AS an
            INNER JOIN tb_foto AS ft ON an.cd_animal = ft.id_animal
            ORDER BY an.dt_registro DESC;'; 

            $res = $GLOBALS['con']->query($sql);
            while ($dados = mysqli_fetch_assoc($res)) {
                ?>

                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="card h-100 d-flex flex-column shadow p-3 mb-5 bg-white rounded">
                        <img class="card-img-top" height="180" width="287"
                            src="<?php echo 'img_animais/' . $dados['url_imagem']; ?>"
                            alt="Imagem do animal">

                        <div class="card-body d-flex flex-column">
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
                               
                                <img class="card-img-top" height="400" width="500"
                                    src="<?php echo 'img_animais/' . $dados['url_imagem']; ?>" alt="Imagem do animal">
                                <h3>
                                    <label for="nome do animal">Nome do Animal:</label><br>
                                    <?php echo $dados['nm_animal']; ?>
                                </h3>
                                <p class="card-text">
                                    <?php echo $dados['descricao']; ?>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>
        </div>
    </div>

    <style>
       
        .search-bar-container {
            position: relative;
            width: 100%;
        }

        .search-input {
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .filter-dropdown {
            position: absolute;
            top: calc(100% + 10px); 
            left: 0;
            width: 100%;
            background-color: #f0f0f0; 
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: none;
            z-index: 1000;
        }

        
        .filter-dropdown label {
            display: block;
            margin-bottom: 5px;
        }

        .filter-dropdown select {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        
        .filter-dropdown .d-flex {
            display: flex;
            justify-content: space-between;
        }

        .filter-dropdown .w-48 {
            width: 48%;
        }
    </style>

    <script>
       
        document.addEventListener('DOMContentLoaded', function () {
            var searchInput = document.getElementById('searchInput');
            var filterDropdown = document.getElementById('filterDropdown');

            searchInput.addEventListener('focus', function () {
                filterDropdown.style.display = 'block';
            });

            document.addEventListener('click', function (event) {
                if (!searchInput.contains(event.target) && !filterDropdown.contains(event.target)) {
                    filterDropdown.style.display = 'none';
                }
            });
        });
    </script>

    <?php
    require_once 'footer.php';
    ?>
</body>
