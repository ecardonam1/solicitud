<?php


class Crudb
{
    public $f;
    public $conn;


function leer($correo,$clave,$tabla){

    require('clases/conexiondb.php');

    $conexion=new Conexiondb("localhost","root","","dbpaginasweb");
   $conn= $conexion->conectar();

   if($tabla=="usuario") {
       $query = "SELECT * FROM tb_usuarios where correoe='" . $correo . "' and clave =MD5('" . $clave . "')"
       or die ("error in the consult.. " . mysqli_error($conn));
   }else{
       $query = "SELECT * FROM tb_solicitud where correoingresa='" . $correo . "'"
       or die ("error in the consult.. " . mysqli_error($conn));
   }

   $resultado = $conn->query($query);
   $filas=mysqli_num_rows($resultado);
   $this->f=  mysqli_fetch_array($resultado);

    return $filas;
}

function insertar($NOMBRECOMPLETO,$CORREO,$RUTAPDF,$CURRICULUM,$MOTIVO){
    require('clases/conexiondb.php');
    $conexion=new Conexiondb("localhost","root","","dbpaginasweb");
    $conn= $conexion->conectar();
    $query = "Insert into tb_solicitud (nombreingresa,correoingresa,rutapdf,nombrearchivo,motivo) values ('".$NOMBRECOMPLETO."','".$CORREO."','".$RUTAPDF."','".$CURRICULUM."','".$MOTIVO."')" or die("Error in the consult.." . mysqli_error($conn));
    $conn->query($query);

}

}