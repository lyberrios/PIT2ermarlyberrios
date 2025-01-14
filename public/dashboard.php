<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    <link rel="stylesheet" href="css/clientes.css">
</head>

<body>

    <!-- Barra de Navegación Lateral -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <h2>Bem-vindo ao Dulcinea Cupcakes</h2>
        </div>
        <ul class="sidebar-menu">
            <li><button onclick="window.location.href='dashboard.php'">Dados do Cliente</button></li>
            <li><button onclick="window.location.href='pesquisar.html'">Pedidos</button></li>
            <li><button onclick="mostrarFormularioAlterar()">Configurações</button></li>
            <li><button onclick="window.location.href='index.php'">Home</button></li>

        </ul>
    </aside>

    <!-- Contenido Principal -->
    <main class="main-content">
    <p class="mensagem">Você fez login com sucesso🎉. <a href='index.php'>Voltar para a página principal</a></p>
        <!-- Formulario de Cadastro -->
        <div id="formCadastro" class="formulario">
            <h2>Dados do Cliente</h2>
            <form id="cadastroForm">
                <div class="perfil__box">
                    <label for="clienteId">ID do Cliente</label>
                    <input type="text" id="clienteId" name="clienteId" readonly>
                </div>
                <div class="perfil__box">
                    <label for="fullname">Nome Completo</label>
                    <input type="text" id="fullname" name="fullname" readonly>
                </div>
                <div class="perfil__box">
                    <label for="email">Correo Electrônico</label>
                    <input type="email" id="email" name="email" readonly>
                </div>
                <label for="idCliente">Digite o CPF cliente</label>
                <input type="text" id="idCliente" name="idCliente" required>

                <label for="rua">Digite o nome da rua</label>
                <input type="text" id="rua" name="rua" required>

                <label for="bairro">Digite o bairro</label>
                <input type="text" id="bairro" name="bairro" required>

                <label for="cidade">Digite a cidade</label>
                <input type="text" id="cidade" name="cidade" required>

                <label for="estado">Estado</label>
                <input type="text" id="estado" name="estado" required>

                <button type="submit">Cadastrar</button>
            </form>
            <a href="index.php">Página inicial</a>
        </div>
    </main>

    <script src="js/clientes.js"></script>
</body>

</html>