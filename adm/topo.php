<?php
session_start();
if (!isset($_SESSION['nome'])) {
    header('Location: index.php');
} else {
    $nome_usuario = $_SESSION['nome'];
}
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


    <nav class="navbar navbar-expand-lg navbar-light bg-menu">
        <div class="container ">
            <a class="navbar-brand" href="painel.php">
                <img src="../img/logo_webuild.png" class="" width="150" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                <ul class="navbar-nav ">


                    <li class="nav-item dropdown  ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Menu
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="categorias.php">Categorias</a>
                            <a class="dropdown-item" href="#">Usuarios</a>
                            <a class="dropdown-item" href="#">Profissões</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">configurações</a>
                        </div>
                    </li>


                </ul>
                <form class="form-inline ml-6 mx-lg-5">
                    <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">

                </form>
                <div class=" d-flex justify-content-end  w-100">
                    <ul class="navbar-nav mr-3">
                        <li class="nav-item ">
                            <p class="pr-2"> Óla <?php echo $nome_usuario; ?></p>
                        <li class="nav-item ">
                            <a class="btn-sm text-white px-4 py-2 mx-sm-2 rounded-pill bg-gradiente " href="sair.php">

                                sair
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    </div>