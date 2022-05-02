function loginForm() {
    $.ajax({
        url: "/ajax/a-login.php",
        method: "POST",
        data: {
            login: $("#login").val(),
            pass: $("#pass").val(),
        }
    })
        .done(function() {
            location.reload();
        });
}