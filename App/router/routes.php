<?php
    $path = '/';
return [
    $path.''=>'Home@index',
    $path.'index.php'=>'Home@index',
    $path.'login'=>'Login@login',
    $path.'user'=>'User@create',
    $path.'user/create'=>'User@create',
    $path.'user/[a-z0-9]+'=>'User@show',
    $path.'user/[a-z0-9]+/nome/[a-z0-9]+'=>'User@index'

];
