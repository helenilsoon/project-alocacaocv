<?php

function controller($foundUri,$params){
    
    $controller= array_values($foundUri)[0];
    [$controller,$method] = explode('@', $controller);
    $controller = CONTROLLER_PATH. $controller;
   if(!class_exists($controller)){
    throw new Exception('Controller '.$controller.' not found');
   }
    $controllerInstace = new $controller;
    
    if(!method_exists($controllerInstace, $method)){
        throw new Exception("o metodo ".$method." não existe no ".$controller);
    }
     dd($controllerInstace->$method($params),'controller and method');
   return $controllerInstace->$method($params);
   
}