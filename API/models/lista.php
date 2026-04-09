<?php

class Lista {

    private $conn;
    private $table = "listasReproduccion";

    public function __construct($db){
        $this->conn = $db;
    }

    // obtener todas las listas
    public function read(){

        $query = "SELECT *
                  FROM " . $this->table . "
                  WHERE borrado IS NULL";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // crear lista
    public function create($nombreLista){

        $query = "INSERT INTO " . $this->table . " (nombreLista)
                  VALUES (:nombreLista)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nombreLista", $nombreLista);

        return $stmt->execute();
    }


    // actualizar lista
    public function update($id, $nombreLista){

        $query = "UPDATE " . $this->table . "
                  SET nombreLista = :nombreLista
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nombreLista", $nombreLista);
        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }


    // soft delete
    public function delete($id){

        $query = "UPDATE " . $this->table . "
                  SET borrado = NOW()
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }


    // canciones de una lista
    public function getCanciones($idLista){

        $query = "SELECT 
                    c.id,
                    c.nombreCancion,
                    c.artista,
                    c.genero,
                    c.duracion,
                    c.direccionUrl
                FROM listaCanciones lc
                JOIN cancionesUsuario c 
                ON lc.idCanciones = c.id
                WHERE lc.idListaReproduccion = :idLista
                AND c.borrado IS NULL";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":idLista", $idLista);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // listas con conteo de canciones
    public function getListasConConteo(){

        $query = "SELECT 
                    l.id,
                    l.nombreLista,
                    COUNT(lc.idCanciones) AS totalCanciones
                FROM listasReproduccion l
                LEFT JOIN listaCanciones lc
                ON l.id = lc.idListaReproduccion
                WHERE l.borrado IS NULL
                GROUP BY l.id";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}