<?php

namespace App\Core;

// namespace
use Rain\Tpl;

class Page{

     private $tpl;
     private $options = [];
     private $defaults =[ 
         "data"=>[]
     ];

    public function __construct($opts = array()){
        $this->options = array_merge($this->defaults , $opts);

        // config
        $config = array(
            "base_url"      => null,
            "tpl_dir"       => $_SERVER['DOCUMENT_ROOT']."/App/View/site/",
            
            "cache_dir"     => $_SERVER['DOCUMENT_ROOT']. "/App/View/site/.cache/",
            "remove_comments" => true,
            "debug"         => true, // set to false to improve the speed
        );

       

        Tpl::configure( $config );

        $this->tpl = new Tpl;
        
        $this->setData($this->options['data']);

        $this->tpl->draw('header');

    }

    private function setData ($data = array()){
        foreach ( $data as $key => $value){
            $this->tpl->assign($key, $value);
        }
    }
    public function setTpl($name, $data = array() , $returnHtml =false ) {

            $this->setData($data);

            return $this->tpl->draw($name, $returnHtml);

    }

    public function __destruct(){

        $this->tpl->draw('footer');

    }
}










