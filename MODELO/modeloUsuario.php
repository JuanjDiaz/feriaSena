<?php

require_once "conexionbd.php";

class User{

    public string $correo;
    public string $contraseña;

    public function __construct($correo,$contraseña)
    {
        $this->correo=$correo;
        $this->contraseña=$contraseña;
    }

    public function getUsuario(){
        return $this->correo;
    }
    public function getContraseña(){
        return $this->contraseña;
    }

    public function setUsuario($correo){
        $this->correo=$correo;
    }
    public function setContraseña($contraseña){
        $this->contraseña=$contraseña;
    }


    public function validarUsuario(){
        $conexion=$this->establecerConexion();
        try{
            $consulta = $conexion->prepare("SELECT * FROM usuario WHERE correo = :correo AND contrasena= :contrasena");
            $consulta->bindParam(":correo", $this->correo,PDO::PARAM_STR);
            $consulta->bindParam(":contrasena", $this->contraseña, PDO::PARAM_STR);
            $consulta->execute();
            return $consulta->rowCount()>0;
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