<?php

class Cancion {

    private $conn;
    private $table = "cancionesUsuario";

    public $id;
    public $nombreCancion;
    public $imagen;
    public $artista;
    public $genero;
    public $direccionUrl;
    public $idUsuario;

    public function __construct($db){
        $this->conn = $db;
    }

    public function create(){

        $query = "INSERT INTO ".$this->table."
        (nombreCancion,artista,genero,direccionUrl,imagen,idUsuario)
        VALUES (:nombreCancion,:artista,:genero,:direccionUrl,:imagen,:idUsuario)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nombreCancion',$this->nombreCancion);
        $stmt->bindParam(':artista',$this->artista);
        $stmt->bindParam(':genero',$this->genero);
        $stmt->bindParam(':direccionUrl',$this->direccionUrl);
        $stmt->bindParam('imagen',$this->imagen);
        $stmt->bindParam(':idUsuario',$this->idUsuario);

        return $stmt->execute();
    }

    public function read($idUsuario){

        $query = "SELECT *
                  FROM ".$this->table."
                  WHERE idUsuario = :idUsuario AND borrado IS NULL";

        $stmt = $this->conn->prepare($query);
         $stmt->bindParam(":idUsuario",$idUsuario);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByArtista($artista){

        $query = "SELECT *
                  FROM ".$this->table."
                  WHERE artista = :artista
                  AND borrado IS NULL";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":artista",$artista);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByGenero($genero){

        $query = "SELECT *
                  FROM ".$this->table."
                  WHERE genero = :genero
                  AND borrado IS NULL";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":genero",$genero);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscar($texto){

        $texto = "%".$texto."%";

        $query = "SELECT *
                  FROM ".$this->table."
                  WHERE borrado IS NULL
                  AND (
                    nombreCancion LIKE :texto
                    OR artista LIKE :texto
                    OR genero LIKE :texto
                  )";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":texto",$texto);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function random($limit){

        $query = "SELECT *
                  FROM ".$this->table."
                  WHERE borrado IS NULL
                  ORDER BY RAND()
                  LIMIT :limite";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":limite",$limit,PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function delete(){

        $query = "UPDATE ".$this->table."
        SET borrado = NOW()
        WHERE id=:id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id',$this->id);

        return $stmt->execute();
    }

}