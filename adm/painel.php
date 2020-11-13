<?php
session_start();
if (!isset($_SESSION['nome'])) {
    header('Location: index.php');
} else {
    $nome_usuario = $_SESSION['nome'];
}
require_once('topo.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../node_modules/bootstrap/compiler/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Painel administrativo</title>
</head>

<body>
    <div class="container">
        <div class="row mt-5  ">
            <div class="col-md-4 d-flex flex-column ">

                <?php require_once('menu-lateral.php'); ?>
            </div>
            <div class="col-md-8 ">
                <ul class="list-group">
                    <li class="list-group-item">15</li>
                </ul>
            </div>
        </div>

    </div>



    <?php require_once('rodape.html'); ?>