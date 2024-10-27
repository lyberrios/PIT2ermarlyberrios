$(document).ready(function () {
    $(".login__form").submit(function (event) {
        event.preventDefault();

        const emailOrUser = $(".login__input[type='email']").val().trim();
        const password = $(".login__input[type='password']").val().trim();

        if (!emailOrUser || !password) {
            alert("Por favor, insira todos os campos.");
            return;
        }

        // Llamada a la función de verificación con Azure
        loginUser(emailOrUser, password);
    });
});

function loginUser(emailOrUser, password) {
    console.log("Enviando datos al servidor...", emailOrUser, password); // Verifica los datos antes de enviar

    $.ajax({
        url: "https://tu-azure-api-url/login", // Cambia a tu URL de API en Azure
        type: "POST",
        contentType: "application/json",
        data: JSON.stringify({ emailOrUser, password }),
        success: function(response) {
            console.log("Respuesta del servidor:", response); // Verifica la respuesta

            if (response.success) {
                alert("Login com sucesso.");
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
