<?php

require_once "./bootstrap.php";
try{
 
    $data = router();

     extract($data['data']);
     
     
     if(!isset($data['view'])){
        throw new Exception("o indice view não esta definido");
     }
     if(!file_exists(VIEW_PATH.$data['view'])){
        throw new Exception("Essa view {$data['view']} não existe");
     }
     $view = $data['view'];
     $title= $data['title'];
     
    require_once VIEW_PATH.'master.php';
}catch(Exception $e){
    echo $e->getMessage();
}