<?php

require_once 'header.php';
function Confirma($msg, $pagina)
{
    print '
            <div class="modal fade" id="myModal" data-backdrop="static">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    
                        <div class="modal-header text-center">
                            Confirmação
                        </div>

                        <div class="modal-body text-center">
                            ' . $msg . '
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-primary" data-dismiss="modal" onclick="redireciona()">OK</button>
                        </div>
                    
                </div>
            </div>

        </div>

        <script>
            function redireciona(){
                location.href = "' . $pagina . '";
            }
        </script>
    ';
}


function Erro($msg)
{
    print '
    <div class="modal fade" id="myModal" data-backdrop="static">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            
                <div class="modal-header text-center">
                    Erro
                </div>

                <div class="modal-body text-center">
                    ' . $msg . '
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


function CadastrarUsuario($nome, $telefone, $email, $senha)
{
    $sql = '
    insert into tb_usuario set
    nm_nome = "' . $nome . '" ,
    ct_usuario = "' . $telefone . '",
    nm_email = "' . $email . '",
    nm_senha = md5("' . $senha . '"),
    cd_tipo_usuario = "1",
    cd_status_usuario = "1";
    ';

    $res = $GLOBALS['con']->query($sql);
    if ($res) {
        Confirma("Cadastrado com sucesso!", "login.php");
    } else {
        Erro("Há algum erro ai!:");
    }
}


function ValidarLogin($email, $senha)
{
    $sql = '
    select cd_usuario, cd_tipo_usuario from tb_usuario 
    where 
    nm_email = "' . $email . '" and
    nm_senha = md5("' . $senha . '") and 
    cd_status_usuario = "1";
    ';


    $res = $GLOBALS['con']->query($sql);

    if ($res->num_rows == 1) {
        $exibe = $res->fetch_array();
        session_start();
        if ($exibe['cd_tipo_usuario'] == 1) {
            $_SESSION['id'] = $exibe['cd_usuario'];
            $_SESSION['user'] = $exibe['nm_nome'];
            $_SESSION['tipo'] = $exibe['cd_tipo_usuario'];
            Confirma("Bem vindo", "painel/index.php");
        } else

            if ($exibe['cd_tipo_usuario'] == 2) {
                $_SESSION['id'] = $exibe['cd_usuario'];
                $_SESSION['user'] = $exibe['nm_nome'];
                $_SESSION['tipo'] = $exibe['cd_tipo_usuario'];
                Confirma("Bem vindo", "index.php");
            } else
                Erro("Login não realizado!");

    } else {
        Erro("Ops... Parece que há algum erro! Tente novamente.");
    }
}
?>