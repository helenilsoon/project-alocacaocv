<?php



if (!isset($_SESSION['user'])) {
    $nome = '';
    $id_usuario = '';
}else{
    $nome = $_SESSION['user']['nome'];
    $id_usuario = $_SESSION['user']['id_usuario'];
}


// Error_reporting(0);
?>


<div class="container">
    <a class="navbar-brand" href="/">
        <img src="assets/img/logo_webuild.png" class="" width="150" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"> </span>
    </button>

    <div class="collapse navbar-collapse " id="conteudoNavbarSuportado">
        <!-- <ul class="navbar-nav ">
                    <li class="nav-item dropdown  ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Menu
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#"> Categorias
                            </a>
                            <a class="dropdown-item" href="#"> Profissões </a>
                            <div class="dropdown-divider">
                            </div>

                            <?php if($nome){ 
                                
                             echo '<a class="dropdown-item" href="perfil_cadastro.php"> Minha conta </a>';
                             } ?> </div>
                    </li>


                </ul> -->

        <!-- Formulario principal da pesqisa Search-->

     <div class="row w-100">
        <div class=" col-xl-8 col-lg-7 col-md-7 mx-auto  d-flex justify-content-center ">

            <form method="GET" action="search.php" id="procurar_profissional" class=" col-sm-12 col-md-12  form-inline ">
                <span class="input-group-addon">
                    <input class="form-control   col-md-12 " type="search" id="search" name="pesquisa" placeholder="Qual profissional você precisa?" aria-label="Pesquisar " required>

                    <button type="submit" id="btn-procurar" name="btn_procurar" class="btn-search">
                        <i class="fa fa-search">
                        </i>
                    </button>
                </span>
            </form>
            <!--fim formulario Search-->
        </div>


        <div class="col-xl-4 col-lg-5 col-md-5 col-sm-12 d-flex  align-items-center justify-content-center  menu-sm">

            <ul class="navbar-nav">
                <li class="nav-item <?php if ($nome) {
                                        echo "dropdown";
                                    } ?>">
                    <?php if ($nome) {
                        echo "<a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
                        echo "Bem vindo " . $nome . "</a>";
                    } else {
                        echo "<a class='btn-sm text-white px-4 py-2 mx-md-2 rounded-pill btn-orange' href='cadastrar'>Cadastrar-se</a>";
                    } ?>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <?php if ($nome) { ?>
                            <a class="dropdown-item" href="my-account"> Minha conta </a>
                            <a class="dropdown-item" href="my-account"> Perfil </a>

                            <!--<a class="dropdown-item" href="enderecos.php"> Endereços </a>
                                        <a class="dropdown-item" href="#"> Serviços </a>-->

                        <?php } ?>

                        <div class="dropdown-divider"> </div>
                        <!--divisor  -->

                        <?php if ($nome) { ?>
                            <a class="dropdown-item" href="my-account"> Minha conta </a>
                        <?php } ?>
                    </div>
                </li>
            </ul>

            <ul class="navbar-nav mr-md-3">

                <li class="nav-item ">
                    <?php if ($nome) { ?>
                        <a class="btn-sm text-white px-4 py-2 rounded-pill btn-orange " href="sair">Sair </a>
                    <?php } else {  ?>
                        <a class="btn-sm text-white px-4 py-2 mx-md-2 rounded-pill btn-orange " href="login"> entrar</a>
                    <?php } ?>
                </li>
            </ul>
        </div>
      </div>
    </div>

</div>