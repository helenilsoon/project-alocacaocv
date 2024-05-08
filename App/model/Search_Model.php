<?php

namespace app\model;

use app\database\Sql;
class Search_Model
{

    public function searchProfessionals($params,$page){
      
        if(isset($page) && $page == 0){
            $offset =  'offset '.$page * 10 ;
            
        }else{
            $offset =  'offset '.$page * 10 - 10 ;
            
        }
       
        $sql = new Sql();
        $res = $sql->select("SELECT * FROM usuario inner join endereco on usuario.id_usuario = endereco.id_usuario
                             where profissao LIKE :NOME limit 10 $offset",array(
            ":NOME"=>"%".$params."%"
        ));
        $found=$sql->queryExecute("SELECT count(*) as total_registro from usuario inner join endereco on 
                            usuario.id_usuario = endereco.id_usuario where usuario.profissao like :nome",array(
                                ":nome"=>"%".$params."%"
                            ));
        return  array($found->fetch()['total_registro'],$res , $page); ;
    }
}