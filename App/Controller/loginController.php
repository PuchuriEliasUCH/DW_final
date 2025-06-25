<?php
require(__DIR__ . '/../utils/render.php');
require_once(__DIR__ . "/../models/usuario.php");

class LoginController extends Render{
    private $oUsuario;

    public function __construct(PDO $cnx){
        $this->oUsuario = new Usuario($cnx);
    }

    public function inicio(){
        $this->render('login');
    }

    public function login(){
        session_start();

        header('Content-Type: application/json');
        $res = new Resultados();

        $post = file_get_contents("php://input");
        $datos = json_decode($post, true);

        if (!isset($datos['email']) || !isset($datos['password'])) {
            $res->mensajes = "Faltan campos requeridos";
            echo json_encode($res);
            return;
        }

        $usuario = $this->oUsuario->getByEmail($datos['email']);

        $decrypt = password_verify($datos['password'], $usuario['password']);

        if ($usuario && $decrypt) {
            $_SESSION['usuario'] = [$this->oUsuario->showPerfil($datos['email'])];

            $res->esCorrecto = true;
            $res->mensajes = "Login exitoso";
            $res->resultados = $_SESSION['usuario'];
        } else {
            $res->mensajes = "Credenciales inválidas";
        }

        echo json_encode($res);
    }

    public function logout(){
        session_start();
        session_unset();
        session_destroy();
        header('Location: /page/inicio');
        exit;
    }
}
