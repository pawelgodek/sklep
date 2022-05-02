const validateEmail = (email) => {
    return String(email)
        .toLowerCase()
        .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
};

function reg() {
    let corrE = false;
    let corrP = false;

    if(validateEmail($("#remail").val())) {
        corrE = true;
    }

    if($("#pass").val().length >=8) {
        corrP = true;
    }

    if(corrE && corrP) {
        registerForm();
    } else {
        if(!corrE) {
            $("#infoModalLongTitle").text("Podano błędne dane");
            $("#infoModalBody").text("Email nie może zostać uznany za poprawny!");
            $("#infoModalButton").text("Wróć do rejestracji").attr("act", "btr");
        }
        if(!corrP) {
            $("#infoModalLongTitle").text("Podano błędne dane");
            $("#infoModalBody").text("Hasło musi mieć przynajmniej 6 znaków!");
            $("#infoModalButton").text("Wróć do rejestracji").attr("act", "btr");
        }
        $("#infoModal").modal("show");
    }
}

function registerForm() {
    $.ajax({
        url: "/ajax/a-register.php",
        method: "POST",
        data: {
            rname: $("#rname").val(),
            rsurname: $("#rsurname").val(),
            rlogin: $("#login").val(),
            remail: $("#remail").val(),
            rpass: $("#pass").val(),
            rdate: $("#rdate").val(),
        },

        success: function (data) {
            if(String(data) === String("ok")) {
                $("#infoModalLongTitle").text("Starus rejestracji");
                $("#infoModalBody").text("Rejestracja zakończona pomyślnie!");
                $("#infoModalButton").text("Zaloguj Się").attr("act", "login");
            } else if(String(data) === String("loginEq")) {
                $("#infoModalLongTitle").text("Starus rejestracji");
                $("#infoModalBody").text("Konto o podanym loginie już istnieje!  Wybierz inny.");
                $("#infoModalButton").text("Wróć do rejestracji").attr("act", "btr");
            }
            $("#infoModal").modal("show");
            //alert(data);
        }
    })
        .done(function() {
            //location.reload();
        });
}

//reg events

$(function () {
    $('#infoModalButton').on('click', function (event) {
        if($('#infoModalButton').attr("act") == "btr") {
            $("#infoModal").modal("hide");
        } else if($('#infoModalButton').attr("act") == "login") {
            $("#infoModal").modal("hide");
            loginForm();
        }
    });
});