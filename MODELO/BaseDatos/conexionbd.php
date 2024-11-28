<?php

class DataBase{

    private string $server;
    private string $user;
    private string $pass;
    private string $db;
    private ?PDO $conexion;

    public function __construct()
    {
        $this->server="localhost";
        $this->user="root";
        $this->pass="";
        $this->db="feria_sena";
    }
    
    public function conectarBaseDatos(){

    try{

        
        $this->conexion=new PDO("mysql:host={$this->server};dbname={$this->db};charset=utf8",
        $this->user,$this->pass);
        
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            echo "Conexión exitosa a la base de datos";
        }catch (PDOException $e) {
            die ("Error al conectar a la base de datos: ".$e->getMessage());
        }
    }

    public function getConexion(): ?PDO{
        $this->conectarBaseDatos();
        return $this->conexion;
    }
}
?>