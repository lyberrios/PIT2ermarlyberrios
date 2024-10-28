$(document).ready(function() {
    $(".login__form").validate({
        rules: {
            fullname: {
                required: true,
                minlength: 3
            },
            birthdate: {
                required: true,
                date: true
            },
            password: {
                required: true,
                minlength: 6
            }
        },
        messages: {
            fullname: {
                required: "Por favor, digite seu nome e sobrenome.",
                minlength: "O nome deve ter pelo menos 3 caracteres."
            },
            birthdate: {
                required: "Por favor, insira sua data de nascimento",
                date: "Por favor, insira uma data válida."
            },
            password: {
                required: "Por favor, digite uma senha",
                minlength: "A senha deve ter pelo menos 6 caracteres."
            }
        }
    });
});
function registrarUsuario(user) {
    $.ajax({
        url: "https://pit2ermarlyberrios-cyc3esekd9auf4fk.brazilsouth-01.azurewebsites.net/register", // Ajusta la URL si es necesario
        type: "POST",
        contentType: "application/json",
        data: JSON.stringify(user),
        success: function(response) {
            alert("Usuário cadastrado com sucesso");
            localStorage.setItem("authenticatedUser", JSON.stringify(user)); // Guarda el usuario en localStorage
            window.location.href = "login.html"; // Redirige al usuario a la página de login
        },
        error: function(error) {
            console.log("Erro ao cadastrar:", error);
            alert("Erro no servidor. Tente mais tarde.");
        }
    });
 }