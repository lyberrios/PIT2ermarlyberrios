<?php
include 'include/config.php';

// Mostrar errores (solo para depuración, desactivar en producción)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Procesar el formulario al enviar
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos
    $servername = "localhost";
    $username = "u968109252_cupcakes";
    $password = "Notengoqueso1";
    $dbname = "u968109252_cupcakedulcin";
    try {
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar conexión
        if ($conn->connect_error) {
            throw new Exception("Falha na conexão: " . $conn->connect_error);
        }

        // Obtener datos del formulario
        $fullname = $conn->real_escape_string($_POST['fullname'] ?? '');
        $username = $conn->real_escape_string($_POST['username'] ?? '');
        $birthdate = DateTime::createFromFormat('d/m/Y', $_POST['birthdate'])->format('Y-m-d');
        $email = $conn->real_escape_string($_POST['email'] ?? '');
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


        // Verificar que los campos no están vacíos
        if ($fullname && $username && $birthdate && $email && $password) {
            // Insertar en la base de datos
            $sql = "INSERT INTO clientes (fullname, username, birthdate, email, password) VALUES ('$fullname', '$username', '$birthdate', '$email', '$password')";

            if ($conn->query($sql) === TRUE) {
                // Mensaje de éxito con enlace a iniciar sesión
                $message = '<div class="success-message">Usuário cadastrado com sucesso! 
                            <a href="login.php">Fazer login</a></div>';
            } else {
                // Verificar si el error es por duplicado de usuario
                if ($conn->errno == 1062) { // Código de error 1062 es para entradas duplicadas
                    $message = '<div class="error-message">Usuário já cadastrado.</div>';
                } else {
                    throw new Exception("Erro ao cadastrar usuário: " . $conn->error);
                }
            }
        } else {
            // Mensaje en caso de que falten campos
            $message = '<div class="error-message">Todos os campos são obrigatórios.</div>';
        }

        $conn->close();

        // Redirigir a success.php con el mensaje codificado
        header("Location: success.php?message=" . urlencode($message));
        exit();  // Detener la ejecución después de la redirección

        } catch (Exception $e) {
        // Manejar cualquier excepción lanzada
        $message = '<div class="error-message">' . $e->getMessage() . '</div>';
        header("Location: success.php?message=" . urlencode($message));
        exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo-png.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/cadastro.css">
    <title>Criar conta | Dulcinea Cupcakes</title>
</head>
<body>
    <div class="login">
        <form id="login__form" method="POST" action="">
            <h1 class="login__title"> Criar conta </h1>
            <p class="register__words">Registre-se para degustar sabores da loja Dulcinea Cupcakes.</p>

            <?php if ($message): ?>
                <p style="color: green;"><?php echo $message; ?></p>
            <?php endif; ?>

            <div class="login__inputs">
                <div class="login__box">
                    <input type="text" name="fullname" placeholder="Nome e sobrenome" required class="login__input" />
                </div>
                <div class="login__box">
                    <input type="text" name="username" placeholder="Usuário" required class="login__input" />
                </div>
                <div class="login__box">
                    <input type="text" name="birthdate" placeholder="Data de Nascimiento" required class="login__input" />
                </div>
                <div class="login__box">
                    <input type="email" name="email" placeholder="Correo electrónico" required class="login__input" />
                </div>
                <div class="login__box">
                    <input type="password" name="password" placeholder="Senha" required class="login__input" />
                </div>
            </div>

            <div class="login__check">
                <div class="login__check-box">
                    <input type="checkbox" class="login__check-input" id="user-check" required>
                    <label for="user-check" class="login__check-label">Ao se registrar, você aceita nossos Termos, nossa Política de Privacidade e nossa Política de Cookies.</label>
                </div>
            </div>

            <button type="submit" class="login__button">Continuar</button>

            <div class="login__barra">
                <div class="barra__der"></div>
                <div class="barra__medio">Ou</div>
                <div class="barra__der"></div>
            </div>

            <div class="login__register">
                <p class="register__words">Você já tem uma conta? <a class="info__policy" href="login.php">Conecte-se</a></p>
            </div>
        </form>
    </div>
</body>
</html>
