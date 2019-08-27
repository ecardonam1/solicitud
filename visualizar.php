<?php

session_start();

if (!isset($_SESSION['USUARIO_LOGUEADO'])){

    echo'<script src="js/comprobarLogueo.js"  </script>';
}
header('content-type: application/pdf');
readfile($_SESSION['PDF']);

