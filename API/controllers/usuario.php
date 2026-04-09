<?php

$base = realpath(__DIR__ . "/..");
require_once $base . "/config/database.php";
require_once $base . "/models/usuario.php";

$database = new Database();
$db = $database->connect();

$usuario = new Usuario($db);

$data = json_decode(file_get_contents("php://input"));

switch($_SERVER['REQUEST_METHOD']){

    case 'POST':

        $usuario->nombreCompleto = $data->nombreCompleto;
        $usuario->usuario = $data->usuario;
        $usuario->clave = password_hash($data->clave, PASSWORD_BCRYPT);

        if($usuario->create()){
            echo json_encode(["mensaje"=>"Usuario creado"]);
        }

    break;

    case 'GET':

        $stmt = $usuario->read();
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($usuarios);

    break;

    case 'PUT':

        $usuario->id = $data->id;
        $usuario->nombreCompleto = $data->nombreCompleto;
        $usuario->usuario = $data->usuario;
        $usuario->clave = password_hash($data->clave, PASSWORD_BCRYPT);

        if($usuario->update()){
            echo json_encode(["mensaje"=>"Usuario actualizado"]);
        }

    break;

    case 'DELETE':

        $usuario->id = $_GET['id'];

        if($usuario->delete()){
            echo json_encode(["mensaje"=>"Usuario eliminado"]);
        }

    break;

}