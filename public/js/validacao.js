$(document).ready(function () {
    $("#submitButton").click(function(event) {
        event.preventDefault(); // Prevenir envío tradicional del formulario

        // Recopilar datos del formulario
        const userData = {
            fullname: $("input[name='fullname']").val().trim(),
            username: $("input[name='username']").val().trim(),
            birthdate: $("input[name='birthdate']").val().trim(),
            email: $("input[name='email']").val().trim(),
            password: $("input[name='password']").val().trim()
        };

        // Verificar que los datos están completos
        if (!userData.fullname || !userData.username || !userData.birthdate || !userData.email || !userData.password) {
            alert("Todos los campos son obligatorios");
            return;
        }

        // Enviar datos al servidor mediante AJAX
        $.ajax({
            url: "http://localhost/pit2projeto/public/register.php",
            type: "POST",
            contentType: "application/json",
            data: JSON.stringify(userData),
            success: function(response) {
                console.log("Respuesta del servidor:", response);
                try {
                    const serverResponse = JSON.parse(response);
                    if (serverResponse.message) {
                        alert("Usuário cadastrado com sucesso!");
                        window.location.href = "login.html";
                    } else if (serverResponse.error) {
                        alert("Erro: " + serverResponse.error);
                    }
                } catch (e) {
                    console.error("Respuesta inesperada:", response);
                    alert("Erro inesperado do servidor. Tente mais tarde.");
                }
            },
            error: function(xhr, status, error) {
                console.error("Erro ao cadastrar:", error);
                alert("Erro no servidor. Tente mais tarde.");
            }
        });
    });
});
