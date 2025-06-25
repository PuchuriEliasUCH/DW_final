<?php
class Orm
{
    private $id;
    private $tabla;
    private $cnx;

    public function __construct($tabla, PDO $cnx)
    {
        $this->tabla = $tabla;
        $this->cnx = $cnx;
    }

    public function getAll()
    {
        $query = $this->cnx->prepare("select * from {$this->tabla}");
        $query->execute();
        return $query->fetchAll();
    }

    public function getById($id)
    {
        $query = $this->cnx->prepare("select * from {$this->tabla} where id_{$this->tabla} = $id");
        $query->execute();
        return $query->fetch();
    }

    public function getByEmail($email)
    {
        $query = $this->cnx->prepare("select id_usuario, email, password from usuario where email = ?");
        $query->execute([$email]);
        return $query->fetch();
    }

    public function deleteById($id)
    {
        $query = $this->cnx->prepare("delete from {$this->tabla} where id_{$this->tabla} = $id");
        $query->execute();
        return "Eliminado correctamente";
    }

    public function updateById($id, $datos = [])
    {
        $set = implode(
            ", ",
            array_map(fn($clave) => "$clave = ?", array_keys($datos))
        );
        $valores = array_values($datos);
        $valores[] = $id;

        $query = $this->cnx->prepare("update {$this->tabla} set $set where id_{$this->tabla} = ?");

        $query->execute($valores);
        return "{$this->tabla} editado correctamente";
    }

    public function insert($datos = [])
    {
        $columnas = implode(", ", array_keys($datos));
        $campos = implode(",", array_fill(0, count($datos), "?"));

        $query = $this->cnx->prepare("insert into {$this->tabla} ($columnas) value ($campos)");
        var_dump($query);
        $query->execute(array_values($datos));
        return "{$this->tabla} agregada correctamente";
    }

    public function insertUser($datos = [])
    {
        $columnas = implode(", ", array_keys($datos));
        $campos = implode(",", array_fill(0, count($datos), "?"));

        $query = $this->cnx->prepare("insert into usuario ($columnas) values ($campos)");
        var_dump($query);
        $query->execute(array_values($datos));
        return "{$this->tabla} agregada correctamente";
    }

    public function insertDonante($datos = [])
    {
        $columnas = implode(", ", array_keys($datos));
        $campos = implode(",", array_fill(0, count($datos), "?"));

        $query = $this->cnx->prepare("insert into donante ($columnas) values ($campos)");
        var_dump($query);
        $query->execute(array_values($datos));
        return "{$this->tabla} agregada correctamente";
    }

    public function insertOrganizacion($datos = [])
    {
        $columnas = implode(", ", array_keys($datos));
        $campos = implode(",", array_fill(0, count($datos), "?"));

        $query = $this->cnx->prepare("insert into organizacion ($columnas) values ($campos)");
        var_dump($query);
        $query->execute(array_values($datos));
        return "{$this->tabla} agregada correctamente";
    }

    ## vistas adicionales
    public function showCards()
    {
        $query = $this->cnx->prepare("select * from view_{$this->tabla}_card");
        $query->execute();
        return $query->fetchAll();
    }

    public function showPerfil($email)
    {
        $query = $this->cnx->prepare("select * from view_usuario_perfil where email = '$email'");
        $query->execute();
        return $query->fetch();
    }
}
