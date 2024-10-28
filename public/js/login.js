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
    console.log("Enviando dados ao servidor...", emailOrUser, password); // Verifica los datos antes de enviar

    $.ajax({
        url: "https://pit2ermarlyberrios-cyc3esekd9auf4fk.brazilsouth-01.azurewebsites.net/login.html", // Cambia a tu URL de API en Azure
        type: "POST",
        contentType: "application/json",
        data: JSON.stringify({ emailOrUser, password }),
        success: function(response) {
            console.log("Resposta do servidor:", response); // Verifica la respuesta

            if (response.success) {
                alert("Login com sucesso.");
                localStorage.setItem("authenticatedUser", true);  // Guardar el estado de autenticación

                // Redirigir al usuario a su página de inicio o perfil
                window.location.href = "index.html";
            } else {
                alert("Usuário ou senha incorretos.");
            }
        },
        error: function(error) {
            console.log("Falha na autenticação:", error); // Verifica si hay errores de red
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