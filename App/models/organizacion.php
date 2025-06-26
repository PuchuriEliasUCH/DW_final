<?php
class Organizacion extends Orm{
    public function __construct(PDO $cnx){
        parent::__construct('organizacion', $cnx);        
    }
}
?>