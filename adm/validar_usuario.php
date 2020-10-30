<?php
session_start();




require_once('../conexao.php');

$email = isset($_POST['email']) ? $_POST['email'] : "0";
$senha = isset($_POST['senha']) ? $_POST['senha'] : '0';

$con = new Conexao();
$link = $con->conecta();

$sql = "SELECT * FROM administradores WHERE email = '$email' and senha = '$senha'";

if ($res = mysqli_query($link, $sql)) {
    $result = mysqli_fetch_assoc($res);
    $_SESSION['nome'] = $result['nome'];
    header('Location: painel.php');
} else {
    header('Location: index.php');
}
