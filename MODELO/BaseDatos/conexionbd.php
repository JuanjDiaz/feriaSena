<?php

class DataBase{

    public string $server;
    public string $user;
    public string $pass;
    public string $db;
    public $conexion;

    public function __construct()
    {
        $this->server="localhost";
        $this->user="root";
        $this->pass="";
        $this->db="feria_sena";
    }
    
    public function conectarBaseDatos(){

        $this->conexion=new mysqli($this->server,$this->user,$this->pass,$this->db);

        if ($this->conexion->connect_errno){
            die("Conexión fallida" . $this->conexion->connect_errno);
        }else{
            echo "Conectado correctamente";
        }
    }
}
?>