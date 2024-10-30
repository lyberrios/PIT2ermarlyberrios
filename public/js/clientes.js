// Función para mostrar el formulario de cadastro
function mostrarFormularioCadastro() {
    document.getElementById("formCadastro").style.display = "block";
    document.getElementById("formPesquisa").style.display = "none";
}

// Función para mostrar el formulario de pesquisa
function mostrarFormularioPesquisa() {
    document.getElementById("formPesquisa").style.display = "block";
    document.getElementById("formCadastro").style.display = "none";
}

// Función para mostrar el formulario de alterar (aún no implementado)
function mostrarFormularioAlterar() {
    alert("Función de Alterar aún no implementada.");
}

// Función para redirigir a la página de inicio
function irHome() {
    window.location.href = "index.html";
}

// Función para pesquisar cliente en el localStorage
function pesquisarCliente(event) {
    event.preventDefault(); // Evita el envío del formulario

    const pesquisaId = document.getElementById("pesquisaId").value;
    const resultadosPesquisa = document.getElementById("resultadosPesquisa");
    resultadosPesquisa.innerHTML = ""; // Limpiar resultados anteriores

    // Buscar cliente en localStorage
    const clientes = JSON.parse(localStorage.getItem("clientes")) || [];
    const clienteEncontrado = clientes.find(cliente => cliente.id === pesquisaId);

    if (clienteEncontrado) {
        resultadosPesquisa.innerHTML = `
            <h3>Resultado:</h3>
            <p><strong>ID:</strong> ${clienteEncontrado.id}</p>
            <p><strong>Rua:</strong> ${clienteEncontrado.rua}</p>
            <p><strong>Bairro:</strong> ${clienteEncontrado.bairro}</p>
            <p><strong>Cidade:</strong> ${clienteEncontrado.cidade}</p>
            <p><strong>Estado:</strong> ${clienteEncontrado.estado}</p>
        `;
    } else {
        resultadosPesquisa.innerHTML = "<p>Cliente não encontrado.</p>";
    }
}
