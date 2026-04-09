<?php

class ListaCancion {

    private $conn;
    private $table = "listaCanciones";

    public $id;
    public $idCanciones;
    public $idListaReproduccion;

    public function __construct($db){
        $this->conn = $db;
    }

    public function create(){

        $query = "INSERT INTO ".$this->table."
        (idCanciones,idListaReproduccion)
        VALUES (:idCanciones,:idListaReproduccion)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':idCanciones',$this->idCanciones);
        $stmt->bindParam(':idListaReproduccion',$this->idListaReproduccion);

        return $stmt->execute();
    }

}