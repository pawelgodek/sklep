$(".shop-selector").on('click', function (event) {
    $.ajax({
        url: "/ajax/select-shop.php",
        method: "POST",
        data: {
            sid: $(event.target).attr("sid"),
        }
    })
        .done(function() {
            location.reload();
        });
})

$("#cart-btn").on('click', function () {
    $("#cartModal").modal("show");
})

$(".to-cart").on('click', function (event) {
    let pid = $(event.target).attr("pid");
    let name = $(event.target).attr("pname");
    let price = $(event.target).attr("price");
    let q = $(event.target).parent().children('input').val();

    let max = $(event.target).parent().children('input').attr('max');

    if(max != 0) {
        if(q !=0) {
            $(event.target).parent().children('input').attr('max', max - q);
            $(event.target).parent().children('input').val(0);

            let row = "<tr class='cart-rows' price='" + price + "' quantity='" + q + "' pid='" + pid + "'>" +
                "          <td>" + name + "</td>" +
                "          <td>" + q + "</td>" +
                "          <td>" + parseFloat(price) + "zł</td>" +
                "          <td><button pid='" + pid + "' quantity='" + q + "' onclick='rem_cart_elem(this)' type='button' class='btn btn-danger btn-sm'>X</button></td>" +
                "       </tr>"

            $("#cartModalBody").children('table').children('tbody').append(row);

            cal_cart();
        }
    } else {
        $("#noProductModal").modal("show");
    }
})

$("#cart-make-order").on('click', function (event) {
    let pid = [];
    let pq = [];

    $(".cart-rows").each(function (i, row) {
        pq.push(parseInt($(row).attr("quantity")));
        pid.push(parseInt($(row).attr("pid")));
    })

    $.ajax({
        url: "/ajax/a-order.php",
        method: "POST",
        data: {
            id: pid,
            q: pq,
        }
    })
        .done(function() {
            location.reload();
        });
})

$("#all-products").on('click', function (event) {
    $.ajax({
        url: "/ajax/select-shop.php",
        method: "POST",
        data: {
            sid: 0,
        }
    })
        .done(function() {
            location.reload();
        });
})

$(".product-det").on('click', function (event) {
    let pid = $(event.target).attr('pid');
    let uid = $(event.target).attr('uid');

    $.ajax({
        url: "/ajax/a-det.php",
        method: "POST",
        data: {
            act: 0,
            pid: pid,
            uid: uid,
        }
    })
        .done(function(ret) {
            let res = JSON.parse(ret);
            $("#detModalButton").attr("uid", uid);
            $("#detModalButton").attr("pid", pid);
            $("#detModalButton").attr("c", 0);

            $("#detModalLongTitle").text(res[0]);
            $("#detModalType").text("Rodzaj produktu: " + res[1]);
            $("#detModalDesc").text(res[3]);
        });

    $.ajax({
        url: "/ajax/a-det.php",
        method: "POST",
        data: {
            act: 1,
            pid: pid,
            uid: uid,
        }
    })
        .done(function(ret) {
            let res = JSON.parse(ret);
            if(res.length != 0) {
                $("#detModalButton").attr("uid", uid);
                $("#detModalButton").attr("pid", pid);
                $("#detModalButton").attr("c", 1);
                $("#detModalButton").text("Zmień ocenę");
                $("#detModalInput").val(res[0]);
            } else {

            }
        });

    $("#detModal").modal("show");
})

$("#detModalButton").on('click', function (event) {
    let pid = $(event.target).attr('pid');
    let uid = $(event.target).attr('uid');
    let c = $(event.target).attr('c');

    let inVal = $("#detModalInput").val();

    $.ajax({
        url: "/ajax/a-rate-product.php",
        method: "POST",
        data: {
            pid: pid,
            uid: uid,
            c: c,
            inVal: inVal,
        }
    })
        .done(function() {
            $("#detModal").modal("hide");
            location.reload();
        });
})

