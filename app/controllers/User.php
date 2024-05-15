<?php

namespace App\Controllers;

use app\database\Sql;

final class User 
{
    public function index($params){
        // dd($_GET) ;
        // dd($_SESSION);
            $profissional = $_SESSION['profissional'];
        return[
            'view'=>'perfil_profissional_view.php',
            'title'=>'Profissional: '.$_SESSION['profissional']['nome'].' | webuild encontre profissionais gratuitamente',
            'data'=>[]
            
            ];
    }
    public function show($params){
         
        dd($_GET);
        
        $uid = explode('/',$_GET['url'],);

        $sql =new Sql();
        $res= $sql->select("SELECT * FROM usuario where uid = :UID",array(
            ":UID"=>$uid[1]
        ));

        /** URL que direciona ao perfil
         * 'profissional/[a-z0-9]+/nome/[a-z0-9]+'=>'User@index',
        */
            dd($res[0]['profissao']);
        if(strpos($res[0]['profissao'], ' ')){
            $profissao = strtolower( str_replace(' ', '-', $res[0]['profissao']));
        }else{
           $profissao= strtolower($res[0]['profissao']);  
        }

        if(strpos($res[0]['nome'], ' ')){
            $nome = strtolower( str_replace(' ', '-', $res[0]['nome']));
        }else{
           $nome= strtolower($res[0]['nome']);
        }
        
        $_SESSION['profissional'] = $res[0];

         header("location: /proficao/".ltrim($profissao,' ')."/nome/".$nome);
       
        

      
    }
}
