<?php
session_start();
if (!isset($_SESSION['nome'])) {
    header('Location: index.php');
}
?>

<a href="categorias.php" class="m-1 rounded-pill p-3 w-75 h-10  bg-gradiente text-decoration-none text-light">
    <div class="d-flex justify-content-center">

        Cadastro Categorias
    </div>
</a>
<a href="" class="m-1 rounded-pill p-3 w-75 h-10 bg-gradiente text-decoration-none text-light">
    <div class="d-flex justify-content-center">
        Cadastro de usuarios
    </div>
</a>
<a href="" class=" m-1 rounded-pill p-3 w-75 h-10  bg-gradiente text-decoration-none text-light">
    <div class="d-flex justify-content-center ">
        Profissionais
    </div>
</a>
<a href="" class=" m-1 rounded-pill p-3 w-75 h-10  bg-gradiente text-decoration-none text-light">
    <div class="d-flex justify-content-center ">
        configurações
    </div>
</a>