<?php
class Db {
    private $cnx;
    private $dbhost = 'localhost';
    private $dbname = 'pruebas3';
    private $dbuser = 'root';
    private $dbpass = '';

    public function __construct(){
        $opciones = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        $this -> cnx = new PDO(
            "mysql:host={$this -> dbhost};dbname={$this -> dbname}", 
            $this -> dbuser, 
            $this -> dbpass,
            $opciones
        );

        $this -> cnx -> exec("set character set utf8");
    }

    public function conectar(){
        return $this -> cnx;
    }

    public function desconectar(){
        $this -> cnx = null;
    }
}

?>