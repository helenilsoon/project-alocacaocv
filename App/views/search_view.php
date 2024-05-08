<?php


// Se a pesquisa vier junto com o btn_procurar isso significa que veio do caminho certo



echo   "<div class='container  p-5'>
<!-- containe  -->
<h5 class='p-3 text-orange'>" . $data['data']['registersFound'] ." resultados  foram encontrados </h5>";

// resultado da pesquisa

if (isset($data['data']['professionais'])  && !empty($data['data']['professionais'])) :

    $total_paginas = ceil($data['data']['registersFound'] / 10);

    if ($data['data']['pageAtual'] == 0) :
        $pagina_atual =  $data['data']['pageAtual'] + 1;
    else :
        $pagina_atual = $data['data']['pageAtual'];
    endif;


    echo "<span class='d-flex justify-content-center pt-3 text-orange '>Página  $pagina_atual   de  $total_paginas  </span>
        <br>
        <nav class='d-flex justify-content-center'>
            <ul class='pagination '>";
    if ($pagina_atual > 1) :
        echo "<li class='page-item'>
                <a class='page-link' href='?pesquisa=" . $data['data']['professionais'][0]['profissao'] . "&btn_procurar=&page=" . $pagina_atual - 1 . "' aria-label='Anterior'>
                    <span class='fas fa-angle-left text-orange'></span>
                    <span class='sr-only'>Anterior</span>
                </a>
              </li>";
    endif;
    for ($i = 1; $i < $total_paginas + 1; $i++) {
        $classe_botao = $pagina_atual == $i ? 'btn bg-orange text-light' : 'btn-default text-orange';

        echo "<li class='page-item'>";
        echo "<a href='?pesquisa=".$data['data']['professionais'][0]['profissao']."&btn_procurar=&page=" . $i . "' class='page-link " . $classe_botao . " ' data-pagina_clicada=' " . $i . " '> " . $i . "</a> ";
        echo "</li>";
    }
    if ($pagina_atual < $total_paginas) :
        echo "<li class=page-item'>
                <a class='page-link' href='?pesquisa=" . $data['data']['professionais'][0]['profissao'] . "&btn_procurar=&page=" . $pagina_atual + 1 . "' aria-label='Próximo'>
                    <span class='fas fa-angle-right text-orange'></span>
                    <span class='sr-only'>Próximo</span>
                </a>
             </li>";
    endif;
        echo"</ul>
        </nav>";



    foreach ($data['data']['professionais'] as $re) {

        $id_usuario         = isset($re['id_usuario']) ? $re['id_usuario'] : '';
        $experiencia        = isset($re['experiencia']) ? $re['experiencia'] : '';
        $nome               = isset($re['nome']) ? $re['nome'] : '';
        $sobre              = isset($re['sobre']) ? $re['sobre'] : '';
        $data_nascimento    =  new DateTime($re['data_nascimento']);
        $profissao          = isset($re['profissao']) ? $re['profissao'] : '';
        $data_atual         = new DateTime();
        $diferença          = $data_atual->diff($data_nascimento);
        $idade              = $diferença->y;
        $bairro             = isset($re['bairro']) ? $re['bairro'] : '';
        $img_url            = isset($re['img']) ? $re['img'] : '';

        echo " <!-- resultado da perquisa de profissionais layout-->
                    <div class='row resultado shadow '>
                        <div class='col-4  py-3'>
                            <div class='d-flex justify-content-center  p-3 '>";
        // se nao tiver imagem aparece o icone
        if (!empty($img_url)) :
            echo "<div class='img-resultado rounded-circle mt-3 '>
                                             <img src='img/userid" . $id_usuario . "/" . $img_url . " ' class='img-fluid img py-3' /   >
                                          </div>";
        else :
            //icone do usuario quando nao tiver imagem
            echo "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512' width='100px'>
                                    <path
                                        d='M64 224h13.5c24.7 56.5 80.9 96 146.5 96s121.8-39.5
                                         146.5-96H384c8.8 0 16-7.2 16-16v-96c0-8.8-7.2-16-16-16h-13.5C345.8
                                          39.5 289.6 0 224 0S102.2 39.5 77.5 96H64c-8.8 0-16 7.2-16 16v96c0 
                                          8.8 7.2 16 16 16zm40-88c0-22.1 21.5-40 48-40h144c26.5 0 48 17.9 48
                                           40v24c0 53-43 96-96 96h-48c-53 0-96-43-96-96v-24zm72 72l12-36 
                                           36-12-36-12-12-36-12 36-36 12 36 12 12 36zm151.6 113.4C297.7
                                            340.7 262.2 352 224 352s-73.7-11.3-103.6-30.6C52.9 328.5 0 
                                            385 0 454.4v9.6c0 26.5 21.5 48 48 48h80v-64c0-17.7 14.3-32 
                                            32-32h128c17.7 0 32 14.3 32 32v64h80c26.5 0 48-21.5 
                                            48-48v-9.6c0-69.4-52.9-125.9-120.4-133zM272 448c-8.8 0-16 
                                            7.2-16 16s7.2 16 16 16 16-7.2 16-16-7.2-16-16-16zm-96 0c-8.8 
                                            0-16 7.2-16 16v48h32v-48c0-8.8-7.2-16-16-16z' 
                                            fill='#d25400' />
                                </svg>";
        endif;

        echo "</div>

                            <div class='d-flex py-3 justify-content-center'>
                                <!--icone da  estrela-->
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                            </div>

                        </div>
                        <div class='col-8 py-3  '>
                            <h4 class=''> $nome </h4>
                            <hr>
                            <div class='row perfil-resultado'>
                                <div class='col-md-6 '>
                                    <p>Profissão:  $profissao </p>
                                    <p>Idade:  $idade </p>
                                    <p>Experiência:  $experiencia </p>
                                    <p>Sobre:  $sobre </p>
                                </div>
                                <div class='col-md-6'>
                                    <p>Bairro: $bairro  </p>
                                </div>
                            </div>

                            <a class='btn-sm text-white px-4 py-2 mx-sm-2 rounded-pill btn-orange ' href='perfil?nome= $nome . '&id=' . $id_usuario '> ver perfil </a>

                        </div>

                    </div>";
    }

    //  paginacao



  


    echo "<span class='d-flex justify-content-center pt-3 text-orange '>Página  $pagina_atual   de  $total_paginas  </span>
        <br>
        <nav class='d-flex justify-content-center'>
            <ul class='pagination '>";
    if ($pagina_atual > 1) :
        echo "<li class='page-item'>
                <a class='page-link' href='?pesquisa=" . $profissao . "&btn_procurar=&page=" . $pagina_atual - 1 . "' aria-label='Anterior'>
                    <span class='fas fa-angle-left text-orange'></span>
                    <span class='sr-only'>Anterior</span>
                </a>
              </li>";
    endif;
    for ($i = 1; $i < $total_paginas + 1; $i++) {
        $classe_botao = $pagina_atual == $i ? 'btn bg-orange text-light' : 'btn-default text-orange';

        echo "<li class='page-item'>";
        echo "<a href='?pesquisa=$profissao&btn_procurar=&page=" . $i . "' class='page-link " . $classe_botao . " ' data-pagina_clicada=' " . $i . " '> " . $i . "</a> ";
        echo "</li>";
    }
    if ($pagina_atual < $total_paginas) :
        echo "<li class=page-item'>
                <a class='page-link' href='?pesquisa=" . $profissao . "&btn_procurar=&page=" . $pagina_atual + 1 . "' aria-label='Próximo'>
                    <span class='fas fa-angle-right text-orange'></span>
                    <span class='sr-only'>Próximo</span>
                </a>
             </li>";
    endif;
    echo "</ul>
                </nav>";


    echo "</div>";
else:
    echo "<h3 class='text-center text-orange'> Nenhum resultado encontrado com esse termo de pesquisa  '".$data['data']['seachTerm']. "' </h3>";
endif;
