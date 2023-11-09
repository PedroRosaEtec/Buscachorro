<?php
require_once "header.php";
require_once "validar.php";
require_once "navigation.php";

?>

<!--<link rel="stylesheet" type="text/css" href="style.css"> -->

<section class="vh-100" >
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="./img/teste.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem ; " />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="post">
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Buscachorro</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Entre na sua conta</h5>

                  <div class="form-outline mb-4">
                    <input type="email" name ="email" id="email" class="form-control form-control-lg" />
                    <label class="form-label" for="email">Email</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" name="senha" id="senha" class="form-control form-control-lg" />
                    <label class="form-label" for="senha">Senha</label>
                  </div>

                  <div class="pt-1 mb-4">
                  <!-- <input type="submit" value="Entrar" name="action" class="btn btn-info btn-block"> -->
                  <input type="submit" value="Entrar" class="btn btn-primary" name="action">
                    <!-- <button class="btn btn-dark btn-lg btn-block" type="button" value="Entrar" name="action">Entrar</button> -->
                  </div>

                  <a class="small text-muted" href="#!">Esqueceu sua senha?</a>
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Não tem uma conta? 
                  <a href="#" data-toggle="modal" data-target="#cadastrar" style="color: #393f81;">Registre aqui</a>
                  </p>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- <div class="container">
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
    </div> -->

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