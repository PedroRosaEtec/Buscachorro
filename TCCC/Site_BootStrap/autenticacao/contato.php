<?php
require_once 'head.php';
?>

<div class="img-container">
    <img src="img/img1fullclean.png" class="img-fluid" alt="">
    <div class="overlay">
        <div class="conteudo">
            <div class="nome">Buscachorro</div>
            <div class="botoes">
                <a href="https://www.instagram.com/buscachorro/" class="botao">Instagram</a>
                <a href="https://www.facebook.com/sua_pagina" class="botao">Facebook</a>
                <a href="https://api.whatsapp.com/send?phone=12991638739" class="botao">WhatsApp</a>
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
