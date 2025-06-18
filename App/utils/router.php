<?php

class Router {
    private $controller;
    private $method;
    private $params = [];

    public function __construct() {
        $this->redireccion();
    }

    public function redireccion() {
        $url = explode('/', URL);

        $this -> controller = !empty($url[1]) ? $url[1] : 'page';
        $this -> method = !empty($url[2]) ? $url[2] : 'inicio';
        $this -> params = array_slice($url, 3);

        $this->controller = $this -> controller . 'Controller';

        $archivo = __DIR__ . '/../Controller/' . $this->controller . '.php';

        if (file_exists($archivo)) {
            require_once($archivo);
        } else {
            $this->mostrar404();
        }
    }

    private function mostrar404() {
        require_once(__DIR__ . '/../Controller/PageController.php');
        $page = new PageController();
        $page -> error404();
        exit;
    }

    public function run() {
        $controllerName = $this -> controller;
        $method = $this -> method;

        if (!class_exists($controllerName)) {
            $this->mostrar404();
        }

        $controller = new $controllerName();

        if (!method_exists($controller, $method)) {
            $this->mostrar404();
        }

        call_user_func_array([$controller, $method], $this->params);
    }
}
?>
