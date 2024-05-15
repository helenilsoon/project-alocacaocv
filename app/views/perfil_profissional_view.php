<?php

/**
 * auhor: helenilson Oliveira
 * data : 11/12/2019
 * 
 * Descrition: Tela de perfil para visitantes visualisaren os dados que são publicos
 * 
 */
extract($_SESSION['profissional']);
?>

<script>
    $(document).ready(function() {
        $("#card1").css("center-block")
    });
</script>

<div class="container">
    <div class="row mt-4">
        <div class="col-md-4 pl-0 pr-1">
            <div class="border rounded d-flex flex-column  shadow h-100 m-0">
                <div class="d-flex justify-content-center align-items-center  h-75">

                    <?php
                    if ($img != "") {

                        echo "<div style='width: 200px; height: 200px; overflow: hidden' class='img-thumbnail  rounded-circle d-flex judstify-content-center align-items-center'>";
                        echo "<img style=' whidth: 300px; height:300px;border-radius: 50%;'  src='" . IMG_PATH . "userid" . $id_usuario . "/" . $img . "' alt=''>";
                        echo "</div>";
                    } else {
                        echo "<img width='150' src='" . IMG_PATH . "solid/user-circle.svg' alt=''>";
                    }
                    ?>

                </div>
                <div class="d-flex justify-content-center ">
                    <!--icone da  estrela-->
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>

        </div>
        <div class="col-md-8  border rounded shadow">
            <div class="hr">
                <!--CARDS start here-->
                <div class="card card-1 " id="card1">
                    <h2 class="tag_perfil p-2">Nome: <?=  ucfirst($nome) ?></h2>
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td><span class="font-weight-bold">Profissão</span></td>
                                <td> <?= $profissao ?></td>
                            </tr>
                            <tr>
                                <td><span class="font-weight-bold">Historico</span></td>
                                <td> Imagens de ultimos trabalhos</td>
                            </tr>
                            <tr>
                                <td><span class="font-weight-bold">Nacionalidade</span></td>
                                <td colspan="2">Brasileiro</td>
                            </tr>

                            <tr>
                                <td><span class="font-weight-bold">Ocupação</span></td>
                                <td colspan="2"><?= $profissao ?></td>
                            </tr>
                            <tr>
                                <td><span class="font-weight-bold">Esperiencia</span></td>
                                <td colspan="2">2 anos</td>
                            </tr>

                            <tr>

                                <td colspan="3" class="text-center"><a class="btn rounded-pill w-50 my-4 p-3  ml-3 btn-orange" id="btnEditar">
                                        Solicite um orçamento</a></td>
                            </tr>
                            <tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <hr>

    <div class="row">
        <div class="card card-1 shadow col-md-12">
            <h4>Sobre:</h4>
            <?= $nome ?> é <?= $profissao ?> ha 8 anos tem especialização em <?= $profissao ?> profissional, Grenciamento de
            projetos e tem como foco em <?= $profissao ?>.<br><br>
            É Ceo e co-fundador da empresa <?php echo $nome . $profissao; ?>LTDA , que tem projetos de mega
            construções por Manaus
            e no resto do Brasil. <br><br>


        </div>
        <hr>
    </div>
    <div class="row">

        <div class="card-deck-wrapper mt-4 ">
            <h4>Comentários</h4>
            <div class="card-deck h-50">
                <div class="card h-100 shadow card-1">

                    <div class="card-block h-75">
                        <h5 class="card-title"> aline:</h5>
                        <blockquote class="blockquote h-75">
                            <p class="card-text">Otimos serviço prestado ao meu empreendimento e de custo inferior
                                ao do concorrente</p>
                        </blockquote>
                        <footer class="blockquote-footer"><cite title="Source Title">Webuild Page</cite>
                        <p class="card-text bt-0"><small class="text-muted">Last updated 3 mins ago</small></p>    
                    </footer>
                       
                    </div>
                </div>
                <div class="card  h-100 shadow card-1">
                    <div class="card-block h-75 ">
                        <h5 class="card-title"> Pedro:</h5>
                        <blockquote class="blockquote h-75">
                            <p class="card-text">O melhor especialista em estrutura que conheci, alem de fazer um
                                otimo preço</p>
                        </blockquote>
                        <footer class="blockquote-footer"><cite title="Source Title">Webuild Page</cite>
                        <p class="card-text "><small class="text-muted">Last updated 3 mins dez</small></p>
                    </footer>
                    </div>
                </div>
                <div class="card h-100 shadow card-1">
                    <!--<img class="card-img-top" src="..." alt="Card image cap">-->
                    <div class="card-block h-75">
                        <h5 class="card-title"> João</h5>
                        <blockquote class="blockquote h-75">
                            <p class="card-text">Esperava um trabalho melhor mas... pelo menos fez um bom preço</p>
                        </blockquote>
                        <footer class="blockquote-footer"><cite title="Source Title">Webuild Page</cite>
                    
                        <p class="card-text"><small class="text-muted">Last updated 5 mins dez</small></p>
                    </footer>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>