<?php
class Donante extends Orm{
    public function __construct(PDO $cnx){
        parent::__construct('donante', $cnx);        
    }
}
?>