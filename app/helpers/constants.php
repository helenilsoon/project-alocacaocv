<?php
define("HOST",$_SERVER['SERVER_ADDR']);
if(HOST == '127.0.0.1'){
   define("APP_ENV","local");
} 

define("TESTE",'Ola helenilson welcome to webuild');
define("CONTROLLER_PATH","app\\controllers\\");
define("CONTROLLER_PATH_HELPERS","app\\helpers\\");
define("ROOT",dirname(__FILE__,3));
define("VIEW_PATH",ROOT.DIRECTORY_SEPARATOR."app".DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR);
define("JS_PATH","/assets/js/");
define("CSS_PATH","/assets/css/");
define("IMG_PATH","/assets/img/");
define("ICON_PATH","/assets/icon/");
