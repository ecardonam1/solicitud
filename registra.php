<?php
/**
 * Created by PhpStorm.
 * User: ruldin
 * Date: 16/08/2019
 * Time: 4:50 PM
 */

session_start();

require("clases/crudb.php");

if (!isset($_SESSION['USUARIO_LOGUEADO'])){
    echo'<script type="text/javascript">  alert("usted no está logueado"); window.location.href="index.html";   </script>';
}

$crud=new Crudb();

$curriculum=$_FILES['userfile']['name'];
$guardado=$_FILES['userfile']['tmp_name'];

$CORREO=strtoupper($_POST ['LOGIN']);
$NOMBRECOMPLETO =strtoupper($_POST ['NOMBRECOMPLETO']);
$MOTIVO = $_POST ['MOTIVO'];
$RUTAPDF='C:/PDF/'.$curriculum;
$extension=substr($curriculum,strlen($curriculum)-4);
if(strcmp($extension,'.pdf')!==1){
    if(!file_exists('C:\PDF')){
        mkdir('C:\PDF',0777,true);
        if(file_exists('C:\PDF')){
            move_uploaded_file($guardado, 'C:\PDF/'.$curriculum);
        }
    }else{
        move_uploaded_file($guardado, 'C:\PDF/'.$curriculum);

    }

  $crud->insertar($NOMBRECOMPLETO,$CORREO,$RUTAPDF,$curriculum,$MOTIVO);

    echo "<br>Información grabada con exito!!";

}
else{
    echo '<script language="JavaScript">alert(\'suba un archivo pdf\'); window.location.href=\'solicitud.php\';</script>';

}