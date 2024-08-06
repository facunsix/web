<?php
    include("conexion.php");

// Decodificar datos JSON del cuerpo de la solicitud
$datos = json_decode(file_get_contents("php://input"), true);

// Verificar si los datos requeridos están presentes
if (!isset($datos['genero']) || !isset($datos['edad']) || !isset($datos['categoria']) || !isset($datos['tipo_test']) || !isset($datos['g-recaptcha-response'])) {
    die("Datos incompletos");
}

// Verificar el reCAPTCHA
$recaptchaSecret = '6LdoeQMqAAAAAIKsPyhvuBQvag48X0cY64fQAdh';
$recaptchaResponse = $datos['g-recaptcha-response'];

$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptchaSecret&response=$recaptchaResponse");
$responseKeys = json_decode($response, true);

//if (intval($responseKeys["success"]) !== 1) {
  //  die("Verificación de reCAPTCHA fallida");
//}
// Escapar y asignar variables
$genero = $conexion->real_escape_string($datos['genero']);
$edad = $conexion->real_escape_string($datos['edad']);
$categoria = $conexion->real_escape_string($datos['categoria']);
$tipo_test = $conexion->real_escape_string($datos['tipo_test']);

// Crear nombre de tabla seguro (opcionalmente podrías mejorar la lógica de nombre)
$nombreTabla = "resultado_tests";

// Crear tabla si no existe
$crearTablaSql = "CREATE TABLE IF NOT EXISTS `$nombreTabla` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    genero VARCHAR(20) NOT NULL,
    edad INT NOT NULL,
    categoria VARCHAR(20) NOT NULL,
    tipo_test VARCHAR(50) NOT NULL
)";

if ($conexion->query($crearTablaSql) !== TRUE) {
    die("Error al crear la tabla: " . $conexion->error);
}

// Insertar datos en la tabla
$sql = "INSERT INTO `$nombreTabla` (genero, edad, categoria, tipo_test) VALUES ('$genero', '$edad', '$categoria', '$tipo_test')";

if ($conexion->query($sql) === TRUE) {
    // Test guardado correctamente
    echo "";
} else {
    // Error al guardar el test
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();
?>
