<?php

class Atualizar
{
    private $sql;
    private $table;
    public function atualizarDados($table)
    {
        $this->sql = "UPDATE $this->table SET ";
    }
}
