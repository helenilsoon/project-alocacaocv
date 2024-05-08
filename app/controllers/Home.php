<?php
namespace App\Controllers;

use app\model\Profissao;

class Home 
{

    public function index($params){
       return[
        'view'=>'home.php',
        'title'=>'Webuild | encontre profissionais gratuitamente',
        'data'=>['name'=>'helenilson oliveira'],
        'getProfissao'=>$this->viewProfissao()
      ];

        
    }
    public function viewProfissao() {
        $profissao = Profissao::getAllUser();

        return $profissao;
    }
}