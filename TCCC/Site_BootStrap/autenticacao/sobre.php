<?php
require_once 'head.php';
?>

<div class="img-container">
    <img src="img/img1fullclean.png" class="img-fluid" alt="">
    <div class="overlay">
        <div class="conteudo">
            <div class="nome">Buscachorro</div>
                <!-- texto -->
                <div class="sobre">
                    <p>O "Buscachorro" é uma plataforma online fácil de usar que permite que</p>
                    <p>pessoas registrem seus animais de estimação desaparecidos. Os donos podem carregar</p>
                    <p>fotos, fornecer descrições detalhadas e até mesmo especificar a última localização</p>
                    <p>conhecida do cachorro. Os recursos de busca avançada ajudam a conectar os donos de cães </p>
                    <p>com informações de avistamentos e relatórios de animais encontrados na área. Além disso, o</p>
                    <p>site mantém uma base de dados atualizada de animais perdidos e encontrados.</p>
                </div>
            <div class="botoes">
                <a href="index.php" class="botao">Voltar</a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="text-center">Curiosidades</h2>
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <!-- Centralize o carousel -->
                <div class="carousel-inner text-center">
                    <div class="carousel-item active">
                        <p>Existem mais de 30 milhões de cães de rua hoje.</p>
                    </div>
                    <div class="carousel-item">
                        <p>Os cachorros têm um olfato 10.000 a 100.000 vezes mais sensível do que o dos humanos.</p>
                    </div>
                    <div class="carousel-item">
                        <p>Os cães são considerados os melhores amigos do homem.</p>
                    </div>
                </div>

                <!-- Controles -->
                <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Próximo</span>
                </a>
            </div>
        </div>
    </div>
</div>

