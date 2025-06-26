<?php
require(__DIR__ . '/../utils/render.php');
require_once(__DIR__ . "/../models/organizacion.php");

class OrganizacionController extends Render{
    private $oOrganizacion;
    
    public function __construct(PDO $cnx){
        $this -> oOrganizacion = new Organizacion($cnx);
    }

    public function landingListar(){
        $res = new Resultados();
        $organizaciones = $this -> oOrganizacion -> showCards();

        $res -> esCorrecto = true;
        $res -> resultados = $organizaciones;

        echo json_encode($res);
    }
}

?>