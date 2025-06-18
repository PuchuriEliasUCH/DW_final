<?php

require(__DIR__ . '/../utils/render.php');

class PageController extends Render{
    public function inicio(){
        $this -> render('inicio');
    }

    public function error404() {
        $this->render('error');
    }

    public function catalogo(){}

    public function registro(){}

    public function login(){}
}


?>