<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "observatoriodb";

$conexion = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()){
	echo 'Error, no se pudo conectar a la base de datos: '.mysqli_connect_error();
}

if (!mysqli_set_charset($conexion, "utf8")) {
    printf("Error cargando el conjunto de caracteres utf8_general_ci: %s\n", mysqli_error($conexion));
    exit();
}
?>