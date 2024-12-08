<?php

echo "<script>console.log('PHP está funcionando');</script>";

require_once "../MODELO/modeloUsuario.php";

class Controlador{
    public function __construct()
    {
        
    }

    public function validarUsuario(){
        if ($_SERVER["REQUEST_METHOD"]==="POST"){
            $origen=$_POST["file-origen"]?? "";

            if ($origen==="login"){
                $correo=$_POST["usuario"]??"";
                $contraseña=$_POST["contraseña"]??"";
                $user= new User($correo,$contraseña);
                $validacion=$user->validarUsuario();
                if ($validacion){
                    header("Location:../VISTA/src/complements/home.html");
                    exit();
                }else{
                    echo "<script>alert('Usuario o contraseña incorrectos');</script>";
                    echo "<script>window.location.href = '../VISTA/complements/login.html';</script>";
                }
            }
            
            #SE CREARÁ UN METODO PARA RECIBIR EL ORIGEN Y REUSAR CODIGO

        }else{
            echo "<script>console.log('Metodo post no recibido');</script>";
        }
    }
}
$controlador= new Controlador();
$controlador->validarUsuario();


?>