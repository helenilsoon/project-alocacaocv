<?php

namespace app\controllers;

use app\database\Sql;
use app\model\Usuario;

class AddUidUSer
{
    public function addUid(){

        $sql = new Sql();
        $total_linhas= $sql->select('select id_usuario  from usuario');

        
        
        // dd($total_linhas);

        
        foreach($total_linhas as $key => $value){

           
            $uid= uniqid();
            $sql->select("UPDATE usuario set uid = :UID where id_usuario = :ID",array(
                ':UID'=>$uid,
                ':ID'=>$value['id_usuario']
            ));
            echo "Usuario <b>UID:".$uid."</b> adicionado com sucesso<b>".$value['id_usuario']."</b><br>";
        }
    }
}