<?php
require_once(__DIR__ . "/../models/necesidad.php");
require_once(__DIR__ . '/../utils/render.php');

class PageController extends Render{
    public function __construct(PDO $cnx){
    }

    public function inicio(){
        $this -> render('inicio');
    }

    public function error404() {
        $this->render('error');
    }

    public function necesidades(){
        $this -> render('necesidades');
    }

    public function organizaciones(){
        $this -> render('organizaciones');
    }

    public function registro(){
        $this -> render('registro');
    }
}


?>