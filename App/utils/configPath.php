<?php
// Elimina '/index.php' si existe, para obtener solo la carpeta base
$rutaCarpeta = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);

// URL completa solicitada
$rutaURL = $_SERVER['REQUEST_URI'];

// Extrae la parte final de la URL (sin la carpeta base)
$url = '/' . trim(substr($rutaURL, strlen($rutaCarpeta)), '/');

// Define constantes globales para usar en rutas y enrutamiento
define('URL', $url);                     // Ej: /usuarios/ver o /inicio
define('URL_PATH', rtrim($rutaCarpeta, '/')); 
?>