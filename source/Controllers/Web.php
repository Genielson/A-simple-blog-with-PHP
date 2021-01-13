<?php

namespace Source\Controllers;

use League\Plates\Engine;

class Web extends Controller {

    public function __construct(){

        $this->view = Engine::create(__DIR__."/views","php");
    }

    public function home(){

       echo $this->view->render("web/home");

    }

    public function error(array $data){

        echo $this->view->render('404', ["error" => $data['errcode']]);
        
    }

}