<?php
namespace app\controllers;

use app\database\Sql;
use Exception;

class Login 
{
    public function index($params)
    {
        return[
            'view'=>'login.php',
            'title'=>'Login | webuild encontre profissionais gratuitamente',
            'data'=>['name'=>'helenilson oliveira']
          
          ];
    }

    public function signIn(){

       $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
       $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   

       $sql  = new Sql();
       $res = $sql->select("SELECT * FROM usuario WHERE email = :email ",array(
           ":email"=>$email,
       ));

       if(count($res) > 0){
           $user = $res[0];
           if(password_verify($password,$user['password'])){
           $_SESSION['user'] = $user;
            header("Location: my-account");
           }else{

               throw new Exception('login ou senha inválidos');
           }
       }

       throw new Exception("login ou senha inválidos");
       
       
    }
    public function signUp($params)
    {
        return[
            'view'=>'cadastrar.php',
            'title'=>'Criar conta | webuild encontre profissionais gratuitamente',
            'data'=>['name'=>'helenilson oliveira']
          
          ];
    }
    public function logout($params){

        unset($_SESSION['user']);
        header("Location: /");
    }
}