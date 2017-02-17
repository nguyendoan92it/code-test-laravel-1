
function addCard(id_product, soluong_sp) {

    var quantity = soluong_sp;
    if(soluong_sp == 0) {
        quantity = $("#quantity_sp").val();
    }

    $.ajax({
        type: "POST",
        url: url_add_card,
        data: {product: id_product, quantity: quantity, access_token: access_token},
        dataType: 'json',
        success: function (result) {
            if(result.status == false) {
                alert(result.message);
            } else {
                window.location.reload();
            }
        }
    });
}

function updateCard(id_product, quantity) {
    $.ajax({
        type: "POST",
        url: url_update_card,
        data: {product: id_product, quantity: quantity, access_token: access_token},
        dataType: 'json',
        success: function (result) {
            if(result.status == false) {
                alert(result.message);
            } else {
                window.location.reload();
            }
        }
    });
}

function removeCard(id_product) {
    $.ajax({
        type: "POST",
        url: url_remove_card,
        data: {product: id_product, access_token: access_token},
        dataType: 'json',
        success: function (result) {
            if(result.status == false) {
                alert(result.message);
            } else {
                $('#product_'+id_product).remove();
            }
        }
    });
}

function viewCard() {
    $.ajax({
        type: "POST",
        url: url_view_card,
        data: {access_token: access_token},
        dataType: 'json',
        success: function (result) {
            if(result.status == false) {
                alert(result.message);
            }
        }
    });
}

function totalPrice(quantity) {
    var totla_price = quantity*price;
    $(".total span").text(totla_price+" vnđ");
    return;
}
