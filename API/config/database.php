<?php

class Database {

    private $host = "localhost";
    private $db_name = "reproductor";
    private $username = "userReproductor";
    private $password = "Q7_OtrJBEv2]l[WV";
    public $conn;

    public function connect(){

        $this->conn = null;

        try{
            $this->conn = new PDO(
                "mysql:host=".$this->host.";dbname=".$this->db_name,
                $this->username,
                $this->password
            );

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e){
            echo "Error de conexion: " . $e->getMessage();
        }

        return $this->conn;
    }
}