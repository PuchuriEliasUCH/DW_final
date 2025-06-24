<?php
require(__DIR__ . '/../utils/render.php');
require_once(__DIR__ . "/../models/usuario.php");

class UsuarioController extends Render{
    private $oUsuario;
    
    public function __construct(PDO $cnx){
        $this -> oUsuario = new Usuario($cnx);
    }

    public function home(){
        $usuarios = $this -> oUsuario -> getAll();

        echo '<pre>';
        var_dump($usuarios);
        echo '</pre>';
    }
}
?>