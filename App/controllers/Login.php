<?php
namespace app\controllers;

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
       $email = filter_input(INPUT_POST,'email'.FILTER_SANITIZE_EMAIL);
       $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
    public function signUp($params)
    {
        return[
            'view'=>'cadastrar.php',
            'title'=>'Criar conta | webuild encontre profissionais gratuitamente',
            'data'=>['name'=>'helenilson oliveira']
          
          ];
    }
}