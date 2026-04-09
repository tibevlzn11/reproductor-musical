<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$request = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$base = dirname(__DIR__);

if (strpos($request, "/canciones") !== false) {
    require_once $base . "/API/controllers/canciones.php";
}
if (strpos($request, "/usuarios") !== false) {
    require_once $base . "/API/controllers/usuario.php";
}
if (strpos($request, "/listas") !== false) {
    require_once $base . "/API/controllers/listasReproduccion.php";
}
