<?php

require_once 'header.php';
function Confirma($msg, $pagina){
    print '
            <div class="modal fade" id="myModal" data-backdrop="static">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    
                        <div class="modal-header text-center">
                            Confirmação
                        </div>

                        <div class="modal-body text-center">
                            '.$msg.'
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-primary" data-dismiss="modal" onclick="redireciona()">OK</button>
                        </div>
                    
                </div>
            </div>

        </div>

        <script>
            function redireciona(){
                location.href = "'.$pagina.'";
            }
        </script>
    ';
}


function Erro ($msg){
    print '
    <div class="modal fade" id="myModal" data-backdrop="static">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            
                <div class="modal-header text-center">
                    Erro
                </div>

                <div class="modal-body text-center">
                    '.$msg.'
                </div>

                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal" onclick="redireciona()">OK</button>
                </div>
            
        </div>
    </div>

</div>

<script>
    function redireciona(){
        history.go(-1);
    }
</script>
';
}


function CadastrarUsuario( $nome, $sobrenome , $email, $senha){
    $sql = '
    insert into tb_usuario set
    nm_usuario = "'.$nome.'",
    nm_sobrenome = "'.$sobrenome.'",
    nm_email = "'.$email.'",
    cd_senha = md5("'.$senha.'")
    ';

    $res = $GLOBALS['con']->query($sql);
    if($res){
        Confirma("Cadastrado com sucesso!", "login.php");
        }
        else
        {
            Erro("Há algum erro ai!:");
        }
}


function ValidarLogin($email, $senha){
    $sql = '
    select cd_usuario, 
    nm_usuario,
    id_tipo_usuario from
    tb_usuario
    where
    nm_email = "'.$email.'" and
    cd_senha = md5("'.$senha.'") and
    st_usuario = "1";
    ';


    $res = $GLOBALS['con']->query($sql);

    if($res->num_rows == 1){
        $exibe = $res->fetch_array();
        session_start();
        if($exibe['id_tipo_usuario'] == 1){
            $_SESSION['id'] = $exibe['cd_usuario'];
            $_SESSION['user'] = $exibe['nm_usuario'];
            $_SESSION['tipo'] = $exibe['id_tipo_usuario'];
            Confirma("Bem vindo", "painel/index.php");
    }else

    if($exibe['id_tipo_usuario'] == 2){
        $_SESSION['id'] = $exibe['cd_usuario'];
        $_SESSION['user'] = $exibe['nm_usuario'];
        $_SESSION['tipo'] = $exibe['id_tipo_usuario'];
        Confirma("Bem vindo", "index.php");
    }else
        Erro("Login não realizado!");
    
    }
}
?>