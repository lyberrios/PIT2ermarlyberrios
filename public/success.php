<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro com sucesso</title>
    <style>
        .success-message {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #e0f7de;
            color: #2e7d32;
            font-weight: bold;
            font-size: 18px;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            max-width: 500px;
            margin: 100px auto;
        }
        .success-message a {
            color: #2e7d32;
            font-weight: bold;
            text-decoration: none;
            margin-left: 10px;
        }
    </style>
    <script>
        // Redirige automáticamente después de 3 segundos
        setTimeout(function() {
            window.location.href = "login.php";
        }, 3000);
    </script>
</head>
<body>

<?php
// Obtener el mensaje de la URL y decodificarlo
$message = isset($_GET['message']) ? urldecode($_GET['message']) : '';
echo $message;
?>

</body>
</html>
