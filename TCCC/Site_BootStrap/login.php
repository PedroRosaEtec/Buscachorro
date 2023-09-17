<?php
require_once 'head.php';
require_once 'functions.php'
?>

<body class="bk-color-login">
  
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-4 offset-sm-4">


          <!--CARD PARA LOGIN COM MODAL-->
          <div class="card">
            <div class="card-header text-center">
              Login
            </div>

            <div class="card-body">
              <form method="post" class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" required class="form-control" placeholder="Digite seu email"><br>

                <label for="senha">Senha</label>
                <input type="password" name="senha" required class="form-control" placeholder="Digite sua senha"><br>

                <input type="submit" value="Entrar" name="action" class="btn btn-success float-right"><br><br>


                
                <div class="card-footer text-center">
                  Ainda não é cadastrado?
                  <a href="#" data-toggle="modal" data-target="#cadastrar">Clique aqui!</a>
                </div>

              </form>
            </div>


          </div>
        </div>
      </div>
    </div>

    <!-- MODAL DE CADASTRO DO USUARIO-->
    <div class="modal face" id="cadastrar" data-backdrop="static">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="post">
            <div class="modal-header">
              Cadastrar
            </div>

            <div class="modal-body">
              <label for="Nome">Nome</label>
              <input type="text" name="nome" required class="form-control" placeholder="Digite seu nome"><br>
              <label for="E-mail">E-mail</label>
              <input type="email" name="email" required class="form-control" placeholder="Digite seu E-mail"><br>
              <label for="senha">Senha</label>
              <input type="password" name="senha" required class="form-control" placeholder="Digite sua senha"><br>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal">Fechar</button>

              <input type="submit" value="Cadastrar" name="action" class="btn btn-success">

            </div>
          </form>
        </div>
      </div>

    </div>

</body>

<?php
require_once 'footer.php';

if (!empty($_POST)) {
  if ($_POST['action'] == "Entrar") {
    ValidarLogin($_POST['email'], $_POST['senha']);
  }
};

if(!empty($_POST)){

  if($_POST['action'] == "Cadastrar"){
    CadastrarUsuario(
      $_POST['nome'],
       $_POST['email'],
        $_POST['senha']);
  }
};


?>