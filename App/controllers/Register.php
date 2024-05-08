<?php

namespace app\controllers;

use app\database\Sql;
use app\helpers\CheckUser;
use app\helpers\Csrf;

class Register
{
    public function index($params)
    {

        $data = isset($_SESSION['mensagem']) ? $_SESSION : [];


        return [
            'view' => 'cadastrar.php',
            'title' => 'Criar conta | webuild encontre profissionais gratuitamente',
            'data' => $data
        ];
    }

    public function signUp($params)
    {
    

        if (!empty($_POST) && Csrf::validateToken($_POST['token'])) {


            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = password_hash($_POST['senha'] . $email, PASSWORD_DEFAULT);

            try {
                $sql = new Sql();
                    # verifica se o email ou o username existem 
                    # response true or false
                if(CheckUser::checkUser("email", $email)&&
                 CheckUser::checkUser("username", $username))
                 {
                    
                     $_SESSION['mensagem']['emailouusername'] = "Email ou username ja existem";
                     header("Location: cadastrar");

                    exit("Email ou username ja existem");
                 }




                $sql->queryExecute("INSERT INTO usuario (nome, username, email, password) VALUES (:nome, :username, :email, :senha)", array(
                    ":nome" => $nome,
                    ":username" => $username,
                    ":email" => $email,
                    ":senha" => $password,
                ));




                if ($sql->getRowCount() > 0) {
                    $id = $sql->getLastInsertId();
                    $user = $sql->select("SELECT * FROM usuario WHERE id_usuario = :id", array(
                        ":id" => $id
                    ));

                    $_SESSION['user'] = $user[0];
                    header("Location: my-account");
                    $_SESSION['mensagem'] = "Cadastrado com sucesso";
                } else {
                    throw new \Exception('Erro ao cadastrar');
                }
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        }
    }
}
