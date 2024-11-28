<?php

require_once "conexionbd.php";



class User{

    public string $usuario;
    public string $contraseña;

    public function __construct()
    {
        $this->usuario=null;
        $this->contraseña=null;
    }

    public function getUsuario(){
        return $this->usuario;
    }
    public function getContraseña(){
        return $this->contraseña;
    }

    public function setUsuario($usuario){
        $this->usuario=$usuario;
    }
    public function setContraseña($contraseña){
        $this->contraseña=$contraseña;
    }


    public function validarUsuario(PDO $conexion){
        try{
            $consulta = $conexion->prepare("SELECT * FROM usuario WHERE usuario = :usuario AND contraseña= :contraseña");
            // se debe crear campo de usuario y contraseña en la tabla de usuario en la base de datos
            $consulta->bindParam(":usuario", $this->usuario,PDO::PARAM_STR);
            $consulta->bindParam(":contraseña", $this->contraseña, PDO::PARAM_STR);

            $consulta->execute();
            return $consulta->rowCount()>0;
        }catch(PDOException $e){
            echo "Error al validar usuario: ". $e->getMessage();
            return false;
        }
    }


}

?>