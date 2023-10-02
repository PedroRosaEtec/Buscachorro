<?php

function Erro($msg, $pagina){
    print'
    <script>
        alert("'.$msg.'");
        location.href = "'.$pagina.'";
    </script>
';
}


function CadastrarAnimal($nome_animal ,$usuario, $pagina,  $imagem, $raca, $sexo, $descricao, $pontoref, $porte, $cor){
$sql = '
insert into tb_animal set
nm_animal = "'.$nome_animal.'",
sexo_animal = "'.$sexo.'",
nm_ponto_referencia = "'.$pontoref.'",
descricao = "'.$descricao.'",
nm_porte = "'.$porte.'",
st_animal = 1,
id_cor = "'.$cor.'",
id_raca = "'.$raca.'",
id_usuario = "'.$usuario.'"
;
';

$res =$GLOBALS['con']->query($sql);

if($res){
    $sql = '
    select cd_animal from tb_animal 
    where nm_animal = "'.$nome_animal.'" and 
    id_usuario = "'.$usuario.'";    ';

    $busca = $GLOBALS['con']->query($sql);

    if($busca->num_rows > 0){
        $exibe = $busca->fetch_array();
        EnviarFoto($imagem, $exibe['cd_animal'], $pagina);
}
else{
    echo "Animal nao encontrado!";
}
}
}

 function EnviarFoto($imagem, $cd_animal, $pagina){
    $sql ='
    insert into tb_foto set
    url_imagem = "'.$imagem.'",
    id_animal = "'.$cd_animal.'";
    ';

    $res = $GLOBALS['con']->query($sql);

    if($res){
        echo "Imagem Enviada com sucesso!";
    }else{
        echo"Imagem nao enviada";
    }
 };
// strtolower(pathinfo("arquivo.jpg", PATHINFO_EXTENSION));

// if(!empty($_FILES['arquivo'])){
//     $arquivo = $_FILES['arquivo'];

//     if($arquivo['error']){
//         die("Falha ao enviar o arquivo");
//     }
//     if($arquivo['size'] > 2097152){
//         die("Arquivo muito grande! Tamanho maximo permitido: 2MB!");
//     }

//   $diretorio = "fotos_animais/";

//     $nome_arquivo = $arquivo['name'];

//     $novo_nome_arquivo = uniqid();
//     $extensao_arquivo = strtolower(pathinfo($nome_arquivo, PATHINFO_EXTENSION));

//     if($extensao_arquivo != "jpg" && $extensao_arquivo != "png"){
//         die("Extensão não permitida!");
//     }

//     $upload_true = move_uploaded_file($arquivo['tmp_name'], $diretorio . $novo_nome_arquivo . "." . $extensao_arquivo);

//     $nome_com_extensao =   $novo_nome_arquivo . "." . $extensao_arquivo;

//     if($upload_true){
//         //echo "Upload efetuado com sucesso! <a target = '_blanck' href='fotos_animais/$nome_com_extensao'>Clique aqui para acessa-lo!</a>";

//         $sql = '
//         INSERT INTO tb_foto set
//         url_imagem = "'.$nome_com_extensao.'",
        
//         ';
//     }
//     else{
//         echo "Deu ruim!";
//     }

// }
?>