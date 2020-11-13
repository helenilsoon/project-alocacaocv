<?php
session_start();


if (isset($_SESSION['user_key'])) {

    $user = $_SESSION['user_key'];
    $nome_usuario = $_SESSION['nome'];
    $id_usuario = $_SESSION['id_usuario'];
    $token_endereco = $_SESSION['token_endereco'];
    $token_endereco2 = $_POST['token_endereco'];
    $token_perfil = $_SESSION['token_perfil'];
    $token_perfil2 = $_POST['token_perfil'];

    echo $token_perfil . "<br>";
    echo $token_perfil2;

    require_once('conexao.php');

    $con = new Conexao();
    $link = $con->conecta();

    // se o token do perfil forem iguais ai execulta a intrução
    if ($token_perfil == $token_perfil2) {

        //recebe os dados e filtra
        $nome = filter_var($_POST['f_nome'], FILTER_SANITIZE_STRING);
        $sobrenome = filter_var($_POST['f_sobrenome'], FILTER_SANITIZE_STRING);
        $data_nascimento =filter_var ($_POST['data_nascimento'], FILTER_SANITIZE_STRING);
        $telefone = filter_var($_POST['f_tel'], FILTER_SANITIZE_NUMBER_INT);
        $celular = filter_var($_POST['f_cel'], FILTER_SANITIZE_NUMBER_INT);
        $senha = md5(mysqli_real_escape_string($link, $_POST['f_senha']));
        $email = filter_var($_POST['f_email'], FILTER_SANITIZE_EMAIL);

        //execulta uma consulta pra validar se e mo mesmo usuario que ta editando para não editar outros usuarios
        $sql_perfil = "SELECT id_usuario FROM tb_usuario WHERE id_usuario = $id_usuario";

        $resposta = mysqli_query($link, $sql_perfil);
           
        

        // testa se  for o mesmo usuario ai sim atualizar se não manda uma mensagem de erro
        
        $data_nascimento = implode('-',array_reverse(explode('/',$data_nascimento)));

        var_dump($data_nascimento);
        echo "<br>";

        if ($resposta) {

            //query para atualizar
            $sql_perfil = "UPDATE tb_usuario set";
            $sql_perfil .= " nome = '$nome', sobrenome ='$sobrenome', data_nascimento= '$data_nascimento', TEL= '$telefone', CEL = '$celular', email = '$email' WHERE id_usuario = '$id_usuario' ";


            var_dump($sql_perfil);
            if (mysqli_query($link, $sql_perfil)) {

                header('location: perfil_user.php?sucess=&');
            } else {

                header('location: perfil_user.php?erro=&');
            }
        } else {
            echo " voçê não tem permissão pra atualizar";
        }
    }



    // se o token do endereço forem iguais ai execulta a intrução 
    //server tambem para testa se vem da tela de endereço pra não execulta atoa
    if ($token_endereco == $token_endereco2) {

        // recebendo os dados e filtrando
        $cep = isset($_POST['cep']) ? $_POST['cep'] : '';
        $rua = isset($_POST['rua']) ? $_POST['rua'] : '';
        $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
        $municipio = isset($_POST['municipio']) ? $_POST['municipio'] : '';
        $estado = isset($_POST['estado']) ? $_POST['estado'] : '';


        $cep = filter_var($cep, FILTER_SANITIZE_NUMBER_INT);
        $rua = mysqli_real_escape_string($link, $rua);
        $bairro = mysqli_real_escape_string($link, $bairro);
        $municipio = filter_var($municipio, FILTER_SANITIZE_STRING);
        $estado = filter_var($estado, FILTER_SANITIZE_STRING);

        //execulta uma consulta pra validar se e mo mesmo usuario que ta editando para não editar outros usuarios
        $sql = "SELECT id_usuario FROM endereco where id_usuario = $id_usuario";

        $res = mysqli_query($link, $sql);
        // testa se  for o mesmo usuario ai sim atualizar se não manda uma mensagem de erro
        if ($res) {

            $sql = "UPDATE endereco set cep = $cep, rua ='$rua', bairro= '$bairro', municipio = '$municipio', estado = '$estado'  where id_usuario = $id_usuario ";



            if (mysqli_query($link, $sql)) {

                header('location: enderecos.php?sucess=&');
            } else {

                header('location: enderecos.php?erro=&');
            }
        } else {

            $_SESSION['Voçê não pode fazer isso com três tentativa vc sera bloqueado'];
        }
    }
} else {
    header('Location: login.php');
    $_SESSION['erro_msg_precisa_login'] = "Vc precisa estar logado :(.";
}



mysqli_close($conexao);
