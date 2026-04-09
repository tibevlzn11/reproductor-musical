<?php
$base = realpath(__DIR__ . "/..");
require_once $base . "/config/database.php";
require_once $base . "/models/canciones.php";

$database = new Database();
$db = $database->connect();

$cancion = new Cancion($db);

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {

    case 'GET':

        if(isset($_GET['artista'])){
            echo json_encode($cancion->getByArtista($_GET['artista']));
            return;
        }

        if(isset($_GET['genero'])){
            echo json_encode($cancion->getByGenero($_GET['genero']));
            return;
        }

        if(isset($_GET['q'])){
            echo json_encode($cancion->buscar($_GET['q']));
            return;
        }

        if(isset($_GET['random'])){
            echo json_encode($cancion->random($_GET['random']));
            return;
        }

        echo json_encode($cancion->read());
        break;


    case 'POST':

        $data = json_decode(file_get_contents("php://input"));

        $cancion->nombreCancion = $data->nombreCancion;
        $cancion->duracion      = $data->duracion;
        $cancion->artista       = $data->artista;
        $cancion->genero        = $data->genero;
        $cancion->direccionUrl  = $data->direccionUrl;
        $cancion->idUsuario     = $data->idUsuario;

        if($cancion->create()){
            echo json_encode(["mensaje" => "Cancion creada"]);
        } else {
            echo json_encode(["mensaje" => "Error al crear cancion"]);
        }
        break;


    case 'PUT':

        $data = json_decode(file_get_contents("php://input"));

        $cancion->id            = $data->id;
        $cancion->nombreCancion = $data->nombreCancion;
        $cancion->duracion      = $data->duracion;
        $cancion->artista       = $data->artista;
        $cancion->genero        = $data->genero;
        $cancion->direccionUrl  = $data->direccionUrl;
        $cancion->idUsuario     = $data->idUsuario;

        if($cancion->update()){
            echo json_encode(["mensaje" => "Cancion actualizada"]);
        } else {
            echo json_encode(["mensaje" => "Error al actualizar cancion"]);
        }
        break;


    case 'DELETE':

        $cancion->id = $_GET['id'];

        if($cancion->delete()){
            echo json_encode(["mensaje" => "Cancion eliminada"]);
        } else {
            echo json_encode(["mensaje" => "Error al eliminar cancion"]);
        }
        break;
}