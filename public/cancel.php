<?php
// Redirigir automáticamente después de 5 segundos
header("refresh:5;url=index.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="5;url=index.php">
    <title>Pedido Cancelado</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            background: #fff;
            padding: 30px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .container h1 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #e74c3c;
        }
        .container p {
            font-size: 1.1em;
            margin-bottom: 30px;
        }
        .redirect-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 1em;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }
        .redirect-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pedido Cancelado</h1>
        <p>Desculpe, o processo de pagamento foi cancelado. Você será redirecionado para a página principal em 5 segundos</p>
        <a href="index.php" class="redirect-button">Voltar para a página principal agora</a>
    </div>
</body>
</html>
