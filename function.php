<?php

/**
 * auhor: helenilson Oliveira
 * data : 10/12/2019
 *
 * Descrition: função para verificar se ja esta cadastrado
 *
 */
if (isset($_POST['token'])) {
    require_once 'conexao.php';
    Error_reporting(0);

    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $usuario = isset($_POST['username']) ? $_POST['username'] : "";
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $usuario = filter_var($usuario, FILTER_SANITIZE_STRING);

    $con = new Conexao();
    $link = $con->conecta();

    if ($email != "") {

        $sql = "SELECT email,username FROM tb_usuario where email = '$email' ";
        $res = mysqli_query($link, $sql);
        $dados = mysqli_fetch_assoc($res);

        if ($email = $dados['email']) {;
            echo "<div class='alert alert-danger my-2' role='alert'>";
            echo $email . " e-mail já cadastrado";
            echo "</div>";
        } else {
            echo "<div class='alert alert-success my-2' role='alert'>";
            echo $email . " e-mail disponível";
            echo "</div>";
        }
    }

    if ($usuario != "") {

        $sql = "SELECT username FROM tb_usuario where username = '$usuario' ";
        $res = mysqli_query($link, $sql);
        $dados = mysqli_fetch_assoc($res);

        if ($username = $dados['username']) {;
            echo "<div class='alert alert-danger my-2' role='alert'>";
            echo " Username já cadastrado";
            echo "</div>";
        } else {
            echo "<div class='alert alert-success my-2' role='alert'>";
            echo " Username disponível";
            echo "</div>";
        }
    }
} else {

    header('location: index.php');
}