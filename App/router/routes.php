<?php
    $path = '/';
return [
    'POST'=>[
        $path ."login"=>'Login@signIn',
        $path ."signUp"=>'Register@signUp'

    ],
    'GET'=>[
        $path.''=>'Home@index',
        $path.'login'=>'Login@index',
        $path.'my-account'=>'MyAccount@index',
        $path.'sair'=>'login@logout',
        $path.'cadastrar'=>'Register@index',
        // $path.'user/create'=>'User@create',
        $path.'user/[a-z0-9]+'=>'User@show',
        $path.'user/[a-z0-9]+/nome/[a-z0-9]+'=>'User@index',
        $path.'error404'=>'Error404@index'

       

    ]


];
