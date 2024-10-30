<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dulcinea_cupcake";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar conexión
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Obtener datos del formulario
$fullname = $conn->real_escape_string($_POST['fullname'] ?? '');
$username = $conn->real_escape_string($_POST['username'] ?? '');
$birthdate = $conn->real_escape_string($_POST['birthdate'] ?? '');
$email = $conn->real_escape_string($_POST['email'] ?? '');
$password = password_hash($_POST['password'] ?? '', PASSWORD_DEFAULT);

// Verificar que los campos no están vacíos
if ($fullname && $username && $birthdate && $email && $password) {
    // Insertar en la base de datos
    $sql = "INSERT INTO usuarios (fullname, username, birthdate, email, password) VALUES ('$fullname','$username', '$birthdate', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar usuário: " . $conn->error;
    }
} else {
    echo "Todos os campos são obrigatórios.";
}

$conn->close();
?>
