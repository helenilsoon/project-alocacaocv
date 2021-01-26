<?php

 function registrarLog(){

   	$navegador  = $_SERVER['HTTP_USER_AGENT'];
    $ip         = $_SERVER['HTTP_X_REAL_IP'];
    $referencia = $_SERVER['HTTP_REFERER'];
    
   
    
    $file = fopen("/config/log.txt","a+");

    fwrite($file,"----------------------".date("d-m-Y H:i:s")."----------------------"."\r\n");
    fwrite($file,"Navegador:".$navegador."\r\n");
    fwrite($file,"ip:".$ip."\r\n");
    fwrite($file,"Referencia:".$referencia."\r\n");
    fclose($file);

    

}