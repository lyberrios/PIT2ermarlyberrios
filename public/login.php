<?php
include 'include/config.php';

// Mostrar errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Configuración de la base de datos
$servername = "localhost";
$username = "u968109252_cupcakes";
$password = "Notengoqueso1";
$dbname = "u968109252_cupcakedulcin";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Obtener datos del formulario
    $emailOrUser = $conn->real_escape_string($_POST['emailOrUser'] ?? '');
    $password = $_POST['password'] ?? '';

    // Consultar la base de datos para verificar el usuario
    $sql = "SELECT * FROM clientes WHERE email = '$emailOrUser' OR username = '$emailOrUser'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        // El usuario existe, verificar la contraseña
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            // Contraseña correcta, redirigir al dashboard o página de bienvenida
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: dashboard.php");
            exit();
        } else {
            // Contraseña incorrecta
            $message = '<div class="error-message">Senha incorreta.</div>';
        }
    } else {
        // Usuario no encontrado
        $message = '<div class="error-message">Usuário ou email não encontrado.</div>';
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo-png.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/cadastro.css">
    <title>Login | Dulcinea Cupcakes</title>
</head>

<body>
    <div class="login">
        <?php if ($message) echo $message; ?>

        <form action="login.php" method="POST" class="login__form">
            <h1 class="login__title">Sistema de Login</h1>

            <div class="login__inputs">
                <div class="login__box">
                    <input type="text" name="emailOrUser" placeholder="Email ou usuário" required class="login__input" autocomplete="username" />
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div class="login__box">
                    <input type="password" name="password" placeholder="Senha" required class="login__input" autocomplete="current-password" />
                    <i class="fa-solid fa-lock"></i>
                </div>
                

            </div>

            <div class="login__check">
                <div class="login__check-box">
                    <input type="checkbox" class="login__check-input" id="user-check">
                    <label for="user-check" class="login__check-label">Lembre-se</label>
                </div>
                <a href="#" class="login__forgot">Esqueceu da sua senha?</a>
            </div>
            <button type="submit" class="login__button">Entrar</button>

            <div class="login__barra">
                <div class="barra__der"></div>
                <div class="barra__medio">Ou</div>
                <div class="barra__der"></div>
            </div>

            <div class="login__register">
                <p class="register__words">Não tem uma conta ainda? <a class="register__link" href="cadastrar.php">Cadastre-se</a></p>
            </div>
        </form>
    </div>


</body>

</html>
