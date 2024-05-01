<?php
namespace app\controllers;

class MyAccount
{
    public function index(){

        if(Auth::authenticated()){
            $dataUser = isset($_SESSION['user'])? $_SESSION['user']:[];
            return[
                'view'=>'my-account.php',
                'title'=>'Minha conta | webuild',
                'data'=> $dataUser
            ];
        }

        return header('Location: login');
        exit();
        
    }
}