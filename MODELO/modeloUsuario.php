<?php

require_once "conexionbd.php";

class User{

    public string $correo;
    public string $contraseña;
    public $nombre;
    public $rol;

    public function __construct($correo,$contraseña)
    {
        $this->correo=$correo;
        $this->contraseña=$contraseña;
        $this->nombre=null;
        $this->rol=null;
    }

    public function getCorreo(){
        return $this->correo;
    }
    public function getContraseña(){
        return $this->contraseña;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getRol(){
        return $this->rol;
    }

    public function setCorreo($correo){
        $this->correo=$correo;
    }
    public function setContraseña($contraseña){
        $this->contraseña=$contraseña;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setRol($rol){
        $this->rol=$rol;
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

    public function consultarUsuario(){
        $conexion=$this->establecerConexion();
        try{
            $consulta = $conexion->prepare("SELECT Nombre,Rol FROM usuario WHERE correo = :correo AND contrasena= :contrasena");
            $consulta->bindParam(":correo", $this->correo,PDO::PARAM_STR);
            $consulta->bindParam(":contrasena", $this->contraseña, PDO::PARAM_STR);
            $consulta->execute();
            $resultado=$consulta->fetch(PDO::FETCH_ASSOC);
            $this->setNombre($resultado["Nombre"]);
            $this->setRol($resultado["Rol"]);

            if ($resultado){
                echo "<script>console.log('Usuario consultado')</script>";
                return $resultado>0;
            } else {
                echo "<script>console.log('No se encontró el usuario')</script>";
            }
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