<?php

namespace app\controllers;

use app\database\Sql;
class Register
{
    public function index($params){

        return[
            'view'=>'cadastrar.php',
            'title'=>'Criar conta | webuild encontre profissionais gratuitamente',
            'data'=>[
                'name'=>'helenilson oliveira'
            ]
        ];
    }

    public function signUp($params){


            if(!empty($_POST) && isset($_POST['token'] )){

                $nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_SPECIAL_CHARS);
                $username = filter_input(INPUT_POST,'username',FILTER_SANITIZE_SPECIAL_CHARS);
                $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
                $password = password_hash($_POST['senha'],PASSWORD_DEFAULT);
            }
            
            try{

                $sql = new Sql();
    
                $sql->queryExecute("INSERT INTO usuario (nome, username, mail, password) VALUES (:nome, :username, :email, :senha)", array(
                    ":nome"=>$nome,
                    ":username"=>$username,
                    ":email"=>$email,
                    ":senha"=>$password,
                    
                ));
                 $sql->getRowCount();
                if($sql->getRowCount() > 0){
                    echo 'bem sucesso';
                    
                    echo $sql->getLastInsertId();
                }{
                  throw new \Exception('Erro ao cadastrar');
                }
            }catch(\Exception $e){
                echo $e->getMessage();
            }

    }

}

