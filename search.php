<?php
session_start();
Error_reporting(0);
require_once 'conexao.php';
//conexao
$con = new Conexao();
$link = $con->conecta();
// Se a pesquisa vier junto com o btn_procurar isso significa que veio do caminho certo
if (isset($_GET['btn_procurar'])) {

    if (isset($_GET['pesquisa']) and $_GET['pesquisa'] != '') {

        $pesquisa = filter_var($_GET['pesquisa'], FILTER_SANITIZE_SPECIAL_CHARS);

        $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
        $registro_por_pagina = 10; //registro por paginas
        $inicio = ($registro_por_pagina * $pagina) - $registro_por_pagina;

        //saber a quantidade de registro
        $qtd_registro = "SELECT COUNT(*) as total_registro FROM tb_usuario,tb_endereco WHERE 1 = 1";
        $qtd_registro .= " AND profissao  LIKE '%{$pesquisa}%' ";
        $qtd_registro .= " OR cep  LIKE '%{$pesquisa}%' ";
        $qtd_registro .= " OR rua  LIKE '%{$pesquisa}%'";
        $qtd_registro .= " OR bairro  LIKE '%{$pesquisa}%'";
        $qtd_registro .= " OR nome  LIKE '%{$pesquisa}%'";

        $res_qtde_registro = mysqli_query($link, $qtd_registro);
        if ($res_qtde_registro) {
            $num_registro = mysqli_fetch_assoc($res_qtde_registro);
            $num_registro = $num_registro['total_registro'];
        }

        //$total_paginas = $num_registro / $registro_por_pagina;
        $sql = "SELECT u.img,u.id_usuario,u.nome,u.data_nascimento,u.profissao, e.cep,e.rua,e.bairro ";
        $sql .= "FROM tb_usuario as u left join tb_endereco as e on(u.id_usuario = e.id_usuario) ";
        $sql .= "WHERE  profissao  LIKE '%{$pesquisa}%'";
        $sql .= " OR cep  LIKE '%{$pesquisa}%'";
        $sql .= " OR rua  LIKE '%{$pesquisa}%'";
        $sql .= " OR bairro  LIKE '%{$pesquisa}%'  ";
        $sql .= " OR nome  LIKE '%{$pesquisa}%'  ";
        $sql .= "LIMIT $inicio,$registro_por_pagina";

        $res = mysqli_query($link, $sql);

        $total_paginas = ceil($num_registro / $registro_por_pagina);
        
        require_once 'topo.php';
        ?>

<div class="container  p-5">
    <!-- containe  -->

    <h5 class="p-3 text-orange"><?php echo $num_registro . " Resultados encontrados"; ?></h5>

    <?php

        // resultado da pesquisa
        if ($res) {

            while ($re = mysqli_fetch_assoc($res)) {

                $id_usuario         = $re['id_usuario'];
                $nome               = $re['nome'];
                $data_nascimento    = $re['data_nascimento'];
                $profissao          = $re['profissao'];
                $datetime2          = date('Y-m-d');
                $datetime1          = ($data_nascimento);
                $idade              = $datetime2 - $datetime1;
                $bairro             = $re['bairro'];
                $img_url            = $re['img'];
    ?>
    <!-- resultado da perquisa de profissionais layout-->
    <div class="row resultado shadow ">

        <div class="col-4  py-3">
            <div class="d-flex justify-content-center  ">

                <?php
                // se nao tiver imagem aparece o icone
                if (!empty($img_url)) {
                    echo "<div class='img-resultado rounded-circle mt-3 '>";
                    echo "<img src='img/userid" . $id_usuario . "/" . $img_url . " ' class='img-fluid img py-3' /   >";
                    echo "</div>";
                } else {
                    echo "<i class='fa fa-user-circle'> </i>";
                }
                ?>

            </div>
            <div class="d-flex justify-content-center">
                <!--icone da  estrela-->
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>

        </div>
        <div class="col-8 py-3  ">
            <h3 class=""><?=$profissao?></h3>
            <hr>
            <div class="row perfil-resultado">
                <div class="col-md-6 ">
                    <p>Nome: <?=$nome?></p>
                    <p>Idade: <?=$idade?></p>
                    <p>Experiência: <?=$esperiencia?></p>
                    <p>Sobre: <?=$sobre?></p>
                </div>
                <div class="col-md-6">
                    <p>Bairro:<?=$bairro?> </p>
                </div>
            </div>

            <a class="btn-sm text-white px-4 py-2 mx-sm-2 rounded-pill btn-orange "
                href="perfil.php?none=<?=$nome . "&id=" . $id_usuario?>"> ver perfil </a>

        </div>

    </div>

    <?php }

            ?>
    <span class="d-flex justify-content-center pt-3 text-orange ">Página <?=$pagina?> de <?=$total_paginas?> </span>
    <br>
    <nav class="d-flex justify-content-center">


        <ul class="pagination ">
            <li class="page-item">
                <a class="page-link" href="?pesquisa=<?=$pesquisa?>&btn_procurar=&pagina= <?=$pagina_atual - 1?>"
                    aria-label="Anterior">

                    <span class="fas fa-angle-left text-orange"></span>
                    <span class="sr-only">Anterior</span>
                </a>
            </li>
            <?php
$pagina_atual = $pagina;
            for ($i = 1; $i < $total_paginas + 1; $i++) {

                echo "<li class='page-item'>";
                $classe_botao = $pagina_atual == $i ? 'btn bg-orange text-light' : 'btn-default text-orange';
                echo "<a href='?pesquisa=$pesquisa&btn_procurar=&pagina=" . $i . "' class='page-link " . $classe_botao . " ' data-pagina_clicada=' " . $i . " '> " . $i . "</a> ";
                echo "</li>";
            }?>

            <li class="page-item">
                <a class="page-link" href="?pesquisa=<?=$pesquisa?>&btn_procurar=&pagina= <?=$pagina_atual + 1?>"
                    aria-label="Próximo">
                    <span class="fas fa-angle-right text-orange"></span>
                    <span class="sr-only">Próximo</span>
                </a>
            </li>
        </ul>
    </nav>
    <?php

        } else {
            echo "Erro na pesquisa";
        }
        ?>

</div>



<?php

        require_once 'rodape.php';
    }

    } else {
        header('location: index.php');
        die;

    }