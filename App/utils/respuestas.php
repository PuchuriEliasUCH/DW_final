<?php 
class Resultados{
    public $esCorrecto;
    public $resultados;
    public $mensajes;

    public function __construct(){
        $this -> esCorrecto = false;
        $this -> resultados = [];
        $this -> mensajes = '';        
    }
}
?>