<?php
    $path = '/';
return [
    'POST'=>[
        $path ."login"=>'Login@signIn',
        $path ."signUp"=>'Register@signUp',
        $path ."checkuser"=>'CheckUser@checkUserInView'

    ],
    'GET'=>[
        $path.''=>'Home@index',
        $path.'login'=>'Login@index',
        $path.'lista-de-bairros'=>'cadastrarBairroDeUsuarios@addListaDeBairros',
        $path.'uiduser'=>'AddUidUser@addUid',
        $path.'my-account'=>'MyAccount@index',
        $path.'sair'=>'Login@logout',
        $path.'cadastrar'=>'Register@index',
        $path.'search'=>'Search@index',
        // $path.'user/create'=>'User@create',
        $path.'perfil/[a-z0-9]+'=>'User@show',
        $path.'proficao/[a-z0-9\-]+/nome/[a-zA-Z0-9\-]+'=>'User@index',
        $path.'user/[a-z0-9]+/nome/[a-z0-9]+'=>'User@index',
        $path.'error404'=>'Error404@index'

       

    ]


];
