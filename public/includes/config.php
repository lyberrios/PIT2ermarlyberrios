<?php
// Habilitar reporte de errores detallado de mysqli
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$servername = "127.0.0.1:3306"; // o simplemente "127.0.0.1" si no es necesario especificar el puerto
$username = "u968109252_cupcakes";       // Cambia esto por el nombre de usuario de tu base de datos
$password = "Notengoqueso1";     // Cambia esto por la contraseña de tu base de datos
$dbname = "u968109252_cupcakedulcin";    // Cambia esto por el nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Falha na Conexão: " . $conn->connect_error);
}
echo "Conexão bem-sucedida";
?>