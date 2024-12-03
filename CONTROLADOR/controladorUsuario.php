<?php

echo "<script>console.log('PHP está funcionando');</script>";
exit();

require_once "../MODELO/modeloUsuario.php";
require "../MODELO/conexionbd.php";

class Controlador{
    public function __construct()
    {
        
    }

    public function validarUsuario(){
        if ($_SERVER["REQUEST_METHOD"]==="POST"){
            $usuario=$_POST["usuario"]??"";
            $contraseña=$_POST["contraseña"]??"";

            $db=new DataBase();
            $conexion=$db->getConexion();

            $user=new User($usuario,$contraseña);
            $user->consultarUsuario($conexion);

            if ($user->consultarUsuario($conexion)) {
                echo "Inicio de sesión exitoso. Bienvenido, {$usuario}.";
            } else {
                echo "Usuario o contraseña incorrectos.";
            }
        }
    }
}
$controlador= new Controlador();
$controlador->validarUsuario();


?>