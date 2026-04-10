<?php

require_once __DIR__ . "/../config/database.php";
require_once __DIR__ . "/../models/lista.php";

$database = new Database();
$db = $database->connect();

$lista = new Lista($db);

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {

    case 'GET':

        // canciones de una lista
        if (isset($_GET['idLista'])) {
            echo json_encode($lista->getCanciones($_GET['idLista']));
            return;
        }

        // listas con conteo
        if (isset($_GET['conteo'])) {
            echo json_encode($lista->getListasConConteo());
            return;
        }

        // obtener todas
        echo json_encode($lista->read($_GET['idUsuario']));
        break;


    case 'POST':

        $data = json_decode(file_get_contents("php://input"));

        $resultado = $lista->create($data->nombreLista,$data->idUsuario);

        echo json_encode([
            "success" => $resultado
        ]);

        break;


    case 'PUT':

        $data = json_decode(file_get_contents("php://input"));

        $resultado = $lista->update(
            $data->id,
            $data->nombreLista
        );

        echo json_encode([
            "success" => $resultado
        ]);

        break;


    case 'DELETE':

        $id = $_GET['id'];

        $resultado = $lista->delete($id);

        echo json_encode([
            "success" => $resultado
        ]);

        break;
}