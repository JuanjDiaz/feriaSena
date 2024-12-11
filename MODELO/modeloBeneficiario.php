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
        // iniciar conexion con la base de datos
        $conexion=$this->establecerConexion();
        // preparar la consulta para registrar beneficiarios con parametros nombrados
        try{
            $consulta= $conexion->prepare("INSERT INTO beneficiario (Id_beneficiario,Nombre_completo,Celular,Email)
                                            VALUES (:idBeneficiario, :nombreCompleto, :celular, :email)");
            // vincular los parámetros a los valores proporcionados
            $consulta->bindParam(":idBeneficiario",$this->id,PDO::PARAM_INT);
            $consulta->bindParam(":nombreCompleto",$this->nombreCompleto,PDO::PARAM_STR);
            $consulta->bindParam(":celular",$this->celular,PDO::PARAM_INT);
            $consulta->bindParam(":email",$this->correo,PDO::PARAM_STR);

            // ejecutar la consulta
            $consulta->execute();
            return true;
        }catch(PDOException $e){
            $mensajeError = "Error al registrar beneficiario: " . $e->getMessage();
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
            echo "Inicio de sesión fallido. Bienvenido.";
        }
        return $conexion;
    }

}

?>