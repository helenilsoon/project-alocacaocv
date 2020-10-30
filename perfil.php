<?php

/**
 * auhor: helenilson Oliveira
 * data : 11/12/2019
 * 
 * Descrition: Tela de perfil para visitantes visualisaren os dados que são publicos
 * 
 */
Error_reporting(0);
if (isset($_GET['id'])) {
    $id_usuario =  filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    require_once('conexao.php');

    $con = new Conexao();
    $link = $con->conecta();

    $sql = "SELECT * FROM tb_usuario where id_usuario =$id_usuario";

    if ($res = mysqli_query($link, $sql)) {
        $resp = mysqli_fetch_assoc($res);
        $img_url = $resp['img'];
        $nome = $resp['nome'];
        $sobrenome = $resp['sobrenome'];
        $data_nascimento = $resp['data_nascimento'];
        $username = $resp['username'];
        $email = $resp['email'];
        $telefone = $resp['telefone'];
        $profissao = $resp['profissao'];
        $tel = $resp['TEL'];
        $cel = $resp['CEL'];
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script>
    $(document).ready(function() {
        $("#card1").css("center-block")
    });
    </script>

</head>

<body>
    <!-- Menu-->
    <?php
    require_once('topo.php');
    ?>
    <!-- fim menu-->





    <div class="container-fluid">

        <div class="container">
            <div class="row">



                <div class="col-md-4 mt-4">
                    <div class="container border d-flex flex-column  mb-4 p-3 shadow">
                        <div class=" d-flex justify-content-center">

                            <?php

                            if ($resp['img'] != "") {

                                echo "<div class='div-img rounded-circle'>";
                                echo "<img width='200' src='img/userid" . $id_usuario . "/" . $img_url . "' alt=''>";
                                echo "</div>";
                            } else {
                                echo "<img width='150' src='img/solid/user-circle.svg' alt=''>";
                            }

                            ?>

                        </div>
                        <div class="d-flex justify-content-center m-4">
                            <!--icone da  estrela-->
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>

                </div>
                <div class="col-md-8 mt-4 shadow">
                    <div class="hr">
                        <!--CARDS start here-->
                        <div class="card card-1 " id="card1">
                            <span class="tag_perfil"><?= $profissao ?></span>
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <td colspan="2">
                                            <h4 class="text-center"><?= $nome ?></h4>
                                        </td>
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
                                        <td><span class="font-weight-bold">Formação</span></td>
                                        <td colspan="2">Unversidade Federal do Amazonas<br>
                                            UFAM </td>
                                    </tr>
                                    <tr>
                                        <td><span class="font-weight-bold">Ocupação</span></td>
                                        <td colspan="2"><?= $profissao ?></td>
                                    </tr>
                                    <tr>
                                        <td><span class="font-weight-bold">Conhecido por</span></td>
                                        <td colspan="2">Rei do arranha ceu <br> Ceo, Center engenharia</td>
                                    </tr>
                                    <tr>

                                        <td colspan="3" class="text-center"><a
                                                class="btn rounded-pill w-50 my-4 p-3  ml-3 btn-orange" id="btnEditar">
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

            <div class="card card-1 shadow col-md-12">
                Saulo Antão é Engenheiro Elétrico ha 8 anos tem especialização em Engenharia Estrutural, Grenciamento de
                projetos e tem como foco construçao de arranha ceu.<br><br>
                É Ceo e co-fundador da empresa de Engenharia civil (Center engenharia), que tem projetos de mega
                construções por Manaus
                e no resto do Brasil. <br><br>


            </div>
            <hr>
            </hr>

            <div class="card-deck-wrapper">
                <div class="card-deck">
                    <div class="card  shadow card-1">

                        <div class="card-block">
                            <h4 class="card-title"></h4>
                            <blockquote class="blockquote">
                                <p class="card-text">Otimos serviço prestado ao meu empreendimento e de custo inferior
                                    ao do concorrente</p>
                            </blockquote>
                            <footer class="blockquote-footer"><cite title="Source Title">Webuild Page</cite></footer>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    <div class="card  shadow card-1">
                        <div class="card-block">
                            <h4 class="card-title"></h4>
                            <blockquote class="blockquote">
                                <p class="card-text">O melhor especialista em estrutura que conheci, alem de fazer um
                                    otimo preço</p>
                            </blockquote>
                            <footer class="blockquote-footer"><cite title="Source Title">Webuild Page</cite></footer>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins dez</small></p>
                        </div>
                    </div>
                    <div class="card shadow card-1">
                        <!--<img class="card-img-top" src="..." alt="Card image cap">-->
                        <div class="card-block">
                            <h4 class="card-title"></h4>
                            <blockquote class="blockquote">
                                <p class="card-text">Esperava um trabalho melhor mas... pelo menos fez um bom preço</p>
                            </blockquote>
                            <footer class="blockquote-footer"><cite title="Source Title">Webuild Page</cite></footer>
                            <p class="card-text"><small class="text-muted">Last updated 5 mins dez</small></p>
                        </div>
                    </div>
                </div>
            </div>




            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous"></script>
</body>

</html>