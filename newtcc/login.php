<?php
require_once "header.php";
require_once "validar.php";
require_once "navigation.php";

?>
<div class="container">
    <div class="row">
        <div class="col-sm-4 offset-sm-4">
            <div class="card">
                <div class="card-header">
                    <img src="img/logo.png" alt="imagem_logo" id="logo" class="img-fluid">
                </div>
                <div class="card-body">
                    <form method="post" class="form-group">

                        <input type="email" name="email" placeholder="Digite seu email!" id="email" class="form-control">
                        <br>

                        <input type="password" name="senha" id="senha" placeholder="Digite sua senha!" class="form-control">
                        <br>
                    
                        <input type="submit" value="Entrar" name="action" class="btn btn-info btn-block">

                        <button class="btn btn-warning btn-block text-white">
                            Recuperar Senha
                        </button>
                    </form>
                </div>

                <div class="card-footer text-center">
                    Ainda não é cadastrado ?
                    <a href="#" data-toggle="modal" data-target="#cadastrar">Clique aqui!</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal cadastrar usuario -->

    <div class="modal fade" id="cadastrar" data-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form method="post" class="form-group">
                    <div class="modal-header text-center">
                        Cadastre-se já!
                    </div>

                    <div class="modal-body text-center">
                    <input type="text" name="nome" placeholder="Seu nome"  class="form-group" required>
                        <br>

                        <input type="text" name="telefone" placeholder="Seu telefone"  class="form-group" required>
                        <br>

                        <input type="email" name="email" placeholder="Seu email"  class="form-group" required>
                        <br>

                        <input type="password" name="senha" placeholder="Sua senha"  class="form-group" required>
                        <br>

                        <input type="password" name="senha2" placeholder="Confirme sua senha"  class="form-group" required>
                        <br>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secundary" data-dismiss="modal">Fechar</button>
                        <input type="submit" value="Cadastrar" class="btn btn-primary" name="action">
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>


<?php
    if(!empty($_POST)){
        if($_POST['action'] == "Cadastrar"){
            if($_POST['senha'] == $_POST['senha2']){
                CadastrarUsuario(
                    $_POST['nome'],
                    $_POST['telefone'],
                    $_POST['email'],
                    $_POST['senha']
                );
            }
            else{
                Erro("Ops! As senha digitadas não se coincidem!");
            }
        }
        else if($_POST['action'] == "Entrar"){
            ValidarLogin($_POST['email'], $_POST['senha']);
        }
    }

?>