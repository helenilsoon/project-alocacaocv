<?php


class Conexao
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '1234';
    private $database = 'id11855241_db_webuild';

    public function conecta()
    {
        $con = mysqli_connect(
            $this->host,
            $this->user,
            $this->password,
            $this->database
        );
        //comunicação do charset com o banco de dados
        mysqli_set_charset($con, 'utf8');
        if (mysqli_connect_errno()) {
            echo "Erro de conexão com o banco de dados" . mysqli_connect_error();
        }
        return $con;
    }
}