function rem_cart_elem(event) {
    $(event).parent().parent().remove();
    cal_cart();
}

$(".select-product").on('click', function (event) {
    let ptid = $(event.target).attr('ptid');
    let name = $(event.target).text();

    $.ajax({
        url: "/ajax/a-ptid.php",
        method: "POST",
        data: {
            ptid: ptid,
            ptname: name,
        }
    })
        .done(function() {
            location.reload();
        });
})

$(".shop-wor").on('click', function (event) {
    let wrid = $(event.target).attr('wrid');
    let uid = $(event.target).attr('uid');

    $.ajax({
        url: "/ajax/a-wor-det.php",
        method: "POST",
        data: {
            act: 0,
            wrid: wrid,
            uid: uid,
        }
    })
        .done(function(ret) {
            let res = JSON.parse(ret);
            $("#detUsrModalButton").attr("uid", uid);
            $("#detUsrModalButton").attr("wrid", wrid);
            $("#detModalButton").attr("c", 0);

            $("#detUsrModalLongTitle").text(res[0] + " " + res[1]);
            $("#detUsrModalType").text("Stanowisko: " + res[2]);
            if(res[3] != null) {
                $("#detUsrModalDesc").text("Twoja ocena pracownika: " + res[3]);
            }
        });

    $.ajax({
        url: "/ajax/a-wor-det.php",
        method: "POST",
        data: {
            act: 1,
            wrid: wrid,
            uid: uid,
        }
    })
        .done(function(ret) {
            let res = JSON.parse(ret);
            if(res != null) {
                $("#detUsrModalButton").attr("uid", uid);
                $("#detUsrModalButton").attr("wrid", wrid);
                $("#detUsrModalButton").attr("c", 1);
                $("#detUsrModalButton").text("Zmień ocenę");
                $("#detUsrModalInput").val(res[0]);
            } else {

            }
        });

    $("#detUsrModal").modal("show");
})

$("#detUsrModalButton").on('click', function (event) {
    let wrid = $(event.target).attr('wrid');
    let uid = $(event.target).attr('uid');
    let c = $(event.target).attr('c');

    let inVal = $("#detUsrModalInput").val();

    $.ajax({
        url: "/ajax/a-rate-user.php",
        method: "POST",
        data: {
            wrid: wrid,
            uid: uid,
            c: c,
            inVal: inVal,
        }
    })
        .done(function() {
            $("#detUsrModal").modal("hide");
            location.reload();
        });
})

$(".odet").on('click', function (event) {
    let oid = $(event.target).attr('oid');
    let oname = $(event.target).attr('oname');

    $("#oDetBody").empty();

    $.ajax({
        url: "/ajax/a-odet.php",
        method: "POST",
        data: {
            oid: oid,
        }
    })
        .done(function(ret) {
            let res = JSON.parse(ret);
            $("#oDetLongTitle").text("Nr. zamówienia: " + oname);

            for(let i=0;i<res.length;i++) {
                fwq = "<tr>\n" +
                    "       <td>"+ res[i]["name"] +"\n" +
                    "       <td>"+ res[i]["quantity"] +"</td>\n" +
                    " </tr>"

                $("#oDetBody").append(fwq);
            }
        });

    $("#oDetModal").modal("show");
})

$(".oclose").on('click', function (event) {
    let oid = $(event.target).attr('oid');

    $.ajax({
        url: "/ajax/a-oclose.php",
        method: "POST",
        data: {
            oid: oid,
        }
    })
        .done(function() {
            location.reload();
        });
})

$("#add-rap").on('click', function (event) {
    $("#rapModal").modal("show");
})

$("#rapModalButton").on('click', function (event) {
    let uid = $(event.target).attr('uid');
    let title = $("#rap-title").val();
    let content = $("#rap-content").val();

    $.ajax({
        url: "/ajax/a-addrap.php",
        method: "POST",
        data: {
            uid: uid,
            title: title,
            content: content,
        }
    })
        .done(function() {
            location.reload();
        });
})