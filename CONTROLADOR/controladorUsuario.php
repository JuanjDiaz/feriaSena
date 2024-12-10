<?php

echo "<script>console.log('PHP está funcionando');</script>";

require_once "../MODELO/modeloUsuario.php";
require_once "../MODELO/modeloBeneficiario.php";

class Controlador{

    public $origen;
    public $user;
    public $beneficiario;
    public $equipo;

    public function __construct(){
        $this->origen=null;
        $this->user=null;
        $this->beneficiario=null;
        $this->equipo=null;
    }

    public function verificarOrigen(){
        if ($_SERVER["REQUEST_METHOD"]==="POST"){
            $this->origen=$_POST["file-origen"]?? "";

            if ($this->origen==="login"){
                $this->consultarUsuarioIngresado();
            }
            }elseif ($this->origen === "formulario"){
                $this->registrarBeneficiario();
                $this->registrarEquipo();
        }else{
            echo "<script>console.log('Metodo post no recibido');</script>";
        }
    }


    public function consultarUsuarioIngresado(){
        $correo=$_POST["usuario"]??"";
        $contraseña=$_POST["contraseña"]??"";
        $this->user= new User($correo,$contraseña);
        $validacion=$this->user->validarUsuario();
        $consulta=$this->user->consultarUsuario();
        $nombreUsuario=$this->user->getNombre();
        $rolUsuario=$this->user->getRol();
        if ($validacion && $consulta){
            session_start();
            $_SESSION["Nombre"]=$nombreUsuario;
            $_SESSION["Rol"]=$rolUsuario;
            header("Location:../VISTA/src/complements/home.php");
            exit();
        }else{
            echo "<script>alert('Usuario o contraseña incorrectos');</script>";
            echo "<script>window.location.href = '../VISTA/complements/login.html';</script>";
        }
    }

    public function registrarBeneficiario(){
        $idBeneficiario=$_POST["idPropietario"]??"";
        $nombreCompletoBeneficiario=$_POST["nombreCompletoPropietario"]??"";
        $celularBeneficiario=$_POST["telefonoPropietario"]??"";
        $correoBeneficiario=$_POST["emailPropietario"]??"";
        $this->beneficiario=new Beneficiario($idBeneficiario,$nombreCompletoBeneficiario,$celularBeneficiario,$correoBeneficiario);
        $registroBeneficiario=$this->beneficiario->crearBeneficiario();

        if ($registroBeneficiario){
            echo "<script>alert('Propietario registrado exitosamente');</script>";
        }
    }

    public function registrarEquipo(){
        // $idEquipo;

        // $this->equipo=new Equipo();
        // $registroEquipo=$this->equipo->crearEquipo();


        //en revisión de como hacer de manera efectiva el registro de los datos de llaves foraneas como sede
    }

    
}
$controlador= new Controlador();
$controlador->verificarOrigen();
?>