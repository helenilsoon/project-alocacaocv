<?php
require_once('Conexao.php');

$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['Password']) ? $_POST['Password'] : '';

$cadastrar = new Conexao();
$resposta = $cadastrar->conecta();
$sql = "INSERT INTO usuario(nome,username,email,password) VALUES('','')";
