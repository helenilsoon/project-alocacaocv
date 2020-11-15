<?php 
/*	
	configuração para encontra classe na pasta determinada.
	autor: @helenilson Oliveira
 	data : 30/10/2020

*/
spl_autoload_register(function($class_name){

	$file = "Classes".DIRECTORY_SEPARATOR.$class_name.".php";

	if(file_exists($file)){
		require_once($file);
	}

});