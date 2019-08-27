<?php

class Conexiondb {

    public $host;
    public $usuario;
    public $password;
    public $db;

    public function __construct($h,$user,$pass,$bd)
    {
        $this ->host=$h;
        $this->usuario=$user;
        $this->password=$pass;
        $this->db=$bd;
    }


  public  function conectar()
    {
        $conexion=mysqli_connect($this->host,$this->usuario,$this->password,$this->db);
        if (mysqli_connect_error()) {
            die('No se puede conectar a la base de datos' . mysqli_connect_error($conexion));
        }
        return $conexion;
    }



}



