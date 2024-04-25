<?php
namespace App\Controllers;

class Home 
{

    public function index($params){
       return[
        'view'=>'home.php',
        'title'=>'Webuild | encontre profissionais gratuitamente',
        'data'=>['name'=>'helenilson oliveira']
       ];
    }
}