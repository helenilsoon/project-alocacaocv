<?php
/*
*  Author: "helenilson Correa de oliveira"
*   Data: 08/12/2019
*   Projeto: webuild
*   Descrição: Tela de cadastro de usuario
*/

session_start();
require_once('conexao.php');

$token = isset($_SESSION['token']) ? $_SESSION['token'] : "";
$token2 = isset($_POST['token']) ? $_POST['token'] : "";

if ($token == $token2) {

    if (isset($_POST['form_btn_cadastrar'])) {
        $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
        $username = isset($_POST['username']) ? $_POST['username'] : "";
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $senha = isset($_POST['senha']) ? md5($_POST['senha']) : "";
        //Limpando o codigo
        $nome = filter_var($nome, FILTER_SANITIZE_STRING);
        $username = filter_var($username, FILTER_SANITIZE_STRING);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);




        if ($_POST['nome'] != "" and $_POST['username'] != "" and $_POST['email'] != "" and $_POST['senha'] != "") {

            $email = $_POST['email'];
            $senha = md5($_POST['senha']);



            $con = new Conexao();
            $link = $con->conecta();
            
            



            $sql = "SELECT * FROM tb_usuario WHERE username = '$username' and email = '$email'";
           
            $re = mysqli_query($link, $sql);

            if ($re) {

                $result = mysqli_fetch_assoc($re);

                if (!isset($result['email']) and !isset($result['username'])) {
                    echo "email não existe";

                    $sql_iserir = "INSERT INTO tb_usuario(nome,username,email,password) VALUES ('$nome','$username','$email','$senha')";

    

                    $res = mysqli_query($link, $sql_iserir);


                    if ($usuario = mysqli_affected_rows($link)) {
                                               $resposta = mysqli_query($link, $sql);
                        $dados = mysqli_fetch_assoc($resposta);

                        $_SESSION['nome'] = $dados['nome'];
                        $_SESSION['id_usuario'] = $dados['id_usuario'];
                        $_SESSION['sobrenome'] = $dados['sobrenome'];
                        $_SESSION['tipo_usuario'] = $dados['tipo_usuario'];
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
                        header('Location: perfil_user.php?key='.$key);
                    } else {
                        echo "Erro ao cadastrar entre em contato com o administrador";
                    }
                } else {
                    echo "email ou usuario ja existe";
                }
            } else {
                echo "Erro ao fazer a consultar Entre em contato com admnistrador";
                echo "email nao existe";
            }
        } else {
            $_SESSION['erro_preencha_campos'] = "Preenchas todos os campos";
            header('location: cadastrar.php');
        }
    } else {
        echo "algo deu errado";
    }

    mysqli_close($link);
} else {
    echo " O que voçê ta tentando fazer rapaz";
}