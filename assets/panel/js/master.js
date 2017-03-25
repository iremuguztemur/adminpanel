/**
 *  Create by : DELTA ARGE
 *  User : Taner Tombaş <taner@deltaajans.xyz> <tombastaner@gmail.com>
 *
 *  ## Kullanıcı Giriş Script
 *
 * */
var user = function () {
    var err = {};
    var data = {};
    return {
        load : function () {
            // kullanıcı bilgileri al !
            data = {
                url : $("form#login-form").attr("action"),
                username : $("#login-form").find("input[name=username]").val(),
                password : $("#login-form").find("input[name=password]").val()
            };
            user.validate(data);
        },
        validate : function (d) {
            err['login']={};
            if(d['username'] == ''){
                err['login']['type'] = 'username';
                err['login']['msg'] = 'Kullanıcı adı boş bırakılamaz';
                user.errors(err['login']['type'],err['login']['msg']);
            }else if(d['password'] == ''){
                err['login']['type'] = 'password';
                err['login']['msg'] = 'Şifre boş bırakılamaz';
                user.errors(err['login']['type'],err['login']['msg']);
            }else{
                user.send(d);
            }
        },
        send : function (d) {
            if(d['url'] == ''){
                d['url'] = "user-login";
            }
            $lastURL =  $ajaxURL + d['url'];
            $.post($lastURL,d,function (cb) {
                console.log(cb);
                if(cb == 'true'){
                    swal({
                        title: "Başarılı !",
                        text: "Yönlendiriliyorsunuz..",
                        timer: 2000,
                        showConfirmButton: false
                    });
                    setTimeout(function () {
                        location.href = "index";
                    },2200);
                }else{
                    var data = jQuery.parseJSON(cb);
                    user.errors("","'" + data['text']+"'");
                }
            });
        },
        logout : function () {
            user.errors("cikis","Çıkış yapmak istediğinizden eminmisiniz ?");
        },
        errors : function ($type,$err) {
            // user.log($type,$err);
            if($type == 'cikis'){
                swal({
                    title: $err,
                    text: "Çıkış Yapılıyor",
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                },
                function(){

                    $.get("user-logout",function () {
                        swal({
                            title: "Başarılı !",
                            text: "Yönlendiriliyorsunuz..",
                            timer: 2000,
                            showConfirmButton: false
                        });
                        setTimeout(function () {
                            location.href = "login";
                        },2200);
                    });

                   /*
                    setTimeout(function(){
                        swal("Ajax request finished!");
                    }, 2000);
                    */
                });
            }else{
                swal($err);
            }

            return false;
        }
    }
}();

$(document).ready(function () {
    $("#login-form").submit(function () {
        user.load();
        return false
    });
    $(".logout").on("click",function () {
        user.logout();
    });
    window.onblur = function () { document.title = 'Delta Ajans | müşteri bilgilendirme sistemi'; };
    window.onfocus = function () { document.title = 'Delta Mubis'; };

});