<?php

class Usuario {

    private $conn;
    private $table = "Usuario";

    public $id;
    public $nombreCompleto;
    public $usuario;
    public $clave;

    public function __construct($db){
        $this->conn = $db;
    }

    // Crear
    public function create(){

        $query = "INSERT INTO ".$this->table."
        (nombreCompleto, usuario, clave)
        VALUES (:nombreCompleto, :usuario, :clave)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nombreCompleto', $this->nombreCompleto);
        $stmt->bindParam(':usuario', $this->usuario);
        $stmt->bindParam(':clave', $this->clave);

        return $stmt->execute();
    }

    // Leer
    public function read(){

        $query = "SELECT nombreCompleto, usuario FROM ".$this->table."
        WHERE borrado IS NULL";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Actualizar
    public function update(){

        $query = "UPDATE ".$this->table."
        SET nombreCompleto=:nombreCompleto,
            usuario=:usuario,
            clave=:clave
        WHERE id=:id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nombreCompleto',$this->nombreCompleto);
        $stmt->bindParam(':usuario',$this->usuario);
        $stmt->bindParam(':clave',$this->clave);
        $stmt->bindParam(':id',$this->id);

        return $stmt->execute();
    }

    // Soft Delete
    public function delete(){

        $query = "UPDATE ".$this->table."
        SET borrado = NOW()
        WHERE id=:id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id',$this->id);

        return $stmt->execute();
    }

}