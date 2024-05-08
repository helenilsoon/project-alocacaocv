<?php

namespace app\controllers;

use app\model\Search_Model;
use Exception;

class Search
{
    public function index($params)
    {
        if(isset($_GET['pesquisa']) && !empty($_GET['pesquisa'])){
            $seach = new Search_Model();
            
            $seachTerm = filter_input(INPUT_GET,'pesquisa',FILTER_SANITIZE_SPECIAL_CHARS);
            $page = isset($_GET['page']) ? filter_input(INPUT_GET,'page',FILTER_SANITIZE_SPECIAL_CHARS)  : 0;

            /* Sbtendo respoda da model search que retorna um array de duas posições
             * [$found,$res]
             */ 
            [$found,$res,$pageAtual] =$seach->searchProfessionals($seachTerm,$page);
        
            return[
                "view"=>"search_view.php",
                "title"=>"pesquisar | webuild encontre profissionais gratuitamente",
                "data"=>["professionais"=>$res,"registersFound"=>$found,"pageAtual"=>$pageAtual,"seachTerm"=>$seachTerm]
            ];
        }

        throw new Exception("Pesquisa inválida");
        die();
            
    }
}