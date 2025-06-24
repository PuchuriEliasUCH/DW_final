<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

class Db {
    private $cnx;
    private $dbhost;
    private $dbname;
    private $dbuser;
    private $dbpass;

    public function __construct(){

        // Desarrollo (comentar al hacer deploy)
        $this -> dbhost = $_ENV['MYSQL_ADDON_HOST'];
        $this -> dbname = $_ENV['MYSQL_ADDON_HOST'];
        $this -> dbuser = $_ENV['MYSQL_ADDON_HOST'];
        $this -> dbpass = $_ENV['MYSQL_ADDON_HOST'];

        /*
        // Producción 
        $this -> dbhost = getenv('MYSQL_ADDON_HOST');
        $this -> dbname = getenv('MYSQL_ADDON_DB');
        $this -> dbuser = getenv('MYSQL_ADDON_USER');
        $this -> dbpass = getenv('MYSQL_ADDON_PASSWORD');
        */

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