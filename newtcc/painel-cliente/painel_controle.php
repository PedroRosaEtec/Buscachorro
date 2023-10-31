<?php
require_once("../header.php");
require_once "navigation.php";

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Seu Perfil</h4>
                    <p class="card-text">Nome de usuário: John Doe</p>
                    <p class="card-text">E-mail: john.doe@example.com</p>
                    <a href="#" class="btn btn-primary">Editar Perfil</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Configurações</h4>
                    <div class="form-group">
                        <label for="newPassword">Nova Senha</label>
                        <input type="password" class="form-control" id="newPassword">
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirmar Senha</label>
                        <input type="password" class="form-control" id="confirmPassword">
                    </div>
                    <button class="btn btn-success">Salvar Senha</button>
                </div>
            </div>
        </div>
    </div>
</div>