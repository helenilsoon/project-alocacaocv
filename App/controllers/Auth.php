<?php
namespace app\controllers;

class Auth
{

    
  public static function authenticated()  {

    if(isset($_SESSION['user'])) {
        return true;
    } else {
        return false;
    }

  }




}