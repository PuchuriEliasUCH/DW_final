<?php
require_once(__DIR__ . '/configPath.php');
require_once(__DIR__ . '/router.php');

$router = new Router();
$router -> run();
?>