<?php
/*
Author: "helenilson oliveira"
Data: 08/12/2019
Projeto: webuild
Contato: helenilsoon@gmail.com
 */

session_start();
require_once 'conexao.php';

if (isset($_POST['form_btn_login'])) {

    if ($_POST['email'] != "" and $_POST['senha'] != "") {

        $email = $_POST['email'];
        $senha = md5($_POST['senha']);

        $con = new Conexao();
        $link = $con->conecta();
        // limpado a string e colocando uma conta barra
        $email = mysqli_real_escape_string($link, $email);
        $senha = mysqli_real_escape_string($link, $senha);

        $sql = "SELECT * FROM tb_usuario WHERE email = '$email' and password = '$senha'";

        $re = mysqli_query($link, $sql);

        if ($re) {
            $result = mysqli_fetch_assoc($re);
            if (isset($result['email'])) {

                $_SESSION['nome'] = $result['nome'];
                $_SESSION['id_usuario'] = $result['id_usuario'];
                $_SESSION['sobrenome'] = $result['sobrenome'];
                $_SESSION['tipo_usuario'] = $result['tipo_usuario'];
                //gerando uma chave pra cada login
                $key1 = "abcdefghijklmnopqrstuxwyz";
                $key2 = "ABCDEFGHIJKLMNOPQRSTUVWYZ";
                $key3 = "0123456789";
                $k = str_shuffle($key1 . $key2 . $key3);
                $size = strlen($k);
                $key = "";
                $qtde = rand(20, 50);
                for ($i = 0; $i <= $size; $i++) {
                    $pos = rand(0, $size);
                    $key .= substr($k, $pos, 1);
                }
                //armazenando na sessão
                $_SESSION['user_key'] = $key;
                //redirecionando para o perfil
                header('Location: perfil_user.php');
            } else {
                $_SESSION['erro_usuario_no_exist'] = "Usuário ou senha invalidos";
                header('location: login.php');
            }
        } else {
            echo "Erro ao fazer a consultar Entre em contato com admnistrador";
        }
    } else {
        $_SESSION['erro_preencha_campos'] = "Preenchas seu Email e senha";
        header('location: login.php');
    }
} else {
    header('location: login.php');
    $_SESSION['erro_preencha_campos'] = 'Porfavor preencha os campo';
}

mysqli_close($link);