<?php

date_default_timezone_set("America/Santiago");
$fechaActual = date("Y-m-d") . " " . date("h:i");

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "proyecto_isw";

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (mysqli_connect_errno()) {
    echo "No se pudo conectar a la base de datos.";
}