<?php
require(__DIR__ . '/../utils/render.php');
require_once(__DIR__ . "/../models/necesidad.php");

class NecesidadController extends Render{
    private $oNecesidad;
    
    public function __construct(PDO $cnx){
        $this -> oNecesidad = new Necesidad($cnx);
    }

    public function landingListar(){
        $res = new Resultados();
        $necesidades = $this -> oNecesidad -> showCards();

        $res -> esCorrecto = true;
        $res -> resultados = $necesidades;

        echo json_encode($res);
    }
}
?>