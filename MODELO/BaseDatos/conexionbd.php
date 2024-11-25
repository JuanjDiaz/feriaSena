<?php

$server="localhost";
$user="root";
$pass="";
$db="feria_sena";

$conexion=new mysqli($server,$user,$pass,$db);

if ($conexion->connect_errno){
    die("Conexión fallida" . $conexion->connect_errno);
}else{
    echo "Conectado correctamente";
}

?>