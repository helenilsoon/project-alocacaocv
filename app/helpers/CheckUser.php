<?php
namespace app\helpers;

use app\database\Sql;
use Exception;  
use app\helpers\Csrf;

class CheckUser
{
    public static function checkUser($key,$params)
    {

        $sql = new Sql();
        $res = $sql->select("SELECT {$key} FROM usuario where {$key} = :{$key}",array(
            ":{$key}"=>$params
        ));
        
        if(isset($_SESSION['mensagem'])){
            unset($_SESSION['mensagem']);
        }
        if(count($res)>0){
            return true;            
            die();
        }

        return false;
      
    }

    public  function checkUserInView()
    {
        
         

        Csrf::validateToken($_POST['token']);        

        if(isset($_POST['email']) || isset($_POST['username'])){
            
            $email = isset($_POST['email'])?filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL):null;
            $username = isset($_POST['username'])?filter_input(INPUT_POST,'username',FILTER_SANITIZE_SPECIAL_CHARS):null;
            
            if(!empty($email)){
                if(self::checkUser('email',$email)){
                    self::generateHtmlResponse(true,$email);
                    die();
                }
                self::generateHtmlResponse(false,$email);
                die();
                
            }
            if(!empty($username)){
                if(self::checkUser('username',$username)){
                    self::generateHtmlResponse(true,$username);
                    die();
                }
                self::generateHtmlResponse(false,$username);
                die();
            }

            
        }

    }
    public static function generateHtmlResponse($key,$params)
    {
        if($key === true){
            echo "
                <div class='alert alert-danger my-2' role='alert'> 
                <small>
                    {$params} não disponível.
                </smal>
                </div>";
        }else{
            echo "<div class='alert alert-success my-2' role='alert'>
                <small>
                        {$params} disponível.
                </smal>
            </div>";
        }
    }
}