<?php

namespace Source\Controllers;
use League\Plates\Engine;

abstract class Controller {

     /** @var Engine */
     protected $view;

     /** @var Router */
     protected $router;
 
     public function __construct($router, $dir = null, $globals = [])
     {
         $dir = $dir ?? dirname(__DIR__, 2) . '/views/';
 
         $this->view = Engine::create($dir, 'php');
         $this->router = $router;
 
         $this->view->addData(['router' => $this->router]);
         if ($globals) {
             $this->view->AddData($globals);
         }
     }

}




