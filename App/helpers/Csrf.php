<?php

namespace app\helpers;

class Csrf
{
    public static function createToken(){

        if(isset($_SESSION['token'])){
            unset($_SESSION['token']);
        }

        $_SESSION['token'] = bin2hex(random_bytes(32));

        return '<input type="hiden" nome="token" value="'.$_SESSION['token'].'">';
       

    }
}