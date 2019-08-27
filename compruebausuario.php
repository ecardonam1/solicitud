<?php

declare (strict_types=1);

session_start();
require ('clases/crudb.php');
function validarUsuario()
{


    $CORREO = strtoupper($_POST ['email']);
    $CLAVE = strtoupper($_POST ['pwd']);
    $crud = new Crudb();
    if (isset($_POST ['solicitud'])) {
        $numerofilas = $crud->leer($CORREO, $CLAVE, "usuario");
    }else{
        $numerofilas = $crud->leer($CORREO, "", "visualizar");
    }

    if ($numerofilas == 0) {
        session_unset();
        echo '<script type="text/javascript"> alert ("Usuario incorrecto");
    window.location.href="index.html"; </script>';

    } else {

        if (isset($_POST ['solicitud'])) {
            while ($row = $crud->f) {
                $_SESSION['USUARIO_LOGUEADO'] = true;
                $_SESSION['LOGIN'] = $row ["CORREOE"];
                $_SESSION['NOMBRE'] = $row ["NOMBRECOMPLETO"];
                echo '<script type="text/javascript"> window.location.href="solicitud.php";</script>';
            }
        } else {
                while ($row = $crud->f) {

                    $_SESSION['USUARIO_LOGUEADO'] = true;
                    $_SESSION["PDF"]=$row["RUTAPDF"];
                    echo '<script type="text/javascript"> window.location.href="visualizar.php";</script>';
                }
            }
    }
}
validarUsuario();
?>