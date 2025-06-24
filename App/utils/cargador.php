<?php
require_once(__DIR__ . '/../../vendor/autoload.php');
require_once(__DIR__ . '/respuestas.php');
require_once(__DIR__ . '/configPath.php');
require_once(__DIR__ . '/router.php');
require_once(__DIR__ . '/../config/bd.php');
require_once(__DIR__ . '/Orm.php');

$router = new Router();
$router -> run();
?>