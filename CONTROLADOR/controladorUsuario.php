<?php

echo "<script>console.log('PHP está funcionando');</script>";

require_once "../MODELO/modeloUsuario.php";
require_once "../MODELO/modeloBeneficiario.php";
require_once "../MODELO/modeloEquipo.php";

class Controlador{

    public $origen;
    public $user;
    public $beneficiario;
    public $equipo;
    public $idBeneficiario;

    public function __construct(){
        $this->origen=null;
        $this->user=null;
        $this->beneficiario=null;
        $this->equipo = new Equipo();
        $this->idBeneficiario=null;
    }

    //ejecutar metodos segun la vista 
    public function verificarOrigen(){
        if ($_SERVER["REQUEST_METHOD"]==="POST"){
            $this->origen=$_POST["file-origen"]?? "";

            if ($this->origen==="login"){
                $this->consultarUsuarioIngresado();
            }elseif ($this->origen==="home-informes") {
                $this->mostrarInformes();
            }elseif ($this->origen==="home-formulario"){
                $this->consultarTecnicoYSedeExistente();
            }elseif ($this->origen==="home-asignaciones") {
                
            }elseif ($this->origen === "formulario"){
                $this->registrarBeneficiario();
                $this->registrarEquipo();
            }
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

    public function mostrarInformes(){
        header("Location:../VISTA/src/complements/informes.html");
    }

    public function consultarTecnicoYSedeExistente(){
        $consultaTecnicos=$this->equipo->consultarTecnico();
        $consultaSedes=$this->equipo->consultaSede();
        if ($consultaTecnicos && $consultaSedes){
            session_start();
            $_SESSION["tecnicos"]=$consultaTecnicos;
            $_SESSION["sedes"]=$consultaSedes;
            header("Location:../VISTA/src/complements/formulario.php");
            exit();
        }
    }

    public function registrarBeneficiario(){
        $this->idBeneficiario=$_POST["idPropietario"]??"";
        $nombreCompletoBeneficiario=$_POST["nombreCompletoPropietario"]??"";
        $celularBeneficiario=$_POST["telefonoPropietario"]??"";
        $correoBeneficiario=$_POST["emailPropietario"]??"";
        $this->beneficiario=new Beneficiario($this->idBeneficiario,$nombreCompletoBeneficiario,$celularBeneficiario,$correoBeneficiario);
        $registroBeneficiario=$this->beneficiario->crearBeneficiario();
        if ($registroBeneficiario){
            echo "<script>alert('Propietario registrado exitosamente');</script>";
        }else{
            echo    "<script>alert('Error en registrar propietario');</script>";
        }
    }

    public function registrarEquipo(){
        $idEquipo=$_POST["idEquipo"];
        $tipoEquipo=$_POST["tipoEquipo"];
        // $procedimiento=$_POST["procedimiento"];
        $idTecnico=$_POST["tecnico"];
        $sede=$_POST["sede"];
        $this->equipo->setDatos($idEquipo,$tipoEquipo,$this->idBeneficiario,$idTecnico,$sede,"Pendiente");
        $registroEquipo=$this->equipo->crearEquipo();
        if ($registroEquipo){
            echo "<script>alert('Equipo registrado exitosamente');</script>";
        }else{
            echo "<script>alert('Error en registrar equipo');</script>";
        }
    }
    
}
$controlador= new Controlador();
$controlador->verificarOrigen();
?>