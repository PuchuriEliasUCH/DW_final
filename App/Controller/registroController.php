<?php
require(__DIR__ . '/../utils/render.php');
require_once(__DIR__ . "/../models/usuario.php");

class RegistroController extends Render{
    private $oUsuario;
    
    public function __construct(PDO $cnx){
        $this -> oUsuario = new Usuario($cnx);
    }

    public function inicio(){
        $this -> render('registro');
    }

}
?>