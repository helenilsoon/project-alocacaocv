<?php

namespace app\helpers;

class Csrf
{
    public static function createToken(){

        if(isset($_SESSION['token'])){
            unset($_SESSION['token']);
        }

        $_SESSION['token'] = bin2hex(random_bytes(32));

        return '<input type="hidden" id ="token" name="token" value="'.$_SESSION['token'].'">';
       

    }


    public static function validateToken($token):bool
    {   

        if(isset($_SESSION['token']) && $token === $_SESSION['token']){
            return true;
        }

        throw new \Exception('Engraçadinho que me hacker né. faça isso não macho ');
        return false;
        exit();
        
    }
}