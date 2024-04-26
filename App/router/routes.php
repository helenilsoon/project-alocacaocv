<?php
    $path = '/';
return [
    'POST'=>[
        $path ."login"=>'Login@signIn'
    ],
    'GET'=>[
        $path.''=>'Home@index',
        $path.'login'=>'Login@index',
        $path.'cadastrar'=>'Login@signUp',
        // $path.'user/create'=>'User@create',
        $path.'user/[a-z0-9]+'=>'User@show',
        $path.'user/[a-z0-9]+/nome/[a-z0-9]+'=>'User@index',
        $path.'error404'=>'Error404@index'

       

    ]


];
