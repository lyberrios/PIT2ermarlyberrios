$(document).ready(function () {
    // Comprobar si el usuario está autenticado al cargar la página
    checkAuthentication();
    
    $(".login__form").submit(function (event) {
        event.preventDefault();

        const emailOrUser = $("#emailOrUser").val().trim();
        const password = $("#password").val().trim();

        if (!emailOrUser || !password) {
            alert("Por favor, insira todos os campos.");
            return;
        }

        // Llamada a la función de verificación con Azure
        loginUser(emailOrUser, password);
    });

    // Manejar el logout
    $("#logoutButton").click(function () {
        localStorage.removeItem("authenticatedUser");
        checkAuthentication();
        alert("Sessão encerrada com sucesso.");
    });
});

function loginUser(emailOrUser, password) {
    console.log("Enviando datos al servidor...", emailOrUser, password);

    $.ajax({
        url: "https://tu-azure-api-url/api/login", // Cambia a la URL de tu API en Azure
        type: "POST",
        contentType: "application/json",
        data: JSON.stringify({ emailOrUser, password }),
        success: function(response) {
            console.log("Respuesta del servidor:", response);

            if (response.success) {
                alert("Login com sucesso.");
                localStorage.setItem("authenticatedUser", true);
                window.location.href = "index.html";
            } else {
                alert("Usuário ou senha incorretos.");
            }
        },
        error: function(error) {
            console.error("Falha na autenticação:", error);
            alert("Erro no servidor. Tente mais tarde.");
        }
    });
}

function checkAuthentication() {
    if (localStorage.getItem("authenticatedUser")) {
        $("#loginContainer").hide();
        $("#logoutButton").show();
    } else {
        $("#loginContainer").show();
        $("#logoutButton").hide();
    }
}
