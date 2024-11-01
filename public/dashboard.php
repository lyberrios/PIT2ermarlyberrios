<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

echo "<h1>Bem-vindo ao Dulcinea Cupcakes</h1>";
echo "<p>Você fez login com sucesso.</p> <a href='index.php'>Ir para a página principal</a></p>";
?>
