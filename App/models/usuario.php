<?php
class Usuario extends Orm{
    public function __construct(PDO $cnx){
        parent::__construct('usuario', $cnx);        
    }
}
?>