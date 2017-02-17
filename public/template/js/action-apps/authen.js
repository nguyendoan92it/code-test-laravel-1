
function register() {
    $.ajax({
        type: "POST",
        url: url_register,
        data: $('#register_user').serialize(),
        dataType: 'json',
        success: function (result) {
            if(result.status == false) {
                $(".error_register").text(result.message);
            } else {
                window.location.reload();
            }
        }
    });
}

function login() {
    $.ajax({
        type: "POST",
        url: url_login,
        data: $('#login_user').serialize(),
        dataType: 'json',
        success: function (result) {
            if(result.status == false) {
                $(".error_login").text(result.message);
            } else {
                window.location.reload();
            }
        }
    });
}

function resetPass() {
    $.ajax({
        type: "POST",
        url: url_reset_pass,
        data: $('#reset_pass').serialize(),
        dataType: 'json',
        success: function (result) {
            if(result.status == false) {
                $(".error_login").text(result.error_reset);
            } else {
                window.location.reload();
            }
        }
    });
}