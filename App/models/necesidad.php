<?php
class Necesidad extends Orm{
    public function __construct(PDO $cnx){
        parent::__construct('necesidad', $cnx);        
    }
}
?>