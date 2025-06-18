<?php
$rutaCarpeta = dirname($_SERVER['SCRIPT_NAME']);
$rutaURL = $_SERVER["REQUEST_URI"];
$url = substr($rutaURL, strlen($rutaCarpeta));

define('URL', $url)
?>