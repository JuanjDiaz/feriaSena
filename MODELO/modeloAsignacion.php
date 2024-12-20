<?php

require_once "conexionbd.php";

class Beneficiario{

    public string $tecnico;
    public string $estadoEquipo;
    public string $fechaRecepcion;

    public function __construct($tecnico,$estadoEquipo,$fechaRecepcion)
    {
        $this->tecnico=$tecnico;
        $this->estadoEquipo=$estadoEquipo;
        $this->fechaRecepcion=$fechaRecepcion;
    }

    public function getTecnico(){
        return $this->tecnico;
    }
    public function getEstadoEquipo(){
        return $this->estadoEquipo;
    }
    public function getFechaRecepcion(){
        return $this->fechaRecepcion;
    }

    public function setTecnico($tecnico){
        $this->tecnico=$tecnico;
    }
    public function setEstadoEquipo($estadoEquipo){
        $this->estadoEquipo=$estadoEquipo;
    }
    public function setFechaRecepcion($fechaRecepcion){
        $this->fechaRecepcion=$fechaRecepcion;
    }

    public function buscarAsignacion(){
        // iniciar conexion con la base de datos
        $conexion=$this->establecerConexion();
        try{
            $consulta= $conexion->prepare("SELECT equipo.Id_equipo, equipo.Tipo, beneficiario.Nombre_completo, usuario.Nombre AS Nombre_Usuario, equipo_procedimiento.Fecha_ingreso, equipo.Estado
                                            FROM equipo
                                            JOIN beneficiario ON equipo.Id_beneficiario = beneficiario.Id_beneficiario
                                            JOIN usuario ON equipo.Id_tecnico = usuario.Id_usuario
                                            JOIN equipo_procedimiento ON equipo.Id_equipo = equipo_procedimiento.Id_equipo
                                            WHERE usuario.Nombre = ? AND 
	                                                equipo.Estado = ? AND 
                                                    equipo_procedimiento.Fecha_ingreso = ? ");
            $consulta->bindParam("sss", $nombre_usuario, $estado_equipo, $fecha_ingreso);

            // ejecutar la consulta
            $consulta->execute();
            return true;
        }catch(PDOException $e){
            $mensajeError = "Error al hacer la consulta: " . $e->getMessage();
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