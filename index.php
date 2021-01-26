<?php
/**
 * auhor: helenilson Oliveira
 * data : 11/12/2019
 *
 * Descrition: Tela de login
 *
 */

$pg = "Webuild conectando pessoas";

    $criar = mkdir("livro", 0776, true);



require_once "topo.php";

require_once "config/config.php";

?>
<div class="container  mb-sm-1">

    <div class="row ">
        <div class="col-sm">

            <div class="py-2c h-100">
                <div class="p-md-5 py-sm-1">

                    <h1 class="logomarca"> WE BUILD</h1>
                    <div class="descrit">
                        <p class="text-justify"> Conecta pessoas que querem um profissional para uma piquena ou
                            grande reforma ou para profissionais, ofertando
                            serviços no setor de construção civil criando uma oportunidade de trabalho. </p>

                        <p class="  text-justify" id="descricao-webuild">

                            <br>
                            voçê e um profissional? <a href="cadastrar.php">cadastre-se</a>
                        </p>
                    </div>
                    <div class="text-center">
                        <a class="btn-sm text-white px-4 py-2 my-0 text-center rounded-pill btn-orange " id="btn-d"
                            onclick='viewDescription()'> Saiba mais.</a>
                    </div>
                </div>

                <!-- Formulario principal da pesqisa Search
                    <div class="form-search ">

                        <form method="GET" action="search.php" id="procurar_profissional" class="col-md-10 col-sm-10 form-inline  f-search">
                            <span class="input-group-addon">
                                <input class="form-control  f-campo-serch" type="search" id="search" name="pesquisa" placeholder="Qual profissional você precisa?" aria-label="Pesquisar " required>

                                <button type="submit" id="btn-procurar" name="btn_procurar" class="btn-search f-btn-search">
                                    <i class="fa fa-search">
                                    </i>
                                </button>
                            </span>
                        </form>
                    </div>
                    fim formulario Search-->

            </div>



        </div>
        <div class="col-sm">
            <figure>
                <img class="w-100" src="img/arte-pg-inicial.png" alt="">
            </figure>
        </div>


    </div>
</div>
<div class="container-fluid">
    <!--Conteudo principal-->
    <main>
        <div class="row ">
            <div class="col-md-12  containe-icon ">


                <?php
                //Obtendo profissões do banco de dados
                $profissao = Profissao::getAllUser();



                 foreach ($profissao as $row): ?>



                     <div class="estilo  " id="div1">
                        <div class="icon_profissionais">
                            <img src="icon/icones-profissoes/<?= $row['icon']?>" alt="<?= $row['nome_profissao']?>">

                            <p><?= $row['nome_profissao']?></p>
                        </div>
                     </div>
                    
                <?php endforeach ?>           
 

            </div>
        </div>
    </main>
</div>
<!--rodape-->

<script>
function viewDescription() {
    var des = document.querySelector('#descricao-webuild');
    var btn = document.querySelector("#btn-d");

    if (des.style.visibility == "visible") {
        des.style = "visibility:hidden;transition: height .4s ease; -webkit-transition: height .4s;height:0;";
        btn.innerText = "Saiba mais.";

    } else {
        des.style = ";visibility:visible;transition: height .4s ease; -webkit-trasition: height .4s;height:50px;";
        btn.innerText = "Fechar";

    }
}
</script>

