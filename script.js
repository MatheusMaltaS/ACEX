$(document).ready(function () {
    const items = $(".item");

    items.each(function () {
        $(this).blur(function () {
            checkInputs(this.name);
        });

        $(this).keyup(function () {
            $(this).removeClass("error");
            $(this).siblings().removeClass("error");
        });
    });

    $("#file").change(function (event) {
        const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').attr('src', e.target.result).show();
                    $('#removeImage').show();
                    $("#tem_imagem").val("Sim");
                };
                reader.readAsDataURL(file); // Lê o arquivo como URL de dados
            } else {
                $('#imagePreview').hide();
            }
    });

    // Função para remover a imagem
    $('#removeImage').on('click', function(event) {
        event.preventDefault();
        $('#imagePreview').hide().attr('src', ''); // Esconde e limpa a imagem
        $('#file').val(''); // Limpa o input file
        $(this).hide(); // Esconde o botão de remover
        $("#tem_imagem").val("Não");
    });

    const form = $("#form_cadastro");
    form.submit(function (event) {
        event.preventDefault();
        var enviar = true;

        items.each(function () {
            checkInputs(this.name);
        });

        items.each(function () {
            if ($(this).hasClass("error")) {
                enviar = false;
            }
        });

        if (enviar) this.submit();
    });
});

function checkInputs(campo) {
    if ($("#" + campo).val() == "") {
        $("#" + campo).addClass("error");
        $("#" + campo).siblings().addClass("error");
    } else {
        $("#" + campo).removeClass("error");
        $("#" + campo).siblings().removeClass("error");
    }

    if (campo == "email") {
        checkEmail();
    }

    if ((campo == "senha" || campo == "confirm_senha")) {
        confirmaSenha();
    }

    if (campo == "login") {
        $(".error-txt.login").text("Usuário ou e-mail não pode ficar em branco!");
    }

    if (campo == "senha") {
        $(".error-txt.senha").text("Senha não pode ficar em branco!");
    }
}



function confirmaSenha() {
    const senha = $("#senha");
    const confirm_senha = $("#confirm_senha");
    const errorTxtSenha = $(".error-txt.confirm_senha");
    if (senha.val() != "" && confirm_senha.val() != "") {
        if (confirm_senha.val() != senha.val()) {
            confirm_senha.addClass("error");
            confirm_senha.siblings().addClass("error");
            errorTxtSenha.text("A confirmação de senha não confere!");
        } else {
            confirm_senha.removeClass("error");
            confirm_senha.siblings().removeClass("error");
        }
    } else if (confirm_senha.val() == "") {
        errorTxtSenha.text("Confirmação de senha não pode ficar em branco!");
    }
}

function checkEmail() {
    const email = $("#email");
    const emailRegex =
        /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/gi;
    const errorTxtEmail = $(".error-txt.email");

    if (!email.val().match(emailRegex)) {
        email.addClass("error");
        email.siblings().addClass("error");
        if (email.val() != "") {
            errorTxtEmail.text("Digite um email válido!");
        } else {
            errorTxtEmail.text("Email não pode ficar em branco!");
        }
    } else {
        email.removeClass("error");
        email.siblings().removeClass("error");
    }
}

function mostrarSenha() {
    const senha = $("#senha");
    const btnSenha = $("#btn-senha");

    if (senha.attr('type') === 'password') {
        senha.attr('type', 'text');
        btnSenha.removeClass('bi-eye-fill').addClass('bi-eye-slash-fill');
    } else if (senha.attr('type') === 'text') {
        senha.attr('type', 'password');
        btnSenha.removeClass('bi-eye-slash-fill').addClass('bi-eye-fill');
    }
}