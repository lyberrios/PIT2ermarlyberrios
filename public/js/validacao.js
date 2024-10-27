$(document).ready(function() {
    $("#login__form").validate({
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
