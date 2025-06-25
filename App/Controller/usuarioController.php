<?php
require(__DIR__ . '/../utils/render.php');
require_once(__DIR__ . "/../models/usuario.php");

class UsuarioController extends Render
{
    private $oUsuario;

    public function __construct(PDO $cnx)
    {
        $this->oUsuario = new Usuario($cnx);
    }

    public function perfil()
    {
        session_start();

        if (isset($_SESSION['usuario'])) {
            $this->render('perfil');
        } else {
            header('Location: /login/inicio');
            exit;
        }
    }

    public function registrar()
    {
        header('Content-Type: application/json');
        $res = new Resultados();

        try {
            $post = file_get_contents("php://input");
            $datos = json_decode($post, true);

            if ($this->oUsuario->getByEmail($datos['email'])) {
                $res->esCorrecto = false;
                $res->mensajes = 'El correo ya está registrado.';
                echo json_encode($res);
                return;
            }

            $encriptado = password_hash($datos['password'], PASSWORD_BCRYPT);

            $this->oUsuario->insertUser([
                'email' => $datos['email'],
                'password' => $encriptado
            ]);

            $user = $this->oUsuario->getByEmail($datos['email']); // Debe devolver array
            if (!$user || !isset($user['id_usuario'])) {
                throw new Exception("No se pudo obtener el usuario insertado.");
            }

            if (isset($datos['dni'])) {
                $this->oUsuario->insertDonante([
                    'id_usuario' => $user['id_usuario'],
                    'nombre_completo' => $datos['nombre_completo'],
                    'fecha_nacimiento' => $datos['fecha_nacimiento'],
                    'dni' => $datos['dni']
                ]);
            } else {
                $this->oUsuario->insertOrganizacion([
                    'id_usuario' => $user['id_usuario'],
                    'razon_social' => $datos['razon_social'],
                    'ruc' => $datos['ruc'],
                    'telefono' => $datos['telefono'],
                    'direccion' => $datos['direccion'],
                    'tipo_organizacion' => $datos['tipo_organizacion'],
                    'otro_tipo' => $datos['otro_tipo'] ?? null,
                    'descripcion_corta' => $datos['descripcion_corta'],
                    'descripcion_larga' => $datos['descripcion_larga'],
                ]);
            }

            $res->esCorrecto = true;
            $res->mensajes = 'Registro exitoso.';
        } catch (Exception $e) {
            $res->esCorrecto = false;
            $res->mensajes = 'Error: ' . $e->getMessage(); // Puedes cambiar esto en producción
        }

        ob_clean();
        echo json_encode($res);
    }
}
