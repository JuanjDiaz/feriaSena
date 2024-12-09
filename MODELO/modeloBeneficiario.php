<?php

require_once "conexionbd.php";

class Beneficiario{

    public string $id;
    public string $nombreCompleto;
    public string $celular;
    public string $correo;

    public function __construct($id,$nombreCompleto,$celular,$correo)
    {
        $this->id=$id;
        $this->nombreCompleto=$nombreCompleto;
        $this->celular=$celular;
        $this->correo=$correo;
    }

    public function getId(){
        return $this->id;
    }
    public function getNombreCompleto(){
        return $this->nombreCompleto;
    }
    public function getCelular(){
        return $this->celular;
    }
    public function getCorreo(){
        return $this->correo;
    }

    public function setId($id){
        $this->id=$id;
    }
    public function setNombreCompleto($nombreCompleto){
        $this->nombreCompleto=$nombreCompleto;
    }
    public function setCelular($celular){
        $this->celular=$celular;
    }
    public function setCorreo($correo){
        $this->correo=$correo;
    }

    public function crearBeneficiario(){
        $conexion=$this->establecerConexion();
        try{
            $consulta= $conexion->prepare("INSERT INTO ");
            // continuacion de de codigo sql para insertar beneficiarios
        }catch(PDOException $e){
            $mensajeError = "Error al validar usuario: " . $e->getMessage();
            echo "<script>console.error(" . json_encode($mensajeError) . ");</script>";
            return false;
        }
    }

    public function establecerConexion(){
        $db=new DataBase();
        $conexion=$db->getConexion();

        if ($conexion) {
            echo "Inicio de sesión exitoso. Bienvenido.";
        } else {
            echo "Usuario o contraseña incorrectos.";
        }
        return $conexion;
    }

}

?>