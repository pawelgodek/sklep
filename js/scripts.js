function cal_cart() {
    let sum = 0;
    let j = 0;

    $(".cart-rows").each(function (i, row) {
        sum = sum + (parseFloat($(row).attr("price")) * parseInt($(row).attr("quantity")));
        j = j + parseInt($(row).attr("quantity"));
    })

    $("#cart-count").text(j);

    $("#cart-sum-price").text(sum + "zł");
}