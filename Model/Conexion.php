<?php

class Conexion {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "tenderodb";
    private $mySQLI;
    
    // Estableciendo conexión con la base de datos TENDERO
    public function abrir(){
        $this->mySQLI =new mysqli($this->host, $this->user, $this->pass, $this->db);
        if(mysqli_connect_error()){
            return false;
        } else {
            return $this->mySQLI;
        }
    }
    

    // Cerrando la conexión con la base de datos TENDERO
    public function cerrar() {
        $this->mySQLI->close();
    }

}
