<?php

class Equipo{

    public int $id;
    public string $tipo;
    public int $idBeneficiario;
    public int $idTecnico;
    public int $idSede;
    public string $estado;

    public function __construct($id,$tipo,$idBeneficiario,$idTecnico,$idSede,$estado)
    {
        $this->id=$id;
        $this->tipo=$tipo;
        $this->idBeneficiario=$idBeneficiario;
        $this->idTecnico=$idTecnico;
        $this->idSede=$idSede;
        $this->estado=$estado;
    }

    public function getId(){
        return $this->id;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function getIdBeneficiario(){
        return $this->idBeneficiario;
    }
    public function getIdTecnico(){
        return $this->idTecnico;
    }
    public function getIdSede(){
        return $this->idSede;
    }
    public function getEstado(){
        return $this->estado;
    }

    public function setId($id){
        $this->id=$id;
    }
    public function setTipo($tipo){
        $this->tipo=$tipo;
    }
    public function setIdBeneficiario($idBeneficiario){
        $this->idBeneficiario=$idBeneficiario;
    }
    public function setIdTecnico($idTecnico){
        $this->idTecnico=$idTecnico;
    }
    public function setIdSede($idSede){
        $this->idSede=$idSede;
    }
    public function setEstado($estado){
        $this->estado=$estado;
    }

    public function crearEquipo(){
        $conexion=$this->establecerConexion();
        try{
            $consulta=$conexion->prepare("INSERT INTO equipo(Id_equipo,Tipo,Id_beneficiario,Id_tecnico,Id_sede,Estado)
                                        VALUES (:idEquipo,:tipo,:idBeneficiario,:idTecnico,:idSede,:estado)");
            $consulta->bindParam(":idEquipo",$this->id,PDO::PARAM_INT);
            $consulta->bindParam(":tipo", $this->tipo,PDO::PARAM_STR);
            $consulta->bindParam(":idBeneficiario",$this->idBeneficiario,PDO::PARAM_INT);
            $consulta->bindParam(":idTecnico",$this->idTecnico,PDO::PARAM_INT);
            $consulta->bindParam(":idSede",$this->idSede,PDO::PARAM_INT);
            $consulta->bindParam(("estado"), $this->estado,PDO::PARAM_STR);
            
            $consulta->execute();
            return true;
        }catch (PDOException $e){
            $mensajeError = "Error al registrar equipo: " . $e->getMessage();
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