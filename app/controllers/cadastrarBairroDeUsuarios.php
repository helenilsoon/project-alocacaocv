<?php

namespace app\controllers;

use app\database\Sql;
class cadastrarBairroDeUsuarios
{
   public function addListaDeBairros() 
   {
    $query = new Sql();
    $listaDeUser= $query->select('SELECT * FROM usuario');
   
    $quantidadeInDb = $query->getRowCount();
       
    $listaDebairro= [
        'Adrianópolis',
        'Aleixo','Alvorada','Armando Mendes','Betânia','Cachoeirinha','Centro','Chapada','Cidade' ,'Cidade' ,'Colônia','Colônia Oliveira Machado',	'Colônia Santo Antônio','Colônia Terra Nova','Compensa','Coroado','Crespo',
        'Da Paz','Distrito Industrial I','Distrito Industrial II','Dom Pedro','Educandos','Flores	Centro','Gilberto Mestrinho','Glória','Japiim','Jorge Teixeira','Lago Azul','Lírio do Vale','Mauazinho','Monte das Oliveiras',
        'Morro da Liberdade','Nossa Senhora Aparecida','Nossa Senhora das Graças	Centro','Nova Cidade','Nova Esperança','Novo Aleixo','Novo Israel','Parque 10 de Novembro	Centro','Petrópolis','Planalto','Ponta Negra','Praça 14 de Janeiro',
        'Presidente Vargas','Puraquequara','Raiz','Redenção','Santa Etelvina','Santa Luzia','Santo Agostinho','Santo Antônio','São Francisco','São Geraldo	Centro','São Jorge','São José Operário','São Lázaro','São Raimundo','Tancredo Neves',
        'Tarumã','Tarumã-Açu','Vila Buriti','Vila da Prata','Zumbi dos Palmares' ];
 $cont = 2;
 $contadorBairro= 0;
 foreach($listaDeUser as $lista){
         echo $listaDebairro[$contadorBairro].' adicionado o bairro <br>';
          if($contadorBairro == 62){
            $contadorBairro = 0;
          }
         
     $sql = new Sql();
      $sql->select("INSERT INTO endereco(id_usuario,bairro)values(:id,:lista)",array(
         ":id"=>$cont,
         ":lista"=>$listaDebairro[$contadorBairro]
      ));

      $cont++;
      $contadorBairro++;
      }
   }
}