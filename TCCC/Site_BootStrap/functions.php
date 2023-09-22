<?php
require_once 'conect.php';

function ValidarLogin($email, $senha){
    $sql = ' 
      select cd_usuario from tb_usuario
      where
      nm_email = "'.$email.'" and
      nm_senha = md5( "'.$senha.'")
    ';

    $res = $GLOBALS['con']->query($sql);
    if($res->num_rows == 1){
        $exibe = $res->fetch_array();
        session_start();
        $_SESSION['id'] = $exibe['cd_usuario'];
        $_SESSION['nome'] = $exibe['nm_usuario'];
      //  Confirma("Bem Vindo!", "painel/"); FUNCÃO CONFIRMA !!!!!!!!

      print'
      <script>
          alert("Logado com Sucesso!!");
          location.href = "index.html";
      </script>
      ';
    }
    else{
        // Erro("O E-mail ou a Senha estão inválidos! Tente novamente");
        print'
        <script>
            alert("O E-mail ou a Senha estão inválidos! Tente novamente");
            history.go(-1);
        </script>
        ';

    }
};


function CadastrarUsuario($nome, $email,$telefone, $senha, $senha_confirmation){

  if($senha == $senha_confirmation){
  $sql ='insert into tb_usuario set
  nm_nome = "'.$nome.'",
  nm_email = "'.$email.'",
  nm_senha = md5("'.$senha.'"),
  ct_usuario = "'.$telefone.'",
  cd_tipo_usuario = 1;  ';

  $res = $GLOBALS['con']->query($sql);

  if($res){
  print'
  <script>
    alert("Registrado com sucesso!!");
  </script>
  ';
  }
  else
  {
    print'
    <script>
      alert("Erro ao cadastrar. Tente novamente!");
    </script>
    ';
  };
}

else
{
  print'
  <script>
    alert("Digite a mesma senha para ambos os campos!");
  </script>
  ';
}
}


function RecuperarSenha($email){
  $sql ='
  select cd_usuario from tb_usuario 
  where
  nm_email = "'.$email.'";
  ';

  $res = $GLOBALS['con']->query($sql);

  if($res->num_rows == 1){
    print'
    <script>
      alert("Email encontrado com sucesso");
      </script>
    ';
  }
    else{
      print'
      <script>
      alert("Email não encontrado com sucesso");
      </script>
      ';
  }
}
?>