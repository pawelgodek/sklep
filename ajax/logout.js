function logoutForm() {
    $.ajax({
        url: "/ajax/a-logout.php",
        method: "GET",
    })
        .done(function() {
            location.reload();
            location.replace("/");
        });
}