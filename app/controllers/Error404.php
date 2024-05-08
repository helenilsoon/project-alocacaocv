<?php

namespace app\controllers;

class Error404
{
    public function index()
    {
        return [
            'view' => 'erro404.php',
            'title' => 'Erro 404 | webuild encontre profissionais gratuitamente',
            'data' => ['name' => 'helenilson oliveira']
        ];
    }
}